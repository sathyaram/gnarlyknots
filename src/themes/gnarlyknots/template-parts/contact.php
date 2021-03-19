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