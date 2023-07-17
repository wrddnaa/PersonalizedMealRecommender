<?php
session_start();
if (!$_SESSION["login_user"] || $_SESSION["role"] !='user') {
    echo "
    <script type='text/javascript'>
window.location.href ='../index.php';
</script>";
}
$login_session = $_SESSION['login_user'];
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Manage Meal</title>
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
                                <h4 class="mb-sm-0">Your Meal Order</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="card-header">

                        <br>
                        <table class="table table-success table-striped align-middle table-nowrap mb-0" style="max-height: 300px;overflow-y: scroll;">
                            <thead>
                                <tr>
                                    <th scope="col" style="background-color: lightpink;" >Id</th>
                                    <th scope="col" style="background-color: lightpink;" >Meal Order</th>
                                    <th scope="col" style="background-color: lightpink;" >Status Order</th>
                                    <th scope="col" style="background-color: lightpink;" >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php 
                                    $userId=$_SESSION["uid"];
                                    $sql = "SELECT * FROM profile WHERE user_id='$userId'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    $count = mysqli_num_rows($result);
                                    $ids = $row['id'];
                                    
                                    $query="Select meal.*,order_meal.id as idOrder, order_meal.status_id FROM meal
                                    JOIN order_meal ON order_meal.meal_id=meal.id
                                    WHERE order_meal.profile_id=$ids ";
                                    $result=$conn->query($query);
                                    $modal=1;
                                    if($result->num_rows>0){
                                      while ($row = $result->fetch_assoc()) {
                                        $id=$row['idOrder'];
                                        $mealName=$row['mealName'];
                                        $pic=$row['pic'];
                                        $status_id=$row['status_id'];
                                        if($status_id==1){
                                            $status='Ordered';
                                        }
                                        else{
                                            $status='Cancel';
                                        }
                                        echo"
                                        <tr>
                                        <th scope='row'>$modal</th>
                                        <td>$mealName</td>
                                        <td>$status</td>
                                        <td align='center'>
                                            <center><a data-bs-toggle='modal' data-bs-target='#deleteDisease'>
                                                <i class='ri-delete-bin-line' style='color:red;'></i>
                                            </a>
                                            <button type='button' class='btn btn-primary' style='padding: 0;border: none; background: none;' data-bs-toggle='modal' data-bs-target='#view$modal'>
                                            <i class='ri-eye-line' style='color:green;'></i>
                                            </button>
                                            </center>

                                        </td>
                                    </tr>
                                        ";
                                        echo "
                                        <div id='deleteDisease' class='modal fade' tabindex='-1' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='myModalLabel'>Delete Order Meal</h5>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'> </button>
                                                </div>
                                                <div class='modal-body'>
                                                <div class='row justify-content-end'>
                                                    <div class='col-auto me-2'>
                                                      <button type='button' class='btn btn-info bg-gradient waves-effect waves-light'  data-bs-dismiss='modal' aria-label='Close'>Cancel</button>
                                                    </div>
                                                    <div class='col-auto'>
                                                      <a href='Api/deleteMealOrder.php?id=$id'><button type='button' class='btn btn-danger bg-gradient waves-effect waves-light'>Delete Meal</button></a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        ";
                                       
                                        echo "
                                          
                                        <div id='view$modal' class='modal fade' tabindex='-1' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='myModalLabel'>Meal Picture</h5>
                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'> </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <iframe src='../MealPic/$pic' width='100%' height='500px' frameborder='0'></iframe></div>
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
                                        <td colspan='4' align='center'>No Meal Order Right Now</td>
                                      </tr>";
                                    }
                                    ?>
                                
                            </tbody>
                        </table>

                        <!-- href='Api/deleteMeal.php?id=$id' -->

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
                       