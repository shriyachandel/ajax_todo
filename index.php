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
    <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Desciption</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Doe</td>
        <td>This is description text</td>
      </tr>
    </tbody>
  </table>
    </div>
  <div>
</div>
<script>
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
          console.log(data);
         if(data.statusCode == 200){
          $("#success").html('Data added successfully !');
          $("#sucsess").show();
         }else{
          alert("something went wrong");
         }
        }
        
    });
  });
});
</script>

<?php include('footer.php'); ?> 
