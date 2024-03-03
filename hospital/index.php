
<?php
include_once('hms/include/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];
$query=mysqli_query($con,"insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
echo "<script>alert('Your information succesfully submitted');</script>";
echo "<script>window.location.href ='index.php'</script>";

} ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Hospital management System </title>

    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
     <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

    <body>

    <!-- ################# Header Starts Here#######################--->
      <header id="menu-jk">
        <div id="nav-head" class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3  col-sm-12" style="color:#000;font-weight:bold; font-size:42px; margin-top: 1% !important;">HMS
                       <a data-toggle="collapse" data-target="#menu" href="#menu" ><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                    </div>
                    <div id="menu" class="col-lg-8 col-md-9 d-none d-md-block nav-item">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#about_us">About Us</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#contact_us">Contact Us</a></li>
                            <li><a href="#logins">Logins</a></li>  
                        </ul>
                    </div>
                    <div class="col-sm-2 d-none d-lg-block appoint">
                        <a class="btn btn-success" href="hms/user-login.php">Book an Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </header>   
     <!-- ################# Slider Starts Here#######################--->
    <div class="slider-detail">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item ">
                <img class="d-block w-100" src="assets/images/slider/h1.jpeg" alt="First slide">
                <div class="carousel-cover"></div>
                <div class="carousel-caption vdg-cur d-none d-md-block">
                    <h5 class="animated bounceInDown">Hospital Management System</h5>
                </div>
            </div>
            
            <div class="carousel-item active">
                <img class="d-block w-100" src="assets/images/slider/H2.jpg" alt="Second slide">
                <div class="carousel-cover"></div>
                <div class="carousel-caption vdg-cur d-none d-md-block">
                    <h5 class="animated bounceInDown">Hospital Management System</h5>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="assets/images/slider/H3.jpg" alt="Third slide">
                <div class="carousel-cover"></div>
                <div class="carousel-caption vdg-cur d-none d-md-block">
                    <h5 class="animated bounceInDown">Hospital Management System</h5>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="assets/images/slider/H4.jpg" alt="Fourth slide">
                <div class="carousel-cover"></div>
                <div class="carousel-caption vdg-cur d-none d-md-block">
                    <h5 class="animated bounceInDown">Hospital Management System</h5>
                </div>
            </div>    
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

    
  <!--  ************************* Logins ************************** -->
        
     <section id="logins" class="our-blog container-fluid">
        <div class="container">
        <div class="inner-title">

<h2 style="font-size: 38px;font-family:times new roman; text-align: center; margin-bottom: 20px;"><b>Logins</b></h2>
            </div>
            <div class="col-sm-12 blog-cont">
                <div class="row no-margin">
                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                                <img src="assets/images/new-user.jpg" height="200px" alt="">

                            <div class="blog-single-det">
                                <h6>Patient Login</h6>
                                <a href="hms/user-login.php" target="_blank">
                                    <button class="btn btn-success btn-sm">Click  Here</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                                <img src="assets/images/d1.jpg" alt="">

                            <div class="blog-single-det">
                                <h6>Doctors login</h6>
                                <a href="hms/doctor" target="_blank">
                                    <button class="btn btn-success btn-sm">Click Here</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                                <img src="assets/images/a1.jpg" height="200px" alt="">

                            <div class="blog-single-det">
                                <h6>Admin Login</h6>
                    
                                <a href="hms/admin" target="_blank">
                                    <button class="btn btn-success btn-sm">Click Here</button>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </section>  

    <!-- ################# Our Departments Starts Here#######################--->

<section id="services" class="key-features department">
    <div class="container">
        <div class="inner-title">
            <h2>Our Key Features</h2>
            <p>Explore some of our key features below</p>
        </div>

        <div class="row">
            <!-- Existing key features -->
            <div class="col-lg-4 col-md-6">
                <div class="single-key">
                    <i class="fas fa-heart"></i>
                    <h5>Cardiology</h5>
                    <p>Specialized care for heart-related issues.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-key">
                    <i class="fas fa-bone"></i>
                    <h5>Orthopaedic</h5>
                    <p>Comprehensive orthopedic services for bone health.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-key">
                   <i class="fas fa-brain"></i>
                    <h5>Neurology</h5>
                    <p>Expert care for neurological disorders.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-key">
                    <i class="fas fa-pills"></i>
                    <h5>Pharma Pipeline</h5>
                    <p>Innovative pharmaceutical developments.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-key">
                    <i class="fas fa-user-md"></i>
                    <h5>Pharma Team</h5>
                    <p>Collaborative team dedicated to pharmaceutical advancements.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-key">
                    <i class="fas fa-medkit"></i>
                    <h5>High-Quality Treatments</h5>
                    <p>Providing top-notch medical treatments for your well-being.</p>
                </div>
            </div>

            <!-- Additional key features -->
            <div class="col-lg-4 col-md-6">
                <div class="single-key">
                    <i class="fas fa-dna"></i>
                    <h5>Genetics</h5>
                    <p>Exploring genetic solutions for personalized healthcare.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-key">
                    <i class="fas fa-tooth"></i>
                    <h5>Dentistry</h5>
                    <p>Comprehensive dental care for a healthy smile.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-key">
                   <i class="fas fa-microscope"></i>
                    <h5>Research & Development</h5>
                    <p>Advancing healthcare through cutting-edge research.</p>
                </div>
            </div>
        </div>
    </div>
</section>



    <!--  ************************* About Us Starts Here ************************** -->
        
    <section id="about_us" class="about-us">
        <div class="row no-margin">
            <div class="col-sm-6 image-bg no-padding">
                
            </div>
            <div class="col-sm-6 abut-yoiu">
                <h3>About Our Hospital</h3>
<?php
$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
while ($row=mysqli_fetch_array($ret)) {
?>

    <p><?php  echo $row['PageDescription'];?>.</p><?php } ?>
            </div>
        </div>
    </section>    
    
    
            <!--  ************************* Gallery Starts Here ************************** -->
            <div id="gallery" class="gallery">    
    <div class="container">
        <div class="inner-title">
            <h2>Our Gallery</h2>
            <p>View Our Gallery</p>
        </div>
        <div class="row">
            <div class="gallery-filter d-none d-sm-block">
                <button class="btn btn-default filter-button" data-filter="all">All</button>
                <button class="btn btn-default filter-button" data-filter="hdpe">Dental</button>
                <button class="btn btn-default filter-button" data-filter="sprinkle">Cardiology</button>
                <button class="btn btn-default filter-button" data-filter="spray">Neurology</button>
                <button class="btn btn-default filter-button" data-filter="irrigation">Laboratory</button>
            </div>
            <br/>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                <img src="assets/images/gallery/gallery_01.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                <img src="assets/images/gallery/gallery_03.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                <img src="assets/images/gallery/d1.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                <img src="assets/images/gallery/d2.jpg" class="img-responsive">
            </div>

            <!-- Add two more images to the Cardiology section -->
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                <img src="assets/images/gallery/h1.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                <img src="assets/images/gallery/h2.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                <img src="assets/images/gallery/h3.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                <img src="assets/images/gallery/h4.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                <img src="assets/images/gallery/gallery_13.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                <img src="assets/images/gallery/gallery_14.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                <img src="assets/images/gallery/gallery_15.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                <img src="assets/images/gallery/gallery_05.jpg" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                <img src="assets/images/gallery/gallery_06.jpg" class="img-responsive">
            </div>
        </div>
    </div>
</div>
        <!-- ######## Gallery End ####### -->
     <!--  ************************* Contact Us Starts Here ************************** -->
     <style>
    #contact_us {
        background-color: #f8f8f8;
        padding: 50px 0;
    }

    .contact-us-single {
        text-align: center;
        font-family: 'Open Sans', sans-serif;
    }

    .cop-ck {
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .form-control {
        width: 100%;
        padding: 12px;
        margin: 12px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-family: 'Open Sans', sans-serif;
    }

    h2 {
        color: #333;
        font-weight: bold;
        margin-bottom: 20px;
        font-size: 28px;
    }

    label {
        font-weight: bold;
        margin-bottom: 10px;
        display: block;
        font-size: 16px;
    }

    textarea {
        width: 100%;
        padding: 12px;
        margin: 12px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 6px;
        resize: vertical;
        font-family: 'Open Sans', sans-serif;
    }

    button {
        background-color: #28a745;
        color: #fff;
        padding: 15px 30px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 18px;
        font-weight: bold;
    }

    button:hover {
        background-color: #218838;
    }
</style>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">

<section id="contact_us" class="contact-us-single">
    <div class="row no-margin">
        <div class="col-sm-12 cop-ck">
            <form method="post" id="contactForm">
                <h2>Contact Form</h2>
                <div class="row cf-ro">
                    <div class="col-sm-3"><label for="fullname">Enter Name:</label></div>
                    <div class="col-sm-8"><input type="text" id="fullname" placeholder="Enter Name" name="fullname" class="form-control input-sm" required></div>
                </div>
                <div class="row cf-ro">
                    <div class="col-sm-3"><label for="emailid">Email Address:</label></div>
                    <div class="col-sm-8"><input type="email" id="emailid" name="emailid" placeholder="Enter Email Address" class="form-control input-sm" required></div>
                </div>
                <div class="row cf-ro">
                    <div class="col-sm-3"><label for="mobileno">Mobile Number:</label></div>
                    <div class="col-sm-8"><input type="tel" id="mobileno" name="mobileno" placeholder="Enter Mobile Number" class="form-control input-sm" required></div>
                </div>
                <div class="row cf-ro">
                    <div class="col-sm-3"><label for="description">Enter Message:</label></div>
                    <div class="col-sm-8">
                        <textarea rows="5" id="description" placeholder="Enter Your Message" class="form-control input-sm" name="description" required></textarea>
                    </div>
                </div>
                <div class="row cf-ro">
                    <div class="col-sm-3"><label></label></div>
                    <div class="col-sm-8">
                        <button class="btn btn-success btn-sm" type="submit" name="submit">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
    <!-- ################# Footer Starts Here#######################--->
    <footer class="footer">
        <div class="container">
            <div class="row">
       
                <div class="col-md-6 col-sm-12">
    <h2 style="color: white; font-family: 'Times New Roman', Times, serif;">Useful Links</h2>
    <ul class="list-unstyled link-list">
        <li><a ui-sref="about" href="#about_us">About us</a><i class="fa fa-angle-right"></i></li>
        <li><a ui-sref="portfolio" href="#services">Services</a><i class="fa fa-angle-right"></i></li>
        <li><a ui-sref="products" href="#logins">Logins</a><i class="fa fa-angle-right"></i></li>
        <li><a ui-sref="gallery" href="#gallery">Gallery</a><i class="fa fa-angle-right"></i></li>
        <li><a ui-sref="contact" href="#contact">Contact us</a><i class="fa fa-angle-right"></i></li>
    </ul>
</div>
                <div class="col-md-6 col-sm-12 map-img">
                    <h2 style="font-family: 'Times New Roman', Times, serif; color: white; text-decoration: underline;"><b>Contact Us</b></h2>
					<address class="md-margin-bottom-40">

<?php
$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
while ($row=mysqli_fetch_array($ret)) {
?>
                        <?php  echo $row['PageDescription'];?> <br>
                        Phone: <?php  echo $row['MobileNumber'];?> <br>
                        Email: <a href="mailto:<?php  echo $row['Email'];?>" class=""><?php  echo $row['Email'];?></a><br>
                        Timing: <?php  echo $row['OpenningTime'];?>
                    </address>
        <?php } ?>
                </div>
            </div>
        </div>        
    </footer>
   <div class="copy" style="text-align: right; font-family: 'Times New Roman', Times, serif;">
    <div class="container">
       <b> Hospital Management System | It's Me </b>            
    </div>
</div>
</body>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-nav/js/jquery.easing.min.js"></script>
<script src="assets/plugins/scroll-nav/js/scrolling-nav.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>
</html>