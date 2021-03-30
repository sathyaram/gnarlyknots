<?php
/*
Template Name: Contact
*/
?>
<div id="contact-container" class="contact-page">
    <div id="contact-content" class="container-smaller">
        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <div class="contact-desc">
                <?php the_field('contact_description') ?>
                <br><br>
                Map: <a target="_blank" href="https://goo.gl/maps/CUEvSncSbXHm5Fdt6"><?php the_field('location')?></a>
                <br>
                <div>Email: <a href="mailto:<?php the_field('email')?>"><?php the_field('email')?></a></div>
                Call: <a href="tel:<?php the_field('telephone')?>"><?php the_field('telephone')?></a>
            </div>
            <hr>
            <div class="entry-content">
                <form action="https://formsubmit.co/gnarlyknots@rocketmail.com" id="contactForm" method="post">
                    <ul class="contactform">
                        <li>
                            <label for="contactName">Name:</label>
                            <input type="text" name="contactName" id="contactName" class="required requiredField"/>
                        </li>
                        <li>
                            <input type="text" name="_honey" style="display:none"/>
                        </li>
                        <li>
                            <input type="hidden" name="_captcha" value="false"/>
                        </li>
                        <li>
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" class="required requiredField email"/>
                        </li>
                        <li>
                            <label for="subject">Subject:</label>
                            <input type="text" name="subject" id="subject" class="required requiredField subject"/>
                        </li>
                        <li><label for="commentsText">Message:</label>
                            <textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField"></textarea>
                        </li>
                        <li>
                            <input class="gnarly-button" type="submit"></input>
                        </li>
                    </ul>
                    <input type="hidden" name="submitted" id="submitted" value="true" />
                </form>
            </div><!-- .entry-content -->
        </div><!-- .post -->
        <hr>
        <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2970.99866499312!2d-88.16242338393432!3d41.87137517922277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e557a37dedb17%3A0xa296d117bbeb94ad!2sGnarly%20Knots%20Pretzel%20Company!5e0!3m2!1sen!2sus!4v1615151497498!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div><!-- #content -->
</div><!-- #container -->