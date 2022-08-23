<?php include('db_connect.php');
if(isset($_POST['edit'])){
    $id = $_GET['foldersub'];

    echo '<script type="text/javascript"> ';  
    echo 'var inputname = prompt("Please enter New Folder Name", "");';
    echo 'alert(inputname);';
    $abc = "<script>document.writeln(inputname);</script>";   
    echo '</script>';
    echo  $abc;
    
    $query = mysqli_query($db,"UPDATE folders SET name = Hotdog WHERE id = '$id'");
    header('location: preboarding.php');
}
elseif(isset($_POST['delete'])){
    $id = $_GET['foldersub'];

    $query = mysqli_query($db,"DELETE FROM folders WHERE id = $id");
    header('location: preboarding.php');
}
else{

}
?>
<?php include('components/head.php')?>
<?php include('components/bodyboarding.php')?>
<?php include('components/sidebar.php')?>
<?php include('components/navbar.php')?>


    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0">
                    Rename Folder
                </h4>
            </div>
            <div class="modal-body">
                <form action="newfolder.php>" method="POST">
                    <div class="form-group mb-2">
                        <label class="form-label" for="title">Folder Name</label>
                        <label  class="form-control" for="title">
                                 <?php if(isset($_GET['foldersub'])){
                                    $ID = $_GET['foldersub'];
                                    $sql1 = mysqli_query($db, "SELECT * FROM folders WHERE `id`  = '$ID'");
                                    while($row = mysqli_fetch_assoc($sql1)){
                                    $foldername = $row['name'];
                                    echo $foldername;
                                    }
                                    }?></label>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label" for="title">Folder New Name</label>
                        <input type="text" class="form-control"
                                name="newname" placeholder="Enter New Folder Name" id = "newname" required>
                    </div>
                    <div>
                        <input id="edit" name="edit" type="submit" class="btn btn-success" value="Rename"> 
                        <button type="button" class="btn btn-outline-white">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
</>

<?php include('components/footer.php')?>