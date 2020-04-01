<?php 
$streampriority = $Stream->get_streams_by_priority();
$streamer = '';
while($streamer == ''){
foreach ($streampriority as $stream){
if ($stream['online'] == 1){
$streamer = $stream['twitch_name'];
}

}
//case if no stream is online, default to top priority
if($streamer == ''){$streamer = $streampriority[0]['twitch_name'];}
}
?>
<div class="pageStreamBoxBG">
<h2>Featured Stream</h2><div class="pageStreamBox"><div id="twitch-embed"></div></div></div>
<script src="https://embed.twitch.tv/embed/v1.js"></script>
<script type="text/javascript">
  var embed = new Twitch.Embed("twitch-embed", {
    width: 1250,
    height: 515,
    channel: "<?php echo $streamer; ?>",
    theme: "dark",
    layout: "video-with-chat",
    autoplay: false
  });

  embed.addEventListener(Twitch.Embed.VIDEO_READY, () => {
    var player = embed.getPlayer();
    player.play();
  });
</script>