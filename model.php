<?php

class Model{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "crud";
    private $conn;

    public function __construct(){
        try{

            $this->conn = new PDO("mysql:host=$this->server;dbname=$this->db", $this->username, $this->password);

        } catch(PDOException $e){
            echo "connection failed" . $e->getMessage();
        }
    }

    public function insert(){
        if(isset($_POST['submit'])){
            if(isset($_POST['title']) && isset($_POST['description'])){
                if(!empty($_POST['title']) && !empty($_POST['description'])){
                     $title = $_POST['title'];
                     $description = $_POST['description'];

                    $query = "INSERT INTO records (title,description) VALUES ('$title', '$description')";

                    if( $sql = $this->conn->exec($query)){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Record added successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }else{
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    
                        <button type="button" cla   Failed to add recordss="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }

                }else{
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    empty fields.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                } 
            }
        }

    }

    public function fetch(){
        $data = null;
        $stmt = $this->conn->prepare("SELECT * FROM records");
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;

    }

    public function del($del_id){
        $query = "DELETE FROM records WHERE id =$del_id";
        if($sql = $this->conn->exec($query)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
           record has been deleted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            record not delete.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }

    public function read($read_id){

        $data = null;
        $stmt = $this->conn->prepare("SELECT * FROM records WHERE id =$read_id");
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function edit($edit_id){
        $data = null;
        $stmt = $this->conn->prepare("SELECT * FROM records WHERE id = $edit_id");
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function update($data){
        $edit_id = $data['edit_id'];
        $edit_title= $data['edit_title'];
        $edit_description = $data['edit_description'];

        // var_dump($data);
        $query ="UPDATE records SET title=' $edit_title',
         description='$edit_description' WHERE id ='$edit_id'";

        if(  $sql = $this->conn->exec($query)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            record has been updated.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            failed to update record.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }


}

?> 