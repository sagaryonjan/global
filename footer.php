<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Global
 */

$background_color = get_theme_mod('global_footer_background_color');
?>

	</div><!-- #content -->

		<footer class="ts-footer" style="background-color:<?php echo $background_color ?>; ">
			<div class="ts-container">
				<?php if (is_active_sidebar('global_footer1_area') || is_active_sidebar('global_footer2_area') || is_active_sidebar('global_footer3_area') || is_active_sidebar('global_footer4_area')) : ?>
					<div class="ts-footer-block ts-clearblock ts-footer-column-<?php echo global_footer_count(); ?>">
						<?php  if (is_active_sidebar('global_footer1_area')) { ?>
							<div class="ts-footer-single">
								<?php
								if (!dynamic_sidebar('global_footer1_area')):
								endif;
								?>
							</div>
						<?php } ?>

						<?php if (is_active_sidebar('global_footer2_area')) { ?>
							<div class="ts-footer-single">
								<?php
								if (!dynamic_sidebar('global_footer2_area')):
								endif;
								?>

							</div>
						<?php } ?>

						<?php if (is_active_sidebar('global_footer3_area')) { ?>
							<div class="ts-footer-single">
								<?php
								if (!dynamic_sidebar('global_footer3_area')):
								endif;
								?>
							</div>
						<?php } ?>
						<?php if (is_active_sidebar('global_footer4_area')) { ?>
							<div class="ts-footer-single">
								<?php
								if (!dynamic_sidebar('global_footer4_area')):
								endif;
								?>
							</div>
						<?php } ?>
					</div>
				<?php endif; ?>

			</div>

	 <?php //global_footer_copyright_info(); ?>

		</footer>

		<div class="ts-scroll-top">
			<span class="ts-scroll-top-inner"><i class="fa fa-long-arrow-up"></i></span>
		</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
