<?php include 'header2.php'; ?>

  <!-- Page Breadcrumbs Start -->
  <div class="slider bg-navy-blue bg-scroll pos-rel breadcrumbs-page">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><i class="icofont-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Pages</a></li>
          <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
      </nav>  

      <h1>Contact Us</h1>
      <div class="breadcrumbs-description">

      </div>
    </div>
  </div>
  <!-- Page Breadcrumbs End -->
                                              <?php
/**
 * This example shows how to handle a simple contact form.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
$msg = '';
//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require 'autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
       $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.yandex.com';
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "contact@worldcounterfeit.com";
//Password to use for SMTP authentication
$mail->Password = "Taselouis";
    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('contact@worldcounterfeit.com', 'Site Contact');
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('contact@royallogistics.world', 'Contact');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'Speedington Express Contact';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Name: {$_POST['name']}
Email: {$_POST['email']}
Phone Number: {$_POST['phone']}
Subject: {$_POST['subject']}
Message: {$_POST['message']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.'. $mail->ErrorInfo;
        } else {
    echo "<script>alert('Message Successfully Send, you will receive a reply from us shortly')</script>";
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}
?> 

  <!-- Main Body Content Start -->
  <main id="body-content">

    <!-- Contact Details Start -->
    <section class="wide-tb-80 contact-full-shadow">
      <div class="container">
        <div class="contact-map-bg">
          <img src="images/map-bg.png" alt="">
        </div>
        <div class="row justify-content-between">
          <div class="col-md-6 col-sm-12 col-lg-4 wow fadeInRight" data-wow-duration="0" data-wow-delay="0s">
            <div class="contact-detail-shadow">
              <h4>Germany</h4>
              <div class="d-flex align-items-start items">
                <i class="icofont-google-map"></i> <span>254 Street Avenue, LA US</span>
              </div>
              <div class="text-nowrap d-flex align-items-start items">
                <i class="icofont-email"></i> <a href="#">support@speedingtonexpress.com</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-lg-4 wow fadeInLeft" data-wow-duration="0" data-wow-delay="0s">
            <div class="contact-detail-shadow">
              <h4>Spain</h4>
              <div class="d-flex align-items-start items">
                <i class="icofont-google-map"></i> <span>254 Street Avenue, LA US</span>
              </div>
              <div class="text-nowrap d-flex align-items-start items">
                <i class="icofont-email"></i> <a href="#">support@speedingtonexpress.com</a>
              </div>
            </div>
          </div>
        </div>
      </div>        
    </section>
    <!-- Contact Details End -->

    <!-- Contact Us From -->
    <section class="wide-tb-100 bg-light-gray pt-0">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-8 offset-lg-2 wow fadeInUp" data-wow-duration="0" data-wow-delay="0s">
            <div class="free-quote-form contact-page">
                <!-- Heading Main -->
                <h1 class="heading-main mb-4">
                  Get in touch
                </h1>
                <!-- Heading Main -->
                
                <form action="" method="post" id="contactusForm" novalidate="novalidate" class="col rounded-field">
                    <div class="form-row mb-4">
                      <div class="col">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
                      </div>
                      <div class="col">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                      </div>
                    </div>

                    <div class="form-row mb-4">
                      <div class="col">
                        <input type="text" name="subject"  class="form-control" placeholder="subject">
                      </div>
                      <div class="col">
                        <input type="text" name="phone"  class="form-control" placeholder="Phone Number">
                      </div>
                    </div>
              
                    <div class="form-row mb-4">
                      <div class="col">
                        <textarea rows="7" name="message" id="cment" placeholder="Message" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="form-row text-center">

                        <button id="contactForm" type="submit" class="form-btn mx-auto btn-theme bg-orange">Submit Now <i class="icofont-rounded-right"></i></button>
                    </div>
                </form>         
              </div>
          </div>
        </div>
      </div>
    </section>
 
  </main>    



  <?php include 'footer.php'; ?>