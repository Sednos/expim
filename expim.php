<?php
/*
Plugin Name: Expim
Description: Plugin permettant d'exporter des données au format .csv, ainsi que d'importer des données. 
Version: 0.1
Author: Nicolas Gosset
License: GPL2
*/

// Ajouter le lien dans le menu
add_action( 'admin_menu', 'expim_setup_menu' );
add_action( 'admin_print_styles', 'register_expim_style' ); //Add css
add_action( 'admin_print_scripts', 'register_expim_scripts' ); //Add js

function register_expim_style() // Function to load css
{
	wp_enqueue_style( 'expim-style' , plugins_url( 'expim/css/expim.css' ) );
}

function register_expim_scripts() // Function to load js
{
	wp_enqueue_script( 'expim-scripts' , plugins_url( 'expim/js/expim.js' ) );
}


//Lier le lien à la page du plugin

function expim_setup_menu() 
{
	add_menu_page( 'Expim', 'Expim', 'administrator', 'expim', 'settings_page' );	
}

// Définir le contenu de la page
function settings_page() {
	if (!current_user_can( 'administrator' ))  
	{
   		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 	}
 	else
 	{
 		echo '<h1 id="h1_expim">'.get_admin_page_title().'</h1>';

 		echo '<div class="wrap">';
  		echo '<div class="data">';
  		echo '<h2>Select data you want export</h2>';
  		echo '<label><input type="checkbox" id="users" value="users">users</label><br/>';

  		foreach ( get_post_types( '', 'names' ) as $post_type ) {

   			echo '<label><input type="checkbox" id="' . $post_type . '" value="' . $post_type . '">' . $post_type . '</label><br/>';
   			
		}

 		echo '</div>';
 		echo '<div class="import">';
 		echo '<p>Or <input type="submit" id="import" class="button action" value="Import file">';
 		echo '</div>';
 		echo '<div id="show_data">';
 		echo '</div>';
 		echo '<input type="submit" id="export" class="button action" value="Export data">';
 	}
	
}

// Restant à faire : mettre de l'ajax pour faire un .load sur un .change des checkbox.
// Ensuite afficher les données dans un tableau




