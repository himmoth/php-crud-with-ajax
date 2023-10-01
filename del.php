<?php
include "model.php";

 $del_id = $_POST['del_id']; 

$mode = new Model();
$del = $mode->del($del_id);

