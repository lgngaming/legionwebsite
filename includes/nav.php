<nav class="navbar">
<div class="mobile-nav-header">
<div class="mobileLogo"><img src="<?php echo getenv('ROOT_URL'); ?>assets/img/logolgn.png" alt="Team Legion Logo"/></div>
<div class="menu-toggle"><span></span><span></span><span></span><span></span></div>
<script>
$(".menu-toggle").click(function(){
  $(".menu-toggle").toggleClass("menu-toggeled");
  $(".top-navigation").toggleClass("menu-toggled");
  $(".top-navigation").slideToggle();
});
</script>
</div>
<ul class="top-navigation">
<li><a href="<?php echo getenv('ROOT_URL'); ?>">Home</a></li>
<li><a href="<?php echo getenv('ROOT_URL'); ?>streams/">Streams</a></li>
<li><a href="//store.teamlegion.net">Merch</a></li>
<li class="logo"><img src="<?php echo getenv('ROOT_URL'); ?>assets/img/logolgn.png" alt="Team Legion Logo"/></li>
<li><a href="https://landoflegion.com/forum/" target="_blank">Forum</a></li>
<li><a href="https://www.patreon.com/bePatron?u=22278391&redirect_uri=https%3A%2F%2Flandoflegion.com%2F&utm_medium=widget" target="_blank">Donate</a></li>
<li><a href="https://landoflegion.com/index.php?register/" target="_blank">Join</a></li>
</ul>
</nav>
<div class="nav-spacer"></div>