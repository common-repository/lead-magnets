<?php 
/**
 *  Lead Magnets Functions
 */
 defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

//Include public styles and scripts
function lead_magnet_load_styles_and_scripts() {  
			wp_register_style( 'lead_magnet_css', plugins_url( 'public/css/lead-magnets.min.css', dirname(__FILE__) ));
			wp_enqueue_style( 'lead_magnet_css' ); 
		  
			wp_register_script( 'lead_magnet_js', plugins_url('public/js/lead-magnets.min.js', dirname(__FILE__)), array( 'jquery' ), null, true );
			wp_enqueue_script( 'lead_magnet_js' );
			wp_localize_script( 'lead_magnet_js', 'lead_magnet_js_', array( 'ajaxurl' => admin_url('admin-ajax.php')) );
			
			wp_enqueue_script( 'velocity', plugins_url('public/js/velocity.min.js', dirname(__FILE__)), array( 'jquery' ), null, true );
			
}
add_action( 'wp_enqueue_scripts', 'lead_magnet_load_styles_and_scripts' );


//Shortcode for Attention background
function lead_magnet_attention_shortcode( $atts, $content = null ) {

	return '<span class="attention">' . do_shortcode($content) . '</span>';
}
add_shortcode( 'attention-lead-magnet', 'lead_magnet_attention_shortcode' );

//Shortcode for the link on which user clicks to open the email subscription form
function lead_magnet_opt_in_link_shortcode( $atts, $content = null ) {

	return '<a class="lead-magnet" href="#" onclick="return false;">' . $content . '</a>';
}
add_shortcode( 'lead-magnet', 'lead_magnet_opt_in_link_shortcode' );

//Shortcode for the popup, containing the shortcode for the email subscription form, title, subtitle and spam statement
function lead_magnet_opt_in_from_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
		'title' => 'Subscribe to unlock ...',
		'subtitle' => 'Where I can send ...?',
		'spam_statement' => 'I hate spam too, so I will never send such to you!',
		'close' => 'No, thanks',
		),
		$atts
	);

	return '<div class="lead-magnet-title via-shortcode"><h3> '. $atts['title'] .' </h3><p class="lead-magnet-subtitle">'. $atts['subtitle'] .'</p>' . do_shortcode($content) . '<span class="lead-magnet-spam-statement">'. $atts['spam_statement'] .'</span><div><a class="close-overlay" href="#" onclick="return false;">'. $atts['close'] .'</a></div></div>';
}
add_shortcode( 'lead-magnet-popup', 'lead_magnet_opt_in_from_shortcode' );


//Add shortcode button to editor
// init process for registering our button
 add_action('init', 'lead_magnet_shortcode_button_init');
 function lead_magnet_shortcode_button_init() {

      //Abort early if the user will never see TinyMCE
      if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
           return;

      //Add a callback to regiser our tinymce plugin   
      add_filter("mce_external_plugins", "lead_magnet_register_tinymce_plugin"); 

      // Add a callback to add our button to the TinyMCE toolbar
      add_filter('mce_buttons', 'lead_magnet_add_tinymce_button');
}


//This callback registers our plug-in
function lead_magnet_register_tinymce_plugin($plugin_array) {
    $plugin_array['lead_magnet_button'] =  plugins_url( 'admin/js/shortcode.js', dirname(__FILE__)); 
    return $plugin_array;
}

//This callback adds our button to the toolbar
function lead_magnet_add_tinymce_button($buttons) {
            //Add the button ID to the $button array
    array_push($buttons, 'lead_magnet_button');
    return $buttons;
}

function lead_magnet_zoom() {
    echo '<div id="zoom"></div>';
}
add_action( 'wp_footer', 'lead_magnet_zoom' );

// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');
