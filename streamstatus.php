<?php
if (php_sapi_name() === 'cli') {
    echo "Successfully started   from command line! \n";

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
foreach ($streampriority as $stream){

    $header_items = array("Client-ID" => $twitchAPIclientID);                                                                    
    $curl_headers = json_encode($header_items);
    $url = "https://api.twitch.tv/helix/streams?user_login=".$stream['twitch_name'];                                                                       
                                                                                                                         
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_HTTPHEADER => array(
           'Client-ID: ' . $twitchAPIclientID
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
/*
    if ($stream['online'] == 1){
    $streamer = $stream['twitch_name'];
    echo $streamer . ' online' . PHP_EOL;
    }
    else {
        $streamer = $stream['twitch_name'];
        echo $streamer . ' offline' . PHP_EOL;
    }
    */
    }
}
    else {
        echo "Update script must be launched through CLI! \n";
    }
?>