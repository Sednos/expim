<?php

	require("../../../../wp-load.php");

	if($_POST["post_type"] != "0" && $_POST["post_type"] != "users")
	{

		global $wpdb;

		$post_type = $_POST["post_type"];

		$db_posts = $wpdb->posts;

		// echo $db_posts;
		// exit;

		$query_posts = "select * from $db_posts";

		$result_posts = $wpdb->get_results( $query_posts );		

		var_dump($result_posts);
?>
		<table>
			<tr>
<?php

		
		foreach($result_posts as $post)
		{
			echo '<td>' . $post->ID . '</td>';
		}
		
	}