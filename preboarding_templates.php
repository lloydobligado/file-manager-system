<?php
    include 'db_connect.php';
    if(isset($_GET['foldersub'])){
        $ID = $_GET['foldersub'];
        $sql1 = mysqli_query($db, "SELECT * FROM folders WHERE `id`  = '$ID'");
        while($row = mysqli_fetch_assoc($sql1)){
            $foldername = $row['name'];
        }
    }
?>
<?php include('components/head.php')?>
<?php include('components/bodyboarding.php')?>
<?php include('components/sidebar.php')?>
<?php include('components/navbar.php')?>


<div class="container-fluid p-4">
        <div class="row">
                    <!-- Page Header -->
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                            <div class="mb-2 mb-lg-0">
                                <h1 class="mb-1 h2 font-weight-bold">Pre-boarding</h1>
                                 <!-- Breadcrumb -->
                                 <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#!">Manage Documents</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                        <a href="preboarding.php">Pre-boarding</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                        <?php if(isset($_GET['foldersub'])){
                                            $ID = $_GET['foldersub'];
                                            $sql1 = mysqli_query($db, "SELECT * FROM folders WHERE `id`  = '$ID'");
                                            while($row = mysqli_fetch_assoc($sql1)){
                                                echo $row['name'];}}?> <!-- Folder Name when you already click the folder--> <!-- Folder Name when you already click the folder-->
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                                <a href="#!" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add New
                    File</a>
                        </div>
                    </div>
                        <!-- UPLOADING OF FILES IN OFF-BOARDING -->
                        <?php
                            $phpFileUploadErrors = array(
                                0 => 'File upload successfully',
                                1 => 'the upload file exceed the  upload_max_filesize directive in php.ini',
                                2 => 'the upload file exceed the MAX_FILE_SIZE directive that was specified in the HTML form',
                                3 => 'the upload file was only partially uploaded',
                                4 => 'no file was uploaded',
                                5 => 'missing a temporary folder',
                                6 => 'failed to write file to disc',
                                7 => 'a php extension stopped the file upload',
                            );
                            if (isset($_FILES['file'])) {

                                $file_array = reArrayFiles($_FILES['file']);
                                //pre_r($file_array);
                                for ($i = 0; $i < count($file_array); $i++) {
                                    if ($file_array[$i]['error']) {
                                        ?><div class="alert alert-danger">
                                        <?php echo $file_array[$i]['name'] . ' - ' . $phpFileUploadErrors[$file_array[$i]['error']];
                                        ?></div><?php
                                    } else {
                                        $extensions = array('pdf', 'jpeg', 'jpg', 'png', 'gif', 'pptx', 'ppt', 'docx', 'doc', 'xlsx', 'sql', 'php', 'txt', 'xlsx', 'xls', 'xlsm', 'xlsb', 'xltm', 'xlt', 'xla', 'xlr');
                                        $file_ext = explode('.', $file_array[$i]['name']);
                                        $file_ext = end($file_ext);
                                        $file_size = $file_array[$i]['size'];
                                        $file_type = $file_array[$i]['type'];

                                        if (!in_array($file_ext, $extensions)) {

                                        }else {
                                            if (move_uploaded_file($file_array[$i]['tmp_name'], "uploadedfiles/" . $file_array[$i]['name'])) {
                                                $db->query("INSERT INTO files(name,folder_id,file_type,date_updated,size) VALUES ('" . $file_array[$i]['name'] . "','$ID','$file_type', NOW(), '$file_size')");
                                            }
   
                                        }
                                    }
                                }
                            }
                            function reArrayFiles($file_post) {
                                $file_ary = array();
                                $file_count = count($file_post['name']);
                                $file_keys = array_keys($file_post);

                                for ($i = 0; $i < $file_count; $i++) {
                                    foreach ($file_keys as $key) {
                                        $file_ary[$i][$key] = $file_post[$key][$i];
                                    }
                                }
                                return $file_ary;
                            }
                            function pre_r($array) {
                                echo '<pre>';
                                print_r($array);
                                echo '</pre>';
                            }
                        //end multi upload-->
                        ?>
                        
        </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                Add New File
                </h4>
                <button type="button" class="btn-close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#!" method="POST" enctype="multipart/form-data">
                    <div>
                        <input type="file" name="file[]" value="" multiple="">
                        <input id="confirm" name="submit" type="submit" class="btn btn-success" value="Upload"> 
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

            <!-- START CODE HERE -->  
            <div class="tab-content">
                    <div class="row">
                        <!-- DISPLAYING OF PRE-BOARDING FOLDERS IN DATABASE -->
                        <?php
                        if(isset($_GET['foldersub'])){
                            $ID = $_GET['foldersub'];
                            $sql = $db->query("SELECT * FROM folders WHERE id='$ID'") or die($db->error);
                            $link = mysqli_connect("localhost", "root", "", "fms_db");
    
                            // Check connection
                            if($link === false){
                                die("ERROR: Could not connect. " . mysqli_connect_error());
                            }
                            $query = "SELECT * FROM files WHERE folder_id='$ID'";
                                $run = mysqli_query($db,$query);
                                $check_class = mysqli_num_rows($run) > 0;
                
                                if($check_class){
                                    while($row = mysqli_fetch_assoc($run)){
                                        $filesID = $row['id'];
                                        ?>
                                
                                <div class="col-lg-3 col-md-6 col-12">
                                <!-- Card -->
                                <div class="card  mb-4 card-hover">
                                    <div class=" card-img-top mt-2 d-flex ">
                                        <a href="Fileview.php?filesub=<?php echo $row['id'];?>" class="d-flex w-100 justify-content-center">
                                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="80" height="80" fill="url(#pattern0)"/>
                                    <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_1362_265" transform="scale(0.00390625)"/>
                                    </pattern>
                                    <image id="image0_1362_265" width="256" height="256" xlink:href="data:image/png;base64,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"/>
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
                                                <a href="preboarding_rename.php?filesub=<?php echo $row['id'] ;?>" class="dropdown-item d-flex align-items-center" data-target="#editfolder"><i class="dropdown-item-icon bi bi-pen"></i>Edit File</a>
                                                <a href="preboarding_folder.php?filesub=<?php echo $row['id'] ;?>" class="dropdown-item d-flex align-items-center" ><i class="dropdown-item-icon fe fe-trash-2"></i>Delete File</a> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <h3 class="h4 mb-2 text-truncate-line-2 text-center">
                                            <a href="Fileview.php?filesub=<?php echo $row['id'];?>" class="text-inherit"><?php echo $row['name']?></a>
                                        </h3>      
                                    </div>
                                </div> 
                            </div>
                            <?php
                                }
                            }
                        }   
                        ?>
                    </div>
                </div> 
        
            <span>
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
                <form action="preboarding_folder.php" method="POST">
                    <div class="form-group mb-2">
                        <label class="form-label" for="title">Folder Name<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control"
                                 name="oldfoldername" placeholder="Enter Old Folder Name" id = "oldfoldername" required>
                        <label class="text-danger">NEW FOLDER NAME MUST BE DIFFERENT FROM THE OLD FOLDER NAME</label>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label" for="title">New Folder Name<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control"
                                name="newfoldername" placeholder="Enter New Folder Name" id = "newfoldername" required>
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
                    Add New Folder
                </h4>
                <button type="button" class="btn-close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="preboarding_folder.php" method="POST">
                    <div class="form-group mb-2">
                        <label class="form-label" for="title">Folder Name<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control"
                                name="foldertodelete" placeholder="Enter the Name of Folder you want to Delete" id = "foldertodelete" required>
                    </div>
                    <div class="form-group mb-2">                   
                    <h4><span>ARE YOU SURE YOU WANT TO DELETE THIS FOLDER? THIS CANNOT BE UNDONE!</span></h4>
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
    
</body>
<?php include('components/footer.php')?>