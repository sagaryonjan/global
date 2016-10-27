<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Global
 */

get_header();

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

                <main id="main" class="site-main" role="main">
                    <section class="error-404 not-found">
                        <header class="page-header">
                            <h1 class="page-title"><?php esc_html_e('Page Not Found', 'global'); ?></h1>
                        </header><!-- .page-header -->

                        <div class="page-content">
                            <p><?php esc_html_e('It looks like you may have a wrong turn. Don\'t worry... it happens to the best of us.', 'global'); ?></p>

                            <?php get_search_form(); ?>

                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->
                </main><!-- #main -->

        </div>
    </div>

<?php

get_footer();
