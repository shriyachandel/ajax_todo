<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="bird.jpg" alt="logo" style="width:40px;">
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Link 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 3</a>
    </li>
  </ul>
</nav>

<div class="container p-3 my-3 bg-dark text-white">
  <h1 class="text-center">My Todo App</h1>
<div>
  <div class="row">
    <div class="col-lg-12">
      <form class="form" action="/action_page.php">
        <label for="name" class="mb-2 mr-sm-2">Name:</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="name" placeholder="Enter name" name="name">
        <label for="description" class="mb-2 mr-sm-2">Description:</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="description" placeholder="Enter description" name="description">
        <button type="submit" class="btn btn-primary mb-2">Add Item</button>
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


</body>
</html>