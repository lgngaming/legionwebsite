<div class="streamFeedWrap">
<h2>Other Streams</h2>
<div class="streamToggler"><span class="allStreams">All Streams</span><span class="lgnStreams">Legion Streams</span></div>
<div class="slick-streams">
<div class="single-stream"><img src="assets/img/streamscreen.jpg"/></div>
<div class="single-stream"><img src="assets/img/streamscreen.jpg"/></div>
<div class="single-stream"><img src="assets/img/streamscreen.jpg"/></div>
<div class="single-stream"><img src="assets/img/streamscreen.jpg"/></div>
<div class="single-stream"><img src="assets/img/streamscreen.jpg"/></div>
<div class="single-stream"><img src="assets/img/streamscreen.jpg"/></div>
</div>
</div>
<script>
    $(document).ready(function() { 
$('.slick-streams').slick({
  dots: false,
  arrows: false,
  draggable: true,
  infinite: true,
  speed: 600,
  mobileFirst:true,
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