<?php

	require("../../../../wp-load.php");


	global $wpdb;
		header("Content-type: text/csv; charset=utf-8");
		header("Content-disposition: attachment; filename=" . $_GET["post_type"] . "_expim_export.csv");
//var_dump($_GET["post_types"]);die();

/*$tamere = explode($_GET["post_types"], ",");
	foreach($tamere as $post){
		*/

		$post = $_GET["post_type"];

		$fp = fopen("php://output", "w");
		if($post == "users"){

			$db_users = $wpdb->users;

			$result_users = $wpdb->get_results('SELECT * FROM ' . $db_users);

			fputcsv($fp, array(
			"id;",
			"ID;",
			"user_login;",
			"user_pass;",
			"user_nicename;",
			"user_email;",
			"user_url;",
			"user_registered;",
			"user_activation_key;",
			"user_status;",
			"display_name;",
			));

			foreach($result_users as $field){
			    fputcsv($fp, array(
			    	"$field->ID;",
					"$field->user_login;",
					"$field->user_pass;",
					"$field->user_nicename;",
					"$field->user_email;",
					"$field->user_url;",
					"$field->user_registered;",
					"$field->user_activation_key;",
					"$field->user_status;",
					"$field->display_name"
			    ));	
			}  
			fclose($fp);	
		} else{
			$db_posts = $wpdb->posts;

			$result_posts = $wpdb->get_results( 'SELECT * FROM ' . $db_posts . ' WHERE post_type="' . $post . '"');

			fputcsv($fp, array(
			"id;",
			"post_author;",
			"post_date;",
			"post_date_gmt;",
			"post_content;",
			"post_title;",
			"post_excerpt;",
			"post_status;",
			"comment_status;",
			"ping_status;",
			"post_password;",
			"post_name;",
			"to_ping;",
			"pinged;",
			"post_modified;",
			"post_modified_gmt;",
			"post_content_filtered;",
			"post_parent;",
			"guid;",
			"menu_order;",
			"post_type;",
			"post_mime_type;",
			"comment_count \n"
			));

			foreach($result_posts as $field){
			    fputcsv($fp, array(
			    	$field->ID
			    	));
			} 
			fclose($fp);

		}
	/*}*/
	exit();
