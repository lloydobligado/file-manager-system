<?php include('components/head.php')?>
<?php include('components/bodyboarding.php')?>
<?php include('components/sidebar.php')?>
<?php include('components/navbar.php')?>

             <!-- Container fluid -->
             <div class="container-fluid p-4">
                <div class="row">
                    <!-- Page Header -->
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                            <div class="mb-2 mb-lg-0">
                                <h1 class="mb-1 h2 font-weight-bold">Manage Pictures</h1>
                            </div>
                            <div>
                                <a href="#!" class="btn btn-primary" data-toggle="modal" data-target="#newCatgory">Upload Photo</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'picturespage_function.php';
                $mysqli= new mysqli('localhost','root','','fms_db') or die($mysqli->error);
                $table='images';            
                ?>
                <div class="row">
                <?php $result=$mysqli->query("SELECT * FROM $table")or die($mysqli->error);
                           while ($data = $result->fetch_assoc()) {?>
                        <div class="col-lg-3 col-md-6 col-12">
                            
                          <!-- Card -->
                          <div class="card  mb-4 card-hover">
                            <div class=" card-img-top mt-2 d-flex ">
                            <a href="pictureview.php?filesub=<?php echo $data['id']?>" class="d-flex w-100 justify-content-center">
                               
                                <?php echo "<img src='{$data['img_dir']}'width='150px'height='150px' >";
                                     ?>
                            </a>
                            <div class="d-flex flex-shrink-1">
                                <!-- dropdown -->
                                <div class="dropdown dropleft">
                                    <a class="text-muted text-primary-hover" href="#"
                                    id="dropdownboardOne" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical font-size-lg"></i>
                                    </a>
                                    <div class="dropdown-menu"
                                    aria-labelledby="dropdownboardOne">
                                    <a href="rename_file.php?filesub=<?php echo $data['id'];?>" class="dropdown-item d-flex align-items-center" data-target="#editfolder"><i class="dropdown-item-icon bi bi-pen"></i>Edit</a>
                                    
                                    <a class="dropdown-item
                                        d-flex
                                        align-items-center"
                                        href="delete_photo.php?filesub=<?php echo $data['id']?>"><i
                                        class="dropdown-item-icon fe fe-trash-2"></i>Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- Card body -->
                            
                            <div class="card-body">
                               <?php echo "<h3 class='h4 mb-2 text-truncate-line-2'>{$data['name']}</h3> ";  ?>    
                            </div>
                        </div>     
                    </div>
                    <?php } ?><!--end of card-->
                    
                </div>
            </div>
        </div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="newCatgory" tabindex="-1" role="dialog"
    aria-labelledby="newCatgoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Upload Images Here
                </h4>
                <button type="button" class="btn-close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="picturespage_function.php" method="POST" enctype="multipart/form-data">
                    <div>
                        <input type="file" name="userfile[]" value="" multiple="">
                        <input id="newfolder" name="submit" type="submit" class="btn btn-success" value="Upload"> 
                       <!-- <button type="button" class="btn btn-outline-white"
                            data-dismiss="modal">
                            Close
                        </button>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
                    <!-- Edit Folder Modal -->
                    <div class="modal fade" id="editfolder" tabindex="-1" role="dialog"
    aria-labelledby="editfolderLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="editfolderLabel">
                    Edit Name
                </h4>
                <button type="button" class="btn-close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group mb-2">
                        <label class="form-label" for="title">File Name<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control"
                                 name="oldname" value="" id = "oldname" required>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label" for="title">New Name<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control"
                                name="newname" placeholder="Enter New Name" id = "newname" required>
                    </div>
                    <div>
                        <input id="editfolder" name="editfolder" type="submit" class="btn btn-success" value="Rename"> 
                        <button type="button" class="btn btn-outline-white"
                            data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->


<?php include('components/footer.php')?>