<?php

//global front banner function
if (!function_exists('global_banner_slider')) :
    function global_banner_slider()
    {
        $ts_banner = get_theme_mod('global_banner_checkbox');
        $ts_banner_button = get_theme_mod('global_read_more_button');
        if ($ts_banner == 1) { ?>
            <div class="ts-banner-slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php for ($i = 1; $i < 4; $i++) {
                            $data = [];
                            $data['slide' . $i] = get_theme_mod('global_slide' . $i);
                            if (!empty($data['slide' . $i])) {

                                $ts_slider_page = new WP_Query(array(
                                    'posts_per_page' => 5,
                                    'post_type' => array('page'),
                                    'page_id' => $data['slide' . $i]
                                )); ?>

                                <?php if ($ts_slider_page->have_posts()) :
                                    while ($ts_slider_page->have_posts()) : $ts_slider_page->the_post(); ?>

                                        <div class="swiper-slide"
                                             style="background-image:url(<?php the_post_thumbnail_url('full'); ?>); background-position: center; background-size: cover; background-repeat: no-repeat;">
                                            <div class="ts-container">
                                                <div class="ts-caption-block">
                                                    <h2><?php the_title(); ?></h2>

                                                    <?php the_excerpt(); ?>
                                                    <a class="ts-btn"
                                                       href="<?php the_permalink() ?>"><?php echo $ts_banner_button; ?></a>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endwhile;
                                    wp_reset_postdata();
                                endif; ?>

                                <?php
                            }
                        }
                        ?>

                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                    <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                </div>
            </div>
            <?php
        }
    }
endif;

//global featured page function
if (!function_exists('global_featured_page_slider')) :
    function global_featured_page_slider()
    {
        $ts_featured_page_option = get_theme_mod('global_featured_page_checkbox');
        $ts_featured_page_id = get_theme_mod('global_feature_page');

        if (!empty($ts_featured_page_id) && $ts_featured_page_option == 1) {

            $ts_feature_page = new WP_Query(array(
                'posts_per_page' => 5,
                'post_type' => array('page'),
                'page_id' => $ts_featured_page_id
            ));

            echo '<div class="ts-page">';
            ?>

            <?php if ($ts_feature_page->have_posts()) :
                while ($ts_feature_page->have_posts()) : $ts_feature_page->the_post(); ?>

                    <div class="ts-container">
                        <div class="ts-page-block">
                            <div class="ts-page-desc ts-left ts-section">
                                <h4><?php the_title(); ?></h4>

                                <?php the_excerpt(); ?>
                                <a class="ts-btn" href="<?php the_permalink() ?>">Read More</a>
                            </div>
                            <?php if (has_post_thumbnail()) : ?>
                                <figure class="ts-page-img ts-right">
                                    <?php the_post_thumbnail('large'); ?>
                                </figure>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif;

            echo '</div>';
        }
    }
endif;

