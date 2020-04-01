<?php
/* Header */
?>

<!DOCTYPE html>
  <body>
<head>
<title>Legion rules</title>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" href="<?php echo('assets/css/style.min.css');?>">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Titillium+Web:500,700,900&display=swap" rel="stylesheet">

</head>
<div class="content-wrap">
<?php

require('vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load(); ?>
<?php include('assets/functions.php'); ?>
<?php// include('classes/database.php'); ?>
<?php include('./includes/nav.php'); ?>