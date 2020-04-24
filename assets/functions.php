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
	
    function isMobileDevice() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    function callAPI($method, $url, $data){
        $curl = curl_init();
        switch ($method){
           case "POST":
              curl_setopt($curl, CURLOPT_POST, 1);
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              break;
           case "PUT":
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
              break;
           default:
              if ($data)
                 $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
           'APIKEY: 111111111111111111111',
           'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;
     }

     function clean($string) {
        return preg_replace('/[^A-Za-z0-9\- ]/', '', $string); // Removes special chars.
     }
     
?>