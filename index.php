<?php include('header.php') ?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <!-- <img src="bird.jpg" alt="logo" style="width:40px;"> -->
    <h3>Logo</h3>
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Contact</a>
    </li>
  </ul>
</nav>

<div class="container p-3 my-3 bg-dark text-white">
  <h1 class="text-center">My Todo App</h1>
<div>
  <div class="row">
    <div class="col-lg-12">
          <div class="form_error" style="display:none;">
              <span>Please make sure all fields are filled in.</span>
          </div>
          <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          </div>
            <form class="form" id="todo_form"  method="post">
              <label for="name" class="mb-2 mr-sm-2">Name:</label>
              <input type="text" class="form-control mb-2 mr-sm-2" id="name" placeholder="Enter name" name="Name">
              <label for="description" class="mb-2 mr-sm-2">Description:</label>
              <input type="text" class="form-control mb-2 mr-sm-2" id="description" placeholder="Enter description" name="Description">
              <button type="submit" class="btn btn-primary mb-2" id="add_item">Add Item</button>
            </form>
    </div>
    <div class="col-lg-12">
    <table class="table table-dark table-striped text-center">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Desciption</th>
        <th>Update</th>
        
      </tr>
    </thead>
    <tbody id="table_data">
    <?php 
      $sql = "SELECT * FROM items";
      
      $result = mysqli_query($conn, $sql);
    
      $num_row = mysqli_num_rows($result);
     
      if($num_row > 0){
        while($row = mysqli_fetch_assoc($result)) {
         
          ?>
          <tr>
            <td><?php echo $row['Id']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Description']; ?></td>
            <td><button type="submit" class="btn btn-warning mb-2" id="edit_item"><i style="font-size:24px;color:#ffffff;" class="fa">&#xf044;</i>
             </button>
            <button type="submit" class="btn btn-danger mb-2" id="remove_item"><i class="material-icons">&#xe872;</i></button></td>
          </tr>
          <?php
        }
      }
      ?>
    </tbody>
  </table>
    </div>
  <div>
</div>
<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="container"> 
  <div class="modal-content">
    <span class="close">&times;</span>
      <div class="row">
        <div class="col-lg-12">
          <h3 class="text-center modal-title text-danger">Update Data</h3>
          <form class="form" id="todo_form"  method="post">
              <label for="name" class="mb-2 mr-sm-2">Name:</label>
              <input type="text" class="form-control mb-2 mr-sm-2" id="name" placeholder="Enter name" name="Name">
              <label for="description" class="mb-2 mr-sm-2">Description:</label>
              <input type="text" class="form-control mb-2 mr-sm-2" id="description" placeholder="Enter description" name="Description">
              <button type="submit" class="btn btn-primary mb-2" id="add_item">Add Item</button>
            </form>
        </div>
      </div>
  </div>
    </div>
</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("edit_item");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

  $(document).ready(function() {
    $('#add_item').on('click', function(event) {
      event.preventDefault(); // Prevent the default form submission
    var form_inputs = ['#name', '#description'];
    var empty_fields = [];
    var has_error = false; // Initialize has_error variable
    // Remove previous red border
    $(form_inputs.join(', ')).removeClass('error-border');
    $.each(form_inputs, function (index, value) {
        if (!$(value).val()) {
            $('.form_error').show();
          
            setTimeout(function () {
                $('.form_error').hide();
                $(empty_fields).each(function (index, value) {
                $(value).removeClass('error-border').focus();
                });
            }, 4000);

            // Collect empty fields
            empty_fields.push(value);

            has_error = true;
        }
    });

    // Add red border and focus on all empty fields
    $(empty_fields).each(function (index, value) {
        $(value).addClass('error-border').focus();
    });

    if (has_error) {
        return; // Stop further processing if there is an error
    }
    var formData = new FormData(jQuery("#todo_form")[0]);
    $.ajax({
        type: 'post',
        url: 'save.php',
        data: formData,
        contentType: false, 
        processData: false,
        dataType: 'json',
        success: function (data) {
        var tableData = data['table-data'];
        if(data.statusCode == 200){
          $('#table_data').append(tableData);
            $("#success").html('Data added successfully !');
            $("#name, #description").val('');
            $("#success").show(); // Corrected spelling mistake here
            setTimeout(() => {
                $("#success").hide(); // Corrected spelling mistake here
            }, 5000);
        } else {
            alert("Something went wrong");
        }
        }
        
    });
  });
});
</script>

<?php include('footer.php'); ?> 
