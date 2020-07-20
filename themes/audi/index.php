<?php
/**
* The template for displaying archive pages.
*/
get_header();
?>

<main role="main" aria-label="Content" itemscope itemtype="http://schema.org/WebPageElement">
    <section>
        <?php the_content(); ?> 
    </section>
</main>

<?php get_footer(); ?>