//global featured page function
if (!function_exists('global_service_page')) :
    function global_service_page()
    {
        $ts_service_page_option = get_theme_mod('global_service_checkbox');
        $ts_service_page_title_option = get_theme_mod('global_service_page_title');
        $ts_service_page_button_option = get_theme_mod('global_service_page_button');
        if ($ts_service_page_option == 1) {

            ?>
            <div class="ts-services ts-section">
                <div class="ts-container">
                    <div class="ts-title">
                        <h4><?php echo $ts_service_page_title_option; ?></h4>
                    </div>
                    <div id="ts-services-block" class="ts-services-block">
                        <div class="ts-services-single ts-left">
                            <?php for ($i = 1; $i <= 6; $i++) {
                                $ts_data = [];
                                $ts_data['page_service_icon' . $i] = get_theme_mod('global_service_page' . $i);
                                $ts_data['service_icon' . $i] = get_theme_mod('global_service_icon' . $i);
                                if(!empty($ts_data['page_service_icon' . $i])):
                                    $ts_service_page_icon = new WP_Query(array(
                                        'post_type' => array('page'),
                                        'page_id' => $ts_data['page_service_icon' . $i]
                                    ));

                                ?>
                                        <?php if ($ts_service_page_icon->have_posts()) :
                                            while ($ts_service_page_icon->have_posts()) : $ts_service_page_icon->the_post(); ?>
                                                <div class="ts-services-icon <?php echo $i == 1 ? 'is-active' : ''; ?>">
                                                    <i class="<?php echo $ts_data['service_icon' . $i]; ?>"></i>
                                                    <h5><?php the_title(); ?></h5>
                                                </div>
                                            <?php endwhile;
                                            wp_reset_postdata();
                                        endif;
                                endif;
                            } ?>
                        </div>
                        <?php for ($i = 1; $i <= 6; $i++) {
                            $data = [];
                            $data['page_service' . $i] = get_theme_mod('global_service_page' . $i);
                            if (!empty($data['page_service' . $i])) {
                                $ts_service_page = new WP_Query(array(
                                    'post_type' => array('page'),
                                    'page_id' => $data['page_service' . $i]
                                ));
                                ?>
                                <?php if ($ts_service_page->have_posts()) :
                                    while ($ts_service_page->have_posts()) : $ts_service_page->the_post(); ?>
                                        <div
                                            class="ts-services-desc  ts-right <?php echo $i == 1 ? 'is-active' : ''; ?>">
                                            <h6><?php the_title(); ?></h6>
                                            <?php the_excerpt(); ?>
                                            <a class="ts-btn" href="<?php the_permalink() ?>"><?php echo $ts_service_page_button_option; ?></a>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_postdata();
                                endif; ?>
                                <?php
                            }
                        } ?>
                    </div>

                </div>
            </div>
            <?php
        }
    }
endif;

//global call to action function
if (!function_exists('global_call_to_action')) :
    function global_call_to_action()
    {
        $ts_call_to_page_id = get_theme_mod('global_call_to_page');
        $ts_call_to_page_option = get_theme_mod('global_call_to_action_checkbox');

        if (!empty($ts_call_to_page_id) && $ts_call_to_page_option == 1) {

            $ts_call_to_page = new WP_Query(array(
                'posts_per_page' => 5,
                'post_type' => array('page'),
                'page_id' => $ts_call_to_page_id
            )); ?>

            <?php if ($ts_call_to_page->have_posts()) :
                while ($ts_call_to_page->have_posts()) : $ts_call_to_page->the_post(); ?>
                    <div class="ts-call-to-action">
                        <div data-stellar-background-ratio="0.5" class="ts-cta"
                             style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);  background-size:cover;background-repeat: no-repeat;">
                            <div class="ts-container">
                                <div class="ts-cta-block ts-section">
                                    <p><?php the_excerpt(); ?></p>
                                    <a class="ts-btn" href="<?php the_permalink(); ?>">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif;
        }


    }
endif;

