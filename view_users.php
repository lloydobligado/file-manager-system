<?php require_once 'userpage_function.php';?>
<?php   
    $mysqli= new mysqli('localhost', 'root','','fms_db') or die(mysqli_error(mysqli));
    $result = $mysqli->query("SELECT * FROM users") or die($mysqli->error);
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
                                <h1 class="mb-1 h2 font-weight-bold">USER PROFILE</h1>
                            </div>
						</div>
					</div>
				</div>

                <div>
                    <div class="row">
                      <!-- basic table -->
                        <div class="col-md-12 col-12 mb-5 ">
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
                                                <th>ID</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Restriction</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php while($row =$result->fetch_assoc()):;?>
                                            <tr>
                                            <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['username'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['user_type'];?></td>
                                                <td><a href="add_user.php?edit=<?php echo $row['id'];?>" id="edit" class ="btn btn-info">Edit</a>
                                                    <a href="userpage_function.php?delete=<?php echo $row['id'];?>" id="delete" class ="btn btn-danger">Delete</a></td>
                                            </tr>
                                        <?php endwhile; ?>
                                        </tbody>
                                       
                                    </table>
                                </div>
                                <?php
                                    function pre_r($array){
                                    echo '<pre>';
                                    print_r($array);
                                    echo '</pre>';}
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        
<?php include('components/footer.php')?>