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

    <style>
    .btn-warning {
        background-color: lightyellow;
        color: black;
    }

    .btn-info {
        background-color: darkblue;
        color: white;
    }

</style>


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
                                <h4 class="mb-sm-0">Create Personalized Meal</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row mx-auto text-center">
                      <div class="col-9 offset-md-2">
                        <div class="card card-sm bg-success">
                            <div class="card-body checkout-tab">

                                    <form action="Api/updateMeal.php" method="POST">
                                        <div class="step-arrow-nav mt-n3 mx-n3 mb-3">

                                            <ul class="nav nav-pills nav-justified custom-nav" role="tablist" style="display:none;">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link fs-15 p-3 active" id="pro1-tab" data-bs-toggle="pill" data-bs-target="#pro1" type="button" role="tab" aria-controls="pills-bill-info" aria-selected="true"><i class="ri-user-2-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                                       </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link fs-15 p-3" id="pro2-tab" data-bs-toggle="pill" data-bs-target="#pro2" type="button" role="tab" aria-controls="pills-bill-address" aria-selected="false"><i class="ri-truck-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                                        Shipping Info</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link fs-15 p-3" id="pro3-tab" data-bs-toggle="pill" data-bs-target="#pro3" type="button" role="tab" aria-controls="pills-payment" aria-selected="false"><i class="ri-bank-card-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>
                                                        Payment Info</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link fs-15 p-3" id="pro4-tab" data-bs-toggle="pill" data-bs-target="#pro4" type="button" role="tab" aria-controls="pills-finish" aria-selected="false"><i class="ri-checkbox-circle-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>Finish</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link fs-15 p-3" id="pro5-tab" data-bs-toggle="pill" data-bs-target="#pro5" type="button" role="tab" aria-controls="pills-finish" aria-selected="false"><i class="ri-checkbox-circle-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>Finish</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link fs-15 p-3" id="pro6-tab" data-bs-toggle="pill" data-bs-target="#pro6" type="button" role="tab" aria-controls="pills-finish" aria-selected="false"><i class="ri-checkbox-circle-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>Finish</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link fs-15 p-3" id="pro7-tab" data-bs-toggle="pill" data-bs-target="#pro7" type="button" role="tab" aria-controls="pills-finish" aria-selected="false"><i class="ri-checkbox-circle-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>Finish</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link fs-15 p-3" id="pro8-tab" data-bs-toggle="pill" data-bs-target="#pro8" type="button" role="tab" aria-controls="pills-finish" aria-selected="false"><i class="ri-checkbox-circle-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>Finish</button>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="pro1" role="tabpanel" aria-labelledby="pro1-tab">
                                                
                                            <h4>Please choose the answer based on your preferences</h4>
                                                    <hr>
                                            <button type="button"  class="btn rounded-pill btn-warning waves-effect waves-light right ms-auto nexttab" data-nexttab="pro2-tab">Click to Start Personalizing Meal</button>
                                            </div>
                                            <!-- end tab pane -->

                                            <div class="tab-pane fade" id="pro2" role="tabpanel" aria-labelledby="pro2-tab">
                                                <center> <h4>Select Your Category</h4></center>
                                                <hr>

                                                <div class="d-flex justify-content-center">
                                                  <div class="btn-group" role="group" aria-label="Options">
                                                    <input type="radio" class="btn-check" name="preference" value='1' id="option1" checked>
                                                    <label class="btn btn-primary" for="option1">I have a health concern</label>
                                                
                                                    <input type="radio" class="btn-check" name="preference" value='2' id="option2">
                                                    <label class="btn btn-primary" for="option2">I want to lose weight</label>
                                                
                                                    <input type="radio" class="btn-check" name="preference" value='3' id="option3">
                                                    <label class="btn btn-primary" for="option3">I want to gain weight</label>
                                                
                                                    <input type="radio" class="btn-check" name="preference" value='4' id="option4">
                                                    <label class="btn btn-primary" for="option4">I want to eat healthily</label>
                                                  </div>
                                                </div>

                                                <center> 
                                                    <button type="button" class="btn rounded-pill btn-warning waves-effect waves-warning right ms-auto previestab" data-previous="pro1-tab">Back</button>
                                                    <button type="button"  class="btn rounded-pill btn-info waves-effect waves-light right ms-auto nexttab" data-nexttab="pro3-tab">Next</button>
                                                </center>
                                         
                                            </div>
                                            <!-- end tab pane -->

                                            <style>
                                            .btn-pink {
                                                background-color: pink;
                                                color: black;
                                                
                                            }
                                            </style>

                                                <div class="tab-pane fade" id="pro3" role="tabpanel" aria-labelledby="pro3-tab">
                                                <center>
                                                    <h4>Do you have allergies to nuts?</h4>
                                                </center>
                                                <hr>
                                                <div class="d-flex justify-content-center">
                                                    <div class="btn-group" role="group" aria-label="Nuts">
                                                    <input type="radio" class="btn-check" name="nut" value="1" id="nuts1">
                                                    <label class="btn btn-primary" for="nuts1">Yes, I have allergies to nuts</label>

                                                    <input type="radio" class="btn-check" name="nut" value="2" id="nuts2">
                                                    <label class="btn btn-primary btn-pink" for="nuts2">No, I am not</label>
                                                    </div>
                                                </div>
                                                <center>
                                                    <button type="button" class="btn rounded-pill btn-warning waves-effect waves-warning right ms-auto previestab" data-previous="pro2-tab">Back</button>
                                                    <button type="button" class="btn rounded-pill btn-info waves-effect waves-light right ms-auto nexttab" data-nexttab="pro4-tab">Next</button>
                                                </center>
                                                </div>
                                                <!-- end tab pane -->

                                                <div class="tab-pane fade" id="pro4" role="tabpanel" aria-labelledby="pro4-tab">
                                                <center>
                                                    <h4>Do you have allergies to seafood?</h4>
                                                </center>
                                                <hr>
                                                <div class="d-flex justify-content-center">
                                                    <div class="btn-group" role="group" aria-label="Seafood">
                                                    <input type="radio" class="btn-check" name="seafood" value="1" id="seafood1">
                                                    <label class="btn btn-primary" for="seafood1">Yes, I have allergies to seafood</label>

                                                    <input type="radio" class="btn-check" name="seafood" value="2" id="seafood2">
                                                    <label class="btn btn-pink" for="seafood2">No, I am not</label>
                                                    </div>
                                                </div>

                                                <center>
                                                    <button type="button" class="btn rounded-pill btn-warning waves-effect waves-warning right ms-auto previestab" data-previous="pro3-tab">Back</button>
                                                    <button type="button" class="btn rounded-pill btn-info waves-effect waves-light right ms-auto nexttab" data-nexttab="pro5-tab">Next</button>
                                                </center>
                                                </div>

                                                <div class="tab-pane fade" id="pro5" role="tabpanel" aria-labelledby="pro5-tab">
                                                <center>
                                                    <h4>Are you Lactose Intolerant?</h4>
                                                </center>
                                                <hr>
                                                <div class="d-flex justify-content-center">
                                                    <div class="btn-group" role="group" aria-label="Lactose">
                                                    <input type="radio" class="btn-check" name="lactose" value="1" id="lactose1">
                                                    <label class="btn btn-primary" for="lactose1">Yes, I am lactose intolerant</label>

                                                    <input type="radio" class="btn-check" name="lactose" value="2" id="lactose2">
                                                    <label class="btn btn-pink" for="lactose2">No, I am not</label>
                                                    </div>
                                                </div>
                                                
                                                <center>
                                                    <button type="button" class="btn rounded-pill btn-warning waves-effect waves-warning right ms-auto previestab" data-previous="pro4-tab">Back</button>
                                                    <button type="button" class="btn rounded-pill btn-info waves-effect waves-light right ms-auto nexttab" data-nexttab="pro6-tab">Next</button>
                                                </center>
                                                </div>


                                            <div class="tab-pane fade" id="pro6" role="tabpanel" aria-labelledby="pro6-tab">
                                                <center> <h4>Choose Your Vegetable Preferences<br></h4></center>
                                                <center> <h4>Note that the recipes recommended will also have extra ingredients that are not in user's selection</h4></center>
                                                <hr>
                                                <div class="row">
                                                <div class="col-md-4">
                                                  <div class="card card-animate">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" name="selected_items[]" id="exampleCheckbox1" value="1">
                                                      Tomato
                                                      <div class="card-body">
                                                        <label class="form-check-label" for="exampleCheckbox1">
                                                          <img class="rounded" alt="200x200" width="100" src="../SayurProtein/1.jpg" >
                                                        </label>
                                                      </div><!-- end card body -->
                                                    </div>
                                                  </div> <!-- end card-->
                                                </div> <!-- end col-->

                                                <div class="col-md-4">
                                                  <div class="card card-animate">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" name="selected_items[]" id="exampleCheckbox2" value="2">
                                                      Potato
                                                      <div class="card-body">
                                                        <label class="form-check-label" for="exampleCheckbox2">
                                                          <img class="rounded" alt="200x200" width="100" src="../SayurProtein/2.jpg" >
                                                        </label>
                                                      </div><!-- end card body -->
                                                    </div>
                                                  </div> <!-- end card-->
                                                </div> <!-- end col-->

                                                <div class="col-md-4">
                                                  <div class="card card-animate">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" name="selected_items[]" id="exampleCheckbox3" value="3">
                                                      Cabbage
                                                      <div class="card-body">
                                                        <label class="form-check-label" for="exampleCheckbox3">
                                                          <img class="rounded" alt="200x200" width="100" src="../SayurProtein/3.jpg" >
                                                        </label>
                                                      </div><!-- end card body -->
                                                    </div>
                                                  </div> <!-- end card-->
                                                </div> <!-- end col-->

                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="exampleCheckbox5"  value='4' name="selected_items[]">
                                                                    Carrot
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="exampleCheckbox5">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/4.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="exampleCheckbox6"  value='5' name="selected_items[]">
                                                                    Onion
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="exampleCheckbox6">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/5.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="exampleCheckbox7"  value='6' name="selected_items[]">
                                                                    Mushroom
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="exampleCheckbox7">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/6.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="exampleCheckbox8"  value='7' name="selected_items[]">
                                                                    Pumpkin
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="exampleCheckbox8">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/7.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="exampleCheckbox9"  value='8' name="selected_items[]">
                                                                    Broccoli
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="exampleCheckbox9">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/8.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="exampleCheckbox10"  value='9' name="selected_items[]">
                                                                    Green Peas
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="exampleCheckbox10">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/16.png" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="exampleCheckbox11"  value='10' name="selected_items[]">
                                                                    Brinjal
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="exampleCheckbox11">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/9.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="exampleCheckbox12"  value='11' name="selected_items[]">
                                                                    Capsicum
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="exampleCheckbox12">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/10.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="exampleCheckbox13"  value='12' name="selected_items[]">
                                                                    Cauliflower
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="exampleCheckbox13">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/11.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="exampleCheckbox14"  value='13' name="selected_items[]">
                                                                    Garlic
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="exampleCheckbox14">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/12.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="exampleCheckbox15"  value='14' name="selected_items[]">
                                                                    Beetroot
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="exampleCheckbox15">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/13.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="exampleCheckbox16"  value='15' name="selected_items[]">
                                                                    Bitter Gourd
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="exampleCheckbox16">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/14.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="exampleCheckbox17"  value='16' name="selected_items[]">
                                                                    Corn
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="exampleCheckbox17">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/15.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                </div> <!-- end row-->
                                                                
                                                <center> <button type="button" class="btn rounded-pill btn-warning waves-effect waves-warning right ms-auto previestab" data-previous="pro5-tab">Back</button>
                                                    <button type="button"  class="btn rounded-pill btn-info waves-effect waves-light right ms-auto nexttab" data-nexttab="pro7-tab">Next</button></center>
                                            </div>

                                            <div class="tab-pane fade" id="pro7" role="tabpanel" aria-labelledby="pro7-tab">
                                                <center>
                                                    <h4>Choose Your Carbohydrate Preference</h4>
                                                </center>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c1" value="1" name="selected_carb[]">
                                                                Brown Rice
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c1">
                                                                        <img class="rounded" alt="200x200" width="100" src="../SayurProtein/brownRice.jpeg">
                                                                    </label>
                                                                </div><!-- end card body -->
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c2" value="2" name="selected_carb[]">
                                                                Lentil
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c2">
                                                                        <img class="rounded" alt="200x200" width="100" src="../SayurProtein/lentils.jpeg">
                                                                    </label>
                                                                </div><!-- end card body -->
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c3" value="3" name="selected_carb[]">
                                                                Quinoa
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c3">
                                                                        <img class="rounded" alt="200x200" width="100" src="../SayurProtein/quinoa.jpg">
                                                                    </label>
                                                                </div><!-- end card body -->
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c4" value="4" name="selected_carb[]">
                                                                Sweet Potato
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c4">
                                                                        <img class="rounded" alt="200x200" width="100" src="../SayurProtein/sweetPotato.jpg">
                                                                    </label>
                                                                </div><!-- end card body -->
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c5" value="5" name="selected_carb[]">
                                                                White Bread
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c5">
                                                                        <img class="rounded" alt="200x200" width="100" src="../SayurProtein/whiteBread.jpg">
                                                                    </label>
                                                                </div><!-- end card body -->
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c6" value="6" name="selected_carb[]">
                                                                White Rice
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c6">
                                                                        <img class="rounded" alt="200x200" width="100" src="../SayurProtein/whiteRice.jpeg">
                                                                    </label>
                                                                </div><!-- end card body -->
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                </div>
                                                <center>
                                                    <button type="button" class="btn rounded-pill btn-warning waves-effect waves-warning right ms-auto previestab" data-previous="pro6-tab">Back</button>
                                                    <button type="button" class="btn rounded-pill btn-info waves-effect waves-light right ms-auto nexttab" data-nexttab="pro8-tab">Next</button>
                                                </center>
                                            </div>

                                            <div class="tab-pane fade" id="pro8" role="tabpanel" aria-labelledby="pro8-tab">
                                                <center> <h4>Choose Your Protein Preferences</h4></center>
                                                <center> <h4>Note that the recipes recommended will also have extra ingredients that are not in user's selection</h4></center>
                                                <hr>   
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c1"  value='1' name="selected_protein[]">
                                                                    Lean Beef
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c1">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/a.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c2"  value='2' name="selected_protein[]">
                                                                    Chicken
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c2">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/b.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c3"  value='3' name="selected_protein[]">
                                                                    White Fish
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c3">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/c.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c4"  value='4' name="selected_protein[]">
                                                                    Tofu
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c4">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/d.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c5"  value='5' name="selected_protein[]">
                                                                    Tuna
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c5">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/e.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c6"  value='6' name="selected_protein[]">
                                                                    Milk
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c6">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/f.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c7"  value='7' name="selected_protein[]">
                                                                    High Protein Milk
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c7">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/g.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c8"  value='8' name="selected_protein[]">
                                                                    Mixed Nuts
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c8">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/mixedNuts.jpeg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c9"  value='9' name="selected_protein[]">
                                                                    High Protein Yoghurt
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c9">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/h.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c10"  value='10' name="selected_protein[]">
                                                                    Cheese
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c10">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/i.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c11"  value='11' name="selected_protein[]">
                                                                    Eggs
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c11">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/j.jpg" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->
                                                    <div class="col-md-4">
                                                        <div class="card card-animate">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="c12"  value='12' name="selected_protein[]">
                                                                    Legumes
                                                                <div class="card-body">
                                                                    <label class="form-check-label" for="c12">
                                                                        <img class="rounded" alt="200x200" width="100"  src="../SayurProtein/legumes.png" >
                                                                    </label>
                                                                </div><!-- end card body -->
                                                                </input>
                                                            </div>
                                                        </div> <!-- end card-->
                                                    </div> <!-- end col-->                 
                                                </div>
                                                <center>
                                                    <button type="button" class="btn rounded-pill btn-warning waves-effect waves-warning right ms-auto previestab" data-previous="pro7-tab">Back</button>
                                                    <button type="button" class="btn rounded-pill btn-info waves-effect waves-light right ms-auto nexttab" data-nexttab="pro9-tab">Next</button>
                                                </center>
                                            </div>
                                            <div class="tab-pane fade" id="pro9" role="tabpanel" aria-labelledby="pro9-tab">
                                                <center> <h4>Do you have any diseases or sickness? If yes, please select below</h4></center>
                                                <hr>                    
                                                <select class="form-control" data-choices data-choices-removeItem  name='disease' placeholder='Choose Your Disease'>
                                                <?php
                                                 $query="SELECT * FROM lkp_disease";
                                                 $result=$conn->query($query);
                                                 $modal=1;
                                                 if($result->num_rows>0){
                                                   while ($row = $result->fetch_assoc()) {
                                                    $id=$row['id'];
                                                    $perihal=$row['perihal'];
                                                    echo " <option value='$id'>$perihal</option>";
                                                   }
                                                 }
                                                ?>
                                                </select>
                                                <input name="vegetable[]" type='hidden'/> 
                                                <input name="carb[]" type='hidden'/> 
                                                <input name="protein[]" type='hidden'/> 
                                                
                                                <center> <button type="button" class="btn rounded-pill btn-warning waves-effect waves-warning right ms-auto previestab" data-previous="pro8-tab">Back</button>
                                                <button type="submit"  class="btn rounded-pill btn-primary waves-effect waves-light right">Submit</button>
                                                <br>
                                            </div>
                                            <!-- end tab pane -->
                                        </div>
                                        <!-- end tab content -->
                                    </form>
                                </div>
                                <!-- end card body -->
                            </div>
                      </div>
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
    <script>
      $(document).ready(function() {
          var selectedItems = []; // initialize an empty array

          // add event listener to all checkboxes with name "selected_items[]"
          $('input[name="selected_items[]"]').on('change', function() {
            if ($(this).is(':checked')) {
              // add the value of the checkbox to the array if it's checked
              selectedItems.push($(this).val());
            } else {
              // remove the value of the checkbox from the array if it's unchecked
              var index = selectedItems.indexOf($(this).val());
              if (index !== -1) {
                selectedItems.splice(index, 1);
              }
            }
        
            // set the value of the hidden input field to the selectedItems array
            $('input[name="vegetable[]"]').val(JSON.stringify(selectedItems));

            console.log(selectedItems); // log the array to the console for testing
          });
        });
    </script>
    <script>
      $(document).ready(function() {
          var selectedCarbs = []; // initialize an empty array

          // add event listener to all checkboxes with name "selected_items[]"
          $('input[name="selected_carb[]"]').on('change', function() {
            if ($(this).is(':checked')) {
              // add the value of the checkbox to the array if it's checked
              selectedCarbs.push($(this).val());
            } else {
              // remove the value of the checkbox from the array if it's unchecked
              var index = selectedCarbs.indexOf($(this).val());
              if (index !== -1) {
                selectedCarbs.splice(index, 1);
              }
            }
        
            // set the value of the hidden input field to the selectedItems array
            $('input[name="carb[]"]').val(JSON.stringify(selectedCarbs));

            console.log(selectedCarbs); // log the array to the console for testing
          });
        });
    </script>
    <script>
      $(document).ready(function() {
          var selectedProteins = []; // initialize an empty array

          // add event listener to all checkboxes with name "selected_items[]"
          $('input[name="selected_protein[]"]').on('change', function() {
            if ($(this).is(':checked')) {
              // add the value of the checkbox to the array if it's checked
              selectedProteins.push($(this).val());
            } else {
              // remove the value of the checkbox from the array if it's unchecked
              var index = selectedProteins.indexOf($(this).val());
              if (index !== -1) {
                selectedProteins.splice(index, 1);
              }
            }
        
            // set the value of the hidden input field to the selectedItems array
            $('input[name="protein[]"]').val(JSON.stringify(selectedProteins));

            console.log(selectedProteins); // log the array to the console for testing
          });
        });
    </script>
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