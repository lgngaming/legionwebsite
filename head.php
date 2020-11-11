<?php
/* Header */
session_start();
?>
<?php
require('vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load(); ?>
<!DOCTYPE html>
<body>
<head>
<title>Legion rules</title>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" href="<?php echo getenv('ROOT_URL'); ?>assets/css/style.min.css?v=1.4">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Titillium+Web:500,700,900&display=swap" rel="stylesheet">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-04KTP49H18"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-04KTP49H18');
</script>
<?php
//load custom HEAD per page needed
if(isset($pagetype)){
//for debug
//echo 'pagetype: '.$pagetype;
?>
<script src="<?php echo getenv('ROOT_URL'); ?>vendor/tinymce/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
  selector: '#notificationTextarea',
  plugins: 'code',
  toolbar: 'code'
});
</script>
<?php
}
?>
</head>
<div class="content-wrap">

<?php include('assets/functions.php'); ?>
<?php include('assets/classes/database.php'); ?>
<?php include(getenv('PROJECT_PATH').'includes/nav.php'); ?>