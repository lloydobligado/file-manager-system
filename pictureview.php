<?php
    include 'db_connect.php';
?>

<style>
.content-area{
    width: 100%
    height 100vh;
}
</style>

<div class="content-area">
  <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php   
            if(isset($_GET['filesub'])){
                $ID = $_GET['filesub'];
                $sql1 = mysqli_query($db, "SELECT `name` FROM images WHERE `id`  = '$ID'");
                
            }
                    if($row = mysqli_fetch_array($sql1)){
                        $file_name = $row['name'];
                        ?>
                        <embed type="application/pdf" src="uploadedimages/<?php echo $row['name']; ?>" width="100%" height="100%">
                        <?php   
                    }
                        ?>
</div>