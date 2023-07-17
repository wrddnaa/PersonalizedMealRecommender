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
    <title>Aktiviti Pelajar</title>
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
                                <h4 class="mb-sm-0">Aktiviti Pelajar</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <?php
                        include('../dbConnect.php');

                        $modal = 1;
                        $query="SELECT * FROM aktivitiPelajar";
                        $result = $conn->query($query);
                        if($result->num_rows>0){
                          while($row=$result->fetch_assoc()){
                            $penerangan= $row['penerangan'];
                            $tarikh= $row['tarikh'];
                            $pic= $row['gambar'];
                            $id2= $row['id'];
                        
                            echo "
                            <div class='col-xxl-6'>
                                    <div class='card'>
                                        <div class='row g-0'>
                                            <div class='col-md-4'>
                                                <img class='rounded-start img-fluid h-100 object-cover' src='../Aktiviti/$pic' alt='Card image'>
                                            </div>
                                            <div class='col-md-8'>
                                                <div class='card-body'>
                                                    <p class='card-text mb-2'>$penerangan</p>
                                                    <p class='card-text'><small class='text-muted'>Tarikh: $tarikh</small></p>


                                                    <button type='button' class='btn btn-primary' style='padding: 0;border: none; background: none;' data-bs-toggle='modal' data-bs-target='#edit$modal'>
                                                        <i class='ri-pencil-line' style='color:green;'></i>
                                                    </button>
                                                    <a href='Api/deleteAktiviti.php?id=$id2' type='button' class='btn btn-primary' style='padding: 0;border: none; background: none;'>
                                                        <i class='ri-eraser-fill ' style='color:brown;'></i>
                                                    </a>
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
                                            <h5 class='modal-title' id='myModalLabel'>Kemaskini Aktiviti</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'> </button>
                                        </div>
                                        <div class='modal-body'>
                                            <form action='Api/updateAktiviti.php' method='post' class='row g-3'>

                                                <div class='col-md-12'>
                                                    <label for='fullnameInput' class='form-label'>Penerangan Aktiviti</label>
                                                    <input type='text' class='form-control' id='fullnameInput' value='$penerangan' name='penerangan'>
                                                    </input>
                                                </div>

                                                <div class='col-md-12'>
                                                    <label for='inputEmail4' class='form-label'>Tarikh</label>
                                                    <input type='date' class='form-control'  name='tarikh' value='$tarikh'>
                                                </div>
                                                <input type='hidden' name='id' value='$id2'/>

                                                <div class='col-12'>
                                                    <div class='text-end'>
                                                        <button type='submit' class='btn btn-success'>Kemaskini Aktiviti</button>
                                                    </div>
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
                    
                    }
        
                    ?>
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