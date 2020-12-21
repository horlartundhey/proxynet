<?php require("layouts/header2.php");?>


<!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center text-light" style="background-image: url(img/contact-us.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Contact Us</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>                        
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Star Contact Area
    ============================================= -->
    <div class="contact-area default-padding-top">
        <div class="container">
            <div class="row">

                <!-- Start Contact Info -->
                <div class="col-md-8 col-md-offset-2 text-center contact-forms">
                    <div class="contact-box">
                        <h2>leave a <strong>message</strong></h2>
                        <p>
                            We'd Love to hear from You!!
                        </p>
                        <form action="assets/mail/contact.php" method="POST" class="contact-form">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                        <i class="fas fa-user"></i>
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                        <i class="fas fa-envelope-open"></i>
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text">
                                        <i class="fas fa-phone"></i>
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group comments">
                                        <textarea class="form-control" id="comments" name="comments" placeholder="Write a Message *"></textarea>
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <button type="submit" name="submit" id="submit">
                                        Send Message <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Alert Message -->
                            <div class="col-md-12 alert-notification">
                                <div id="message" class="alert-msg"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Contact Info -->

            </div>
        </div>
        <!-- Google Maps -->
        <div class="maps-area">
            <div class="container-full">
                <div class="row">
                    <div class="google-maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.443637360811!2d3.3558533147065566!3d6.5916513241962145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b923f7233f37b%3A0x2c733a651c26cccf!2sProxynet%20Communications!5e0!3m2!1sen!2sng!4v1602170208652!5m2!1sen!2sng"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->

<?php require("layouts/footer.php");?>