<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
add_action('admin_menu', 'ng_slider_admin_menu');

function ng_slider_admin_menu() {
    add_options_page('NextGen Slider Options', 'NextGen Slider', 'manage_options', 'ng-slider', 'ng_slider_admin_output');
    add_action('admin_init', 'ng_slider_register_plugin_settings');
}

function ng_slider_register_plugin_settings() {
    register_setting('ng_slider_options', 'ng_slider_theme');
    register_setting('ng_slider_options', 'ng_slider_display_content');
    register_setting('ng_slider_options', 'ng_slider_image_width');
    register_setting('ng_slider_options', 'ng_slider_text_width');
    register_setting('ng_slider_options', 'ng_slider_slideshow_speed');
    register_setting('ng_slider_options', 'ng_slider_order');
    //register_setting('ng_slider_options', 'ng_slider_direction');
    //register_setting('ng_slider_options', 'ng_slider_animation');
    register_setting('ng_slider_options', 'ng_slider_direction_nav');
    register_setting('ng_slider_options', 'ng_slider_pagination');
        
    add_settings_section('ng_slider_general_options', 'General Options', 'ng_slider_general_options_code', 'ng_slider_general_options');
    add_settings_field('ng_slider_theme', 'Theme', 'ng_slider_theme_code', 'ng_slider_general_options', 'ng_slider_general_options');
    add_settings_field('ng_slider_display_content', 'Display', 'ng_slider_display_content_code', 'ng_slider_general_options', 'ng_slider_general_options');
    add_settings_field('ng_slider_image_width', 'Image Width', 'ng_slider_image_width_code', 'ng_slider_general_options', 'ng_slider_general_options');
    add_settings_field('ng_slider_text_width', 'Content Width', 'ng_slider_text_width_code', 'ng_slider_general_options', 'ng_slider_general_options');
    add_settings_field('ng_slider_slideshow_speed', 'Animatin Speed/Delay', 'ng_slider_slideshow_speed_code', 'ng_slider_general_options', 'ng_slider_general_options');
    add_settings_field('ng_slider_order', 'Order', 'ng_slider_order_code', 'ng_slider_general_options', 'ng_slider_general_options');
    //add_settings_field('ng_slider_direction', 'Sliding Direction', 'ng_slider_direction_code', 'ng_slider_general_options', 'ng_slider_general_options');
    //add_settings_field('ng_slider_animation', 'Animation Type', 'ng_slider_animation', 'ng_slider_general_options', 'ng_slider_general_options');
    add_settings_field('ng_slider_direction_nav', 'Next/Prev Navigation', 'ng_slider_direction_nav', 'ng_slider_general_options', 'ng_slider_general_options');
    add_settings_field('ng_slider_pagination', 'Pagination Navigation', 'ng_slider_pagination', 'ng_slider_general_options', 'ng_slider_general_options');

}

function ng_slider_general_options_code() {
    echo '<p>' . _e("This section allow you to configure NextGen Slider Options") . '</p>';
}

function ng_slider_image_width_code() {
    echo '<input id="ng_slider_image_width" name="ng_slider_image_width" type="text" value="' . get_option("ng_slider_image_width") . '" /> e.g. any valid width value. 300px, 100% etc<br />';
}
function ng_slider_slideshow_speed_code() {
    echo '<input id="ng_slider_slideshow_speed" name="ng_slider_slideshow_speed" type="text" value="' . get_option("ng_slider_slideshow_speed") . '" /> e.g. Animation speed in seconds.<br />';
}

function ng_slider_text_width_code() {
    echo '<input id="ng_slider_text_width" name="ng_slider_text_width" type="text" value="' . get_option("ng_slider_text_width") . '" /> e.g. any valid width value. 300px, 100% etc<br />';
}

function ng_slider_theme_code() {
    
    echo '<label><input id="ng_slider_display_content1" name="ng_slider_theme" type="radio" value="0" ' . checked(get_option("ng_slider_theme"), '0', false ) . ' /> Black</label><br />';
    echo '<label><input id="ng_slider_display_content3" name="ng_slider_theme" type="radio" value="1" ' . checked( get_option("ng_slider_theme"), '1', false ) . ' /> Blue</label><br />';
}

function ng_slider_animation() {
    
    echo '<label><input id="ng_slider_animation1" name="ng_slider_animation" type="radio" value="fade" ' . checked(get_option("ng_slider_animation"), 'fade', false ) . ' /> Fade</label><br />';
    echo '<label><input id="ng_slider_animation2" name="ng_slider_animation" type="radio" value="slide" ' . checked( get_option("ng_slider_animation"), 'slide', false ) . ' /> Slide</label><br />';
}
function ng_slider_pagination() {
    
    echo '<label><input id="ng_slider_pagination1" name="ng_slider_pagination" type="radio" value="0" ' . checked(get_option("ng_slider_pagination"), '0', false ) . ' /> No Pagination</label><br />';
    echo '<label><input id="ng_slider_pagination2" name="ng_slider_pagination" type="radio" value="bullet" ' . checked( get_option("ng_slider_pagination"), 'bullet', false ) . ' /> Bullet Pagination</label><br />';
}

