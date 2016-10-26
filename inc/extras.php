<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Global
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function global_body_classes($classes)
{
	// Adds a class of group-blog to blogs with more than 1 published author.
	if (is_multi_author()) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Add class site layout style.
	if ( get_theme_mod ( 'global_site_layout', 'wide' ) == 'wide' ) {
		$classes[] = 'wide';
	} else {
		$classes[] = 'box';
	}

	return $classes;
}

add_filter('body_class', 'global_body_classes');


function global_page_post_layout($global_classes)
{

	global $post;

	$global_default_sidebar_layout = get_theme_mod('global_default_sidebar_setting', 'right-sidebar');

	if (is_home() || is_page_template('template_global_home.php') || is_front_page()) {

		$global_classes[] = '';

	}
	elseif (is_singular()) {

		$global_post_class = get_post_meta($post->ID, 'global_page_specific_layout', true);

		if (empty($global_post_class)) {

			$global_post_class = 'right-sidebar';
			$global_classes[] = $global_post_class;

		} else {

			$global_post_class = get_post_meta($post->ID, 'global_page_specific_layout', true);
			$global_classes[] = $global_post_class;

		}

	}
	elseif (is_archive()) {

		if (empty($global_default_sidebar_layout)) {

			$global_classes[] = 'right-sidebar';

		} else {

			$global_classes[] = $global_default_sidebar_layout;

		}
	}
	elseif (is_search()) {

		if (empty($global_default_sidebar_layout)) {

			$global_classes[] = 'right-sidebar';

		} else {

			$global_classes[] = $global_default_sidebar_layout;

		}
	}
	elseif (is_404()) {

		$global_classes[] = '';

	}
	else {

		$global_classes[] = 'right-sidebar';

	}

	return $global_classes;
}

add_filter('body_class', 'global_page_post_layout');

