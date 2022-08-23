<?php include 'db_connect.php';?>
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
                                <h1 class="mb-1 h2 font-weight-bold">Task</h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#!">Manage Documents</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Tasks
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div>
                                <a href="#!" class="btn btn-primary" data-toggle="modal" data-target="#newCatgory">Create New
                    Folder</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="row">
                        <!-- DISPLAYING OF TASKS FOLDERS IN DATABASE -->
                        <?php
                        $query = "SELECT * FROM folders WHERE user_id='1' AND Folder_type='Tasks'";
                        $run = mysqli_query($db,$query);
                        $check_class = mysqli_num_rows($run) > 0;
        
                        if($check_class){
                            while($row = mysqli_fetch_assoc($run)){
                                
                                ?>
                                
                                <div class="col-lg-3 col-md-6 col-12">
                                <!-- Card -->
                                <div class="card  mb-4 card-hover">
                                    <div class=" card-img-top mt-2 d-flex ">
                                        <a href="task_templates.php?foldersub=<?php echo $row['id'];?>" class="d-flex w-100 justify-content-center">
                                            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect width="80" height="80" fill="url(#folder-icon1)"/>
                                                <defs>
                                                <pattern id="folder-icon1" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_529_274" transform="scale(0.00390625)"/>
                                                </pattern>
                                                <image id="image0_529_274" width="256" height="256" xlink:href="data:image/png;base64,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"/>
                                                </defs>
                                            </svg>
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
                                                <a href="#!" class="dropdown-item d-flex align-items-center" data-toggle="modal" data-target="#editfolder"><i class="dropdown-item-icon bi bi-pen"></i>Edit Folder</a>
                                                <a href="#!" class="dropdown-item d-flex align-items-center" data-toggle="modal" data-target="#deletefolder"><i class="dropdown-item-icon fe fe-trash-2"></i>Delete Folder</a> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <h3 class="h4 mb-2 text-truncate-line-2 text-center">
                                            <a href="task_templates.php?foldersub=<?php echo $row['id'];?>" class="text-inherit"><?php echo $row['name']?></a>
                                        </h3>      
                                    </div>
                                </div> 
                            </div>
                            <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
<!-- Add Folder Modal -->
<div class="modal fade" id="newCatgory" tabindex="-1" role="dialog"
    aria-labelledby="newCatgoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Add New Folder
                </h4>
                <button type="button" class="btn-close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="tasks_folder.php" method="POST">
                    <div class="form-group mb-2">
                        <label class="form-label" for="title">Folder Name<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control"
                                 name="foldertextbox" placeholder="Folder Name" id = "foldertextbox" required>
                        <small>Field must contain a unique value</small>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label" for="title">Folder Type<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control"
                                name="foldertypetextbox" value="Tasks" id = "foldertypetextbox" required>
                    </div>
                    <div>
                        <input id="newfolder" name="newfolder" type="submit" class="btn btn-success" value="Create Folder"> 
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

<!-- Edit Folder Modal -->
<div class="modal fade" id="editfolder" tabindex="-1" role="dialog"
    aria-labelledby="editfolderLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="editfolderLabel">
                    Edit Folder
                </h4>
                <button type="button" class="btn-close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="tasks_folder.php" method="POST">
                    <div class="form-group mb-2">
                        <label class="form-label" for="title">Folder Name<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control"
                                 name="oldfoldername" placeholder="Enter Old Folder Name" id = "oldfoldername" required>
                        
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label" for="title">New Folder Name<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control"
                                name="newfoldername" placeholder="Enter New Folder Name" id = "newfoldername" required>
                        <label class="text-danger">NEW FOLDER NAME MUST BE DIFFERENT FROM THE OLD FOLDER NAME</label>
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

<!-- Delete Folder Modal -->
<div class="modal fade" id="deletefolder" tabindex="-1" role="dialog"
    aria-labelledby="newCatgoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Delete Folder
                </h4>
                <button type="button" class="btn-close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="tasks_folder.php" method="POST">
                    <div class="form-group mb-2">
                        <label class="form-label" for="title">Folder Name<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control"
                                name="foldertodelete" placeholder="Enter the Name of Folder you want to Delete" id = "foldertodelete" required>
                    </div>
                    <div class="form-group mb-2">                   
                    
                    <label class="text-danger">ARE YOU SURE YOU WANT TO DELETE THIS FOLDER? THIS CANNOT BE UNDONE!</label>
                    </div>
                    
                    <div>
                        <input id="deletefolder" name="deletefolder" type="submit" class="btn btn-danger" value="Delete"> 
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