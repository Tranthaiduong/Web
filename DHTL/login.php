<?php
  if(isset($_REQUEST['submit'])){
    include ('db_conn.php');

    $userName = $_REQUEST['username'];
    $passWord = $_REQUEST['password'];
    $sql = "SELECT * FROM `admin` WHERE username = '$userName' AND passWord='$password' ";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) == 1){
        header('location:admin.php');
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <form method="POST" action="admin.php">
        <h2>LOGIN</h2>
        <?php
        if (isset($_GET['erro'])){ ?>
          <p class="erro"><?php echo $_GET['erro']; ?></p>
        <?php } ?>
        <label>User Name</label>
        <input type="text" name="username" placeholder="User Name">

        <label>User Name</label>
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="submit">Login</button>
    </form>


    

</body>
</html>