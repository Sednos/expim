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

// function export_data_expim()
// {
// 	header("Content-type: application/vnd.ms-excel; charset=utf-8");
// 	header("Content-disposition: attachment; filename=expim_export.csv");

// 	global $wpdb;

// 	if(isset($_POST['post']))
// 	{
// 		$post_type = htmlspecialchars($_POST['post']);


// 	$result_posts = $wpdb->get_results( 'SELECT * FROM ' . $db_posts . ' WHERE post_type="' . $_POST['post'] . '"');


//        	foreach ($result_posts as $expim_post) {
//          $csv_string_post = utf8_decode($expim_post->ID.';'.$expim_post->post_author.';'.$expim_post->post_date."\n");
//          echo $csv_string_post;
//        }
// 	}


// 	if(isset($_post['users']))
// 	{
// 		$db_users = $wpdb->users;

// 		$result_users = $wpdb->get_results('SELECT * FROM ' . $db_users);

// 		foreach ($result_users as $expim_users) {
//          $csv_string_user = utf8_decode($expim_users->ID.';'.$expim_users->user_login.';'.$expim_users->user_pass."\n");
//          echo $csv_string_user;
//        }
// 	}
// }

// add_action('admin_post_expim_export', 'export_data_expim');

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
  		echo '<div class="data expim_sednos">';
  		echo '<h2>Select data you want export</h2>';

  		echo '<label><input type="checkbox" id="users" value="users" data-value="0">users</label><br/>';

  		foreach ( get_post_types( '', 'names' ) as $post_type ) {

    		echo '<input type="checkbox" name="' . $post_type . '" id="' . $post_type . '" value="' . $post_type . '" data-value="0">' . $post_type . '<br/>';
   			
		}

 		echo '</div>';
 		echo '<div class="import">';
 		echo '<p>Or <input type="submit" id="import" class="button action" value="Import file">';
 		echo '</div>';
 		echo '<div id="show_data">';
 		echo '</div>';
 	// 	echo '<form action="' . admin_url('admin-post.php') . '" method="post" class="expim_sednos">';
 	// 	echo '<input type="hidden" name="action" value="expim_export">';

 	// 	foreach ( get_post_types( '', 'names' ) as $post_type ) {

  //  			echo '<input type="checkbox" name="' . $post_type . '" id="' . $post_type . '" value="' . $post_type . '" data-value="0">' . $post_type . '<br/>';
   			
		// }
		echo '<input type="submit" id="expim_export" class="button action" value="Export data">';
 		echo '</form>';
 	}
	
}

// Restant à faire : mettre de l'ajax pour faire un .load sur un .change des checkbox.
// Ensuite afficher les données dans un tableau




