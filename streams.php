
<?php include('head.php'); ?>
<?php include('assets/classes/streams.php'); 
$mypdo = new MyPDO('mysql:host=localhost;dbname=twitchdb;charset=utf8');
$Stream = new Stream($mypdo);
?>
<?php include('includes/featuredstream.php'); ?>

<?php include('includes/streamfeed.php'); ?>

<?php// include('includes/connectUs.php'); ?>

<?php// include('includes/streamlist.php'); ?>

<?php include('includes/foot.php'); ?>