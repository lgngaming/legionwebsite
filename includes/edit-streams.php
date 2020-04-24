<?php
echo '<div class="streamEditPage">';
include_once('secure/common.php');
include_once('assets/classes/streams.php');
$mypdo = new MyPDO('mysql:host=localhost;dbname=twitchdb;charset=utf8');
$Stream = new Stream($mypdo);
$rows = $Stream->get_streams();
//print_r($_POST);
if(isset($_POST['addStream'])){
$twitchname = $_POST['twitch_name'];
$teamname = $_POST['team'];
$Stream->addStream($twitchname, $teamname);
}
if(isset($_POST['removeStream'])){
  $streamID = $_POST['streamID'];
  $Stream->removeStream($streamID);
  }
  if(isset($_POST['updateStream'])){
    $streamID = $_POST['streamID'];
    $twitchname = $_POST['twitchname'];
    $teamname = $_POST['team'];
    $Stream->updateStream($streamID, $twitchname, $teamname);
    }
    if(isset($_POST['streamOrder'])){
      $order = $_POST['row_order'];
      $Stream->update_stream_order($order);
    }
echo '<h1>Twitch Streams</h1>';
echo '<div class="addStream">
<span class="addStreamButton">Add New Stream</span>
<div class="addStreamFormWrapper"><form action="" method="POST" class="addStreamForm">
<input type="text" name="twitch_name" placeholder="Twitch Name"/>
<select name="team" class="teamSelect"><option selected="selected">LGN</option><option>Other</option></select>
<input type="submit" class="streamAddSubmit" value="Add Stream" name="addStream"/>
</form></div></div>';
?>
<script>
  $('.addStreamButton').click(function(){
    $('.addStreamForm').slideToggle();
  });
</script>
<?php
echo '<div class="streamEditList">';
foreach($rows as $stream){
echo '<div class="single-stream"><form action="" method="POST" name="editStream">';
echo '<input type="hidden" name="streamID" value="'.$stream['id'].'"/>';
echo '<input type="submit" class="removeButton" value="X" name="removeStream" onclick="return confirm(\'Are you sure you want to delete twitch user: '.$stream['twitch_name'].'?\')">';
echo '<input type="text" name="twitchname" value="'.$stream['twitch_name'].'"/>';
echo '<select name="team"><option';
if($stream['team'] == 'LGN'){ echo ' selected="selected">LGN</option><option>Other</option>"';}
else {
echo '>LGN</option><option selected="selected">Other</option></select>';
}
echo '<input type="submit" class="updateButton" value="Update" name="updateStream">';
echo '</form></div>';
}
echo '</div>';
echo '<h2 class="fStream">Featured Stream</h2>';
?>
<div class="featuredStream">
<span class="fStreamTitle">Drag & drop streams to assign which should appear as "featured" first</span>
<form action="" method="POST" name="featuredStream">
<ul name="featuredSelect" id="sortable-row" class="priority-list">
<?php $priority_rows = $Stream->get_streams_by_priority();
foreach($priority_rows as $stream){
echo '<li class="ui-state-default" id="'.$stream['id'].'">'.$stream['twitch_name'].'</li>';
}
?>
</ul>
<input type = "hidden" name="row_order" id="row_order" />
<input type="submit" class="btnSave" name="streamOrder" value="Save Order" onClick="saveOrder();" />
</form>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#sortable-row" ).sortable();
  });
  
  function saveOrder() {
	var selectedLanguage = new Array();
	$('ul#sortable-row li').each(function() {
	selectedLanguage.push($(this).attr("id"));
	});
	document.getElementById("row_order").value = selectedLanguage;
  }
</script>
</div>
<?php
echo '</div>';
?>