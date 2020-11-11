<?php
class Stream
{
     /* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $mypdo) {
        $this->conn = $mypdo;
    }
    /* Create customers table */
    public function create_streams_table() {
        return $this->conn->run("CREATE TABLE IF NOT EXISTS `streams` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `twitch_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
            `team` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
            `online` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
            `current_stream_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
            `current_viewer_count` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
            `priority` INT(255) COLLATE utf8_unicode_ci NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `twitch_name` (`twitch_name`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;");
    }

        /* Create NotificationBar table */
        public function create_notfcbar_table() {
            return $this->conn->run("CREATE TABLE IF NOT EXISTS `notificationbar` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `enabled` varchar(255) NOT NULL,
                `css` text NOT NULL,
                `notificationtext` text NOT NULL,
                PRIMARY KEY (`id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;");
        }

    /* List all users */
    public function get_streams() {
        return $this->conn->query("SELECT * FROM streams ORDER BY twitch_name ASC")->fetchAll();
    }
    public function get_streams_by_priority() {
        return $this->conn->query("SELECT * FROM streams ORDER BY priority ASC")->fetchAll();
    }
public function get_online_streams() {
        return $this->conn->query("SELECT * FROM streams WHERE online = 1 ORDER BY twitch_name ASC")->fetchAll();
    }
    public function get_stream($name){
        return $this->conn->run("SELECT * FROM streams WHERE twitch_name=?",[$name])->fetch();
    }

     public function get_stream_from_ID($id){
        return $this->conn->run("SELECT * FROM streams WHERE id=?",[$id])->fetch();
    }

    public function get_last_priority(){
        $result = $this->conn->run("SELECT priority FROM streams ORDER BY priority DESC LIMIT 1")->fetch();
        $lastpriority = $result['priority'];
        return $lastpriority;
    }

    public function get_notificationbar() {
        return $this->conn->query("SELECT * FROM notificationbar")->fetch();
    }

    public function addStream($name, $team){
        if($this->get_stream($name)) {
       popnotification('error', 'Stream exists');
        }
        else {
        $this->storeStream($name, $team);
        }
    }

    public function removeStream($id){
        if(!$this->get_stream_from_ID($id)) {
       popnotification('error', 'Stream doesn\'t exists');
        }
        else {
            try {
            $this->conn->run("DELETE FROM streams WHERE id = ?",[$id]);
            $caught = false;
            }
            catch (PDOException $e){
                popnotification('error', $e);
                throw $e;
                $caught = true;
                }
                if(!$caught){
                    popnotification('success', 'Successfully removed stream');
                    echo "<meta http-equiv=\"refresh\" content=\"3;URL=admin.php\">";
                }
        }
    }

        public function updateStream($id, $newname, $team){
            if(!$this->get_stream_from_ID($id)) {
                popnotification('error', 'Stream doesn\'t exists');
                 }
        else {
        try {
    $this->conn->run("Update streams SET twitch_name = ?, team = ? WHERE id = ?",[$newname, $team, $id]);
    $caught = false;
    }
    catch (PDOException $e){
    popnotification('error', $e);
    throw $e;
    $caught = true;
    }
    if(!$caught){
        popnotification('success', 'Successfully updated stream name to: '.$newname.' and team to: '.$team);
    echo "<meta http-equiv=\"refresh\" content=\"3;URL=admin.php\">";
    }
        }
        
    }

    public function updateStreamOnline($id, $status, $current_stream_title, $current_viewer_count){

        if(!$this->get_stream_from_ID($id)) {
            popnotification('error', 'Stream doesn\'t exists');
             }
    else {
    try {
        //SANITIZE THE TITLE
        $current_stream_title = stripslashes($current_stream_title);
        $current_stream_title = htmlspecialchars($current_stream_title);
        $current_stream_title = clean($current_stream_title);
$this->conn->run("Update streams SET online = ?, current_stream_title = ?, current_viewer_count = ? WHERE id = ?",[$status, $current_stream_title, $current_viewer_count, $id]);
$caught = false;
}
catch (PDOException $e){
throw $e;
}
    }    
}

    public function storeStream($name, $team){
        $priority = $this->get_last_priority();
        //add +1 to the highest priority for the new stream
        $priority++;
    try {
    $this->conn->run("INSERT INTO streams (twitch_name, team, online, priority) VALUES (?,?,'0', ?)",[$name, $team, $priority]);
    $caught = false;
    }
    catch (PDOException $e){
    popnotification('error', $e);
    throw $e;
    $caught = true;
    }
    if(!$caught){
    popnotification('Success', 'Streamer  '.$name.' successfully added.');
    echo "<meta http-equiv=\"refresh\" content=\"3;URL=admin.php\">";
    }
}

public function update_stream_order($order){
    $order = explode(',', $order);
    $priority = 1;
    foreach($order as $stream){
    $this->conn->run("UPDATE streams SET priority = ? WHERE id=?",[$priority, $stream]);
    $priority++;
    }
    //echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php\">";
}

public function update_notification($notificationIO, $notificationText, $notificationCSS){
    if(!$this->get_notificationbar()) {
 //notification bar doesn't exist, set up a new one
 try {
    $this->conn->run("INSERT INTO notificationbar (enabled, css, notificationtext) VALUES (?,?,?)",[$notificationIO, $notificationCSS, $notificationText]);
    $caught = false;
    }
    catch (PDOException $e){
    popnotification('error', $e);
    throw $e;
    $caught = true;
    }
         }
         else {
//update existing notification bar
try {
    $this->conn->run("UPDATE notificationbar SET enabled = ?, notificationtext = ?, css = ?",[$notificationIO, $notificationText, $notificationCSS]);
}
catch (PDOException $e){
popnotification('error', $e);
throw $e;
$caught = true;
}
         }
    //echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php\">";
}

    
}
?>