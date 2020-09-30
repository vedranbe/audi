<?php
/**
 * The template for displaying all pages.
 */

get_header(); 
the_post(); 
?>
<main role="main" aria-label="Content" itemscope itemtype="http://schema.org/WebPageElement">
    <!-- section -->
    <section>
		<div id="page-content" class="page-content">
			<?php get_template_part('template-parts/content', 'page'); ?>
		</div>
	</section>
    <!-- /section -->
</main>
<?php get_footer(); ?>
