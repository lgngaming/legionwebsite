<?php
$Stream->create_notfcbar_table();
$notificationBar = $Stream->get_notificationbar();
//print_r($notificationBar);

?>
<div class="editNotificationSection">
<h2>Notification Settings</h2>
<form action="" method="POST" class="noficiationEditForm">
<div class="notifyIOstatus"><span class="notificationIOTitle">Make Notification Live?</span>
<label for="notificationOn">On</label>
<input type="radio" id="notificationOn" name="notificationIO" value="on"<?php
if(!empty($notificationBar['enabled'])){
    if($notificationBar['enabled'] == 'on'){
        echo ' checked';
    }
    }
    ?>>
<label for="notificationOff">Off</label>
<input type="radio" id="notificationOff" name="notificationIO" value="off"<?php
if(!empty($notificationBar['enabled'])){
    if($notificationBar['enabled'] == 'off'){
        echo ' checked';
    }
    }
    ?>>
<div class="toggleEdit"><span class="editBtn">Edit Notification</span></div></div>
<div class="editBox">
<textarea id="notificationTextarea" name="notificationText">
<?php
if(!empty($notificationBar['notificationtext'])){
    echo $notificationBar['notificationtext'];
        }
    ?>
</textarea>
<div class="toggleEdit">Edit CSS</div>
<textarea name="notificationCSS" class="notificationCSS">
<?php
if(!empty($notificationBar['css'])){
echo $notificationBar['css'];
    }
    ?>
</textarea>
</div>
<div class="saveNotification"><input type="submit" name="notificationEditSubmit" value="save"/></div>
</form>
<?php
echo '<h2>Notification Preview</h2>';
include('./includes/admin-announcement.php');
echo '<h3>End Notification Preview</h3>';
?>
</div>