<?php

	require("../../../../wp-load.php");

	if($_POST["post_type"] != "0" && $_POST["post_type"] != "users")
	{

		global $wpdb;

		$posts_type = $_POST["post_type"];

		$db_posts = $wpdb->posts;

		//$query_posts = "SELECT * FROM $db_posts WHERE post_type=$posts_type";

		$result_posts = $wpdb->get_results( 'SELECT * FROM ' . $db_posts . ' WHERE post_type="'.$posts_type.'"');

		$nb_checkbox = $wpdb->get_results( 'SELECT * FROM ' . $db_posts );

		echo '<table>';
		echo '<thead>';
		echo '<tr>';

		foreach ($nb_checkbox as $column) 
		{
			echo '<th><input type="checkbox" checked></th>';	
		}

		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		
		foreach($result_posts as $post)
		{
			echo '<tr>';
			echo '<td>' . $post->ID . '</td>';
			echo '<td>' . $post->post_author . '</td>';
			echo '<td>' . $post->post_date . '</td>';
			echo '<td>' . $post->post_date_gmt . '</td>';
			echo '<td>' . $post->post_content . '</td>';
			echo '<td>' . $post->post_title . '</td>';
			echo '<td>' . $post->post_excerpt . '</td>';
			echo '<td>' . $post->post_status . '</td>';
			echo '<td>' . $post->comment_status . '</td>';
			echo '<td>' . $post->ping_status . '</td>';
			echo '<td>' . $post->post_password . '</td>';
			echo '<td>' . $post->post_name . '</td>';
			echo '<td>' . $post->to_ping . '</td>';
			echo '<td>' . $post->pinged . '</td>';
			echo '<td>' . $post->post_modified . '</td>';
			echo '<td>' . $post->post_modified_gmt . '</td>';
			echo '<td>' . $post->post_content_filtered . '</td>';
			echo '<td>' . $post->post_parent . '</td>';
			echo '<td>' . $post->guid . '</td>';
			echo '<td>' . $post->menu_order . '</td>';
			echo '<td>' . $post->post_type . '</td>';
			echo '<td>' . $post->post_mime_type . '</td>';
			echo '<td>' . $post->comment_count . '</td>';
			echo '</tr>';

		}

		echo '</tbody>';
		echo '</table>';
		
	}