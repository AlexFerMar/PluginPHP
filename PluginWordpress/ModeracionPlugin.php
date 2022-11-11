<?php

/**
 * Plugin Name:       Moderation Plugin
 * Description:       Remplaza las palabras indicadas por otras menos problematicas
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Alex Fernandez
 * Author URI:        localhost
 * License:           GPL v2 or later
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

function renym_wordpress_typo_fix( $text ) {
    $textoProblematico = array("dios","mierda","pesetero","idiota","déspota","chaquetero","muerto");
    $correccion = array("Panda Rojo","popo","ahorrador","bufon","egoista","indeciso","en la otra vida");
    

    return str_replace( $textoProblematico, $correccion, $text );
}

add_filter( 'the_content', 'renym_wordpress_typo_fix' );