<?php
    include 'db_connect.php';

    if(isset($_GET['filesub'])){
        $id= $_GET['filesub'];
    
        if (mysqli_connect_error())
        {
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }
        else{
            if(isset($_POST['editfile'])){
                $oldername= $_POST['oldname'];
                $newername= $_POST['newname'];
                $queryyy = mysqli_query($db, "SELECT * FROM files WHERE `name` ='$newername'");                
                $rowsss = mysqli_num_rows($queryyy);                
                    if($rowsss > 0){
                        $queryyy = mysqli_query($db, "SELECT * FROM files WHERE `name` ='$oldername'");
                        $row = mysqli_fetch_assoc($queryyy);
                        $folder = $row['folder_id'];
                         echo'<script type = "text/javascript"> alert("Name already exists!"); window.location.href = "offboarding_templates.php?foldersub='.$folder.'";</script>';
                    }
                    else{
                        $query1 = "UPDATE files SET name = '$newername' WHERE name = '$oldername'";
                        $run1 = mysqli_query($db,$query1);
                            if($run1){
                                $queryyy = mysqli_query($db, "SELECT * FROM files WHERE `name` ='$newername'");                
                                $row = mysqli_fetch_assoc($queryyy);
                                $folder = $row['folder_id'];
                                    echo'<script type = "text/javascript"> alert("File Renamed Successfully!"); window.location.href = "offboarding_templates.php?foldersub='.$folder.'";</script>';
                            }
                             else{
                                    echo'<script type = "text/javascript"> alert("Failed to rename file."); window.location.href = "offboarding_templates.php?foldersub='.$folder.'";</script>';
                            }
                    }
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
                    echo'<script type = "text/javascript"> alert("File Deleted Successfully!"); window.location.href = "offboarding_templates.php?foldersub='.$folder.'";</script>';                   
                }
                else{
                    echo'<script type = "text/javascript"> alert("Failed to delete file."); window.location.href = "offboarding_templates.php?foldersub='.$folder.'";</script>';                    
                }
                }
            else{
                echo'<script type = "text/javascript"> alert("Failed to delete file."); window.location.href = "offboarding_templates.php?foldersub='.$folder.'";</script>';
                }
            }
        }
    }
    

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
            echo'<script type = "text/javascript"> alert("Folder name already exists."); window.location.href = "offboarding.php";</script>';
            
            }
            else{

                $query1 = "INSERT INTO folders (`user_id`, `name`, `folder_type`) VALUES ('$user_id','$foldername', '$folder_type')";
                $run1 = mysqli_query($db,$query1);

                if($run1){
                    echo'<script type = "text/javascript"> alert("Folder Created Successfully!"); window.location.href = "offboarding.php";</script>';
                    
                }
                else{
                    echo'<script type = "text/javascript"> alert("Failed to create."); window.location.href = offboarding.php";</script>';
                    
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
            echo'<script type = "text/javascript"> alert("Fields cannot be empty!"); window.location.href = "offboarding.php";</script>';

        }
       
        else{

            $queryyy = mysqli_query($db, "SELECT * FROM folders WHERE `name` ='$newername'");
            $rowsss = mysqli_num_rows($queryyy);
            if($rowsss > 0){
            echo'<script type = "text/javascript"> alert("Folder name already exists!"); window.location.href = "offboarding.php";</script>';

            }
            else{
            
            $query1 = "UPDATE folders SET name = '$newername' WHERE name = '$oldername'";
            $run1 = mysqli_query($db,$query1);

                if($run1){
                    echo'<script type = "text/javascript"> alert("Folder Renamed Successfully!"); window.location.href = "offboarding.php";</script>';
                    
                }
                else{
                    echo'<script type = "text/javascript"> alert("Failed to rename folder."); window.location.href = "offboarding.php";</script>';

                    
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
            echo'<script type = "text/javascript"> alert("Fields cannot be empty!"); window.location.href = "offboarding.php";</script>';

        }
        else{
 
            $queryyy = mysqli_query($db, "SELECT * FROM folders WHERE `name` ='$deletefolder'");
            $rowsss = mysqli_num_rows($queryyy);
            if($rowsss > 0){
                $query1 = "DELETE FROM folders WHERE `name` ='$deletefolder'";
                $run1 = mysqli_query($db,$query1);
                if($run1){
                    echo'<script type = "text/javascript"> alert("Folder Deleted Successfully!"); window.location.href = "offboarding.php";</script>';                    
                }
                else{
                    echo'<script type = "text/javascript"> alert("Failed to delete folder."); window.location.href = "offboarding.php";</script>';                    
                }
            }
            else{
                echo'<script type = "text/javascript"> alert("Failed to delete folder."); window.location.href = "offboarding.php";</script>';
            }
        }
    }

?>