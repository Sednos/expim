<?php

	require("../../../../wp-load.php");


	global $wpdb;
		header("Content-type: text/csv; charset=utf-8");
		header("Content-disposition: attachment; filename=" . $_GET["post_type"] . "_expim_export.csv");
//var_dump($_GET["post_types"]);die();

/*$tamere = explode($_GET["post_types"], ",");
	foreach($tamere as $post){
		*/
		
		$post = $_GET["post_types"];

		$fp = fopen("php://output", "w");
		if($post == "users"){

			$db_users = $wpdb->users;

			$result_users = $wpdb->get_results('SELECT * FROM ' . $db_users);

			fputcsv($fp, array(
			"id"
			));

			foreach($result_users as $field){
			    fputcsv($fp, array(
			    	$field->ID
			    ));	
			}  
			fclose($fp);	
		} else{
			$db_posts = $wpdb->posts;

			$result_posts = $wpdb->get_results( 'SELECT * FROM ' . $db_posts . ' WHERE post_type="' . $post . '"');

			fputcsv($fp, array(
			"id"
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
