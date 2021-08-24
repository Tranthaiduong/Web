<?php
session_start();
include 'db_conn.php';
$idchucvu = $_SESSION['id'];
echo $idchucvu;
$iddonvi = $_SESSION['id'];
echo $iddonvi;
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phonenumber=$_POST['phonenumber'];
    $chucvu=$_POST['chucvu'];
    $donvi=$_POST['donvi'];
    $sql="INSERT INTO `canbo`( `name`, `phone`, `email`, `id_chucvu`, `id_donvi`) VALUES ('$name','$phonenumber','$email','$idchucvu','$iddonvi')";
    $result=mysqli_query($conn, $sql);
    if($result){
        //echo "Thêm thành công!";
        header('location:admin.php');
    }else{
        echo "Không thành công!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>ADD USER</title>
</head>
<body>
    <div class="container  my-5">
    <form action="user.php" method="POST">
        <div class="form-group">
            <label>Họ và tên</label>
            <input type="text" class="form-control" placeholder="Nhập tên" name="name" autocomplete="off"> 
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Nhập email" name="email" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input type="text" class="form-control" placeholder="Nhập Số điện thoại" name="phonenumber" autocomplete="off">
        </div>
        <div class="form-group">
        <label for="" class="form-label">Đơn vị: </label>
                <select class="select" name="donvi">
                  <?php 
                        session_start();
                        $sql = "SELECT * FROM `donvi`";
                        $result = mysqli_query($conn,$sql);
                        if($result){
                            while( $row = mysqli_fetch_assoc($result)){
                                $name = $row['name'];
                                $iddonvi = $row['id'];
                                $_SESSION['id']= $iddonvi;
                                echo '
                                    <option value="'.$iddonvi.'">'.$name.'</option>
                                ';
                            }}?>
                </select>
        </div>
        <div class="form-group">
        <label for="" class="form-label">Chức vụ: </label>
                <select class="select" name="chucvu">
                  <?php 
                        session_start();
                        $sql = "SELECT * FROM `chucvu`";
                        $result = mysqli_query($conn,$sql);
                        if($result){
                            while( $row = mysqli_fetch_assoc($result)){
                                $name = $row['name'];
                                $idchucvu = $row['id'];
                                $_SESSION['id']= $idchucvu;
                                echo '
                                    <option value="'.$idchucvu.'">'.$name.'</option>
                                ';
                            }}?>
                </select>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    </div>
    
</body>
</html>