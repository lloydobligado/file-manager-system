<?php
include 'db_connect.php';

if(isset($_GET['filesub'])){
    $id= $_GET['filesub'];

    if (mysqli_connect_error())
    {
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{

        $queryyy = mysqli_query($db, "SELECT * FROM images WHERE `id` ='$id'");
        $rowsss = mysqli_num_rows($queryyy);
        if($rowsss > 0){
            $query1 = "DELETE FROM images WHERE `id` ='$id'";
            $run1 = mysqli_query($db,$query1);
            if($run1){
                echo'<script type = "text/javascript"> alert("Image deleted successfully!"); window.location.href = "pictures.php";</script>';                    
            }
            else{
                echo'<script type = "text/javascript"> alert("Failed to delete image."); window.location.href = "pictures.php";</script>';                    
            }
        }
        else{
            echo'<script type = "text/javascript"> alert("Failed to delete image."); window.location.href = "pictures.php";</script>';
        }
    }
}

?>
<?php include('components/footer.php')?>