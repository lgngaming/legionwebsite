<?php
echo '<div class="streamersBox"><ul>';

foreach ($streampriority as $stream){
  $stream_name = $stream['twitch_name'];
  if ($stream['online'] == 1){
  $url = 'https://api.twitch.tv/helix/streams?user_login='.$stream_name;
$json_array = json_decode(file_get_contents_curl($url), true);
echo '<li class="online"><a href="./watch.php?name='.$stream_name.'">'.$stream_name .' <span class="onlineHighlight">Online</span></a></li>';
  }
  else {
    echo '<li class="offline">'.$stream_name .' <span class="offlineHighlight">Offline</span></li>';
  }
}  

echo '</ul></div>';

?>
