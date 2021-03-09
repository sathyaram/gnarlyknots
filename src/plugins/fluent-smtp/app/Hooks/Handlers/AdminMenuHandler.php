<?php

namespace FluentMail\App\Hooks\Handlers;

use FluentMail\App\Models\Settings;
use FluentMail\Includes\Core\Application;
use FluentMail\App\Services\Mailer\Manager;

class AdminMenuHandler
{
    protected $app = null;

    public function __construct(Application $application)
    {
        $this->app = $application;
    }

    public function addFluentMailMenu()
    {
        $title = $this->app->applyCustomFilters('admin-menu-title', __('Fluent SMTP', 'fluent-smtp'));

        add_submenu_page(
            'options-general.php',
            $title,
            $title,
            'manage_options',
            'fluent-mail',
            [$this, 'renderApp'],
            16
        );
    }

    public function renderApp()
    {
        $this->enqueueAssets();
        $this->app->view->render('admin.menu');
    }

    private function enqueueAssets()
    {
        wp_enqueue_script(
            'fluent_mail_admin_app_boot',
            fluentMailMix('admin/js/boot.js'),
            ['jquery'],
            FLUENTMAIL_PLUGIN_VERSION
        );

        wp_enqueue_script('fluentmail-chartjs', fluentMailMix('libs/chartjs/Chart.min.js'), [], FLUENTMAIL_PLUGIN_VERSION);
        wp_enqueue_script('fluentmail-vue-chartjs', fluentMailMix('libs/chartjs/vue-chartjs.min.js'), [], FLUENTMAIL_PLUGIN_VERSION);


        wp_enqueue_style(
            'fluent_mail_admin_app', fluentMailMix('admin/css/fluent-mail-admin.css'), [], FLUENTMAIL_PLUGIN_VERSION
        );

        wp_localize_script('fluent_mail_admin_app_boot', 'FluentMailAdmin', [
            'slug'                   => FLUENTMAIL,
            'brand_logo'             => esc_url(fluentMailMix('images/logo.svg')),
            'nonce'                  => wp_create_nonce(FLUENTMAIL),
            'settings'               => $this->getMailerSettings(),
            'has_fluentcrm'          => defined('FLUENTCRM'),
            'has_fluentform'         => defined('FLUENTFORM'),
            'has_ninja_tables'       => defined('NINJA_TABLES_VERSION'),
            'disable_recommendation' => apply_filters('fluentmail_disable_recommendation', false),
            'plugin_url'             => 'https://fluentsmtp.com/?utm_source=wp&utm_medium=install&utm_campaign=dashboard'
        ]);

        do_action('fluent_mail_loading_app');

        wp_enqueue_script(
            'fluent_mail_admin_app',
            fluentMailMix('admin/js/fluent-mail-admin-app.js'),
            ['fluent_mail_admin_app_boot'],
            FLUENTMAIL_PLUGIN_VERSION,
            true
        );

        wp_enqueue_script(
            'fluent_mail_admin_app_vendor',
            fluentMailMix('admin/js/vendor.js'),
            ['fluent_mail_admin_app_boot'],
            FLUENTMAIL_PLUGIN_VERSION,
            true
        );
    }

    protected function getMailerSettings()
    {
        $settings = $this->app->make(Manager::class)->getMailerConfigAndSettings(true);

        $settings = array_merge(
            $settings,
            [
                'user_email' => wp_get_current_user()->user_email
            ]
        );

        return $settings;
    }

    public function maybeAdminNotice()
    {
        if (!current_user_can('manage_options')) {
            return;
        }

        $connections = $this->app->make(Manager::class)->getConfig('connections');

        global $wp_version;

        $requireUpdate = version_compare($wp_version,'5.5', '<');

        if($requireUpdate) { ?>
            <div class="notice notice-warning">
                <p>
                    <?php echo sprintf(__('WordPress version 5.5 or greater is required for FluentSMTP. You are using version %s currently. Please update your WordPress Core to use FluentSMTP Plugin.', 'fluent-smtp'), $wp_version); ?>
                </p>
            </div>
        <?php } else if(empty($connections)) {
            ?>
            <div class="notice notice-warning">
                <p>
                    <?php _e('FluentSMTP requires to configure properly. Please configure FluentSMTP to make your email delivery works.', 'fluent-smtp'); ?>
                </p>
                <p>
                    <a href="<?php echo admin_url('options-general.php?page=fluent-mail#/'); ?>" class="button button-primary">
                        <?php _e('Configure FluentSMTP', 'fluent-smtp'); ?>
                    </a>
                </p>
            </div>
            <?php
        }

    }
}
