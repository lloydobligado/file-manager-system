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
        echo '<script type = "text/javascript"> alert("Username or Email Has Already Taken."); window.location.href = "add_user.php";</script>';
    }
    else{
       if($password==$confirmpassword){
        $mysqli->query("INSERT INTO users (username, email, password, user_type) VALUES ('$username','$email','$password','$usertype')")or 
    die(mysqli->error);
    echo '<script type = "text/javascript"> alert("Registration Successful."); window.location.href = "view_users.php";</script>';
    }
    else{
        echo '<script type = "text/javascript"> alert("Password Does Not Match."); window.location.href = "add_user.php";</script>';
    }
    }
   
}
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM users WHERE id=$id") or die($mysqli->error());
    echo'<script type = "text/javascript"> alert("Data Has Been Deleted."); window.location.href = "view_users.php";</script>';
    
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

    echo'<script type = "text/javascript"> alert("Data Has Been Updated."); window.location.href = "view_users.php";</script>';

}