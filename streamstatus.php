<?php
if (php_sapi_name() === 'cli') {
    //echo "Successfully started   from command line! \n";

require('vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
include('assets/classes/database.php');
include('assets/functions.php'); 
//include_once('secure/common.php');
include_once('assets/classes/streams.php');
$mypdo = new MyPDO('mysql:host=localhost;dbname=twitchdb;charset=utf8');
$Stream = new Stream($mypdo);
$streampriority = $Stream->get_streams_by_priority();
$twitchAPIclientID = $_ENV['TWITCH_API_CLIENT_ID'];
$twitchAPIsecret = $_ENV['TWITCH_API_SECRET'];

$url = "https://id.twitch.tv/oauth2/token";                                                                       
                                                                                                                                                                               
                                                                                                           
 $curl = curl_init();
 $auth_data = array(
     'client_id' 		=> $twitchAPIclientID,
     'client_secret' 	=> $twitchAPIsecret,
     'grant_type' 		=> 'client_credentials'
 );
 curl_setopt($curl, CURLOPT_POST, 1);
 curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
 curl_setopt($curl, CURLOPT_URL, $url);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 $result = curl_exec($curl);
 if(!$result){die("Connection Failure");}
 curl_close($curl);
 echo $result;
 $jresult = json_decode($result);
 print_r($jresult);
$token = $jresult->access_token;
//echo 'Access Token: '.$token;

foreach ($streampriority as $stream){
$z = 0;
    $header_items = array("Client-ID" => $twitchAPIclientID);                                                                    
    $curl_headers = json_encode($header_items);
    $url = "https://api.twitch.tv/helix/streams?user_login=".$stream['twitch_name'];                                                                       
                                                                                                                         
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_HTTPHEADER => array(
           'Client-ID: ' . $twitchAPIclientID,
           'Authorization: Bearer '.$token
        ),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => $url
     ));                                                                  
                                                                                                               
                                                                                                                         
    $result = curl_exec($ch);
    //var_dump(json_decode($result, true));
    $return = json_decode($result, true);
 
    print_r($result);
    print_r($return);
    if(count($return['data']) > 0)
    {
        //echo 'show is live: ' .$return['data'][0]['title'];
        $current_stream_title = $return['data'][0]['title'];
        $current_viewer_count = $return['data'][0]['viewer_count'];
        $Stream->updateStreamOnline($stream['id'], 1, $current_stream_title, $current_viewer_count);
    }
    else {
        //echo 'streamer '.$stream['twitch_name']. ' is offline';
        $Stream->updateStreamOnline($stream['id'], 0, 'Offline', 0);
    }
    }
}
    else {
        //echo "Update script must be launched through CLI! \n";
    }
?>