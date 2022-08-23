<?php
include 'db_connect.php';

if(isset($_GET['filesub'])){
    $id= $_GET['filesub'];

    if (mysqli_connect_error())
    {
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{

        $queryyy = mysqli_query($db, "SELECT * FROM files WHERE `id` ='$id'");
        $rowsss = mysqli_num_rows($queryyy);
        $row = mysqli_fetch_assoc($queryyy);
        $folder = $row['folder_id'];
        if($rowsss > 0){
            $query1 = "DELETE FROM files WHERE `id` ='$id'";
            $run1 = mysqli_query($db,$query1);
            if($run1){
                echo'<script type = "text/javascript"> alert("File deleted successfully!"); window.location.href = "preboarding_templates.php?foldersub='.$folder.'";</script>';                   
            }
            else{
                echo'<script type = "text/javascript"> alert("Failed to delete file."); window.location.href = "preboarding_templates.php?foldersub='.$folder.'";</script>';                    
            }
        }
        else{
            echo'<script type = "text/javascript"> alert("Failed to delete file."); window.location.href = "preboarding_templates.php?foldersub='.$folder.'";</script>';
        }
    }
}


?>