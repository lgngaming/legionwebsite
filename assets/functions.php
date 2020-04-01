<?php
function file_get_contents_curl($url) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);     
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Client-ID: l29wjnz0n6rlg0jaargufdlt6m1yfr'
	));

	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function tableExists($db, $table)
{
    $results = $db->query("SHOW TABLES LIKE '$table'");
    if(!$results) {
        die(print_r($db->errorInfo(), TRUE));
    }
    if($results->rowCount()>0){echo 'table exists';}
}


if(isset($_POST['post_notify'])){
	postnotify($_POST['post_notify']);
	}
	
	
	function postnotify($args) {
		$status = $args['status'];
		$message = $args['message'];
		popnotification($status, $message);
	}
	
	function popnotification($status, $message){
		echo '<div class="notification '.strtolower($status).'">';
			echo '<span class="status">'.$status.'</span>'; 
			echo '<p class="notificationMessage">'.$message.'</p>';
		echo '</div>';
	}
	

?>