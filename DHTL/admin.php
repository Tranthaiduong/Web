<?php
include 'db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị người dùng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="user.php" class="text-light">Thêm cán bộ</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số Điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Đơn vị</th>
                    <th scope="col">Chức vụ</th>
                </tr>
            </thead>
        </table>
        <tbody>
        <?php
        $sql="SELECT * FROM 'canbo'";
        $result=mysqli_query($conn, $sql);
        if($result){
            while ($row=mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $name=$row['name'];
                $email=$row['email'];
                $phonenumber=$row['phonenumber'];
                $addres=$row['address'];
                $iddownvi=$row['iddonvi'];
                $idchucvu=$row['idchucvu'];
                echo '<tr>
                <th scope="row">'.$id.'</th>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$phonenumber.'</td>
                <td>'.$addres.'</td>
                <td>'.$iddownvi.'</td>
                <td>'.$idchucvu.'</td>
                <td>
                <button class="btn btn-primary"><a href="" class="text-light">Sửa</a></button>
                <button class="btn btn-danger"><a href=""class="text-light">Xóa</a></button>
                </td>
            </tr>';

            }
        }

        ?>
        
        
        </tbody>
    </div>
    
    
</body>
</html>