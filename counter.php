<?php
/**
 * @package Classical Counter
 * @version 1.0
 */
/*
Plugin Name: Classical Counter
Plugin URI: http://wordpress.org/plugins/ClassicalCounter
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Subhasish Manna
Version: 1.0
Author URI: http://subhasishmanna931.wordpress.com
*/


/**
 * Include files for plugin.
 */
 $plugindir = plugin_dir_path( __FILE__ );
 include  $plugindir . '/enqueue.php';
 
 if (!function_exists('counter_shortcode')):
 function canvas_counter( $atts ) {
    $atts = shortcode_atts(
        array(
            'class' => 'loader',
            'width' => 200,
            
        ), $atts, 'bartag' );
	function counter_control_script(){
		?>
		<script>
		jQuery(document).ready(function($) {
		$('.loader').ClassyLoader({
		width: 200, // width of the loader in pixels
		height: 200, // height of the loader in pixels
		animate: true, // whether to animate the loader or not
		displayOnLoad: true,
		percentage: 80, // percent of the value, between 0 and 100
		speed: 1, // miliseconds between animation cycles, lower value is faster
		roundedLine: false, // whether the line is rounded, in pixels
		showRemaining: true, // how the remaining percentage (100% - percentage)
		fontFamily: 'Helvetica', // name of the font for the percentage
		fontSize: '50px', // size of the percentage font, in pixels
		showText: true, // whether to display the percentage text
		diameter: 80, // diameter of the circle, in pixels
		fontColor: 'rgba(25, 25, 25, 0.6)', // color of the font in the center of the loader, any CSS color would work, hex, rgb, rgba, hsl, hsla
		lineColor: 'rgba(55, 55, 55, 1)', // line color of the main circle
		remainingLineColor: 'rgba(55, 55, 55, 0.4)', // line color of the remaining percentage (if showRemaining is true)
		lineWidth: 5 // the width of the circle line in pixels
		});
		});
	</script>
<?php
	
}
add_action( 'wp_footer', 'counter_control_script', 100 );


    return '<canvas class="' . esc_html( $atts['class'] ) . '"></canvas>';
}
add_shortcode( 'canvas', 'canvas_counter' );

endif;

	