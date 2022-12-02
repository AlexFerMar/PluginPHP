<?php

/**
 * Plugin Name:       Navida
 * Description:       Hashire sori yo
 * Version:           1.8
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Padoru
 * Author URI:        localhost
 * License:           GPL v2 or later
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

function navida(){
    function navidad($atts = [], $content = null){

        extract(shortcode_atts(array( ), $atts));

        $content = "<script>alert('Hashire sori yo \\n' +
                    'kaze no you ni \\n' +
                    'tsukimihara wo \\n' +
                    'Padoru Padoru');</script>";

        return $content ;
    }
    add_shortcode('padoru', 'navidad');

    function navidad2($atts, $content = null){


        $contenido="dQ_d_VKrFgM";

        return '<iframe 
        type="text/html" 
        width="854" 
        height="480" 
        src="http://www.youtube.com/embed/'.$contenido.'?&autoplay=1&loop=0&modestbranding=1;wmode=transparent&amp;fs=1&amp;hl=en&amp;modestbranding=1&amp;iv_load_policy=3&amp;showsearch=0&amp;rel=1&amp;theme=dark;" 
        allowfullscreen
        ></iframe>';
    }
    add_shortcode('padoru_video', 'navidad2');





}


add_action('init', 'navida');