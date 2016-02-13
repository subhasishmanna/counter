<?php 
/**
 * @package Classical Counter
 * enqueue style and script
 * @version 1.0
 */

function counter_scripts() {
   wp_enqueue_script( 'counter', plugin_dir_url( __FILE__ ) . 'js/counter.js', array('jquery'), '1.0', true );
    
}
add_action( 'wp_enqueue_scripts', 'counter_scripts' );
