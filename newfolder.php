<?php
    include 'db_connect.php';


    if(isset($_POST['newfolder'])){
        $user_id = 1;
        $foldername= $_POST['foldertextbox'];
        $folder_type= $_POST['foldertypetextbox'];

        if (mysqli_connect_error())
        {
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }
        elseif(empty($foldername)){
            echo'<script type = "text/javascript"> alert("Fields cannot be empty!") </script>';
            
        }
       
        else{

            $queryyy = mysqli_query($db, "SELECT * FROM folders WHERE `name` ='$foldername'");
            $rowsss = mysqli_num_rows($queryyy);
            if($rowsss > 0){
            echo'<script type = "text/javascript"> alert("Folder name already exists."); </script>';
            //header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
            else{

                $query1 = "INSERT INTO folders (`user_id`, `name`, `folder_type`) VALUES ('$user_id','$foldername', '$folder_type')";
                $run1 = mysqli_query($db,$query1);

                if($run1){
                    echo'<script type = "text/javascript"> alert("Folder created successfully!") window.location.href = "#";</script>';
                    
                    
                }
                else{
                    echo'<script type = "text/javascript"> alert("Failed to create.") window.location.href = "";</script>';
                    
                }
            }
        }
    }
    
    if(isset($_POST['editfolder'])){
        $oldername= $_POST['oldfoldername'];
        $newername= $_POST['newfoldername'];

        if (mysqli_connect_error())
        {
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }
        elseif(empty($oldername)){
            echo'<script type = "text/javascript"> alert("Fields cannot be empty!"); window.location.href = ""; </script>';
            header("Refresh:0");
        }
       
        else{

            $queryyy = mysqli_query($db, "SELECT * FROM folders WHERE `name` ='$newername'");
            $rowsss = mysqli_num_rows($queryyy);
            if($rowsss > 0){
            echo'<script type = "text/javascript"> alert("Folder name already exists!"); window.location.href = ""; </script>';
            header("Refresh:0");
            }
            else{
            
            $query1 = "UPDATE folders SET name = '$newername' WHERE name = '$oldername'";
            $run1 = mysqli_query($db,$query1);

                if($run1){
                    echo'<script type = "text/javascript"> alert("Rename folder successfully!"); window.location.href = ""; </script>';
                    
                }
                else{
                    echo'<script type = "text/javascript"> alert("Failed to rename folder."); window.location.href = "";</script>';
                    header("Refresh:0");
                    
                }
            }
        }
    }
    if(isset($_POST['deletefolder'])){
        $deletefolder= $_POST['foldertodelete'];

        if (mysqli_connect_error())
        {
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }
        elseif(empty($deletefolder)){
            echo'<script type = "text/javascript"> alert("Fields cannot be empty!") window.location.href = "";</script>';
            header("Refresh:0");
        }
       
        else{
            $queryyy = mysqli_query($db, "SELECT FROM folders WHERE `name` ='$deletefolder'");
            $rowsss = mysqli_num_rows($queryyy);
            if($rowsss > 0){
                $query1 = "DELETE FROM folders WHERE `name` ='$deletefolder'";
                 $run1 = mysqli_query($db,$query1);
                if($run1){
                    echo'<script type = "text/javascript"> alert("Deleted folder successfully!"); window.location.href = "preboarding.php";</script>';                    
                }
                else{
                    echo'<script type = "text/javascript"> alert("Failed to delete folder."); window.location.href = "preboarding.php";</script>';
                    
                }
            }
        }
    }

?>