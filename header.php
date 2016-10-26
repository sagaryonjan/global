<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Global
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
$notice_title 		   = get_theme_mod('global_notice_title');
$ts_top_nav_option     = get_theme_mod('global_top_nav_checkbox');
$ts_date_option 	   = get_theme_mod('global_date_checkbox');
$ts_social_link_option = get_theme_mod('global_social_link_checkbox');
$ts_search_option      = get_theme_mod('global_search_checkbox');
$ts_facebook           = get_theme_mod('global_facebook_link');
$ts_twitter 	   	   = get_theme_mod('global_twitter_link');
$ts_googleplus 	   	   = get_theme_mod('global_google_plus_link');
$ts_youtube 	  	   = get_theme_mod('global_youtube_link');
$ts_instagram 	 	   = get_theme_mod('global_instagram_link');
$ts_linkedin 		   = get_theme_mod('global_linkedin_link');
$ts_pinterest 	 	   = get_theme_mod('global_pinterest_link');
$ts_tumblr 	 		   = get_theme_mod('global_tumblr_link');

?>

<?php if($ts_top_nav_option == 1 ): ?>
<div id="page" class="site">
	<div class="ts-top-header">
		<div class="ts-container">
			<div class="ts-notice">
<?php
			if(!empty($notice_title)){
				echo "<div class='ts-notice-title'>$notice_title :</div>";
			}

			$themespade_query = new WP_Query(array(
					'post_type'             =>  'post',
					'posts_per_page'        =>  6,
					'ignore_sticky_posts'   =>  true,
					'post_status'           =>  'publish',
					'order'                 =>  'DESC',
			) );

			echo "<ul class='newsticker'>";
                while ($themespade_query->have_posts()) : $themespade_query->the_post(); ?>

					<li><a href='<?php the_permalink(); ?>'><?php the_title();?></a>

						<?php
							if ($ts_date_option == 1) { ?>
								<time> <?php the_date();?><!--26 July, 2016--></time>
						<?php
							}
				echo "</li>";
						endwhile;
                                            wp_reset_postdata();
			echo "</ul>";
?>
			</div>
			<?php if($ts_search_option == 1): ?>
			<div class="search-icon">
				<div class="search-click ts-search"><i class="fa fa-search"></i></div>
				<div class="search-box">
					<div class="close"><i class="fa fa-close"></i> </div>
					<form action="#" class="search-form" method="get" role="search">
						<label>
							<span class="screen-reader-text">Search for:</span>
							<input class="search-text" type="search" title="Search for:" name="s" value="" placeholder="Search...">
						</label>
						<input type="submit" value="Search" class="search-submit">
					</form>
				</div>
			</div>
			<?php endif; ?>

			<?php if($ts_social_link_option == 1): ?>
			<div class="ts-social">
					<ul class="ts-social-icon">
						<?php
						if(!empty($ts_facebook)){
							echo "<li><a href='$ts_facebook'><i class='fa fa-facebook'></i></a></li>";
						}
						if(!empty($ts_twitter)) {
							echo "<li><a href='$ts_twitter'><i class='fa fa-twitter'></i></a></li>";
						}
						if(!empty($ts_googleplus)) {
							echo "<li><a href='$ts_googleplus'><i class='fa fa-google-plus'></i></a></li>";
						}
						if(!empty($ts_youtube)) {
							echo "<li><a href='$ts_youtube'><i class='fa fa-youtube'></i></a></li>";
						}
						if(!empty($ts_instagram)) {
							echo "<li><a href='$ts_instagram'><i class='fa fa-instagram'></i></a></li>";
						}
						if(!empty($ts_linkedin)) {
							echo "<li><a href='$ts_linkedin'><i class='fa fa-linkedin'></i></a></li>";
						}
						if(!empty($ts_pinterest)) {
							echo "<li><a href='$ts_pinterest'><i class='fa fa-pinterest'></i></a></li>";
						}
						if(!empty($ts_tumblr)) {
							echo "<li><a href='$ts_tumblr'><i class='fa fa-tumblr'></i></a></li>";
						}
						?>
					</ul>
				</div>
			<?php endif; ?>
			</div>


		</div>
	</div>
<?php endif; ?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'global' ); ?></a>
		<?php  $sticky = get_theme_mod('global_sticky_menu'); ?>

	<header id="masthead" class="site-header <?php echo $sticky == 1?'ts-fixed':''; ?>" role="banner">
		<div class="ts-header ts-clearblock">
			<div class="ts-container">
				<div class="site-branding">
					<?php if ((get_theme_mod('global_header_logo_placement', 'header_text_only') == 'show_both'
							|| get_theme_mod('global_header_logo_placement', 'header_text_only') == 'header_logo_only') && has_custom_logo()) : ?>
						<div class="ts-logo">
							<?php global_the_custom_logo(); ?>
						</div>
						<div class="ts-site-title">
							<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
							<?php
							$description = get_bloginfo('description', 'display');
							if ($description || is_customize_preview()) : ?>
								<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
								<?php
							endif; ?>
						</div>


					<?php endif; ?>
					<div class="ts-site-title">
						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">Global Business</a></h1>
						<p class="site-description">Just another WordPress site</p>
					</div>
				</div>

				<nav id="ts-main-nav" class="ts-main-navigation">
					<div id="primary-menu" class="menu">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</div>
				</nav>
			</div>
		</div>
	</header>

	<div id="content" class="site-content">

