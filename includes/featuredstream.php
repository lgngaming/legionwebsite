<?php 
$streampriority = $Stream->get_streams_by_priority();
$streamer = '';
$nostreams = 0;
while($streamer == ''){
foreach ($streampriority as $stream){
if ($stream['online'] == 1){
    if ($streamer == ''){
$streamer = $stream['twitch_name'];
    }
}
}
reset($streampriority);
//case if no stream is online, default to top priority
if($streamer == ''){$streamer = $streampriority[0]['twitch_name'];
$nostreams = 1;}
}
if ($nostreams == 1){ ?>
<div class="pageStreamBoxBG">
<h2>No Streams Are Currently Live<span class="subh2">Check back in a little while</span></h2></div>
<?php }
else {
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
    layout: "<?php if(isMobileDevice()){ echo "video"; } else { echo "video-with-chat"; }?>",
    autoplay: false
  });

  embed.addEventListener(Twitch.Embed.VIDEO_READY, () => {
    var player = embed.getPlayer();
    player.play();
  });
</script>
<?php } ?>