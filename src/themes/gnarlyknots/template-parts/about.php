<?php
/*
Template Name: About
*/
?>

<div class="about-page">
  <div class="container-smaller">
    <h1>About</h1>
    <div class="about-desc">
      <?php the_field('about_description') ?>
      <hr>
      <div class="about-info">

        <br>
        <div class="contact-hours">Hours:
          <span>M-F - <?php the_field('mon_thru_fri') ?></span>
          <span>Sat - <?php the_field('saturday') ?></span>
          <span>Sun - <?php the_field('sunday') ?></span>
        </div>
        Map: <a target="_blank" rel="noopener noreferrer" href="https://goo.gl/maps/CUEvSncSbXHm5Fdt6"><?php the_field('location')?></a>
        <div>Email: <a href="mailto:<?php the_field('email')?>"><?php the_field('email')?></a></div>
        Call: <a href="tel:<?php the_field('telephone')?>"><?php the_field('telephone')?></a></a> 						
      </div>
      <hr>
      <div class="le-rules">
      <h2>COVID RULES. PLEASE ABIDE.</h2>
      <ol type="1">
        <?php
          $counter = 1;
          $rules = carbon_get_the_post_meta( 'crb_rules' );
          foreach ( $rules as $rule ) {
              echo ( '<li>'. $counter . '. ' . $rule['rule'] . '</li>');
              $counter++;
          }
        ?>
      </ol>
      </div>
      <hr>
      <h2>Frequently Asked Questions</h2>
      <?php
        $questions = carbon_get_the_post_meta( 'crb_faq' );
        foreach ( $questions as $question ) {
            echo '<div class = "question">';
            echo ( $question['question'] );
            echo '</div>';
            echo '<div class = "answer">';
            echo ( $question['answer'] );
            echo '</div>';
        }
      ?>
    </div>
  </div>
</div>