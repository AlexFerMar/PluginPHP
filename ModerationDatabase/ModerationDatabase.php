<?php

/**
 * Plugin Name:       Moderation Plugin(db)
 * Description:       Remplaza palabras problematicas almacenadas en una base de datos
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Alex Fernandez
 * Author URI:        localhost
 * License:           GPL v2 or later
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

function crearTabla()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $table = $wpdb->prefix . 'correccionMalsonantes';


    if (!($this->db->table_exists($table))) {


        $sql = "CREATE TABLE $table (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        malsonante text NOT NULL,
        correccion text NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

        //Ejemplos de malsonantes
        $sql1= "INSERT INTO $table (malsonante, correccion) VALUES ('dios', 'Panda Rojo')";
        $sql2= "INSERT INTO $table (malsonante, correccion) VALUES ('mierda', 'popo')";
        $sql3= "INSERT INTO $table (malsonante, correccion) VALUES ('pesetero', 'ahorrador')";
        $sql4= "INSERT INTO $table (malsonante, correccion) VALUES ('idiota', 'bufon')";
        $sql5= "INSERT INTO $table (malsonante, correccion) VALUES ('déspota', 'egoista')";
        $sql6= "INSERT INTO $table (malsonante, correccion) VALUES ('chaquetero', 'indeciso')";
        $sql7= "INSERT INTO $table (malsonante, correccion) VALUES ('muerto', 'en la otra vida')";


        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        //Creacion de la tabla
        dbDelta($sql);

        //Insercion de los ejemplos
        dbDelta($sql1);
        dbDelta($sql2);
        dbDelta($sql3);
        dbDelta($sql4);
        dbDelta($sql5);
        dbDelta($sql6);
        dbDelta($sql7);

    }


}

add_action('plugins_loaded', 'crearTabla');


function moderacionMalsonante($text)
{
    global $wpdb;
    $table = $wpdb->prefix . 'correccionMalsonantes';

    $malsonantes = dbDelta("SELECT malsonante FROM $table");
    $correccion = dbDelta("SELECT correccion FROM $table");

    return str_replace($malsonantes, $correccion, $text);
}

add_filter('the_content', 'moderacionMalsonante');


