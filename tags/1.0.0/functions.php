<?php

/**
 * zerif functions and definitions
 *
 * @package zerif
 */


/**
 * Set the content width based on the theme's design and stylesheet.

 */


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.

 */

function zerif_setup()
{
    global $content_width;
    if (!isset($content_width)) {

        $content_width = 640;

    }

    /*

     * Make theme available for translation.

     * Translations can be filed in the /languages/ directory.

     * If you're building a theme based on zerif, use a find and replace

     * to change 'zerif' to the name of your theme in all the template files

     */

    load_theme_textdomain('zerif', get_template_directory() . '/languages');


    // Add default posts and comments RSS feed links to head.

    add_theme_support('automatic-feed-links');


    /*

     * Enable support for Post Thumbnails on posts and pages.

     *

     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails

     */

    add_theme_support('post-thumbnails');


    /* Set the image size by cropping the image */

    add_image_size('post-thumbnail', 250, 250, true);


    // This theme uses wp_nav_menu() in one location.

    register_nav_menus(array(

        'primary' => __('Primary Menu', 'zerif'),

    ));


    // Enable support for Post Formats.

    add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));


    // Setup the WordPress core custom background feature.

    add_theme_support('custom-background', apply_filters('zerif_custom_background_args', array(

        'default-color' => 'ffffff',

        'default-image' => get_stylesheet_directory_uri() . "/images/bg.jpg",

    )));


    // Enable support for HTML5 markup.

    add_theme_support('html5', array(

        'comment-list',

        'search-form',

        'comment-form',

        'gallery',

    ));


    if (function_exists('add_image_size')):

        add_image_size('zerif_project_photo', 285, 214, true);

        add_image_size('zerif_our_team_photo', 174, 174, true);

    endif;

}


add_action('after_setup_theme', 'zerif_setup');


/**
 * Register widgetized area and update sidebar with default widgets.

 */

function zerif_widgets_init()
{

    register_sidebar(array(

        'name' => __('Sidebar', 'zerif'),

        'id' => 'sidebar-1',

        'before_widget' => '<aside id="%1$s" class="widget %2$s">',

        'after_widget' => '</aside>',

        'before_title' => '<h1 class="widget-title">',

        'after_title' => '</h1>',

    ));

    register_sidebar(array(

        'name' => __('Our focus section', 'zerif'),

        'id' => 'sidebar-ourfocus',

        'before_widget' => '<aside id="%1$s" class="widget %2$s">',

        'after_widget' => '</aside>',

        'before_title' => '<h1 class="widget-title">',

        'after_title' => '</h1>',

    ));

    register_sidebar(array(

        'name' => __('Testimonials section', 'zerif'),

        'id' => 'sidebar-testimonials',

        'before_widget' => '<aside id="%1$s" class="widget %2$s">',

        'after_widget' => '</aside>',

        'before_title' => '<h1 class="widget-title">',

        'after_title' => '</h1>',

    ));

    register_sidebar(array(

        'name' => __('About us section', 'zerif'),

        'id' => 'sidebar-aboutus',

        'before_widget' => '',

        'after_widget' => '',

        'before_title' => '<h1 class="widget-title">',

        'after_title' => '</h1>',

    ));

    register_sidebar(array(

        'name' => __('Our team section', 'zerif'),

        'id' => 'sidebar-ourteam',

        'before_widget' => '',

        'after_widget' => '',

        'before_title' => '<h1 class="widget-title">',

        'after_title' => '</h1>',

    ));

}

add_action('widgets_init', 'zerif_widgets_init');


/**
 * Enqueue scripts and styles.

 */