//global counter function
if (!function_exists('global_counter')) :
    function global_counter()
    {
        $ts_counter_option = get_theme_mod('global_counter_checkbox');
        if ($ts_counter_option == 1):

            $ts_background_image = get_theme_mod('global_background_image');
            $ts_data = [];
            for ($i = 1; $i <= 5; $i++) {
                $ts_data['title' . $i] = get_theme_mod('global_counter' . $i . '_title');
                $ts_data['value' . $i] = get_theme_mod('global_counter_value' . $i . '_title');
                $ts_data['icon' . $i] = get_theme_mod('global_counter_icon' . $i);
            } ?>
            <div class="ts-counters">
                <div data-stellar-background-ratio="0.5" class="ts-cta"
                     style="background-image: url(<?php echo $ts_background_image; ?>);  background-size:cover;background-repeat: no-repeat;">
                    <div class="ts-container">
                        <div class="ts-counter ts-section ts-clearblock">
                            <?php for ($i = 1; $i <= 5; $i++) { ?>
                                <div class="ts-counter-single">
                                    <i class="<?php echo $ts_data['icon' . $i]; ?>"></i>
                                    <span class="counter"><?php echo $ts_data['value' . $i]; ?></span>
                                    <span><?php echo $ts_data['title' . $i]; ?></span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        endif;
    }
endif;


//global team function
if (!function_exists('global_team_member')) :
    function global_team_member()
    {
        $ts_team_option = get_theme_mod('global_team_checkbox');
        if ($ts_team_option == 1):
            $ts_team_title = get_theme_mod('global_team_title');
            ?>
            <div class="ts-teams ts-section">
                <div class="ts-container">
                    <div class="ts-title">
                        <h4><?php echo $ts_team_title; ?></h4>
                    </div>
                    <div class="ts-team-block">
                        <div class="ts-team-slider">
                            <div class="swiper-wrapper">
                                <?php
                                $ts_data = [];
                                for ($i = 1; $i <= 6; $i++) {

                                    $ts_data['team_page' . $i] = get_theme_mod('global_page_team_member' . $i);
                                    $ts_data['team_designation' . $i] = get_theme_mod('global_team_designation' . $i);
                                    $ts_data['team_fb' . $i] = get_theme_mod('global_team_facebook' . $i);
                                    $ts_data['team_twitter' . $i] = get_theme_mod('global_team_twitter' . $i);
                                    $ts_data['team_google_plus' . $i] = get_theme_mod('global_team_google_plus' . $i);

                                    $ts_team__member_page = new WP_Query(array(
                                        'posts_per_page' => 5,
                                        'post_type' => array('page'),
                                        'page_id' => $ts_data['team_page' . $i]
                                    ));

                                    if ($ts_team__member_page->have_posts()) :
                                        while ($ts_team__member_page->have_posts()) : $ts_team__member_page->the_post();

                                            ?>
                                            <div class="swiper-slide">
                                                <div class="ts-team-single">
                                                    <div class="ts-team-img">
                                                        <figure>
                                                            <?php the_post_thumbnail(); ?>
                                                        </figure>
                                                    </div>
                                                    <?php
                                                    $ts_fb = $ts_data['team_fb' . $i];
                                                    $ts_twitter = $ts_data['team_twitter' . $i];
                                                    $ts_gp = $ts_data['team_google_plus' . $i];
                                                    $ts_team_designation = $ts_data['team_designation' . $i];

                                                    if (!empty($ts_fb) || !empty($ts_twitter) || !empty($ts_gp)):
                                                        echo "<ul class='ts-team-social'>";

                                                        if (!empty($ts_fb))
                                                            echo "<li><a href='$ts_fb'><i class='fa fa-facebook'></i></a></li>";

                                                        if (!empty($ts_twitter))
                                                            echo "<li><a href='$ts_twitter'><i class='fa fa-twitter'></i></a></li>";

                                                        if (!empty($ts_gp))
                                                            echo "<li><a href='$ts_gp'><i class='fa fa-google-plus'></i></a></li>";

                                                        echo "</ul>";
                                                    endif;
                                                    ?>
                                                    <h6> <?php the_title(); ?></h6>
                                                    <?php
                                                    if ($ts_team_designation)
                                                        echo "<span>$ts_team_designation</span>";
                                                    ?>


                                                </div>
                                            </div>
                                            <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    endif;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endif;
    }
endif;

//global portfolio function
if (!function_exists('global_portfolio')) :
    function global_portfolio()
    {
        $ts_portfolio_option = get_theme_mod('global_portfolio_checkbox');
        if ($ts_portfolio_option == 1):
            $ts_portfolio_title = get_theme_mod('global_portfolio_title');
            $ts_cat = get_theme_mod('global_portfolio_category');
            $ts_no_of_post = get_theme_mod('global_portfolio_no_of_posts');
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => $ts_no_of_post,
                'order' => 'DESC',
                'cat' => $ts_cat,
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) {
                ?>
                <div class="ts-portfolio ts-section">
                    <div class="ts-container">
                        <div class="ts-title">
                            <h4><?php echo $ts_portfolio_title; ?></h4>
                        </div>

                        <div class="ts-grid">
                            <div class="ts-grid-sizer"></div>
                            <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                                <div class="ts-item ts-grid-item">

                                    <?php if (has_post_thumbnail()) : ?>
                                        <figure class="ts-portfolio-img">
                                            <?php
                                            the_post_thumbnail('large');
                                            ?>
                                        </figure>
                                    <?php endif; ?>

                                    <ul class="ts-dtl-icon">
                                        <li><i class="fa fa-search"></i></li>
                                        <li><i class="fa fa-link"></i></li>
                                    </ul>
                                    <div class="ts-portfolio-hover">
                                        <h6><?php the_title(); ?></h6>

                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            <?php }
        endif;
    }
endif;

//global testimonial function
if (!function_exists('global_testimonial')) :
    function global_testimonial()
    {
        $ts_testimonial_option = get_theme_mod('global_testimonial_checkbox');
        if ($ts_testimonial_option == 1):
            $ts_testimonial_title = get_theme_mod('global_testimonial_title');
                ?>
                <div data-stellar-background-ratio="0.5" class="ts-testimonial-ps-skills ts-section" style="background-image: url(images/resview-img.png);  background-size:cover;background-repeat: no-repeat;">
                    <div class="ts-container">
                        <div class="ts-testimonials">
                            <?php if(!empty($ts_testimonial_title)): ?>
                            <div class="ts-title ts-title-white">
                                <h4><?php echo $ts_testimonial_title; ?></h4>
                            </div>
                            <?php endif; ?>

                            <div class="ts-testimonials-block">
                                <div class="ts-testimonials-slider">
                                    <div class="swiper-wrapper">
                                        <?php
                              for ($i = 1; $i <= 6; $i++) {
                                      $ts_data['team_page' . $i] = get_theme_mod('global_page_testimonial' . $i);
                                          if(!empty($ts_data['team_page' . $i])):
                                                $ts_team__member_page = new WP_Query(array(
                                                    'post_type' => array('page'),
                                                    'page_id' => $ts_data['team_page' . $i]
                                                ));
                                                ?>
                                              <?php if ($ts_team__member_page->have_posts()) :
                                              while ($ts_team__member_page->have_posts()) : $ts_team__member_page->the_post(); ?>
                                                <div class="swiper-slide">
                                                    <div class="ts-testimonials-single">
                                                        <p><?php the_excerpt(); ?></p>
                                                        <h6><?php the_title(); ?></h6>
                                                    </div>
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <figure class="ts-testimonials-img">
                                                            <?php
                                                            the_post_thumbnail('large');
                                                            ?>
                                                        </figure>
                                                    <?php endif; ?>
                                                </div>
                                              <?php endwhile;
                                              wp_reset_postdata();
                                          endif;
                                      endif;
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        endif;
    }
endif;

//global blog function
if (!function_exists('global_blog')) :
    function global_blog()
    {
        $ts_blog_option = get_theme_mod('global_blog_checkbox');
        if ($ts_blog_option == 1):
            $ts_blog_title = get_theme_mod('global_blog_title');
            $ts_cat = get_theme_mod('global_blog_category');
            $ts_no_of_post = get_theme_mod('global_blog_no_of_posts', 3);

            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => $ts_no_of_post,
                'order' => 'DESC',
                'cat' => $ts_cat,
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) {
                ?>
                <div class="ts-blogs ts-section">
                    <div class="ts-container">
                        <div class="ts-title">
                            <h4><?php echo $ts_blog_title; ?></h4>
                        </div>

                        <div class="ts-blog-block ts-clearblock">
                            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                <div class="ts-blog-single">

                                    <?php if (has_post_thumbnail()) : ?>
                                        <figure class="ts-blog-img">
                                            <?php
                                            the_post_thumbnail('large');
                                            ?>
                                        </figure>
                                    <?php endif; ?>

                                    <span><a href="#"><i
                                                class="fa fa-comments-o"></i><?php comments_popup_link(' No Comment', '1', '%'); ?>
                                        </a></span>

                                    <div class="ts-blog-desc">
                                        <h6><a href="<?php the_permalink(); ?>"
                                               title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>

                                        <p><?php the_excerpt(); ?></p>
                                        <a class="ts-btn" href="<?php the_permalink() ?>">Read More</a>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            <?php }
        endif;
    }
endif;