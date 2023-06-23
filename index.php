<?php
include 'conn.php';

if (isset($_POST['cont'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $sql = "INSERT INTO tbl_contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
  $result = mysqli_query($con, $sql);
  if ($result) {
    // $success = "Your message has been sent. We will contact you via your submitted email.";
   echo "<script language='javascript'>";
echo 'alert("Your message has been sent. We will contact you via your submitted email.");';
echo 'window.location.replace("index.php");';

echo "</script>";
  //  
  } else {
    // $err = "Please Try Again Or Try Later";
    echo "<script>alert('error');
    header(“Location: index.php ”);</script>";
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inner Page - Medicio Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/CareConnect4.png" rel="icon">
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

       <!--Load Sweet Alert Javascript-->
       <script src="assets/js/swal.js"></script>
       
        <!--Inject SWAL-->
        <?php if(isset($success)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success","<?php echo $success;?>","success");
                            },
                                100);
                </script>

        <?php } ?>

        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Failed","<?php echo $err;?>","Failed");
                            },
                                100);
                </script>

        <?php } ?>


  <!-- =======================================================
  * Template Name: Medicio
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


  <style>
    ::-webkit-scrollbar {
      width: 10px;
      /* border: 2px solid blue; */
    }

    ::-webkit-scrollbar-thumb {
      border-radius: 10px;
      background: #838b8c;
      cursor: pointer;
    }

    ::-webkit-scrollbar-thumb:hover {
      border-radius: 10px;
      background: #3fbbc0;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="bi bi-clock"></i> Monday - Saturday, 8AM to 10PM
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-phone"></i> Call us now +91 98298 29829
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.php" class="logo me-auto"><img src="assets/img/CareConnect4.png" style="height:90px" alt=""><img src="assets/img/CareConnect5.png" style="height:100px" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="plogin.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>
      <a href="login.php" class="appointment-btn scrollto">Login</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->


  <!-- Slide 1 --> <?php
                    $sql1 = "SELECT picture FROM tbl_slideshow";
                    $res1 = mysqli_query($con, $sql1);

                    if ($res1) {
                      echo '<section id="hero">';
                      echo '<div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">';
                      echo '<ol class="carousel-indicators" id="hero-carousel-indicators"></ol>';
                      echo '<div class="carousel-inner" role="listbox">';

                      $firstImage = true;
                      while ($r = mysqli_fetch_assoc($res1)) {
                        echo '<div class="carousel-item';
                        if ($firstImage) {
                          echo ' active';
                          $firstImage = false;
                        }    
                        echo '" style="background-image: url(slideshow/' . $r['picture'] . ')">';
                        // echo '<div class="container">';
                        //  echo '<h2>Welcome to <span>CareConnect</span></h2>';
                        //  echo '<p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>';
                        //  echo '<a href="#about" class="btn-get-started scrollto">Read More</a>';
                        echo '</div>';
                      }

                      echo '</div>';
                      echo '<a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">';
                      echo '<span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>';
                      echo '</a>';
                      echo '<a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">';
                      echo '<span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>';
                      echo '</a>';
                      echo '</div>';
                      echo '</section>';
                    }
                    ?>


  <!-- Slide 2 -->
  <!-- <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="container">
            <h2>Lorem Ipsum Dolor</h2>
            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div> -->

  <!-- Slide 3 -->
  <!-- <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
          <div class="container">
            <h2>Sequi ea ut et est quaerat</h2>
            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div> -->

  <!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4 class="title"><a href="">Cardiology</a></h4>
              <p class="description">Specialized Cardiology Care for a Healthy Heart</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="fas fa-pills"></i></div>
              <h4 class="title"><a href="">Pharmacy</a></h4>
              <p class="description">Comprehensive Pharmacy Services for Your Medication Needs</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="fas fa-thermometer"></i></div>
              <h4 class="title"><a href="">Diagnostics</a></h4>
              <p class="description">Advanced Imaging Services for Accurate Diagnostics</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="fas fa-dna"></i></div>
              <h4 class="title"><a href="">Wellness</a></h4>
              <p class="description">Innovative Rehabilitation Programs for Optimal Recovery and Wellness</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>In an emergency? Need help now?</h3>
          <p> Experience seamless appointment scheduling with our user-friendly online platform, ensuring that you can book your desired date and time with just a few clicks.</p>
          <a class="cta-btn scrollto" href="plogin.php">Make an Appointment</a>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
          <p>Welcome to CareConnect, where compassionate care meets medical excellence. We are dedicated to providing exceptional healthcare services to our patients and their families. With a team of highly skilled doctors, nurses, and support staff, we strive to deliver the highest standard of care in a safe and welcoming environment.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <img src="assets/img/istockphoto-1312706504-612x612.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>Why Choose CareConnect?</h3>
            <p class="fst-italic">
              Our commitment to excellence is evident in our state-of-the-art facilities and advanced medical technologies. From diagnosis to treatment, we employ cutting-edge techniques and evidence-based practices to ensure accurate and effective healthcare outcomes.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Transparent services
                & Friendly Staff.</li>
              <li><i class="bi bi-check-circle"></i> Affordable prices & Variety health check-up packages</li>
              <li><i class="bi bi-check-circle"></i> Timely diagnosis - treatment, and care facilities</li>
            </ul>
            <p>
              What sets us apart is our patient-centric approach. We understand that each individual is unique, with specific healthcare needs and concerns. That's why we prioritize personalized care, taking the time to listen, understand, and involve you in your healthcare journey. We believe in building strong relationships with our patients based on trust, empathy, and respect.
            </p>
            <p>Collaboration is at the heart of what we do. Our multidisciplinary team works seamlessly together, combining their expertise to provide comprehensive and integrated care across various medical specialties.</p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fas fa-user-md"></i>
              <span data-purecounter-start="0" data-purecounter-end="80" data-purecounter-duration="1" class="purecounter"></span>

              <p><strong>Doctors</strong> ready to provide you with exceptional medical care.</p>
              <a href="#">Find out more &raquo;</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="far fa-hospital"></i>
              <span data-purecounter-start="0" data-purecounter-end="26" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Departments</strong> Discover our diverse range of specialized departments. </p>
              <a href="#">Find out more &raquo;</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fas fa-flask"></i>
              <span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Research Lab</strong> Explore our cutting-edge research labs.</p>
              <a href="#">Find out more &raquo;</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fas fa-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Awards</strong> Award-Winning Hospital Recognized for Excellence in Healthcare.</p>
              <a href="#">Find out more &raquo;</a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Features Section ======= -->
    <!-- <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
            <div class="icon-box mt-5 mt-lg-0">
              <i class="bx bx-receipt"></i>
              <h4>Est labore ad</h4>
              <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
            </div>
            <div class="icon-box mt-5">
              <i class="bx bx-cube-alt"></i>
              <h4>Harum esse qui</h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
            </div>
            <div class="icon-box mt-5">
              <i class="bx bx-images"></i>
              <h4>Aut occaecati</h4>
              <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
            </div>
            <div class="icon-box mt-5">
              <i class="bx bx-shield"></i>
              <h4>Beatae veritatis</h4>
              <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
            </div>
          </div>
          <div class="image col-lg-6 order-1 order-lg-2" style='background-image: url("assets/img/features.jpg");' data-aos="zoom-in"></div>
        </div>

      </div>
    </section>End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>From preventive care to advanced treatments, our hospital provides a comprehensive range of healthcare services designed to promote your well-being and address your medical needs with expertise and compassion. With a focus on delivering exceptional care, our services encompass diagnostics, treatments, rehabilitation, and support, all tailored to ensure the highest quality of healthcare and improve the lives of our patients.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><i class="fas fa-heartbeat"></i></div>
            <h4 class="title"><a>Cardiology</a></h4>
            <p class="description">Our experienced cardiologists offer advanced cardiac care, including evaluations, interventions, and rehabilitation.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="fas fa-pills"></i></div>
            <h4 class="title"><a>Pharmacy</a></h4>
            <p class="description">Our pharmacy offers convenient access to medications, products, and expert advice from pharmacists.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon"><i class="fas fa-hospital-user"></i></div>
            <h4 class="title"><a>Radiology</a></h4>
            <p class="description">Our radiology department offers comprehensive imaging services, including X-rays, ultrasound, CT scans, and MRI scans.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><i class="fas fa-dna"></i></div>
            <h4 class="title"><a>Laboratory Services</a></h4>
            <p class="description">Our lab performs diagnostic tests, including blood tests, and genetic testing, ensuring accurate and timely results.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="fas fa-wheelchair"></i></div>
            <h4 class="title"><a>Emergency Room</a></h4>
            <p class="description">Our 24/7 emergency department provides immediate care for life-threatening conditions, accidents, and severe illnesses.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon"><i class="fas fa-notes-medical"></i></div>
            <h4 class="title"><a>Physical Therapy</a></h4>
            <p class="description">Our therapists provide tailored rehab programs for post-surgery, injuries, promoting recovery and mobility.</p>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Departments</h2>
          <p>Explore our specialized departments at CareConnect, where our medical professionals deliver comprehensive care in various specialties to prioritize your health and well-being. Discover the expertise and advanced treatments available to meet your unique healthcare needs.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <?php
          $sql = "SELECT * FROM tbl_department";
          $res = mysqli_query($con, $sql);

          if ($res) {
            $departments = mysqli_fetch_all($res, MYSQLI_ASSOC); // Fetch all departments as an associative array

            // Generate department tabs
            echo '<div class="row">';
            foreach ($departments as $index => $department) {
              $isActive = $index === 0 ? 'active show' : ''; // Set the first department as active
              echo '<div class="col-lg-4 mb-5 mb-lg-0">
                <ul class="nav nav-tabs flex-column">';
              echo '<li class="nav-item">
                <a class="nav-link" href="view_department.php?did=' . $department['departmentid'] . '">';
              if ($department['departmentid'] == 1) {
                echo '<img src="https://www.apollohospitals.com/wp-content/themes/apollohospitals/assets-v3/images/ent.svg" alt="icon">';
              } else if ($department['departmentid'] == 2) {
                echo '<img src="https://www.apollohospitals.com/wp-content/themes/apollohospitals/assets-v3/images/orthopaedic.svg" alt="icon">';
              } else if ($department['departmentid'] == 3) {
                echo '<img src="https://www.apollohospitals.com/wp-content/themes/apollohospitals/assets-v3/images/dermatology.svg" alt="icon">';
              } else if ($department['departmentid'] == 4) {
                echo '<img src="https://www.apollohospitals.com/wp-content/themes/apollohospitals/assets-v3/images/neurology.svg" alt="icon">';
              } else if ($department['departmentid'] == 5) {
                echo '<img src="https://www.apollohospitals.com/wp-content/themes/apollohospitals/assets-v3/images/gynecology.svg" alt="icon">';
              } else if ($department['departmentid'] == 6) {
                echo '<img src="https://www.apollohospitals.com/wp-content/themes/apollohospitals/assets-v3/images/dentistry.svg" alt="icon">';
              } else if ($department['departmentid'] == 8) {
                echo '<img src="https://www.apollohospitals.com/wp-content/themes/apollohospitals/assets-v3/images/radiology.svg" alt="icon">';
              } else if ($department['departmentid'] == 9) {
                echo '<img src="https://www.apollohospitals.com/wp-content/themes/apollohospitals/assets-v3/images/psychiatry.svg" alt="icon">';
              } else if ($department['departmentid'] == 10) {
                echo '<img src="https://www.apollohospitals.com/wp-content/themes/apollohospitals/assets-v3/images/paediatricurology.svg" alt="icon">';
              } else {
                echo '<img src="https://www.apollohospitals.com/wp-content/themes/apollohospitals/assets-v3/images/paediatricurology.svg" alt="icon">';
              }
              echo  '<h4>' . $department['name'] . '</h4>
                <p>' . $department['heading'] . '</p>
                </a>
              </li>';
              echo '</ul>
              </div>';
            }
            echo '</div>';
          }
          ?>






        </div>

      </div>
    </section><!-- End Departments Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>Read what our patients have to say about their experiences at CareConnect. Their testimonials reflect our commitment to exceptional care, compassion, and positive outcomes.</p>
        </div>
        <?php
$sql = "SELECT p.name, p.lname, t.patientid, id, review FROM tbl_patient p, tbl_testimonial t WHERE p.patientid = t.patientid AND status = 1";
$res = mysqli_query($con, $sql);

if ($res) {
  echo '<div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">';

  while ($r = mysqli_fetch_assoc($res)) {
    echo '<div class="swiper-slide">
            <div class="testimonial-item" style="background-color: #f9f9f9; padding: 10px; border-radius: 8px; text-align: center;">
              <p style="font-size: 16px; margin-bottom: 10px;">
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                '.$r['review'].'
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <div class="testimonial-info">
                <img src="patient/assets/images/users/patient.png" class="testimonial-img" alt="" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%; margin-bottom: 5px;">
                <h3 style="font-size: 18px; font-weight: bold; margin: 0;">'.$r['name'].' '.$r['lname'].'</h3>
              </div>
            </div>
          </div><!-- End testimonial item -->';
  }

  echo '</div>
        <div class="swiper-pagination"></div>
      </div>';
}
?>


</div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Doctors</h2>
          <p>Our esteemed team of highly qualified doctors brings a wealth of experience and expertise across various medical specialties, ensuring that you receive the highest standard of care tailored to your specific needs.</p>
        </div>

        <?php
        $sql = "SELECT d.name, d.lname, d.picture, s.name AS dep FROM tbl_doctor d, tbl_department s WHERE s.departmentid=d.departmentid";
        $res = mysqli_query($con, $sql);

        if ($res) {
          echo '<div class="row">'; // Open the row container

          while ($r = mysqli_fetch_assoc($res)) {
            echo '<div class="col-lg-3 col-md-6 d-flex align-items-stretch">';
            echo '<div class="member" data-aos="fade-up" data-aos-delay="100">';
            echo '<div class="member-img">';
            echo '<img src="doctor/assets/images/users/' . $r['picture'] . '" class="img-fluid" alt="" style="height: 200px;width: 1500px;">';
            echo '<div class="social">';
            echo '<a href=""><i class="bi bi-twitter"></i></a>';
            echo '<a href=""><i class="bi bi-facebook"></i></a>';
            echo '<a href=""><i class="bi bi-instagram"></i></a>';
            echo '<a href=""><i class="bi bi-linkedin"></i></a>';
            echo '</div></div>';
            echo '<div class="member-info">';
            echo '<h4>' . $r['name'] . ' ' . $r['lname'] . '</h4>';
            echo '<span>' . $r['dep'] . '</span>';
            echo '</div></div></div>';
          }

          echo '</div>'; // Close the row container
        }
        ?>

      </div>
    </section><!-- End Doctors Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Take a visual tour through our hospital's gallery to witness our state-of-the-art facilities, patient-centered care, and the warm environment that awaits you at CareConnect.</p>
        </div>
        <?php $sql1 = "SELECT picture FROM tbl_gallery";
        $res1 = mysqli_query($con, $sql1);

        if ($res1 && mysqli_num_rows($res1) > 0) {
          echo '<div class="gallery-slider swiper">
            <div class="swiper-wrapper align-items-center">';

          while ($r = mysqli_fetch_assoc($res1)) {
            echo '<div class="swiper-slide">
              <a class="gallery-lightbox" href="gallery/' . $r['picture'] . '">
                <img src="gallery/' . $r['picture'] . '" class="img-fluid" alt="">
              </a>
            </div>';
          }

          echo '  </div>
            <div class="swiper-pagination"></div>
          </div>';
        }


        ?>
      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>For any inquiries, concerns, or to reach out to our dedicated team, please feel free to contact us through our provided channels. Your well-being is our priority.</p>
        </div>

      </div>

      <!-- <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div> -->

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>CareConnect Hospital, Surat, Gujarat 395007</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@careconnect.co.in<br>contact@careconnect.co.in</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+91 98298 29829<br>+91 98298 29820</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form method="post" enctype="multipart/form-data" class="php-email-form">

              <div class="row">

                <div class="form-group col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <input type="text" name="email" class="form-control" id="email" placeholder="Your Email">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Message" required=""></textarea>
              </div>
              <div class="my-3">
              <button name="cont" type="submit">Send Message</button>
          </div>

        
        </form> <!--End Patient Form-->
      </div>

      </div>

      </div>


    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>CareConnect</h3>
              <p>
                CareConnect Hospital,<br>
                Surat, Gujarat 395007<br><br>
                <strong>Phone:</strong> +91 98298 29829<br>
                <strong>Email:</strong> contact@careconnect.co.in<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#departments">Departments</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#doctors">Doctors</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Explore</h4>
            <ul>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Patient Care</a></li> -->
              <li><i class="bx bx-chevron-right"></i> <a href="privacy.php">Privacy Policy</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="terms.php">Terms & Conditions</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li> -->
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Subscribe Our Newsletter</h4>
            <p>Get A Lot Of Information About Us</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Careconnect</span></strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>


<!-- <li class="nav-item mt-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                  <h4>Neurology</h4>
                  <p>Voluptas vel esse repudiandae quo excepturi.</p>
                </a>
              </li>
              <li class="nav-item mt-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                  <h4>Hepatology</h4>
                  <p>Velit veniam ipsa sit nihil blanditiis mollitia natus.</p>
                </a>
              </li>
              <li class="nav-item mt-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                  <h4>Pediatrics</h4>
                  <p>Ratione hic sapiente nostrum doloremque illum nulla praesentium id</p>
                </a>
              </li> -->

<!-- <div class="tab-pane" id="tab-2">
                <h3>Neurology</h3>
                <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                <img src="assets/img/departments-2.jpg" alt="" class="img-fluid">
                <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
              </div>
              <div class="tab-pane" id="tab-3">
                <h3>Hepatology</h3>
                <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                <img src="assets/img/departments-3.jpg" alt="" class="img-fluid">
                <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
              </div>
              <div class="tab-pane" id="tab-4">
                <h3>Pediatrics</h3>
                <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                <img src="assets/img/departments-4.jpg" alt="" class="img-fluid">
                <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
              </div>
            </div> -->




