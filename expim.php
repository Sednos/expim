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

function register_expim_style() // Function to load css
{
	wp_enqueue_style( 'expim-style' , plugins_url( 'expim' ).'expim/css/expim.css' );
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
  		echo '<label><input type="checkbox" id="test1" value="test1">Users</label><br/>';
  		echo '<label><input type="checkbox" id="test2" value="test2">Posts</label><br/>';
  		echo '<label><input type="checkbox" id="test3" value="test3"></label><br/>';
  		echo '<label><input type="checkbox" id="test4" value="test1">Produits</label><br/>';
 		echo '</div>';
 		echo '<div class="import">';
 		echo '<p>Or <button>Import files</button>';
 		echo '</div>';
 	}
	
}

// Restant à faire : mettre de l'ajax pour faire un .load sur un .change des checkbox.
// Ensuite afficher les données dans un tableau




