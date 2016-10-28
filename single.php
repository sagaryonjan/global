<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Global
 */

get_header();

$sidebar_layout = get_post_meta($post->ID, 'global_page_specific_layout', true);

$global_et_to = get_theme_mod('global_breadcrumbs_activate', 1);

if ($global_et_to == 1) {
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
<?php } ?>

    <div id="content" class="site-content">
    <div class="ts-container">

<?php if ($sidebar_layout == 'left-sidebar'):
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
            while (have_posts()) : the_post();

                get_template_part('template-parts/content', get_post_format());

                the_post_navigation();

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
            endwhile; // End of the loop.
            ?>
            <!-- .entry-footer -->
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
if ($sidebar_layout == 'right-sidebar'):
    get_sidebar();
endif;
echo " </div></div>";
get_footer();