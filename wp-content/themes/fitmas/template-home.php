<?php
/**
*Template Name: Template for Home Page
*/
get_header();
?>
<div class="fitmas-template-home">
      <?php
      while ( have_posts() ) : the_post();
            the_content();
      endwhile;
      ?>
</div>
<?php get_footer();