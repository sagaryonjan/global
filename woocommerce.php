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
 * @package Global
 */

get_header();
$sidebar_layout = get_post_meta($post->ID, 'global_page_specific_layout', true);
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

<?php if($sidebar_layout == 'left-sidebar'):

	?>
	<aside id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar('global_left_sidebar'); ?>
	</aside><!-- #secondary -->
	<?php
endif;
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php woocommerce_content(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if($sidebar_layout == 'right-sidebar'):
	get_sidebar();
endif;

echo " </div></div>";
get_footer();
