<?php include('components/head.php')?>
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
                <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                          <!-- Card -->
                          <div class="card  mb-4 card-hover">
                            <div class=" card-img-top mt-2 d-flex ">
                            <a href="#!" class="d-flex w-100 justify-content-center">
                                <svg width="88" height="88" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="88" height="88" fill="url(#img-icon1)"/>
                                    <defs>
                                    <pattern id="img-icon1" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_1462_78" transform="scale(0.00390625)"/>
                                    </pattern>
                                    <image id="image0_1462_78" width="256" height="256" xlink:href="data:image/png;base64,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"/>
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
                                    <a class="dropdown-item
                                        d-flex
                                        align-items-center"
                                        href="#"><i
                                        class="dropdown-item-icon fe fe-users"></i>Edit
                                        Column
                                    </a>
                                    <a class="dropdown-item
                                        d-flex
                                        align-items-center"
                                        href="#"><i
                                        class="dropdown-item-icon fe fe-trash-2"></i>Delete
                                        column</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <h3 class="h4 mb-2 text-truncate-line-2"><a href="#!" class="text-inherit">Creating a Custom
                                  Event in Javascript</a></h3>      
                            </div>
                        </div>
                    </div>
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
                    Add New Folder
                </h4>
                <button type="button" class="btn-close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="newfolder.php" method="POST">
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
                                name="foldertypetextbox" value="Pictures" id = "foldertypetextbox" required>
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
<?php include('components/footer.php')?>