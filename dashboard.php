<?php include('db_connect.php');

    if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.php');
    }

    if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: index.php");
    } 
?>
<?php include('components/head.php')?>
<?php include('components/bodymain.php')?>
<?php include('components/sidebar.php')?>
<?php include('components/navbar.php')?>

            <!-- Container fluid -->
            <div class="container-fluid p-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Page header -->
                        <div class="border-bottom pb-4 mb-4">
                            <div>
                                <h1 class="mb-1 h2 font-weight-bold">Dashboard</h1>
                            </div>
						</div>
					</div>

				</div>
                <div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                            <!-- Card -->
                            <div class="card mb-4">
                                <!-- Card body -->
                                <div class="card-body gradient">
                                    <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                        <div>
                                            <span class="font-size-xs text-uppercase font-weight-semi-bold">Pre-Boarding</span>
                                        </div>
                                        <div>
                                            <span class=" fe fe-users font-size-lg text-primary"></span>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bold mb-1">
                                    <?php 
                                        $db = mysqli_connect('localhost', 'root', '', 'fms_db');
                                        $query = "SELECT id FROM users ORDER BY id";
                                        $query_run = mysqli_query($db, $query);

                                        $row = mysqli_num_rows($query_run);

                                        echo $row;
                                    ?>
                                    </h2>
                                    <span class="ml-1 font-weight-medium">Number of pre-boarding</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                            <!-- Card -->
                            <div class="card mb-4">
                                <!-- Card body -->
                                <div class="card-body gradient">
                                    <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                        <div>
                                            <span class="font-size-xs text-uppercase font-weight-semi-bold">On-boarding</span>
                                        </div>
                                        <div>
                                            <span class=" fe fe-users font-size-lg text-primary"></span>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bold mb-1">
                                    <?php 
                                        $db = mysqli_connect('localhost', 'root', '', 'fms_db');
                                        $query = "SELECT id FROM users ORDER BY id";
                                        $query_run = mysqli_query($db, $query);

                                        $row = mysqli_num_rows($query_run);

                                        echo $row;
                                    ?>
                                    </h2>
                                    <span class="ml-1 font-weight-medium">Number of on-boarding</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                            <!-- Card -->
                            <div class="card mb-4">
                                <!-- Card body -->
                                <div class="card-body gradient">
                                    <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                        <div>
                                            <span class="font-size-xs text-uppercase font-weight-semi-bold">Off-boarding</span>
                                        </div>
                                        <div>
                                            <span class=" fe fe-users font-size-lg text-primary"></span>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bold mb-1">
                                    <?php 
                                        $db = mysqli_connect('localhost', 'root', '', 'fms_db');
                                        $query = "SELECT id FROM users ORDER BY id";
                                        $query_run = mysqli_query($db, $query);

                                        $row = mysqli_num_rows($query_run);

                                        echo $row;
                                    ?>
                                    </h2>
                                    <span class="ml-1 font-weight-medium">Number of off-boarding</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                            <!-- Card -->
                            <div class="card mb-4">
                                <!-- Card body -->
                                <div class="card-body gradient">
                                    <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                        <div>
                                            <span class="font-size-xs text-uppercase font-weight-semi-bold">Tasks</span>
                                        </div>
                                        <div>
                                            <span class=" fe fe-users font-size-lg text-primary"></span>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bold mb-1">
                                    <?php 
                                        $db = mysqli_connect('localhost', 'root', '', 'fms_db');
                                        $query = "SELECT id FROM files ORDER BY id";
                                        $query_run = mysqli_query($db, $query);

                                        $row = mysqli_num_rows($query_run);

                                        echo $row;
                                    ?>
                                    </h2>
                                    <span class="ml-1 font-weight-medium">Number of tasks</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <!-- basic table -->
                      <div class="col-md-12 col-12 mb-5">
                        <div class="card">
                            <!-- card header  -->
                          <div class="card-header border-bottom-0">
                            <h4 class="mb-1">Recently Added:</h4>
                            </div>
                          <!-- table  -->
                       <div class="card-body pt-2">
                        <table id="dataTableBasic" class="table " style="width:100%">
                            <thead>
                                <tr>
                                    <th>File Name</th>
                                    <th>Date Added</th>
                                    <th>Location</th>
                                    <th>File Type</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $db = mysqli_connect('localhost', 'root', '', 'fms_db');
                            $sql = "SELECT * FROM files";
                            $result = $db->query($sql);

                                if($result-> num_rows > 0){
                                    while ($row = $result->fetch_assoc()){
                                        echo "<tr><td>" . $row["name"] . "</td><td>". $row["date_updated"] . "</td><td>". $row["file_type"] . "</td><td>". $row["file_type"] . "</td></td>";
                                    }
                                }else{
                                    echo "No Results";
                                    }
                            $db-> close();
                        ?>
                            </tbody>

                        </table>
                       </div>
                        </div>

                      </div>
                    </div>

                  </div>
			</div>
		</div>
        </div>

<?php include('components/footer.php')?>