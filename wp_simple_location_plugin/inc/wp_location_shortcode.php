<?php
/*
 * Wp Location Shortcode
 * A shortcode created to display a location or series of locations when used in the editor or other areas
 */

 
 //defines the functionality for the location shortcode
 class wp_location_shortcode{
 	
	//on initialize
	public function __construct(){
		add_action('init', array($this,'register_location_shortcodes')); //shortcodes
	}

	//location shortcode
	public function register_location_shortcodes(){
		add_shortcode('wp_locations', array($this,'location_shortcode_output'));
	}
	
	//shortcode display
	public function location_shortcode_output($atts, $content = '', $tag){
			
		//get the global wp_simple_locations class
		global $wp_simple_locations;
			
		//build default arguments
		$arguments = shortcode_atts(array(
			'location_id' => '',
			'number_of_locations' => -1)
		,$atts,$tag);
		
		//uses the main output function of the location class
		$html = $wp_simple_locations->get_locations_output($arguments);
		
		return $html;
	}

 }
 $wp_location_shortcode = new wp_location_shortcode;

 
 

?>