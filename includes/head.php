<?php
/* Header */
?>
<?php

require('vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
include('assets/functions.php'); 
?>
<!DOCTYPE html>
  <body>
<head>
<title>Team Legion Gaming Community - Welome</title>
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#d90000">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" href="<?php echo getenv('ROOT_URL'); ?>assets/css/style.min.css?v=1.4">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Titillium+Web:500,700,900&display=swap" rel="stylesheet">
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-04KTP49H18');
</script>
</head>
<div class="content-wrap">

<?php// include('classes/database.php'); ?>
<?php include(getenv('PROJECT_PATH').'includes/nav.php'); ?>