<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<main id="main-content">


<?php get_template_part('partials/latest-posts'); ?>

<?php get_template_part('partials/learn-more-section'); ?>
<?php get_template_part('partials/categories-section'); ?>   

</main>

<?php get_footer(); ?>
