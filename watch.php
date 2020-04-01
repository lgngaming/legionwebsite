<?php include('./includes/head.php'); ?>
<?php $streamer = $_GET['name']?>
<html>
  <body>
  <div class="pageStreamBoxBG">
<h2>Stream: <?php echo $streamer;?></h2><div class="pageStreamBox"><div id="twitch-embed"></div></div></div>
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
<?php include('./includes/foot.php'); ?>