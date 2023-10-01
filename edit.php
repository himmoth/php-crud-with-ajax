<?php
include 'model.php';

$edit_id = $_POST['edit_id'];

$mode = new Model();
$row = $mode->edit($edit_id);

if (!empty($row)) {
?>

    <form action='' method='post' id='form'>
    <div class='form-group mb-3'>
            <input type='hidden' name="id"  id='edit_id' value="<?=$row['id'];?>" >
        </div>
        <div class='form-group mb-3'>
            <label for='title'> Title</label>
            <input type='text' name='title' id='edit_title' class='form-control'value="<?=$row['title'];?>" >
        </div>
        <div class='form-group  mb-3'>
            <label for='description'> Description</label>
            <textarea  id='edit_description' name='description' class='form-control' cols='3' rows='3'>
          <?=$row['description'];?> </textarea>
        </div>
       
    </form>

<?php }
