<div class="streamFeedWrap <?php
if (basename($_SERVER['PHP_SELF']) == 'streams.php') { echo 'grid-stream-feed'; }
else { echo 'slick-stream-feed'; }
?>">
<?php
$streampriority = $Stream->get_streams_by_priority();
$onlinestreams = 0;
$lgnonline = 0;
$otheronline = 0;
foreach ($streampriority as $stream){
    
    if ($stream['online'] == 1){
        $onlinestreams++;
        if ($stream['team'] == 'LGN'){
            $lgnonline = 1;
        }
        else {
            $otheronline++;
        }
    }
}
reset($streampriority);
if ($onlinestreams > 0){ ?>
<h2>Streams</h2>
<?php if(($lgnonline > 0)&&($otheronline > 0)){
    echo'<div class="streamToggler"><span class="allStreams">All Streams</span><span class="lgnStreams">Legion Streams</span></div>';
}
?>
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
 function initSlider(){
    if (($('.single-stream').length == 1)) {
        $('.slick-stream').addClass('only-stream');
    }
    if (($('.single-stream').length === 3)) {
        $('.slick-stream').addClass('three-stream');
    }
    if (($('.single-stream').length > 2)) {
    $('.slick-streams').slick({
        dots: false,
        arrows: true,
        prevArrow: '<span class="arrowWrap"><span type="button" class="slick-prev slick-arrow" style="display: block;" aria-label="Previous">&laquo;</span></span>',
        nextArrow: '<span class="arrowWrap"><span type="button" class="slick-next slick-arrow" style="display: block;" aria-label="Next">&raquo;</span></span>',
        draggable: true,
        infinite: true,
        speed: 600,
        centermode: true,
        autoplay: true,
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });
}
    }
    $(document).ready(function() {
	initSlider();
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