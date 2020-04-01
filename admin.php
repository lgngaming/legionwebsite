
<?php include('head.php'); ?>

<?php
//print_r($_SESSION);
    if(empty($_SESSION['user'])) 
    { 
        include('secure/login.php');
    }
    else {
include('includes/edit-streams.php');
    }
      ?>
<?php include('includes/foot.php'); ?>