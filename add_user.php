<?php include('components/head.php')?>
<?php include('components/bodymain.php')?>
<?php include('components/sidebar.php')?>
<?php include('components/navbar.php')?>

            <!-- Container fluid -->
            <?php require_once 'userpage_function.php';?>
            <?php   $mysqli= new mysqli('localhost', 'root','','fms_db') or die(mysqli_error(mysqli));
            ?>
            <div class="container-fluid p-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Page header -->
                        <div class="border-bottom pb-4 mb-4">
                            <div>
                            <?php if($update==true):?>
                              <h1 class="mb-1 h2 font-weight-bold"> EDIT USER </h1>
                             <?php else: ?>
                              <h1 class="mb-1 h2 font-weight-bold">ADD USER</h1>
                              <?php endif; ?>
                            </div>
						</div>
					</div>
				</div>
            <div>
                    
            <div class="row">
            <div class="col-md-12 col-12 mb-5">
                <form action="userpage_function.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                    <!-- Card -->
                    <div class="card mb-3 ">
                        <!-- Card body -->
                        <div class="card-body">
                        <div class="form-group">
                            <label for="courseTitle" class="form-label">Username</label>
                            <input id="courseTitle" class="form-control" type="text" name="username" 
                            value="<?php echo $username;?>" placeholder="Username" />
                        </div>
                        <div class="form-group">
                            <label for="courseTitle" class="form-label">Email</label>
                            <input id="courseTitle" class="form-control" type="email" name="email" 
                            value="<?php echo $email;?>" placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">User Role</label>
                            <select class="selectpicker" data-width="100%" name="usertype" id="user type"
                            value="<?php echo $usertype;?>">
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="courseTitle" class="form-label">Password</label>
                            <input id="courseTitle" class="form-control" type="password" name="password"
                            value="<?php echo $password;?>" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <label for="courseTitle" class="form-label">Confirm Password</label>
                            <input id="courseTitle" class="form-control" type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" />
                        </div>
                        <!-- Button -->
                        <?php 
                        if($update==true):
                        ?>
                        <button class="btn btn-primary" type="submit" name="update" id="update">Update</button>
                        <input type="button" onclick="location.href='view_users.php'" type="button" class="btn btn-outline-white" value="Close">
                        <?php else: ?>
                        <button class="btn btn-primary" type="submit" name="add" id="add">
                            Save
                        </button>
                        <?php endif;?>
                        </div>

                    </div>
            </form>
        </div>
        </div>
        
<?php include('components/footer.php')?>
