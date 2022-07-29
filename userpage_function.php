<?php
$mysqli= new mysqli('localhost', 'root','','fms_db') or die(mysqli_error(mysqli));
$update=false;
$id=0;
$username='';
$email='';
$password='';
$usertype='';
if(isset($_POST['add'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $usertype=$_POST['usertype'];
    $confirmpassword=$_POST['confirmpassword'];

    
    $duplicate=mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username' OR email='$email'");
    if (mysqli_num_rows($duplicate)>0){
        echo
        "<script>alert('Username or Email Has Already Taken');</script>";
    }
    else{
       if($password==$confirmpassword){
        $mysqli->query("INSERT INTO users (username, email, password, user_type) VALUES ('$username','$email','$password','$usertype')")or 
    die(mysqli->error);
    echo
        "<script>alert('Registration Successful');</script>";
    }
    else{
        echo
        "<script>alert('Password Does Not Match');</script>";
    }
    }
    header("location: view_users.php");
}
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM users WHERE id=$id") or die($mysqli->error());
    
    header("location: view_users.php");
}

if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    

    $update=true;
    $result=$mysqli->query("SELECT * FROM users WHERE id=$id")
     or die($mysqli->error());
    $row=mysqli_fetch_assoc($result);
        $username= $row['username'];
        $email= $row['email'];
        $password=  $row['password'];
        $usertype=  $row['user_type'];
}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $usertype=$_POST['usertype'];

    $mysqli->query("UPDATE users SET username='$username', email='$email', password='$password', user_type='$usertype' WHERE id=$id") or die($mysqli->error());

    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']='warning';

    header("location: view_users.php");

}