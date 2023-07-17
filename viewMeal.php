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
    <title>Meal Recommender</title>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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

            // $preference=$_POST["preference"];
            // $nuts=$_POST["nut"];
            // $seafood=$_POST["seafood"];
            // $lactose=$_POST["lactose"];
            // $vegetables = $_POST['vegetable']; 
            // $protein = $_POST['protein'];
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
                                <h4 class="mb-sm-0">Meal Ingredients</h4>
                            </div>
                        </div>
                    </div>
                    

                    <?php
                    $id=$_GET["id"];
               
                    $query="SELECT meal.id AS ids, meal.preferences_id, meal.nuts_status, meal.seafood_status, meal.dairyProduct_status,
                    meal.ingredients, meal.mealName, meal.type, meal.pic, preferences.perihal 
                        FROM meal
                        JOIN preferences ON preferences.id = meal.preferences_id 
                        JOIN vegetable_meal ON vegetable_meal.meal_id = meal.id 
                        JOIN protein_meal ON protein_meal.meal_id = meal.id 
                        JOIN disease_meal ON disease_meal.meal_id = meal.id
                        WHERE meal.id=$id
                        GROUP BY meal.id ";

                    $result=$conn->query($query);
                    $modal=1;
                    // $modal2=1;
                    if($result->num_rows>0){
                       while ($row = $result->fetch_assoc()) {
                            $id=$row['ids'];
                            $preferences_id=$row['preferences_id'];
                            $nuts_status=$row['nuts_status'];
                            $seafood_status=$row['seafood_status'];
                            $dairyProduct_status=$row['dairyProduct_status'];
                            $ingredients=$row['ingredients'];
                            $mealName=$row['mealName'];
                            $perihal=$row['perihal'];
                            $type=$row['type'];
                            $pic=$row['pic'];

                            if($nuts_status==1){
                                $nutStat='Yes';
                            }
                            else{
                                $nutStat='No';
                            }

                            if($seafood_status==1){
                                $seafoodStat='Yes';
                            }
                            else{
                                $seafoodStat='No';
                            }

                            if($dairyProduct_status==1){
                                $dairyProductStatus='Yes';
                            }
                            else{
                                $dairyProductStatus='No';
                            }


                            
                            echo "
                                    <div class='card'>
                                        <div class='row g-0'>
                                        <div class='col-md-4'>
                                                <img class='rounded-start img-fluid h-100 object-cover' src='../MealPic/$pic' alt='Card image'>
                                            </div>
                                            <div class='col-md-8'>
                                                <div class='card-header'>
                                                <h5 class='card-title mb-0'>$mealName</h5>
                                                </div>
                                                <div class='card-body'>
                                                    <p class='card-text mb-2'>For $type</p>
                                                    <p class='card-text mb-2'>Category: <b>$perihal</b></p>
                                                    <p class='card-text mb-2'>Nut Allergies: <b>&nbsp;$nutStat</b></p>
                                                    <p class='card-text mb-2'>Seafood Allergies: <b>&nbsp;$seafoodStat</b></p>
                                                    <p class='card-text mb-2'>Lactose Intolerance: <b>&nbsp;$dairyProductStatus</b></p>
                                                    <p class='card-text mb-2'><b>";

                                                     $query2="SELECT lkp_vegetable.perihal as sayur FROM vegetable_meal JOIN lkp_vegetable ON lkp_vegetable.id=vegetable_meal.id WHERE vegetable_meal.meal_id=$id";
                                                     $result2=$conn->query($query2);
                                                     if($result2->num_rows>0){
                                                       while ($row2 = $result2->fetch_assoc()) {
                                                         $sayur=$row2['sayur'];
                                                         echo $sayur.'&nbsp;';
                                                       }
                                                     }
                                                    echo"</b>
                                                    </p>
                                                    <p class='card-text mb-2'><b>";
                                                    $query3="SELECT lkp_protein.perihal as protein FROM protein_meal JOIN lkp_protein ON lkp_protein.id=protein_meal.id WHERE protein_meal.meal_id=$id";
                                                    $result3=$conn->query($query3);
                                                    if($result3->num_rows>0){
                                                      while ($row3 = $result3->fetch_assoc()) {
                                                        $protein=$row3['protein'];
                                                        echo $protein.'&nbsp;';
                                                      }
                                                    }
                                                    echo"</b>
                                                    </p>
                                                    <p class='card-text mb-2'><b>";
                                                    $query4="SELECT lkp_carb.perihal as perihal FROM carb_meal JOIN lkp_carb ON lkp_carb.id=carb_meal.id WHERE carb_meal.meal_id=$id";
                                                    $result4=$conn->query($query4);
                                                    if($result4->num_rows>0){
                                                      while ($row4 = $result4->fetch_assoc()) {
                                                        $perihal=$row4['perihal'];
                                                        echo $perihal.'&nbsp;';
                                                      }
                                                    }
                                                    else{
                                                        echo '<br>';
                                                    }
                                                    echo"
                                                    </b>
                                                    </p>
                                                    <p class='card-text mb-2'><b>";
                                                    $query5="SELECT lkp_disease.perihal as perihal FROM disease_meal JOIN lkp_disease ON lkp_disease.id=disease_meal.id WHERE disease_meal.meal_id=$id";
                                                    $result5=$conn->query($query5);
                                                    if($result5->num_rows>0){
                                                      while ($row5 = $result5->fetch_assoc()) {
                                                        $perihal=$row5['perihal'];
                                                        echo $perihal.'&nbsp;';
                                                      }
                                                    }
                                                    else{
                                                        echo '<br>';
                                                    }
                                                    echo"
                                                    </b>
                                                    </p>
                                                    <center><a href='Api/orderMeal.php?id=$id'>
                                                        <button type='button' class='btn btn-success waves-effect waves-light'>Order Meal</button>
                                                    </a></center>
                                                </div>
                                            </div>
                                        </div>
                                        
                               <hr>
                               <div class='col-md-12'>
                                <div class='card-header'>
                                    <center><h5 class='card-title mb-0'>Recipe</h5></center>
                                </div> 
                                <div class='card-body text-center'>
                                    <img class='rounded-start img-fluid object-cover' src='../MealPic/$ingredients' alt='Card image' style='max-width: 500px; height: auto;'>
                                </div>
                            </div>
                         </div>
                        
                            ";

                        $modal++;
                        // $modal2++;
                       }
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
    <button onclick='topFunction()' class='btn btn-danger btn-icon' id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <!-- init js -->
    <script src="assets/js/pages/ecommerce-product-checkout.init.js"></script>

</body>

</html>