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
        app.controller("calcCntrl", function ($scope, $timeout) {
            var randomTransactionId = '';
            for (var i = 0; i < 12; i++) {
                randomTransactionId += Math.floor(Math.random() * 10);
            }
            $scope.transactionId = randomTransactionId;

            function checkUPID(upiId) {
                // Regular expression for UPI ID validation
                var upiRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-zA-Z]{2,6}$|^[0-9]{10,15}@([a-zA-Z]+|\d+)$/;
                // Test the UPI ID against the regular expression
                return upiRegex.test(upiId);
            }

            $scope.validateUPI = function () {
                // Example usage
                $scope.isValidUPI = checkUPID($scope.upiId);

                if ($scope.isValidUPI) {
                    $scope.failupi = false;
                } else {
                    $scope.failupi = true;
                }
            }

            $scope.pay = function () {
                $scope.success1 = true;
                $scope.success = true;
                $scope.processing = true;
                $timeout(function () {
                    $scope.processing = false; // Turn off the processing indicator
                }, 5000);
            }
        });
    </script>


    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
         // Simulating loading completion after 5 seconds
         
        function captureScreenshot() {
            html2canvas(document.querySelector(".print-content")).then(canvas => {
                var link = document.createElement('a');
                link.href = canvas.toDataURL();
                link.download = 'screenshot.png';
                link.click();
            });
           
        }
    </script>
    <script>setTimeout(function () {
            document.getElementById('messageBox').style.display = 'block';
        }, 5000);</script>
    <style>
       .payment-option {
        text-align: center;
        margin-top: 20px;
        display: none; /* Initially hide all payment options */
    }

    .payment-option i {
        font-size: 36px;
    }
        .loading-container {
            text-align: center;
        }

        .loading-animation {
            display: inline-block;
            width: 50px;
            height: 50px;
            border: 8px solid #3498db;
            border-top: 8px solid #e74c3c;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .message-box {
            display: none;
            background-color: #3498db;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
        }
		
    </style>

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
                                        <loader ng-show="processing">
                                        <div class="loading-container" >
                                      <div class="loading-animation"></div>
                                          </div></loader>
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

                                    <table class="table table-hover" id="sample-table-1" ng-show="!processing">
                                        <thead>
                                           
                                            <tr><th>Patient Name</th>
                                            <td>
                                                <span class="username">
                                                <?php $query1=mysqli_query($con,"select fullName from users where id='".$_SESSION['id']."'");
                                                    while($row1=mysqli_fetch_array($query1))
                                                       {
                                                            echo $row1['fullName'];
                                                       }
                                                    ?></span></td></tr>
                                                
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
                                                        <td><span ng-show="success" style="color:green;">Success</span> <span ng-hide="success">Pending</span></td>
                                                    </tr>
                                                    <tr ng-show="success">
                                                        <th>UPI ID</th>
                                                        <td> {{upiId}}</td>
                                                    </tr>
                                                    <tr ng-show="success">
                                                        <th>UPI Transaction ID</th>
                                                        <td>{{ transactionId }}</td>
                                                    </tr>
                                                    <tr ng-show="success">
                                                        <th>UPI Payment App</th>
                                                        <td>{{ paymentAmount }}</td>
                                                    </tr>
                                                    </main>
													<tr><td> </td></tr>
                                                    <tr>
    <td></td>
    <td style="text-align: center;">
        <button id="printButton" onclick="captureScreenshot()" ng-show="success" style="background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;">
            Print Appointment Receipt
        </button>
    </td>
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
                    <form name="form" ng-show="!success1">
                    <b ng-init="paymentAmount = 'Google Pay'">
                        <label style="font-size: 20px; color: #333; font-weight: bold;">Select Payment APP : </label></b>
                    <select ng-model="paymentAmount" style="background-color: #f0f0f0; font-family: 'Times New Roman'; color: #333; padding: 5px; border-radius: 20px;">
    <option value="Paytm">Paytm</option>
    <option value="Google Pay">Google Pay</option>
    <option value="Phone Pay">Phone Pay</option>
    <option value="Amazon Pay">Amazon Pay</option>
    <option value="BHIM">BHIM</option>
    <option value="MobiKwik">MobiKwik</option>
</select>

<br><br>

<div class="payment-option" ng-show="paymentAmount === 'Paytm'">
    <i class="fab fa-paypal"></i>
    <span>Paytm</span>
</div>

<div class="payment-option" ng-show="paymentAmount === 'Google Pay'">
    <i class="fab fa-google-pay"></i>
    <span>Google Pay</span>
</div>

<div class="payment-option" ng-show="paymentAmount === 'Phone Pay'">
    <i class="fab fa-phone-alt"></i>
    <span>Phone Pay</span>
</div>

<div class="payment-option" ng-show="paymentAmount === 'Amazon Pay'">
    <i class="fab fa-amazon-pay"></i>
    <span>Amazon Pay</span>
</div>

<div class="payment-option" ng-show="paymentAmount === 'BHIM'">
    <i class="fab fa-bhim"></i>
    <span>BHIM</span>
</div>

<div class="payment-option" ng-show="paymentAmount === 'MobiKwik'">
    <i class="fab fa-mobikwik"></i>
    <span>MobiKwik</span>
</div>

            
<input type="text" ng-model="upiId" placeholder="Enter UPI ID" ng-change="validateUPI()">



<button ng-click="pay()" ng-disabled="failupi">Pay</button>
<span ng-if="failupi" style="color: red; font-weight: bold;">Invalid UPI ID</span>

</form>
<div ng-show="!processing">
                    
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