function zerif_scripts()
{


    wp_register_style('zerif_font', 'http://fonts.googleapis.com/css?family=Lato:300,400,700,400italic|Montserrat:700|Homemade+Apple');

    wp_enqueue_style('zerif_font');


    wp_register_style('zerif_bootstrap_style', get_template_directory_uri() . '/css/bootstrap.min.css');

    wp_enqueue_style('zerif_bootstrap_style');


    wp_register_style('zerif_owl_theme_style', get_template_directory_uri() . '/css/owl.theme.css', array('zerif_bootstrap_style'), 'v1');

    wp_enqueue_style('zerif_owl_theme_style');


    wp_register_style('zerif_owl_carousel_style', get_template_directory_uri() . '/css/owl.carousel.css', array('zerif_owl_theme_style'), 'v1');

    wp_enqueue_style('zerif_owl_carousel_style');


    wp_register_style('zerif_vegas_style', get_template_directory_uri() . '/css/jquery.vegas.min.css', array('zerif_owl_carousel_style'), 'v1');

    wp_enqueue_style('zerif_vegas_style');


    wp_register_style('zerif_icon_fonts_style', get_template_directory_uri() . '/assets/icon-fonts/styles.css', array('zerif_vegas_style'), 'v1');

    wp_enqueue_style('zerif_icon_fonts_style');


    wp_register_style('zerif_pixeden_style', get_template_directory_uri() . '/css/pixeden-icons.css', array('zerif_icon_fonts_style'), 'v1');

    wp_enqueue_style('zerif_pixeden_style');


    wp_enqueue_style('zerif_style', get_stylesheet_uri(), array('zerif_pixeden_style'), 'v1');


    wp_register_style('zerif_responsive_style', get_template_directory_uri() . '/css/responsive.css', array('zerif_style'), 'v1');

    wp_enqueue_style('zerif_responsive_style');


    //wp_enqueue_style( 'justifyblog-bootstrap-responsive', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array(), 'v3.1.1' );


    wp_enqueue_script('jquery');


    /* Bootstrap script */

    wp_register_script('zerif_bootstrap_script', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20120206', true);

    wp_enqueue_script('zerif_bootstrap_script');


    /* ScrollTo script */

    wp_register_script('zerif_scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.min.js', array("jquery"), '20120206', true);

    wp_enqueue_script('zerif_scrollTo');


    /* jQuery.nav script */

    wp_register_script('zerif_jquery_nav', get_template_directory_uri() . '/js/jquery.nav.js', array("jquery"), '20120206', true);

    wp_enqueue_script('zerif_jquery_nav');


    /* Knob script */

    wp_register_script('zerif_knob_nav', get_template_directory_uri() . '/js/jquery.knob.js', array("jquery"), '20120206', true);

    wp_enqueue_script('zerif_knob_nav');


    /* Owl carousel script */

    wp_register_script('zerif_owl_carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array("jquery"), '20120206', true);

    wp_enqueue_script('zerif_owl_carousel');


    /* Smootscroll script */

    wp_register_script('zerif_smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array("jquery"), '20120206', true);

    wp_enqueue_script('zerif_smoothscroll');


    /* Vegas script */

    wp_register_script('zerif_vegas_script', get_template_directory_uri() . '/js/jquery.vegas.min.js', array("jquery"), '20120206', true);

    wp_enqueue_script('zerif_vegas_script');


    /* scrollReveal script */

    wp_register_script('zerif_scrollReveal_script', get_template_directory_uri() . '/js/scrollReveal.js', array("jquery"), '20120206', true);

    wp_enqueue_script('zerif_scrollReveal_script');


    /* zerif script */

    wp_register_script('zerif_script', get_template_directory_uri() . '/js/zerif.js', array("jquery", "zerif_knob_nav"), '20120206', true);

    wp_enqueue_script('zerif_script');


    wp_enqueue_script('justifyblog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);


    wp_enqueue_script('justifyblog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);


    wp_enqueue_script('zerif-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);


    if (is_singular() && comments_open() && get_option('thread_comments')) {

        wp_enqueue_script('comment-reply');

    }

}

add_action('wp_enqueue_scripts', 'zerif_scripts');


/**
 * Implement the Custom Header feature.

 */

//require get_template_directory() . '/inc/custom-header.php';


/**
 * Custom template tags for this theme.

 */

require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.

 */

require get_template_directory() . '/inc/extras.php';


/**
 * Customizer additions.

 */

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/category-dropdown-custom-control.php';


/* tgm-plugin-activation */


require_once get_template_directory() . '/class-tgm-plugin-activation.php';


add_action('tgmpa_register', 'zerif_register_required_plugins');


function zerif_register_required_plugins()
{


    $plugins = array(


        array(

            'name' => 'Widget customizer',

            'slug' => 'widget-customizer',

            'source' => get_template_directory() . '/plugins/widget-customizer.zip',

            'required' => true,

            'force_activation' => true,

            'force_deactivation' => true,

        )

    );


    $theme_text_domain = 'zerif';


    $config = array(

        'default_path' => '',

        'menu' => 'tgmpa-install-plugins',

        'has_notices' => true,

        'dismissable' => true,

        'dismiss_msg' => '',

        'is_automatic' => false,

        'message' => '',

        'strings' => array(

            'page_title' => __('Install Required Plugins', $theme_text_domain),

            'menu_title' => __('Install Plugins', $theme_text_domain),

            'installing' => __('Installing Plugin: %s', $theme_text_domain),

            'oops' => __('Something went wrong with the plugin API.', $theme_text_domain),

            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.'),

            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.'),

            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.'),

            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.'),

            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.'),

            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.'),

            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.'),

            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.'),

            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins'),

            'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins'),

            'return' => __('Return to Required Plugins Installer', $theme_text_domain),

            'plugin_activated' => __('Plugin activated successfully.', $theme_text_domain),

            'complete' => __('All plugins installed and activated successfully. %s', $theme_text_domain),

            'nag_type' => 'updated'

        )

    );


    tgmpa($plugins, $config);


}


/**
 * Load Jetpack compatibility file.

 */

require get_template_directory() . '/inc/jetpack.php';


/* metaboxes */

add_action('admin_menu', 'zerif_post_options_box');


function zerif_post_options_box()
{

    add_meta_box('post_info', 'Post details', 'zerif_custom_post_info', 'post', 'side', 'high');

}


function zerif_custom_post_info()
{

    global $post;

    ?>

    <fieldset id="mycustom-div">

        <div>

            <p>

                <label for="zerif_testimonial_option"><?php _e('Testimonial author details:', 'zerif'); ?></label><br/>

                <input type="text" name="zerif_testimonial_option" id="zerif_testimonial_option"
                       value="<?php echo get_post_meta($post->ID, 'zerif_testimonial_option', true); ?>">

            </p>

            <p>

                <label for="zerif_team_member_option"><?php _e('Team member position:', 'zerif'); ?></label><br/>

                <input type="text" name="zerif_team_member_option" id="zerif_team_member_option"
                       value="<?php echo get_post_meta($post->ID, 'zerif_team_member_option', true); ?>">

            </p>

            <p>

                <label
                    for="zerif_team_member_fb_option"><?php _e('Team member facebook link:', 'zerif'); ?></label><br/>

                <input type="text" name="zerif_team_member_fb_option" id="zerif_team_member_fb_option"
                       value="<?php echo get_post_meta($post->ID, 'zerif_team_member_fb_option', true); ?>">

            </p>

            <p>

                <label for="zerif_team_member_tw_option"><?php _e('Team member twitter link:', 'zerif'); ?></label><br/>

                <input type="text" name="zerif_team_member_tw_option" id="zerif_team_member_tw_option"
                       value="<?php echo get_post_meta($post->ID, 'zerif_team_member_tw_option', true); ?>">

            </p>

            <p>

                <label for="zerif_team_member_bh_option"><?php _e('Team member behance link:', 'zerif'); ?></label><br/>

                <input type="text" name="zerif_team_member_bh_option" id="zerif_team_member_bh_option"
                       value="<?php echo get_post_meta($post->ID, 'zerif_team_member_bh_option', true); ?>">

            </p>

            <p>

                <label
                    for="zerif_team_member_db_option"><?php _e('Team member dribbble link:', 'zerif'); ?></label><br/>

                <input type="text" name="zerif_team_member_db_option" id="zerif_team_member_db_option"
                       value="<?php echo get_post_meta($post->ID, 'zerif_team_member_db_option', true); ?>">

            </p>

        </div>

    </fieldset>

<?php

}


add_action('save_post', 'zerif_custom_add_save');

function zerif_custom_add_save($postID)
{


    if ($parent_id = wp_is_post_revision($postID)) {

        $postID = $parent_id;

    }


    if (isset($_POST['zerif_testimonial_option'])) {

        zerif_update_custom_meta($postID, $_POST['zerif_testimonial_option'], 'zerif_testimonial_option');

    }

    if (isset($_POST['zerif_team_member_option'])) {

        zerif_update_custom_meta($postID, $_POST['zerif_team_member_option'], 'zerif_team_member_option');

    }

    if (isset($_POST['zerif_team_member_fb_option'])) {

        zerif_update_custom_meta($postID, $_POST['zerif_team_member_fb_option'], 'zerif_team_member_fb_option');

    }

    if (isset($_POST['zerif_team_member_tw_option'])) {

        zerif_update_custom_meta($postID, $_POST['zerif_team_member_tw_option'], 'zerif_team_member_tw_option');

    }

    if (isset($_POST['zerif_team_member_bh_option'])) {

        zerif_update_custom_meta($postID, $_POST['zerif_team_member_bh_option'], 'zerif_team_member_bh_option');

    }

    if (isset($_POST['zerif_team_member_db_option'])) {

        zerif_update_custom_meta($postID, $_POST['zerif_team_member_db_option'], 'zerif_team_member_db_option');

    }


}


function zerif_update_custom_meta($postID, $newvalue, $field_name)
{


    if (!get_post_meta($postID, $field_name)) {

        add_post_meta($postID, $field_name, $newvalue);

    } else {

        update_post_meta($postID, $field_name, $newvalue);

    }

}


function zerif_wp_page_menu()
{

    echo '<ul class="nav navbar-nav navbar-right responsive-nav main-nav-list">';

    wp_list_pages(array('title_li' => '', 'depth' => 1));

    echo '</ul>';

}


function cwp_add_editor_styles()
{

    add_editor_style('/css/custom-editor-style.css');

}

add_action('init', 'cwp_add_editor_styles');


add_filter('the_title', 'cwp_default_title');


function cwp_default_title($title)
{


    if ($title == '')

        $title = "Default title";


    return $title;

}


/*****************************************/

/******          WIDGETS     *************/

/*****************************************/


add_action('widgets_init', 'zerif_register_widgets');

function zerif_register_widgets()
{

    register_widget('zerif_ourfocus');

    register_widget('zerif_testimonial_widget');

    register_widget('zerif_clients_widget');

    register_widget('zerif_team_widget');

}


/**************************/

/****** our focus widget */

/************************/


add_action('admin_enqueue_scripts', 'zerif_ourfocus_widget_scripts');

function zerif_ourfocus_widget_scripts()
{

    wp_enqueue_media();

    wp_enqueue_script('zerif_our_focus_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);

}


class zerif_ourfocus extends WP_Widget
{


    function zerif_ourfocus()
    {

        $widget_ops = array('classname' => 'ctUp-ads');

        $this->WP_Widget('ctUp-ads-widget', 'Zerif - Our focus widget', $widget_ops);

    }


    function widget($args, $instance)
    {

        extract($args);


        echo $before_widget;

        ?>



        <div class="col-lg-3 col-sm-3 focus-box" data-scrollreveal="enter left after 0.15s over 1s">


            <div class="service-icon">


                <i class="pixeden"
                   style="background:url(<?php echo esc_url($instance['image_uri']); ?>) no-repeat center;width:100%; height:100%;"></i>
                <!-- FOCUS ICON-->


            </div>


            <h5 class="red-border-bottom"><?php echo apply_filters('widget_title', $instance['title']); ?></h5>
            <!-- FOCUS HEADING -->


            <p>

                <?php echo apply_filters('widget_title', $instance['text']); ?>

            </p>


        </div>



        <?php

        echo $after_widget;


    }


    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['text'] = strip_tags($new_instance['text']);

        $instance['title'] = strip_tags($new_instance['title']);

        $instance['image_uri'] = strip_tags($new_instance['image_uri']);

        return $instance;

    }


    function form($instance)
    {

        ?>



        <p>

            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'zerif'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('title'); ?>"
                   id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $instance['title']; ?>"
                   class="widefat"/>

        </p>

        <p>

            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'zerif'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('text'); ?>"
                   id="<?php echo $this->get_field_id('text'); ?>" value="<?php echo $instance['text']; ?>"
                   class="widefat"/>

        </p>

        <p>

            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'zerif'); ?></label><br/>



            <?php

            if ($instance['image_uri'] != '') :

                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';

            endif;

            ?>



            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>"
                   id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>"
                   style="margin-top:5px;">


            <input type="button" class="button button-primary custom_media_button" id="custom_media_button"
                   name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image"
                   style="margin-top:5px;"/>

        </p>



    <?php

    }

}


/****************************/

/****** testimonial widget **/

/***************************/


add_action('admin_enqueue_scripts', 'zerif_testimonial_widget_scripts');

function zerif_testimonial_widget_scripts()
{

    wp_enqueue_media();

    wp_enqueue_script('zerif_testimonial_widget_script', get_template_directory_uri() . '/js/widget-testimonials.js', false, '1.0', true);

}


class zerif_testimonial_widget extends WP_Widget
{


    function zerif_testimonial_widget()
    {

        $widget_ops = array('classname' => 'zerif_testim');

        $this->WP_Widget('zerif_testim-widget', 'Zerif - Testimonial widget', $widget_ops);

    }


    function widget($args, $instance)
    {

        extract($args);


        echo $before_widget;

        ?>



        <div class="feedback-box">

            <!-- MESSAGE OF THE CLIENT -->

            <div class="message">

                <?php echo apply_filters('widget_title', $instance['text']); ?>

            </div>

            <!-- CLIENT INFORMATION -->

            <div class="client">

                <div class="quote red-text">

                    <i class="icon-fontawesome-webfont-294"></i>

                </div>

                <div class="client-info">

                    <a class="client-name" href=""><?php echo apply_filters('widget_title', $instance['title']); ?></a>

                    <div class="client-company">

                        <?php echo apply_filters('widget_title', $instance['details']); ?>

                    </div>

                </div>

                <?php

                echo '<div class="client-image hidden-xs">';

                echo '<img src="' . esc_url($instance['image_uri']) . '" alt="">';

                echo '</div>';

                ?>

            </div>
            <!-- / END CLIENT INFORMATION-->

        </div> <!-- / END SINGLE FEEDBACK BOX-->





        <?php

        echo $after_widget;


    }


    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['text'] = strip_tags($new_instance['text']);

        $instance['title'] = strip_tags($new_instance['title']);

        $instance['details'] = strip_tags($new_instance['details']);

        $instance['image_uri'] = strip_tags($new_instance['image_uri']);

        return $instance;

    }


    function form($instance)
    {

        ?>



        <p>

            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Author', 'zerif'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('title'); ?>"
                   id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $instance['title']; ?>"
                   class="widefat"/>

        </p>

        <p>

            <label
                for="<?php echo $this->get_field_id('details'); ?>"><?php _e('Author details', 'zerif'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('details'); ?>"
                   id="<?php echo $this->get_field_id('details'); ?>" value="<?php echo $instance['details']; ?>"
                   class="widefat"/>

        </p>

        <p>

            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'zerif'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('text'); ?>"
                   id="<?php echo $this->get_field_id('text'); ?>" value="<?php echo $instance['text']; ?>"
                   class="widefat"/>

        </p>

        <p>

            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'zerif'); ?></label><br/>



            <?php

            if ($instance['image_uri'] != '') :

                echo '<img class="custom_media_image_testimonial" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';

            endif;

            ?>



            <input type="text" class="widefat custom_media_url_testimonial"
                   name="<?php echo $this->get_field_name('image_uri'); ?>"
                   id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>"
                   style="margin-top:5px;">


            <input type="button" class="button button-primary custom_media_button_testimonial"
                   id="custom_media_button_testimonial" name="<?php echo $this->get_field_name('image_uri'); ?>"
                   value="Upload Image" style="margin-top:5px;"/>

        </p>



    <?php

    }

}


/****************************/

/****** clients widget **/

/***************************/


add_action('admin_enqueue_scripts', 'zerif_clients_widget_scripts');

function zerif_clients_widget_scripts()
{

    wp_enqueue_media();

    wp_enqueue_script('zerif_clients_widget_script', get_template_directory_uri() . '/js/widget-clients.js', false, '1.0', true);

}


class zerif_clients_widget extends WP_Widget
{


    function zerif_clients_widget()
    {

        $widget_ops = array('classname' => 'zerif_clients');

        $this->WP_Widget('zerif_clients-widget', 'Zerif - Clients widget', $widget_ops);

    }


    function widget($args, $instance)
    {

        extract($args);


        echo $before_widget;

        ?>

        <a href="<?php echo apply_filters('widget_title', $instance['link']); ?>"><img
                src="<?php echo esc_url($instance['image_uri']); ?>" alt="Client"></a>





        <?php

        echo $after_widget;


    }


    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['link'] = strip_tags($new_instance['link']);

        $instance['image_uri'] = strip_tags($new_instance['image_uri']);

        return $instance;

    }


    function form($instance)
    {

        ?>



        <p>

            <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link', 'zerif'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('link'); ?>"
                   id="<?php echo $this->get_field_id('link'); ?>" value="<?php echo $instance['link']; ?>"
                   class="widefat"/>

        </p>



        <p>

            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'zerif'); ?></label><br/>



            <?php

            if ($instance['image_uri'] != '') :

                echo '<img class="custom_media_image_clients" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';

            endif;

            ?>



            <input type="text" class="widefat custom_media_url_clients"
                   name="<?php echo $this->get_field_name('image_uri'); ?>"
                   id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>"
                   style="margin-top:5px;">


            <input type="button" class="button button-primary custom_media_button_clients"
                   id="custom_media_button_clients" name="<?php echo $this->get_field_name('image_uri'); ?>"
                   value="Upload Image" style="margin-top:5px;"/>

        </p>



    <?php

    }

}


/****************************/

/****** team member widget **/

/***************************/


add_action('admin_enqueue_scripts', 'zerif_team_widget_scripts');

function zerif_team_widget_scripts()
{

    wp_enqueue_media();

    wp_enqueue_script('zerif_team_widget_script', get_template_directory_uri() . '/js/widget-team.js', false, '1.0', true);

}


class zerif_team_widget extends WP_Widget
{


    function zerif_team_widget()
    {

        $widget_ops = array('classname' => 'zerif_team');

        $this->WP_Widget('zerif_team-widget', 'Zerif - Team member widget', $widget_ops);

    }


    function widget($args, $instance)
    {

        extract($args);


        echo $before_widget;

        ?>



        <div class="col-lg-3 col-sm-3">


            <div class="team-member">


                <figure class="profile-pic">


                    <img src="<?php echo esc_url($instance['image_uri']); ?>" alt="">


                </figure>


                <div class="member-details">


                    <h5 class="dark-text red-border-bottom"><?php echo apply_filters('widget_title', $instance['name']); ?></h5>


                    <div class="position"><?php echo apply_filters('widget_title', $instance['position']); ?></div>


                </div>


                <div class="social-icons">


                    <ul>


                        <?php if (!empty($instance['fb_link'])): ?>
                            <li><a href="<?php echo apply_filters('widget_title', $instance['fb_link']); ?>"><i
                                        class="icon-facebook"></i></a></li>
                        <?php endif; ?>

                        <?php if (!empty($instance['tw_link'])): ?>
                            <li><a href="<?php echo apply_filters('widget_title', $instance['tw_link']); ?>"><i
                                        class="icon-twitter-alt"></i></a></li>
                        <?php endif; ?>

                        <?php if (!empty($instance['bh_link'])): ?>
                            <li><a href="<?php echo apply_filters('widget_title', $instance['bh_link']); ?>"><i
                                        class="icon-behance"></i></a></li>
                        <?php endif; ?>

                        <?php if (!empty($instance['db_link'])): ?>
                            <li><a href="<?php echo apply_filters('widget_title', $instance['db_link']); ?>"><i
                                        class="icon-dribbble"></i></a></li>
                        <?php endif; ?>


                    </ul>


                </div>


                <div class="details">


                    <?php echo apply_filters('widget_title', $instance['description']); ?>


                </div>


            </div>


        </div>



        <?php

        echo $after_widget;


    }


    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['name'] = strip_tags($new_instance['name']);

        $instance['position'] = strip_tags($new_instance['position']);

        $instance['description'] = strip_tags($new_instance['description']);

        $instance['fb_link'] = strip_tags($new_instance['fb_link']);

        $instance['tw_link'] = strip_tags($new_instance['tw_link']);

        $instance['bh_link'] = strip_tags($new_instance['bh_link']);

        $instance['db_link'] = strip_tags($new_instance['db_link']);

        $instance['image_uri'] = strip_tags($new_instance['image_uri']);

        return $instance;

    }


    function form($instance)
    {

        ?>



        <p>

            <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Name', 'zerif'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('name'); ?>"
                   id="<?php echo $this->get_field_id('name'); ?>" value="<?php echo $instance['name']; ?>"
                   class="widefat"/>

        </p>



        <p>

            <label for="<?php echo $this->get_field_id('position'); ?>"><?php _e('Position', 'zerif'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('position'); ?>"
                   id="<?php echo $this->get_field_id('position'); ?>" value="<?php echo $instance['position']; ?>"
                   class="widefat"/>

        </p>



        <p>

            <label
                for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description', 'zerif'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('description'); ?>"
                   id="<?php echo $this->get_field_id('description'); ?>"
                   value="<?php echo $instance['description']; ?>" class="widefat"/>

        </p>



        <p>

            <label
                for="<?php echo $this->get_field_id('fb_link'); ?>"><?php _e('Facebook link', 'zerif'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('fb_link'); ?>"
                   id="<?php echo $this->get_field_id('fb_link'); ?>" value="<?php echo $instance['fb_link']; ?>"
                   class="widefat"/>

        </p>



        <p>

            <label
                for="<?php echo $this->get_field_id('tw_link'); ?>"><?php _e('Twitter link', 'zerif'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('tw_link'); ?>"
                   id="<?php echo $this->get_field_id('tw_link'); ?>" value="<?php echo $instance['tw_link']; ?>"
                   class="widefat"/>

        </p>



        <p>

            <label
                for="<?php echo $this->get_field_id('bh_link'); ?>"><?php _e('Behance link', 'zerif'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('bh_link'); ?>"
                   id="<?php echo $this->get_field_id('bh_link'); ?>" value="<?php echo $instance['bh_link']; ?>"
                   class="widefat"/>

        </p>



        <p>

            <label
                for="<?php echo $this->get_field_id('db_link'); ?>"><?php _e('Dribble link', 'zerif'); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('db_link'); ?>"
                   id="<?php echo $this->get_field_id('db_link'); ?>" value="<?php echo $instance['db_link']; ?>"
                   class="widefat"/>

        </p>



        <p>

            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'zerif'); ?></label><br/>



            <?php

            if ($instance['image_uri'] != '') :

                echo '<img class="custom_media_image_team" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';

            endif;

            ?>



            <input type="text" class="widefat custom_media_url_team"
                   name="<?php echo $this->get_field_name('image_uri'); ?>"
                   id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>"
                   style="margin-top:5px;">


            <input type="button" class="button button-primary custom_media_button_team" id="custom_media_button_clients"
                   name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image"
                   style="margin-top:5px;"/>

        </p>



    <?php

    }

}

function zerif_customizer_custom_css()
{


    wp_register_style('zerif_customizer_custom_css', get_template_directory_uri() . '/css/zerif_customizer_custom_css.css');

    wp_enqueue_style('zerif_customizer_custom_css');
}


add_action('customize_controls_print_styles', 'zerif_customizer_custom_css');
