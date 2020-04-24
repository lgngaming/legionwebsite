<div class="streamFeedWrap <?php
if (basename($_SERVER['PHP_SELF']) == 'streams.php') { echo 'grid-stream-feed'; }
else { echo 'slick-stream-feed'; }
?>">
<?php
$streampriority = $Stream->get_streams_by_priority();
$nostreams = 1;
foreach ($streampriority as $stream){
    if ($stream['online'] == 1){
        $nostreams = 0;
    }
}
reset($streampriority);
if ($nostreams == 0){ ?>
<h2>Streams</h2>
    <div class="streamToggler"><span class="allStreams">All Streams</span><span class="lgnStreams">Legion Streams</span></div>
    <div class="slick-streams">
    <?php

foreach ($streampriority as $stream){
    if ($stream['online'] == 1){
        $streamer = $stream['twitch_name'];   
    echo '<div class="single-stream '.$stream['team'].'"><div class="stream-info-block"><a href="'.$_ENV['ROOT_URL'].'watch.php?name='.$streamer.'" class="streamer-name">'.$streamer.'</a><span class="viewer-count">Viewers: '.$stream['current_viewer_count'].'</span></div><img src="https://static-cdn.jtvnw.net/previews-ttv/live_user_'.$streamer.'-450x253.jpg"><div class="streamer-live-title"><span class="live-title-name">'.$stream['current_stream_title'].'</span></div></div>';
    }
}
?>
</div>
</div>
<?php
if (basename($_SERVER['PHP_SELF']) == 'index.php') { 
?> 
<script>
    $(document).ready(function() { 
    if (($('.slider .slick-slide').length = 2)) {

        // remove arrows
        //$('.slider__arrow').hide();
        slidesToShow: 1,
  slidesToScroll: 1,
        $('.slick-streams').slick({
            responsive: [
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
      }
    }
  ]
        });
    }
    if (($('.slider .slick-slide').length > 2)) {

// remove arrows
$('.slider__arrow').show();
});
    }
$('.slick-streams').slick({
  dots: false,
  arrows: true,
  draggable: true,
  infinite: true,
  speed: 600,
  mobileFirst:true,
  centermode:true,
  autoplay: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1350,
      settings: {
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
      }
    }
  ]
});
});
</script>
<script>
    $(".allStreams").click(function () {
        $('.slick-streams').children().show('single-stream');
      });
      $(".lgnStreams").click(function () {
        $('.slick-streams').children().toggle('Other');
      });
</script>
<?php } 
}
?>