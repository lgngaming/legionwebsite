
<!--
<div class="announceFlex"><div class="announceImage"><img src="<?php echo $_ENV['ROOT_URL'];?>/assets/img/merch_hat.png"/></div>
<div class="announceBox">
<span class="announceHeadline">― Web Update ―</span>
<span class="announceLine1">The Legion Store is now online!</span>
<span class="announceLine2">Click <a href="/">Here</a> to visit</span>
</div>
</div>
-->
<?php
$notificationbar = $Stream->get_notificationbar();
//print_r($notificationbar);
if(sizeof($notificationbar) > 0){
    if(($notificationbar['enabled'] == 'on') || (isset($pagetype))){
    echo '<div class="announceWrapper">';
echo $notificationbar['notificationtext'];
    echo '</div>';
    if($notificationbar['css'] !== ''){
echo '<style>'.$notificationbar['css'].'</style>';
    }
}
}

?>
