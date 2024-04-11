<?php include('header.php') ?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="bird.jpg" alt="logo" style="width:40px;">
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
      <form class="form"id="todo_form"  method="post">
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
  $('#add_item').on('click',function(){
    var form_inputs = ['#cus_full_name', '#cus_email', '#cus_address', '#phone_no'];
  var formData = new FormData(jQuery("#get_estimate_form")[0]);
  });
  
</script>

<?php include('footer.php'); ?> 
