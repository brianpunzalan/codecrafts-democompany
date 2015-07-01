<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center" style="margin-bottom:20px;">
                    <h2 class="section-heading"><?php print $contact_us['header']?></h2>
                    <hr class="primary">
                    <p><?php print $contact_us['message']?></p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p><?php print $contact_us['number']?></p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:<?php print $contact_us['email']?>"><?php print $contact_us['email']?></a></p>
                </div>
            </div>
        </div>
    </section>
