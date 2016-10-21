<?php

	require("../../../../wp-load.php");

	if($_POST["post_type"] != "0" && $_POST["post_type"] != "users")
	{

		global $wpdb;

		$posts_type = $_POST["post_type"];

		$db_posts = $wpdb->posts;

		//$query_posts = "SELECT * FROM $db_posts WHERE post_type=$posts_type";

		$result_posts = $wpdb->get_results( 'SELECT * FROM ' . $db_posts . ' WHERE post_type="' . $posts_type . '"');

		$nb_checkbox = $wpdb->get_results( 'SELECT * FROM ' . $db_posts );
		
		echo '<table id="' . $posts_type . '" border="1">';
		echo '<thead>';
		echo '<tr>';

		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';		

		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		
		foreach($result_posts as $post)
		{
			echo '<tr>';
			echo '<td><input type="texte" value="' . htmlspecialchars($post->ID) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->post_author) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->post_date) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->post_date_gmt) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->post_content) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->post_title) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->post_excerpt) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->post_status) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->comment_status) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->ping_status) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->post_password) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->post_name) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->to_ping) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->pinged) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->post_modified) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->post_modified_gmt) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->post_content_filtered) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->post_parent) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->guid) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->menu_order) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->post_type) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->post_mime_type) . '"></td>';
			echo '<td><input type="texte" value="' .  htmlspecialchars($post->comment_count) . '"></td>';
			echo '</tr>';

		}

		echo '</tbody>';
		echo '</table>';
		
	}

	elseif($_POST["post_type"] == "users")
	{
		global $wpdb;

		$posts_type = $_POST["post_type"];

		$db_users = $wpdb->users;

		$result_users = $wpdb->get_results('SELECT * FROM ' . $db_users);

		echo '<table id="' . $posts_type . '" border="1">';
		echo '<thead>';
		echo '<tr>';

		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';
		echo '<th><input type="checkbox" checked></th>';		

		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		
		foreach($result_users as $users)
		{
			echo '<tr>';
			echo '<td><input type="texte" value="' . $users->ID . '"></td>';
			echo '<td><input type="texte" value="' . $users->user_login . '"></td>';
			echo '<td><input type="texte" value="' . $users->user_pass . '"></td>';
			echo '<td><input type="texte" value="' . $users->user_nicename . '"></td>';
			echo '<td><input type="texte" value="' . $users->user_email . '"></td>';
			echo '<td><input type="texte" value="' . $users->user_url . '"></td>';
			echo '<td><input type="texte" value="' . $users->user_registered . '"></td>';
			echo '<td><input type="texte" value="' . $users->user_activation_key . '"></td>';
			echo '<td><input type="texte" value="' . $users->user_status . '"></td>';
			echo '<td><input type="texte" value="' . $users->display_name . '"></td>';
			echo '</tr>';

		}

		echo '</tbody>';
		echo '</table>';
	}

