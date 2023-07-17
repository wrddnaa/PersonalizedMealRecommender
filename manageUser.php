<?php
session_start();
if (!$_SESSION["login_user"] || $_SESSION["role"] !='user') {
    echo "
    <script type='text/javascript'>
window.location.href ='../index.php';
</script>";
}
$login_session = $_SESSION['login_user'];
$uid = $_SESSION['uid'];
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>User Manage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
    <div class="layout-width">
      <?php
      include('Component/header.php');
      ?>
    </div>
</header>
        <!-- ========== App Menu ========== -->
        <?php 
         include('Component/asside.php');
        ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Manage User</h4>


                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                       
                        <div class="col-12">
                            <div class="text-end">
                                <button type="button" class="btn btn-success bg-gradient waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addUser">Add User</button>
                            </div>
                        </div>

                        <div id='addUser' class='modal fade' tabindex='-1' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='myModalLabel'>Add User</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'> </button>
                                    </div>
                                    <div class='modal-body'>
                                            <form class="needs-validation" action="Api/addUser.php" method="post">
                                                <div class="mb-3">
                                                    <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                                    <div class="invalid-feedback">
                                                       Enter Your Email
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="nama" placeholder="Your Name" required>
                                                    <div class="invalid-feedback">
                                                        Sila Masukkan Nama
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Age <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="umur" placeholder="Your Age" required>
                                                    <div class="invalid-feedback">
                                                        Sila Masukkan Nama
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Address <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="alamat" placeholder="Your Address" required>
                                                    <div class="invalid-feedback">
                                                        Sila Masukkan Nama
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">Password</label>
                                                    <div class="position-relative auth-pass-inputgroup">
                                                        <input type="password" class="form-control pe-5 password-input" name='pass' onpaste="return false" placeholder="Password" id="password-input" aria-describedby="passwordInput" required>
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        <div class="invalid-feedback">
                                                            Sila Masukkan Kata Laluan
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">Register</button>
                                                </div>

                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <table class="table table-success table-striped align-middle table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Height (cm)</th>
                                    <th scope="col">Weight (kg)</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php 

                                    $query="select user.id,user.email,user.password, profile.nama , profile.umur, profile.alamat, profile.weight, profile.height ,profile.noFon from user 
                                    join profile on profile.user_id =user.id
                                    WHERE user.id NOT IN ($uid);";
                                    $result=$conn->query($query);
                                    $modal=1;
                                    if($result->num_rows>0){
                                      while ($row = $result->fetch_assoc()) {
                                        $id=$row['id'];
                                        $email=$row['email'];
                                        $nama=$row['nama'];
                                        $umur=$row['umur'];
                                        $alamat=$row['alamat'];
                                        $weight=$row['weight'];
                                        $height=$row['height'];
                                        $noFon=$row['noFon'];
                                        $password=$row['password'];

                                       
                                        
                                        echo"
                                        <tr>
                                        <th scope='row'>$modal</th>
                                        <td>$nama</td>
                                        <td>$email</td>
                                        <td>$noFon</td>
                                        <td>$umur</td>
                                        <td>$height</td>
                                        <td>$weight</td>
                                        <td>$alamat</td>
                                        <td align='center'>
                                            <center><a  data-bs-toggle='modal' data-bs-target='#deleteUser'>
                                                <i class='ri-delete-bin-line' style='color:red;'></i>
                                            </a>
                                            <button type='button' class='btn btn-primary' style='padding: 0;border: none; background: none;' data-bs-toggle='modal' data-bs-target='#edit$modal'>
                                                <i class='ri-eye-line' style='color:green;'></i>
                                            </button></center>
                                        </td>
                                    </tr>
                                        ";
                                        echo "
                                            <div id='deleteUser' class='modal fade' tabindex='-1' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='myModalLabel'>Delete User</h5>
                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'> </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                    <div class='row justify-content-end'>
                                                        <div class='col-auto me-2'>
                                                          <button type='button' class='btn btn-info bg-gradient waves-effect waves-light'  data-bs-dismiss='modal' aria-label='Close'>Cancel</button>
                                                        </div>
                                                        <div class='col-auto'>
                                                          <a href='Api/deleteUser.php?id=$id'><button type='button' class='btn btn-danger bg-gradient waves-effect waves-light'>Delete User</button></a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        ";
                                        echo "
                                          
                                            <div id='edit$modal' class='modal fade' tabindex='-1' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='myModalLabel'>User Update</h5>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'> </button>
                                                        </div>
                                                        <div class='modal-body'>
                                                        <form class='needs-validation' action='Api/editUser.php' method='post'>
                                                        <div class='mb-3'>
                                                            <label for='useremail' class='form-label'>Email <span class='text-danger'>*</span></label>
                                                            <input type='email' class='form-control' name='email' placeholder='Email' required value='$email' disabled>
                                                            <div class='invalid-feedback'>
                                                               Enter Your Email
                                                            </div>
                                                        </div>
                                                        <div class='mb-3'>
                                                            <label for='username' class='form-label'>Name <span class='text-danger'>*</span></label>
                                                            <input type='text' class='form-control' name='nama' placeholder='Your Name' required value='$nama'>
                                                            <div class='invalid-feedback'>
                                                                Sila Masukkan Nama
                                                            </div>
                                                        </div>
                                                        <div class='mb-3'>
                                                            <label for='username' class='form-label'>Age <span class='text-danger'>*</span></label>
                                                            <input type='number' class='form-control' name='umur' placeholder='Your Age' required value='$umur'>
                                                            <div class='invalid-feedback'>
                                                                Sila Masukkan Nama
                                                            </div>
                                                        </div>
                                                        <div class='mb-3'>
                                                            <label for='username' class='form-label'>Address <span class='text-danger'>*</span></label>
                                                            <input type='text' class='form-control' name='alamat' placeholder='Your Address' required value='$alamat'>
                                                            <div class='invalid-feedback'>
                                                                Sila Masukkan Nama
                                                            </div>
                                                        </div>
                                                        <div class='mb-3'>
                                                            <label for='username' class='form-label'>Weight (kg) <span class='text-danger'></span></label>
                                                            <input type='number' class='form-control' name='weight' placeholder='User Weight' required value='$weight'>
                                                        </div>
                                                        <div class='mb-3'>
                                                            <label for='username' class='form-label'>Height (kg) <span class='text-danger'></span></label>
                                                            <input type='number' class='form-control' name='height' placeholder='User Height' required value='$height'>
                                                        </div>
                                                        <div class='mb-3'>
                                                            <label for='username' class='form-label'>Phone Number <span class='text-danger'></span></label>
                                                            <input type='number' class='form-control' name='noFon' placeholder='Phone Number' required value='$noFon'>
                                                        </div>
                                                        <input type='hidden' name='id' value='$id' />
                                                        <div class='mb-3'>
                                                            <label class='form-label' for='password-input'>Password</label>
                                                            <div class='position-relative auth-pass-inputgroup'>
                                                                <input type='password' class='form-control pe-5 password-input' name='pass' onpaste='return false' placeholder='Password' id='password-input' aria-describedby='passwordInput' required value='$password'>
                                                                <button class='btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon' type='button' id='password-addon'><i class='ri-eye-fill align-middle'></i></button>
                                                                <div class='invalid-feedback'>
                                                                    Sila Masukkan Kata Laluan
                                                                </div>
                                                            </div>
                                                        </div>
        
        
                                                        <div class='mt-4'>
                                                            <button class='btn btn-success w-100' type='submit'>Update User</button>
                                                        </div>
        
                                                    </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                        $modal++;
                                      }
                                    }
                                    else{
                                      echo "
                                      <tr>
                                        <td colspan='9'><center>No User Record</center></td>
                                      </tr>";
                                    }
                                    ?>
                                
                            </tbody>
                        </table>



                    </div>
                   
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->


    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>
                                            