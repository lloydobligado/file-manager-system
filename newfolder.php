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
            echo'<script type = "text/javascript"> alert("Folder name already exists.") </script>';
            header("Refresh:0");
            }
            else{

                $query1 = "INSERT INTO folders (`user_id`, `name`, `folder_type`) VALUES ('$user_id','$foldername', '$folder_type')";
                $run1 = mysqli_query($db,$query1);

                if($run1){
                    $_SESSION['success'] = "New folder created!";
                    header('location: preboarding.php');
                    
                }
                else{
                    echo'<script type = "text/javascript"> alert("Failed to create.") </script>';
                    header('location: preboarding.php');
                    
                }
            }
        }
    }
?>