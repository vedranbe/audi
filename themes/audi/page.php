<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package DecomTheme
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