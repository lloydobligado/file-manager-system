<?php include 'db_connect.php';?>
<?php include('components/head.php')?>
<?php include('components/bodyboarding.php')?>
<?php include('components/sidebar.php')?>
<?php include('components/navbar.php')?>


    <!-- Edit Folder Modal -->
    <div class="" id="editfolder" tabindex="-1" role="dialog"
    aria-labelledby="editfolderLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="editfolderLabel">
                    Edit Name
                </h4>
                <button type="button" onclick="location.href='pictures.php'" class="btn-close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="edit.php?filesub=<?php echo $_GET['filesub'];?>" method="POST">
                    <div class="form-group mb-2">
                        <label class="form-label" for="title">File Name<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control"
                                 name="oldname" value="<?php
                                 if(isset($_GET['filesub'])) {
                                 $id = $_GET['filesub'];
                                 $sql1 = mysqli_query($db, "SELECT * FROM images WHERE `id` ='$id'");
                                 while($row = mysqli_fetch_assoc($sql1)){
                                    echo $row['name'];}}?>" id = "oldname" required>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label" for="title">New Name<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control"
                                name="newname" placeholder="Enter New Name" id = "newname" required>
                    </div>
                    <div>
                        <input id="editfolder" name="editfolder" type="submit" class="btn btn-success" value="Rename"> 
                        <input type="button" onclick="location.href='pictures.php'" type="button" class="btn btn-outline-white" value="Close">
                        </input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->








<?php include('components/footer.php')?>