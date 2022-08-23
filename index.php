<?php include('db_connect.php')?>
<?php include('components/head.php')?>

<body id="bg-img">
  <!-- Page content -->
  <div id="header">
    <div id="imagebg">
        <img src="assets/images/uip_logo.png" alt="uip logo">
    </div>
    <h1>Unified Internship Program</h1>
  </div>
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center no-gutters min-vh-100">
      <div class="col-lg-5 col-md-8 py-8 py-xl-0">
        <!-- Card -->
        <div class="card shadow ">
          <!-- Card body -->
          <div class="card-body p-6"  id="div-center">
            <div class="mb-4">
              <h1 class="mb-1 font-weight-bold">Sign in <span style="font-size: 30px;"> </span>into your account.</span></h1>
            </div>
            <!-- Form -->
            <form action="index.php" method="post">
              	<!-- Username -->
              <div class="form-group">
                <label for="email" class="form-label">Username or email</label>
                <input type="text" id="username" class="form-control" name="username" placeholder="Username here"
                  required>
              </div>
              	<!-- Password -->
              <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="**************"
                  required>
              </div>
              	<!-- Checkbox -->
              <div class="d-lg-flex justify-content-between align-items-center mb-4">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="rememberme">
                  <label class="custom-control-label " for="rememberme">Remember me</label>
                </div>
              </div>
              <div>
                	<!-- Button -->
                <button type="submit" name="login_btn" class="btn1 btn btn-block" id="btn-lightblue">Sign in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('components/footer.php')?>