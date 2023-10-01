<?php
include "model.php";

 $read_id = $_POST['read_id']; 

$mode = new Model();
$row = $mode->read($read_id);

if(!empty($row)) {  ?>

<p>Title: <?=$row['title'];?></p>
<p>Description: <?=$row['description'];?></p>



<?php } 


?>

