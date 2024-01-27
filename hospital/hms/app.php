<?php
session_start();
error_reporting(0);
include('include/config.php');

if (strlen($_SESSION['id']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_GET['cancel'])) {
        mysqli_query($con, "update appointment set userStatus='0' where id = '" . $_GET['id'] . "'");
        $_SESSION['msg'] = "Your appointment canceled !!";
    }
}
?>

<!DOCTYPE html>
<html lang="en" ng-app="calcApp">

<head>
    <title>User | Appointment History</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <script>
        var app = angular.module("calcApp", []);
        app.controller("calcCntrl", function ($scope) {
            $scope.pay = function () {
                $scope.success = true;
            }
        });
    </script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        function captureScreenshot() {
            html2canvas(document.querySelector(".print-content")).then(canvas => {
                var link = document.createElement('a');
                link.href = canvas.toDataURL();
                link.download = 'screenshot.png';
                link.click();
            });
        }
    </script>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body ng-controller="calcCntrl">
    <div id="app">
        <?php include('include/sidebar.php'); ?>
        <div class="app-content">
            <?php include('include/header.php'); ?>
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <main class="print-content">
                        <section id="page-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h1 class="mainTitle">User | Appointment Receipt</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><span>User </span></li>
                                    <li class="active"><span>Appointment Receipt</span></li>
                                </ol>
                            </div>
                        </section>
                        <div class="container-fluid container-fullw bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                                        <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                                    <table class="table table-hover" id="sample-table-1">
                                        <thead>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT doctors.doctorName AS docname, appointment.*
                                            FROM appointment
                                            JOIN doctors ON doctors.id = appointment.doctorId
                                            WHERE appointment.userId='" . $_SESSION['id'] . "'
                                            ORDER BY appointment.userId DESC");

                                            $cnt = 1;
                                           
                                            while ($row = mysqli_fetch_array($sql)) {
                                                if ($cnt == 1) {
                                            ?>
                                                    <tr>
                                                        <th class="hidden-xs">Doctor Name</th>
                                                        <td class="hidden-xs"><?php echo $row['docname']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Specialization</th>
                                                        <td><?php echo $row['doctorSpecialization']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Consultancy Fee</th>
                                                        <td><?php echo $row['consultancyFees']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Appointment Date / Time </th>
                                                        <td><?php echo $row['appointmentDate']; ?> / <?php echo $row['appointmentTime']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Appointment Creation Date </th>
                                                        <td><?php echo $row['postingDate']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Payment</th>
                                                        <td><span ng-show="success" style="color:green;">success</span> <span ng-hide="success">pending</span></td>
                                                    </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                                    $cnt = $cnt + 1;
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </main>
                    <form ng-show="!success">
    Enter a UPI ID <input type="text" placeholder="UPI ID" ng-model="upiId" required>
    <button ng-click="pay()" ng-disabled="!upiId" >Pay</button>
</form>

                    <button id="printButton" onclick="captureScreenshot()" ng-show="success">Print Appointment Receipt</button>
                </div>
            </div>
        </div>
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vendor/autosize/autosize.min.js"></script>
    <script src="vendor/selectFx/classie.js"></script>
    <script src="vendor/selectFx/selectFx.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="assets/js/main.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    <script>
        jQuery(document).ready(function () {
            Main.init();
            FormElements.init();
        });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>
