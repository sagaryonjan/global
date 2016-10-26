<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package themespade
 * @subpackage Global
 * @since Global 1.0
 */
if (!class_exists('WP_Customize_Control'))
    return NULL;

/**
 * A class to create a radio button  for sidebar
 */
class Global_Image_Radio_Control extends WP_Customize_Control {

    public function render_content() {

        if ( empty( $this->choices ) )
            return;

        $name = '_customize-radio-' . $this->id;

        ?>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

        <ul class="controls" id = 'global-img-container'>

            <?php	foreach ( $this->choices as $value => $label ) :

                $class = ($this->value() == $value)?'global-radio-img-selected global-radio-img-img':'global-radio-img-img';

                ?>

                <li style="display: inline;">

                    <label>

                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />

                        <img src = '<?php echo esc_html( $label ); ?>' class = '<?php echo esc_attr( $class) ; ?>' />

                    </label>

                </li>

            <?php	endforeach;	?>

        </ul>

        <?php
    }
}


/**
 * A class to create a dropdown for all categories to news ticker
 */
class Global_Category_Dropdown_Custom_Control extends WP_Customize_Control {

    private $cats = false;

    public function __construct($manager, $id, $args = array(), $options = array()) {
        $this->cats = get_categories($options);

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */

    public function render_content() {

        if(!empty($this->cats)) {
            ?>

            <label>

                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

                <select <?php $this->link(); ?>>

                    <?php
                    foreach ( $this->cats as $cat ) {
                        printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);
                    }
                    ?>

                </select>

            </label>

            <?php
        }
    }
}

/**
 * A class to create a title for all fields to sperate
 */
class Global_Customize_Heading extends WP_Customize_Control {

    public function render_content() {
        if ( !empty( $this->label ) ) : ?>
            <style>
                .global-accordion-section-title{
                    color: #fff;
                    border-bottom: 1px solid #eee;
                    border-top: 1px solid #eee;
                    padding: 10px 10px 11px 14px;
                    line-height: 21px;
                    background-color: #999;
                    margin: 0 -12px 0;
                }
            </style>
            <h3 class="global-accordion-section-title"><?php echo esc_html( $this->label ); ?></h3>
        <?php endif;
    }
}

