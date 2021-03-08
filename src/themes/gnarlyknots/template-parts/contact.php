<?php
/*
Template Name: Contact
*/
?>
<?php
if (isset($_POST['submitted'])) {
    if (trim($_POST['contactName']) === '') {
        $nameError = 'Please enter your name.';
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }

    if (trim($_POST['email']) === '') {
        $emailError = 'Please enter your email address.';
        $hasError = true;
    } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
        $emailError = 'You entered an invalid email address.';
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }

    if (trim($_POST['comments']) === '') {
        $commentError = 'Please enter a message.';
        $hasError = true;
    } else {
        if (function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }

    if (!isset($hasError)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '')) {
            $emailTo = get_option('admin_email');
        }
        $subject = '[PHP Snippets] From ' . $name;
        $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
        $headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;

        wp_mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }
} ?>
<div id="contact-container" class="contact-page">
    <div id="contact-content" class="container-smaller">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="contact-desc">
                        We run our shop on a first come, first served basis. However, if you have a large order, are planning an event, or need catering services, drop us a line and we'll hook you up. <br><br>
                        Please know we do not take same day orders and require at least one day's advanced notice. Leaving a message on our voicemail does not an order make.... please speak with a human for any pre-orders! <br><br> We can answer questions much faster and more efficiently with a phone call than a message or Facebook comment! <br><br>
                        We do not ship our products. Apologies.
                        <br><br>
                        Map: <a target="_blank" href="https://goo.gl/maps/CUEvSncSbXHm5Fdt6">27W570 High Lake Rd,Winfield, Illinois</a>
                        <br>
                        <div>Email: <a href="mailto:gnarlyknots@rocketmail.com">gnarlyknots@rocketmail.com</a></div>
                        Call: <a href="tel:6304730439">630-473-0439</a>
                    </div>
                    <hr>
                    <div class="entry-content">
                        <?php if (isset($emailSent) && $emailSent == true) { ?>
                            <div class="thanks">
                                <p>Thanks, your email was sent successfully.</p>
                            </div>
                        <?php } else { ?>
                            <?php the_content(); ?>
                            <?php if (isset($hasError) || isset($captchaError)) { ?>
                                <p class="error">Sorry, an error occured.
                                <p>
                                <?php } ?>

                                <form action="<?php the_permalink(); ?>" id="contactForm" method="post">
                                    <ul class="contactform">
                                        <li>
                                            <label for="contactName">Name:</label>
                                            <input type="text" name="contactName" id="contactName" value="<?php if (isset($_POST['contactName'])) echo $_POST['contactName']; ?>" class="required requiredField" />
                                            <?php if ($nameError != '') { ?>
                                                <span class="error"><?= $nameError; ?></span>
                                            <?php } ?>
                                        </li>

                                        <li>
                                            <label for="email">Email:</label>
                                            <input type="text" name="email" id="email" value="<?php if (isset($_POST['email']))  echo $_POST['email']; ?>" class="required requiredField email" />
                                            <?php if ($emailError != '') { ?>
                                                <span class="error"><?= $emailError; ?></span>
                                            <?php } ?>
                                        </li>

                                        <li><label for="commentsText">Message:</label>
                                            <textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField"><?php if (isset($_POST['comments'])) {
                                                                                                                                                if (function_exists('stripslashes')) {
                                                                                                                                                    echo stripslashes($_POST['comments']);
                                                                                                                                                } else {
                                                                                                                                                    echo $_POST['comments'];
                                                                                                                                                }
                                                                                                                                            } ?></textarea>
                                            <?php if ($commentError != '') { ?>
                                                <span class="error"><?= $commentError; ?></span>
                                            <?php } ?>
                                        </li>

                                        <li>
                                            <input class="gnarly-button" type="submit"></input>
                                        </li>
                                    </ul>
                                    <input type="hidden" name="submitted" id="submitted" value="true" />
                                </form>
                            <?php } ?>
                    </div><!-- .entry-content -->
                </div><!-- .post -->
        <?php endwhile;
        endif; ?>
        <hr>
        <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2970.99866499312!2d-88.16242338393432!3d41.87137517922277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e557a37dedb17%3A0xa296d117bbeb94ad!2sGnarly%20Knots%20Pretzel%20Company!5e0!3m2!1sen!2sus!4v1615151497498!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div><!-- #content -->
</div><!-- #container -->