function ng_slider_direction_nav() {
    
    echo '<label><input id="ng_slider_direction_nav2" name="ng_slider_direction_nav" type="radio" value="1" ' . checked( get_option("ng_slider_direction_nav"), '1', false ) . ' /> Yes</label><br />';
    echo '<label><input id="ng_slider_direction_nav1" name="ng_slider_direction_nav" type="radio" value="0" ' . checked(get_option("ng_slider_direction_nav"), '0', false ) . ' /> No</label><br />';
}

function ng_slider_order_code() {
    
    echo '<label><input id="ng_slider_order1" name="ng_slider_order" type="radio" value="0" ' . checked(get_option("ng_slider_order"), 0, false ) . ' /> Default</label><br />';
    echo '<label><input id="ng_slider_order2" name="ng_slider_order" type="radio" value="reverse" ' . checked( get_option("ng_slider_order"), 'reverse', false ) . ' /> Reverse</label><br />';
    echo '<label><input id="ng_slider_order3" name="ng_slider_order" type="radio" value="random" ' . checked( get_option("ng_slider_order"), 'random', false ) . ' /> Random</label><br />';
}

function ng_slider_direction_code() {
    
    echo '<label>Visible for "slide" animation only.</label><br />';
    echo '<label><input id="ng_slider_direction1" name="ng_slider_direction" type="radio" value="horizontal" ' . checked(get_option("ng_slider_direction"), 'horizontal', false ) . ' /> Horizontal</label><br />';
    echo '<label><input id="ng_slider_direction2" name="ng_slider_direction" type="radio" value="vertical" ' . checked( get_option("ng_slider_direction"), 'vertical', false ) . ' /> Vertical</label><br />';
}

function ng_slider_display_content_code() {
    $options = get_option('ng_slider_options');
    
    echo '<label><input id="ng_slider_display_content1" name="ng_slider_display_content" type="radio" value="0" ' . checked(get_option("ng_slider_display_content"), 0, false ) . ' />Image Only</label><br />';
    echo '<label><input id="ng_slider_display_content3" name="ng_slider_display_content" type="radio" value="1" ' . checked( get_option("ng_slider_display_content"), 1, false ) . ' />Image and Content Both</label><br />';
}


function ng_slider_admin_output() {
    ?>
        <div id="dashboard-widgets" class="metabox-holder">
            <div id="post-body">
                <div id="dashboard-widgets-main-content">
                    <div class="postbox-container" id="main-container" style="width:75%;">
        <h2>NextGen Slider Options</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('ng_slider_options');
            do_settings_sections('ng_slider_general_options');
            ?>
            <p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
        </form>
    </div>
                    </div>
                    <div class="postbox-container" id="side-container" style="width:24%;">
                        <div id="right-sortables" class="meta-box-sortables ui-sortable"><div id="ngg_meta_box" class="postbox ">
                                <div class="handlediv" title="Click to toggle"><br></div><h3 class="hndle"><span>Do you like this Plugin?</span></h3>
                                <div class="inside">
                                    <p>Any kind of contribution would be highly appreciated. Thanks!</p>
                                    <ul>
                                         <li style="padding-left: 30px; min-height:30px; min-height:30px;line-height: 30px;  background:transparent url(http://wpdevsnippets.com/plugin-images/icon_thumb_up.png) no-repeat scroll center left; text-decoration: none;">
                                             <a href="http://wordpress.org/extend/plugins/nextgen-flex-slider-template/" target="_blank">Give it a good rating on WordPress.org</a>
                                         </li>
                                         <li style="padding-left: 30px; min-height:30px; min-height:30px;line-height: 30px; background:transparent url(http://wpdevsnippets.com/plugin-images/icon_wordpress_blue.png) no-repeat scroll center left; text-decoration: none;">
                                             <a href="http://wordpress.org/extend/plugins/nextgen-flex-slider-template/" target="_blank">Visit the WordPress plugin homepage</a>
                                         </li>
                                         <li style="padding-left: 30px; min-height:30px;line-height: 30px; background:transparent url(http://wpdevsnippets.com/plugin-images/icon_doc_find.png) no-repeat scroll center left; text-decoration: none;">
                                             <a href="http://wpdevsnippets.com/nextgen-flex-image-content-slider-template/" target="_blank"><strong>Visit the Documentation page</strong></a>
                                         </li>
                                         <li style="padding-left: 30px; min-height:30px;line-height: 30px; background:transparent url(http://wpdevsnippets.com/plugin-images/icon_person_help.png) no-repeat scroll center left; text-decoration: none;">
                                             <a href="http://wordpress.org/support/plugin/nextgen-flex-slider-template" target="_blank">Report a bug </a>
                                         </li>
                                    </ul>
                                    <div class="social" style="text-align:center;margin:15px 0 10px 0;">
                                        <span class="social" style="margin-right:5px;"><a target="_blank" href="http://twitter.com/WPDevSnippets">
                                                <img title="Follow Us on Twitter" alt="Twitter" src="http://wpdevsnippets.com/plugin-images/icon_twitter.png"></a></span>
                                    <span class="social" style="margin-right:5px;"><a target="_blank" href="http://www.facebook.com/WPDevSnippets"><img title="Like Us on Facebook" alt="Facebook" src="http://wpdevsnippets.com/plugin-images/icon_fb.png"></a></span>
                                    <span class="social"><a target="_blank" href="https://plus.google.com/116192363608271504785"><img title="Add Us to your circles" alt="GooglePlus" src="http://wpdevsnippets.com/plugin-images/icon_gplus.png"></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
}


?>