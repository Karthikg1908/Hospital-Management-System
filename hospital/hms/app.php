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
        $scope.pay = function () {
            $scope.success1=true;
            // Example usage
            $scope.isValidUPI = checkUPID($scope.upiId);

            function checkUPID(upiId) {
                // Regular expression for UPI ID validation
                var upiRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-zA-Z]{2,6}$|^[0-9]{10,15}@([a-zA-Z]+|\d+)$/;
                // Test the UPI ID against the regular expression
                return upiRegex.test(upiId);
            }

            // Simulate a 5-second processing delay
            $scope.processing = true;
            $timeout(function () {
                // Output: true or false
                if ($scope.isValidUPI) {
                    $scope.success = true;
                    var randomTransactionId = '';
                    for (var i = 0; i < 12; i++) {
                        randomTransactionId += Math.floor(Math.random() * 10);
                    }
                    $scope.transactionId = randomTransactionId;
                } else {
                    $scope.failupi = true;
                }
                $scope.processing = false; // Turn off the processing indicator
            }, 5000);
        };
    });
</script>


    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script>
    // Function to capture screenshot and initiate download
    function captureScreenshot() {
        html2canvas(document.querySelector(".print-content")).then(canvas => {
            var link = document.createElement('a');
            link.href = canvas.toDataURL();
            link.download = 'screenshot.png';
            link.click();
        });
    }
</script>

    <style>
        .payment-option {
            display: inline-block;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }
        .payment-option.selected {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
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
		.bn5 {
  padding: 0.6em 2em;
  border: none;
  outline: none;
  color: rgb(255, 255, 255);
  background: #111;
  cursor: pointer;
  position: relative;
  z-index: 0;
  border-radius: 10px;
}

.bn5:before {
  content: "";
  background: linear-gradient(
    45deg,
    #ff0000,
    #ff7300,
    #fffb00,
    #48ff00,
    #00ffd5,
    #002bff,
    #7a00ff,
    #ff00c8,
    #ff0000
  );
  position: absolute;
  top: -2px;
  left: -2px;
  background-size: 400%;
  z-index: -1;
  filter: blur(5px);
  width: calc(100% + 4px);
  height: calc(100% + 4px);
  animation: glowingbn5 20s linear infinite;
  opacity: 0;
  transition: opacity 0.3s ease-in-out;
  border-radius: 10px;
}

@keyframes glowingbn5 {
  0% {
    background-position: 0 0;
  }
  50% {
    background-position: 400% 0;
  }
  100% {
    background-position: 0 0;
  }
}

.bn5:active {
  color: #000;
}

.bn5:active:after {
  background: transparent;
}

.bn5:hover:before {
  opacity: 1;
}

.bn5:after {
  z-index: -1;
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: #191919;
  left: 0;
  top: 0;
  border-radius: 10px;
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
                    <form ng-show="!success1">
                    <div>
            <div>
    <label style="font-size: 20px; color: #333; font-weight: bold;">Select Payment APP:</label>
    
</div>
<div class="payment-option" id="paytm" onclick="selectPaymentOption('paytm')">Paytm</div>
    <div class="payment-option" id="googlepay" onclick="selectPaymentOption('googlepay')">Google Pay</div>
    <div class="payment-option" id="phonepay" onclick="selectPaymentOption('phonepay')">Phone Pay</div>
    <input type="hidden" id="selectedPaymentOption" name="selectedPaymentOption">

    <script>
        function selectPaymentOption(option) {
            var paymentOptions = document.querySelectorAll('.payment-option');
            paymentOptions.forEach(function (element) {
                element.classList.remove('selected');
            });
            document.getElementById(option).classList.add('selected');
            document.getElementById('selectedPaymentOption').value = option;
        }
    </script>

            
    Enter a UPI ID <input type="text" placeholder="UPI ID" ng-model="upiId" required>
    <button ng-click="pay()" ng-disabled="!upiId" class="bn5">Pay</button>
<span  style="color:red;"ng-show="failupi">Please enter the corect UPI ID</span>
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
