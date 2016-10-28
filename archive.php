<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Global
 */

get_header();
$default_sidebar_layout = get_theme_mod('global_default_sidebar_setting', 'right-sidebar');

$global_et_to = get_theme_mod('global_breadcrumbs_activate', 1);
if($global_et_to == 1){
	?>
	<div class="ts-breadcrumbs">
		<div class="ts-container">
			<div class="ts-breadcrumbs-block ts-clearblock">
				<div class="ts-default-title"><?php the_title(); ?></div>

				<div class="ts-menu-breadcrumbs">
					<?php global_breadcrumbs(); ?>
				</div>
			</div>
		</div>
	</div>
<?php }?>

	<div id="content" class="site-content">
	<div class="ts-container">
	<?php
	if ($default_sidebar_layout == 'left-sidebar'):
		?>
		<aside id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar('global_left_sidebar'); ?>
		</aside><!-- #secondary -->
		<?php
	endif;
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php

					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ($default_sidebar_layout == 'right-sidebar'):
	get_sidebar();
endif;

echo " </div></div>";
get_footer();
