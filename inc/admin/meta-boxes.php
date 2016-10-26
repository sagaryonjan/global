<?php
/**
 * This function is responsible for rendering metaboxes in single post area
 *
 * @package themespade
 * @subpackage Global
 * @since Global 1.0
 */

add_action('add_meta_boxes', 'global_add_custom_box');
/**
 * Add Meta Boxes.
 */
function global_add_custom_box()
{
    // Adding layout meta box for Page
    add_meta_box('page-layout', esc_html__('Select Layout', 'global'), 'global_layout_call', 'page', 'side', 'default');

    // Adding layout meta box for Post
    add_meta_box('post-layout', esc_html__('Select Layout', 'global'), 'global_layout_call', 'post', 'side', 'default');
}

/****************************************************************************************/

global $global_page_specific_layout;

$global_page_specific_layout = array(

    'right-sidebar'               =>  array(
        'id'                      =>  'global_page_specific_layout',
        'value'                   =>  'right-sidebar',
        'label'                   =>  esc_html__('Right Sidebar', 'global')
    ),

    'left-sidebar'                =>  array(
        'id'                      =>  'global_page_specific_layout',
        'value'                   =>  'left-sidebar',
        'label'                   =>  esc_html__('Left Sidebar', 'global')
    ),

    'no-sidebar-content-centered' =>  array(
        'id'                      =>  'global_page_specific_layout',
        'value'                   =>  'no-sidebar-content-centered',
        'label'                   =>  esc_html__('No Sidebar Content Centered', 'global')
    ),

    'no-sidebar-full-width'       =>  array(
        'id'                      =>  'global_page_specific_layout',
        'value'                   =>  'no-sidebar-full-width',
        'label'                   =>  esc_html__('No Sidebar Full Width', 'global')
    )
);

/****************************************************************************************/

function global_layout_call()
{
    global $global_page_specific_layout;
    global_meta_form($global_page_specific_layout);
}

/**
 * Displays metabox to for select layout option
 */
function global_meta_form($global_metabox_field)
{
    global $post;

    // Use nonce for verification
    wp_nonce_field(basename(__FILE__), 'custom_meta_box_nonce');

    foreach ($global_metabox_field as $field) {

        $layout_meta = get_post_meta($post->ID, $field['id'], true);
        switch ($field['id']) {

            // Layout
            case 'global_page_specific_layout':

                if (empty($layout_meta)) {
                    $layout_meta = 'right-sidebar';
                } ?>

                <input class="post-format" type="radio" name="<?php echo esc_attr($field['id']); ?>" value="<?php echo esc_attr($field['value']); ?>" <?php checked($field['value'], $layout_meta); ?>/>

                <label class="post-format-icon"><?php echo esc_html($field['label']); ?></label><br/>

                <?php
                break;
        }
    }
}

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function global_save_custom_meta($post_id)
{
    global $global_page_specific_layout, $post;

    // Verify the nonce before proceeding.
    if (!isset($_POST['custom_meta_box_nonce']) || !wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
        return;

    // Stop WP from clearing custom fields on autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if ('page' == $_POST['post_type']) {

        if (!current_user_can('edit_page', $post_id))
            return $post_id;

    }
    elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($global_page_specific_layout as $field) {

        //Execute this saving function
        $old = get_post_meta($post_id, $field['id'], true);
        $new = sanitize_key($_POST[$field['id']]);

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        }
        elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }

    } // end foreach
}

add_action('save_post', 'global_save_custom_meta');