<?php
require 'classes/Database.php';
require 'classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = (new Database())->connect();
    $user = new User($db);

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user->register($username, $password)) {
        header("Location: login.php");
    } else {
        echo "Error registering user.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="POST">
    <form method="POST">

<div class="form-group">
  <label for="exampleInputEmail1">Email address</label>
  <input type="email" name='username' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
</div>
<div class="form-group">
  <label for="exampleInputPassword1">Password</label>
  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>

<button type="submit" class="btn btn-primary">Submit</button>

  </form>
</div>
      
    </form>
</body>
</html>
<?php include 'includes/footer.php'; ?>