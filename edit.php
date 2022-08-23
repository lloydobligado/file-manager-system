<?php
include 'db_connect.php';

if(isset($_GET['filesub'])){
    $oldername= $_POST['oldname'];
    $newername= $_POST['newname'];

    if (mysqli_connect_error())
    {
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{

        $queryyy = mysqli_query($db, "SELECT * FROM images WHERE `name` ='$newername'");
        $rowsss = mysqli_num_rows($queryyy);
        if($rowsss > 0){
        echo'<script type = "text/javascript"> alert("Name already exists!"); window.location.href = "pictures.php";</script>';
        }
        else{
        
        $query1 = "UPDATE images SET name = '$newername' WHERE name = '$oldername'";
        $run1 = mysqli_query($db,$query1);

            if($run1){
                echo'<script type = "text/javascript"> alert("Rename image successfully!"); window.location.href = "pictures.php";</script>';
                
            }
            else{
                echo'<script type = "text/javascript"> alert("Failed to rename image."); window.location.href = "pictures.php";</script>';

                
            }
        }
    }
}

?>