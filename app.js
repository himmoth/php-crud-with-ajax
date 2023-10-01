$(document).on("click", "#submit", function(e){
    e.preventDefault();
   var title = $("#title").val();
   var description = $("#description").val();
   var submit = $("#submit").val();

   $.ajax({
    url: "insert.php",
    type: "post",
    data: {
        title:title,
        description:description,
        submit:submit
    }, 
    success: function(data){
        fetch();
        $("#result").html(data);
    }
   });

  $("#form")[0].reset(); 
    
});
//   Fetch data 
function fetch(){
    $.ajax({
        url: "fetch.php",
        type: "post",
        success: function(data){
            
            $("#fetch").html(data);
        }
    })
  }
fetch();

// Delete Record 
$(document).on("click", "#del", function(e){
    e.preventDefault();
    var del_id = $(this).attr("value");
    if(window.confirm("Are you sure ?")){
        $.ajax({
            url: "del.php",
            type: "post",
            data: {
                del_id:del_id,
            },
            success: function(data){
                fetch();
                $("#show").html(data);
            }
        });
    }else{
        return false;
    }

});

// Read record 
$(document).on("click", "#read", function(e){
    e.preventDefault();
    var read_id = $(this).attr('value');
    $.ajax({
        url: "read.php",
        type: "post",
        data: {
            read_id:read_id,
        },
        success: function(data){
            $("#read_data").html(data);
        }
    });
});

// Edit record 
$(document).on("click", "#edit", function(e){
    e.preventDefault();
    var edit_id = $(this).attr("value");
    $.ajax({
        url: "edit.php",
        type: "post",
        data: {
            edit_id:edit_id,
        },
        success: function(data){
            $("#edit_data").html(data);
        }

    })
});

// Update record 
$(document).on("click", "#update", function(e){
    e.preventDefault();
    
    var edit_title = $("#edit_title").val();
    var edit_description = $("#edit_description").val();
    var update = $("#update").val();
    var edit_id = $("#edit_id").val();
    $.ajax({
        url: "update.php",
        type: "post",
        data: {
            edit_id:edit_id,
            edit_title:edit_title,
            edit_description:edit_description,
            update:update
        },
        success: function(data){
            fetch();
            $("#show").html(data);
        }

    });
});

