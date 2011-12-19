<?php

    /**
    * Plugin Name: Simple Slides
    * Version: 1.0.7
    * Description: A simple slider that can easily be set up and used. Uses jQuery <a href="http://nivo.dev7studios.com/">Nivo Slider</a> script for slide animation and custom posts and custom taxonomies for slides management. The plugin can also use posts, pages, or other custom posts as slides. Supports shortcodes with a number of options to allow embeding in posts, pages, or theme files. <strong>Please don't hesitate to contact the plugin author for questions, suggestions, etc... anything.</strong>
    * Author: ApocalypseBoy
    * Author URI: http://apocalypseboy.com/
    * Plugin URI: http://apocalypseboy.com/simple-slides/
    * License: GPLv2 or later
    */

    /*
        This program is free software; you can redistribute it and/or
        modify it under the terms of the GNU General Public License
        as published by the Free Software Foundation; either version 2
        of the License, or (at your option) any later version.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.

        You should have received a copy of the GNU General Public License
        along with this program; if not, write to the Free Software
        Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
    */
    
    define( 'ABY_SS_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
    define( 'ABY_SS_PLUGIN_FOLDER', str_replace( basename( __FILE__ ), '', ABY_SS_PLUGIN_BASENAME ) );
    define( 'ABY_SS_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . ABY_SS_PLUGIN_FOLDER );
    define( 'ABY_SS_PLUGIN_URL', WP_PLUGIN_URL . '/' . ABY_SS_PLUGIN_FOLDER );
    
    class ABY_SimpleSlides {  
        var $settings_name = 'simple_slides_settings';
         
        var $global_settings = array(
            'script' => array(
                'script_function' => 'nivoSlider',
                'script_url' => array( 'includes/nivo/jquery.nivo.js' ),
                'style_url' => array( 'includes/nivo/themes/default/default.css', 'includes/nivo/style.css' ),
                'script_settings' => array(
                    'effect'        => 'fade',
                    'slices'        => '15',
                    'boxCols'       => '8',
                    'boxRows'       => '4',
                    'animSpeed'     => '500',
                    'pauseTime'     => '3000',
                    'directionNav'  => '1',
                    'directionNavHide'  => '1',
                    'controlNav'    => '1',
//                     'controlNavThumbs' => false, // Use thumbnails for Control Nav
//                     'controlNavThumbsFromRel' => false, // Use image rel for thumbs
//                     'controlNavThumbsSearch' => '.jpg', // Replace this with...
//                     'controlNavThumbsReplace' => '_thumb.jpg', // ...this in thumb Image src
                    'keyboardNav'   => '1',
                    'pauseOnHover'  => '1',
//                     'manualAdvance' => false, // Force manual transitions
                    'captionOpacity'    => '0.8',
                    'prevText'      => 'Prev',
                    'nextText'      => 'Next',
                    'randomStart'   => '0',
                ),
                'script_settings_map' => array(
                    'effect'        => 'effect',
                    'slices'        => 'slices',
                    'boxCols'       => 'box_cols',
                    'boxRows'       => 'box_rows',
                    'animSpeed'     => 'anim_speed',
                    'pauseTime'     => 'pause_time',
                    'directionNav'  => 'direction_nav',
                    'directionNavHide'  => 'direction_nav_hide',
                    'controlNav'    => 'control_nav',
                    'keyboardNav'   => 'keyboard_nav',
                    'pauseOnHover'  => 'pause_on_hover',
                    'captionOpacity'    => 'caption_opacity',
                    'prevText'      => 'prev_text',
                    'nextText'      => 'next_text',
                    'randomStart'   => 'random_start',
                )
            )
        );
        
        public function __construct() {                                
            add_action( 'init', array( $this, 'init' ) );       
            add_action( 'admin_init', array( $this, 'admin_init' ) );  
            add_action( 'admin_menu', array( $this, 'add_menu' ) ) ;   
        }  
        
        public function init() {                              
            $this->register_types();   
            
            add_filter( 'post_updated_messages', array( $this, 'post_updated_messages' ) );
            add_action( 'contextual_help', array( $this, 'contextual_help' ), 10, 3 );
                               
            add_shortcode( 'simple_slides', array( $this, 'get' ) );
            
            foreach ( $this->global_settings['script']['style_url'] as $number => $url ) {   
                wp_enqueue_style( 'ss_style_' . $number, ABY_SS_PLUGIN_URL . '/' . $url );
            }
            
            foreach ( $this->global_settings['script']['script_url'] as $number => $url ) {
                wp_enqueue_script( 'ss_script_' . $number, ABY_SS_PLUGIN_URL . '/' . $url, array( 'jquery' ), null, true );     
            }
           
            wp_enqueue_script( 'ss_main', ABY_SS_PLUGIN_URL . '/scripts/ss_main.js', array( 'jquery' ), null, true );
        }                                          
        
        public function register_types() {     
            $labels = array(
                'name'                  => __( 'Slides' ),
                'singular_name'         => __( 'Slide' ),
                'add_new'               => __( 'New Slide' ),
                'add_new_item'          => __( 'Add New Slide' ),
                'edit_item'             => __( 'Edit Slide' ),
                'new_item'              => __( 'New Slide' ),
                'all_items'             => __( 'All Slides' ),
                'view_item'             => __( 'View Slide' ),
                'search_items'          => __( 'Search Slides' ),
                'not_found'             => __( 'No slides found'),
                'not_found_in_trash'    => __( 'No slides found in trash' ), 
                'menu_name'             => 'Simple Slides'
            );
            
            $args = array(
                'labels'                => $labels,
                'public'                => false,
                'show_ui'               => true, 
                'show_in_menu'          => true, 
                'query_var'             => true,
                'rewrite'               => true,
                'menu_position'         => 50,
                'menu_icon'             => null, // todo: set this
                'supports'              => array( 
                    'title', 
                    'editor', 
                    'thumbnail'
                )
            ); 
            
            register_post_type( 'ss-slide', $args );
            
            $labels = array(
                'name'              => __( 'Slide Sets' ),
                'singular_name'     => __( 'Slide Set' ),
                'search_items'      => __( 'Search Slide Groups' ),
                'popular_items'     => __( 'Popular Slide Set' ),
                'all_items'         => __( 'All Slide Sets' ),
                'edit_item'         => __( 'Edit Slide Set' ), 
                'update_item'       => __( 'Update Slide Set' ),
                'add_new_item'      => __( 'Add New Slide Set' ),
                'new_item_name'     => __( 'New Slide Set' ),
                'separate_items_with_commas'    => __( 'Separate slide sets with commas.' ),
                'add_or_remove_items'           => __( 'Add or remove slide set.' ),
                'choose_from_most_used'         => __( 'Choose from the most used slide sets.' ),
                'menu_name'                     => __( 'Slide Sets' ),
            ); 

            register_taxonomy(
                'ss-slide-set',
                array( 'ss-slide' ),
                array(
                    'public' => false,
                    'labels' => $labels,         
                    'show_ui' => true,
                    'show_tagcloud' => false,
                    'rewrite' => false
                )
            );
        }         
                                                                                                               
        public function get( $atts ) {
            static $count = 0; $count ++;
        
            extract( shortcode_atts( 
                array( 
                    'name'          => $count,
                    'image_size'    => 'full',
                    'wrapper'       => 'div',
                    'container'     => 'div',
                    'caption'       => 'div',  
                    'post_type'     => 'ss-slide',  
                    'tax_term'      => 'ss-slide-set',  
                    'tax'           => null
                ),
                $atts
            ) );
            
            $slides = new WP_Query( array(
                'numberposts'       => -1,
                'post_type'         => $post_type,
                'post_status'       => 'publish',
                $tax_term           => $tax
            ) );  

            $settings = $this->get_settings();
            $script_settings = $settings['script'];
            
            $local_settings = shortcode_atts( 
                array_combine( 
                    array_values( $script_settings['script_settings_map'] ), 
                    array_values( $script_settings['script_settings'] ) 
                ), 
                $atts 
            );
            
            $local_settings = array_combine( 
                array_keys( $script_settings['script_settings_map'] ), 
                array_values( $local_settings ) 
            ); 
            
            $local_settings['f'] = $script_settings['script_function'];
            
            $html = '<script type="text/javascript">var ss_' . $name . '=' . json_encode( $local_settings ) . ';</script>';
            
            $html .= '<' . ( $wrapper ? $wrapper : 'div' ) . ' class="simple_slides_wrapper theme-default">';
            $html .= '<' . ( $container ? $container : 'div' ) . ' id="ss_' . $name . '" class="simple_slides nivoSlider nivoSlider-' . $name . '">';
            
            $captions = array();
            
            while ( $slides->have_posts() ) {
                $slides->the_post();                         
                
                if ( has_post_thumbnail() ) {
                    $caption_id = 'simple_slides_caption_' . $name . '_' . get_the_ID();
                    $captions[$caption_id] = get_the_content();
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), $image_size );
                    $html .= '<img src="' . $thumb[0] . '" ' . ( $captions[$caption_id] ? 'title="#' . $caption_id . '"' : '' ) . ' />';     
                }
            }                                                    
            
            $html .= '</' . ( $container ? $container : 'div' ) . '>';
            
            foreach ( $captions as $caption_id => $caption_content ) {
                $html .= '<' . ( $caption ? $caption : 'div' ) . ' id="' . $caption_id . '" class="nivo-html-caption">' . $caption_content . '</' . ( $caption ? $caption : 'div' ) . '>';
            }   
            
            $html .= '</' . ( $wrapper ? $wrapper : 'div' ) . '>';
            
            wp_reset_postdata();
                
            return $html;
        }
        
        public function admin_init() {
            // todo: Implement cleaning.
            register_setting( $this->settings_name, $this->settings_name, array( $this, 'clean_settings' ) );    
        }  

        // todo: Complete function.        
        public function clean_settings( $data ) {
            return $data;
        }   
        
        public function add_menu() {
            $hk = add_submenu_page( 
                'edit.php?post_type=ss-slide', 
                'Simple Slides Settings', 
                'Settings', 
                'manage_options', 
                'ss-settings', 
                array( $this, 'page_settings' ) 
            );
        }    
        
        public function page_settings() { ?>
            <div class="wrap">
                <div class="icon32" id="icon-options-general"></div>
                <h2>Simple Slides Settings</h2>       
                <?php if ( 'true' == $_GET['settings-updated'] ) : ?>   
                    <div id="message" class="updated below-h2">
                        <p>Settings updated.</p>
                    </div>                                             
                <?php endif; ?>
                <p>These settings are <strong>global</strong>. That means it will affect all sliders. To customize sliders, use shorcode attributes. Shortcode attribute names are indicated below each setting label (e.g. [effect], [slices], [box_cols], etc).</p>
                <form action="options.php" method="post">
                    <?php 
                        $settings = $this->get_settings();
                        echo settings_fields( $this->settings_name ); 
                    ?>
                    <table class="form-table">
                        <tr>
                            <th scope="row">
                                <label>Effect</label><br />
                                <span class="description">[effect]</span>
                            </th>
                            <td>
                                <select name="<?php echo $this->settings_name; ?>[script][script_settings][effect]">
                                    <option value="sliceDown" <?php __checked_selected_helper( 'sliceDown', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Slide Down</option>
                                    <option value="sliceDownLeft" <?php __checked_selected_helper( 'sliceDownLeft', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Slide Down Left</option>
                                    <option value="sliceUp" <?php __checked_selected_helper( 'sliceUp', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Slice Up</option>
                                    <option value="sliceUpLeft" <?php __checked_selected_helper( 'sliceUpLeft', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Slice Up Left</option>
                                    <option value="sliceUpDown" <?php __checked_selected_helper( 'sliceUpDown', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Slice Up Down</option>
                                    <option value="sliceUpDownLeft" <?php __checked_selected_helper( 'sliceUpDownLeft', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Slice Up Down Left</option>
                                    <option value="fold" <?php __checked_selected_helper( 'fold', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Fold</option>
                                    <option value="fade" <?php __checked_selected_helper( 'fade', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Fade</option>
                                    <option value="random" <?php __checked_selected_helper( 'random', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Random</option>
                                    <option value="slideInRight" <?php __checked_selected_helper( 'slideInRight', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Slide In Right</option>
                                    <option value="slideInLeft" <?php __checked_selected_helper( 'slideInLeft', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Slide In Left</option>
                                    <option value="boxRandom" <?php __checked_selected_helper( 'boxRandom', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Box Random</option>
                                    <option value="boxRain" <?php __checked_selected_helper( 'boxRain', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Box Rain</option>
                                    <option value="boxRainReverse" <?php __checked_selected_helper( 'boxRainReverse', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Box Rain Reverse</option>
                                    <option value="boxRainGrow" <?php __checked_selected_helper( 'boxRainGrow', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Box Rain Grow</option>
                                    <option value="boxRainGrowReverse" <?php __checked_selected_helper( 'boxRainGrowReverse', $settings['script']['script_settings']['effect'], true, 'selected' ); ?>>Box Rain Grow Reverse</option>
                                </select><br />
                                <span class="description">Animation to be used</span>
                            </td>
                        </tr> 
                        <tr>
                            <th scope="row">
                                <label>Slices</label><br />
                                <span class="description">[<?php echo $this->global_settings['script']['script_settings_map']['slices']; ?>]</span>
                            </th>
                            <td>
                                <input class="regular-text" type="text" name="<?php echo $this->settings_name; ?>[script][script_settings][slices]" value="<?php echo $settings['script']['script_settings']['slices']; ?>" /><br />
                                <span class="description">For slice animations</span>
                            </td>
                        </tr> 
                        <tr>
                            <th scope="row">
                                <label>Box Columns</label><br />             
                                <span class="description">[<?php echo $this->global_settings['script']['script_settings_map']['boxCols']; ?>]</span>
                            </th>
                            <td>
                                <input class="regular-text" type="text" name="<?php echo $this->settings_name; ?>[script][script_settings][boxCols]" value="<?php echo $settings['script']['script_settings']['boxCols']; ?>" /><br />
                                <span class="description">For box animations</span>
                            </td>
                        </tr> 
                        <tr>
                            <th scope="row">
                                <label>Box Rows</label><br />                   
                                <span class="description">[<?php echo $this->global_settings['script']['script_settings_map']['boxRows']; ?>]</span>
                            </th>
                            <td>
                                <input class="regular-text" type="text" name="<?php echo $this->settings_name; ?>[script][script_settings][boxRows]" value="<?php echo $settings['script']['script_settings']['boxRows']; ?>" /><br />
                                <span class="description">For box animations</span>
                            </td>
                        </tr> 
                        <tr>
                            <th scope="row">
                                <label>Animation Speed</label><br />            
                                <span class="description">[<?php echo $this->global_settings['script']['script_settings_map']['animSpeed']; ?>]</span>
                            </th>
                            <td>
                                <input class="regular-text" type="text" name="<?php echo $this->settings_name; ?>[script][script_settings][animSpeed]" value="<?php echo $settings['script']['script_settings']['animSpeed']; ?>" /><br />
                                <span class="description">Slide transition speed</span>
                            </td>
                        </tr> 
                        <tr>
                        <tr>
                            <th scope="row">
                                <label>Pause Time</label><br />                   
                                <span class="description">[<?php echo $this->global_settings['script']['script_settings_map']['pauseTime']; ?>]</span>
                            </th>
                            <td>
                                <input class="regular-text" type="text" name="<?php echo $this->settings_name; ?>[script][script_settings][pauseTime]" value="<?php echo $settings['script']['script_settings']['pauseTime']; ?>" /><br />
                                <span class="description">How long each slide will show</span>
                            </td>
                        </tr> 
                        <tr>
                            <th scope="row">
                                <label>Direction Navigation</label><br />        
                                <span class="description">[<?php echo $this->global_settings['script']['script_settings_map']['directionNav']; ?>]</span>
                            </th>
                            <td>
                                <select name="<?php echo $this->settings_name; ?>[script][script_settings][directionNav]">
                                    <option value="1" <?php __checked_selected_helper( '1', $settings['script']['script_settings']['directionNav'], true, 'selected' ); ?>>Yes</option>
                                    <option value="0" <?php __checked_selected_helper( '0', $settings['script']['script_settings']['directionNav'], true, 'selected' ); ?>>No</option>
                                </select><br />
                                <span class="description">Next & Prev navigation</span>
                            </td>
                        </tr> 
                        <tr>
                            <th scope="row">
                                <label>Hide Direction Navigation</label><br />         
                                <span class="description">[<?php echo $this->global_settings['script']['script_settings_map']['directionNavHide']; ?>]</span>
                            </th>
                            <td>
                                <select name="<?php echo $this->settings_name; ?>[script][script_settings][directionNavHide]">
                                    <option value="1" <?php __checked_selected_helper( '1', $settings['script']['script_settings']['directionNavHide'], true, 'selected' ); ?>>Yes</option>
                                    <option value="0" <?php __checked_selected_helper( '0', $settings['script']['script_settings']['directionNavHide'], true, 'selected' ); ?>>No</option>
                                </select><br />
                                <span class="description">Only show on hover</span>     
                            </td>
                        </tr> 
                        <tr>
                            <th scope="row">
                                <label>Control Navigation</label><br />         
                                <span class="description">[<?php echo $this->global_settings['script']['script_settings_map']['controlNav']; ?>]</span>
                            </th>
                            <td>
                                <select name="<?php echo $this->settings_name; ?>[script][script_settings][controlNav]">
                                    <option value="1" <?php __checked_selected_helper( '1', $settings['script']['script_settings']['controlNav'], true, 'selected' ); ?>>Yes</option>
                                    <option value="0" <?php __checked_selected_helper( '0', $settings['script']['script_settings']['controlNav'], true, 'selected' ); ?>>No</option>
                                </select><br />
                                <span class="description">1,2,3... navigation</span>  
                            </td>
                        </tr> 
                        <tr>
                            <th scope="row">
                                <label>Keyboard Navigation</label><br />           
                                <span class="description">[<?php echo $this->global_settings['script']['script_settings_map']['keyboardNav']; ?>]</span>
                            </th>
                            <td>
                                <select name="<?php echo $this->settings_name; ?>[script][script_settings][keyboardNav]">
                                    <option value="1" <?php __checked_selected_helper( '1', $settings['script']['script_settings']['keyboardNav'], true, 'selected' ); ?>>Yes</option>
                                    <option value="0" <?php __checked_selected_helper( '0', $settings['script']['script_settings']['keyboardNav'], true, 'selected' ); ?>>No</option>
                                </select><br />
                                <span class="description">Use left & right arrows</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Pause On Hover</label><br />                
                                <span class="description">[<?php echo $this->global_settings['script']['script_settings_map']['pauseOnHover']; ?>]</span>
                            </th>
                            <td>
                                <select name="<?php echo $this->settings_name; ?>[script][script_settings][pauseOnHover]">
                                    <option value="1" <?php __checked_selected_helper( '1', $settings['script']['script_settings']['pauseOnHover'], true, 'selected' ); ?>>Yes</option>
                                    <option value="0" <?php __checked_selected_helper( '0', $settings['script']['script_settings']['pauseOnHover'], true, 'selected' ); ?>>No</option>
                                </select><br />
                                <span class="description">Stop animation while hovering</span>
                            </td>
                        </tr> 
                        <tr>
                            <th scope="row">
                                <label>Caption Opacity</label><br />                
                                <span class="description">[<?php echo $this->global_settings['script']['script_settings_map']['captionOpacity']; ?>]</span>
                            </th>
                            <td>        
                                <input class="regular-text" type="text" name="<?php echo $this->settings_name; ?>[script][script_settings][captionOpacity]" value="<?php echo $settings['script']['script_settings']['captionOpacity']; ?>" /><br />
                                <span class="description">Universal caption opacity</span>
                            </td>
                        </tr> 
                        <tr>
                            <th scope="row">
                                <label>Previous Text</label><br />              
                                <span class="description">[<?php echo $this->global_settings['script']['script_settings_map']['prevText']; ?>]</span>
                            </th>
                            <td>        
                                <input class="regular-text" type="text" name="<?php echo $this->settings_name; ?>[script][script_settings][prevText]" value="<?php echo $settings['script']['script_settings']['prevText']; ?>" /><br />
                                <span class="description">Prev directionNav text</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Next Text</label><br />                   
                                <span class="description">[<?php echo $this->global_settings['script']['script_settings_map']['nextText']; ?>]</span>
                            </th>
                            <td>        
                                <input class="regular-text" type="text" name="<?php echo $this->settings_name; ?>[script][script_settings][nextText]" value="<?php echo $settings['script']['script_settings']['nextText']; ?>" /><br />
                                <span class="description">Next directionNav text</span>
                            </td>
                        </tr> 
                        <tr>
                            <th scope="row">
                                <label>Random Start</label><br />                 
                                <span class="description">[<?php echo $this->global_settings['script']['script_settings_map']['randomStart']; ?>]</span>
                            </th>
                            <td>
                                <select name="<?php echo $this->settings_name; ?>[script][script_settings][randomStart]">
                                    <option value="1" <?php __checked_selected_helper( '1', $settings['script']['script_settings']['randomStart'], true, 'selected' ); ?>>Yes</option>
                                    <option value="0" <?php __checked_selected_helper( '0', $settings['script']['script_settings']['randomStart'], true, 'selected' ); ?>>No</option>
                                </select><br />
                                <span class="description">Start on a random slide</span>
                            </td>
                        </tr> 
                    </table>
                    <p class="submit"><input type="submit" value="Save Changes" class="button-primary" id="submit" name="submit"></p>
                </form>                                                                                                          
            </div>
        <?php }
                                                  
        // todo: Improve update messages.                          
        public function post_updated_messages( $messages ) {
            global $post, $post_ID;

            $messages['ss-slide'] = array(
                0 => '',
                1 => __( 'Slide updated.' ),
                2 => __( 'Custom field updated.' ),
                3 => __( 'Custom field deleted.' ),
                4 => __( 'Slide updated.' ),
                6 => __( 'Slide added.' ),
                7 => __( 'Slide saved.' ),
                8 => __( 'Slide submitted.' ),
                10 => __( 'Slide draft updated.' )
            );

            return $messages;
        }
        
        public function contextual_help( $contextual_help, $screen_id, $screen ) { 
            if ( 'ss-slide' == $screen->id ) {
                $contextual_help = '<p>Always remember to <strong><u>specify a featured image</u></strong>. The slide <strong><u>will not be displayed</u></strong> if it has no featured image.<br />For more infomation kindly read the <a href="http://apocalypseboy.com/simple-slides/">plugin documentation</a>.</p>';
            }   
            
            return $contextual_help;
        }
        
        
        /**
        * Get plugins settings.
        * 
        * @return array
        */
        
        private function get_settings() {
            $settings = get_option( $this->settings_name );   
            $settings = is_array( $settings ) ? $settings : array();
            return $this->array_merge( $this->global_settings, $settings );
        }
        
        
        /**
        * Merge two arrays with key comparison and value overwrite.
        * 
        * @param array $array1
        * @param array $array2
        * @return array
        */
        
        private function array_merge( $array1, $array2 ) {
            foreach ( $array2 as $key => $value ) {
                if ( array_key_exists( $key, $array1 ) && is_array( $value ) )
                    $array1[$key] = $this->array_merge( $array1[$key], $array2[$key] );

                else
                    $array1[$key] = $value;
            }

            return $array1;
        }
    }
    
    $ABY_SimpleSlides = new ABY_SimpleSlides();