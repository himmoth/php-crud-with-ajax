<?php
include "model.php";



$model = new Model();
$rows = $model->fetch();   

?>

<table class="table table-bordered">
  <thead>
    <tr>
      <th >#</th>
      <th >Title</th>
      <th >Description</th>
      <th >Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
        if(!empty($rows)){ 
            foreach( $rows as $row){ ?>
    <tr>
      <td ><?=$i++?></td>
      <td><?=$row['title']?></td>
      <td><?=$row['description']?></td>
      <td>
           <a href="" id="read" class="btn btn-primary btn-sm  " value="<?=$row['id']?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Read</a>  
           <a href="" id="edit" class="btn btn-success btn-sm bg-succes "value="<?=$row['id']?>"data-bs-toggle="modal" data-bs-target="#exampleModall">Edit</a>     
           <a href="" id="del" class="btn btn-danger btn-sm "value="<?=$row['id']?>">Delete</a>     

      </td>
    </tr>
    <?php }
   }else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    No data.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
   }
 ?>

  </tbody>
</table>