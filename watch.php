<?php include('head.php'); ?>
<?php include('./assets/classes/streams.php'); 
$mypdo = new MyPDO('mysql:host=localhost;dbname=twitchdb;charset=utf8');
$Stream = new Stream($mypdo);
?>
<?php include('./includes/admin-announcement.php'); ?>

<?php $streamer = $_GET['name']?>
<html>
  <body>
  <div class="pageStreamBoxBG">
<h2>Stream: <?php echo $streamer;?></h2><div class="theatremode"><div class="pageStreamBox"><div id="twitch-embed"></div></div></div><div class="goBig"><span class="goBigBtn">Theater Mode</span></div></div>
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
    //player.play();
  });
</script>
<script>
	$('.goBigBtn').click(function() {
        $(".pageStreamBoxBG").toggleClass("theatreon");
        $([document.documentElement, document.body]).animate({
        scrollTop: $("#pageStreamBoxBG").offset().top
    }, 500);
});
</script>

<?php include('./includes/streamfeed.php'); ?>

<?php include('./includes/connectUs.php'); ?>

<?php include('./includes/eventCalendar.php'); ?>
<?php include('./includes/foot.php'); ?>