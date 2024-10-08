
<?php $__env->startSection('title', $page_data['about_seo_title']); ?>
<?php $__env->startSection('meta_description', $page_data['about_seo_meta_description']); ?>
<?php $__env->startSection('og_image', $page_data['about_banner']); ?>
<?php $__env->startSection('twitter_image', $page_data['about_banner']); ?>
<?php $__env->startSection('main'); ?>


    

    <!-- ***** About Area Starts ***** -->
    <div class="about-us" style="margin-top: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" style="background: #eeeeee;">
                    <div class="">
                        <div class="">
                            <div class="section-heading">
                                <h2>Need Assistance? Let's Talk About Warranty</h2>
                            </div>
                            <form action="<?php echo e(route('contact-sendmail')); ?>" method="post" id="contact"
                                class="form_contact_ajax">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name">Full Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                placeholder="Your Name">
                                            <span class="text-danger error-text name_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="email">Your Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Your email">
                                            <span class="text-danger error-text email_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">+88</div>
                                                </div>
                                                <input type="number" name="phone" class="form-control" id="phone" >
                                            </div>
                                            <span class="text-danger error-text phone_error"></span>
                                        </div>
                                    </div> 

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="message">Message</label>
                                            <textarea name="message" id="message" class="form-control my-0" placeholder="Your Message" rows="5"></textarea>
                                            <span class="text-danger error-text message_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-dark-button"><i
                                                    class="fa fa-paper-plane"></i></button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <h4>Warranty</h4>
                        <span>To secure your President product warranty please register the President Authentication Code
                            (PAC) within 7 days of purchase.
                            You can only enter the PAC once. If you have already registered and you would like to know about
                            your warranty details, please email us with your contact (name, email, mobile phone).
                            To register your President Authentication Code (PAC), scratch to reveal the hidden code and
                            enter the 16 digit code in to the table below.</span>
                        
                        <p>Our warranty covers a period of FIVE years or TWO years, depending on the product you purchased.
                            The warranty period is indicated on the warranty card of each product. The warranty starts from
                            the date of purchase, for any defective materials or workmanship, with the exceptions of damage
                            caused by accidents, transport damage, abuse of the product, purely cosmetic damage and
                            incidental or consequential damages.</p>
                        <ul>
                            <?php $__currentLoopData = $global_socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e($item->url); ?>"><?php echo $item->icon; ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** About Area Ends ***** -->


<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script type="text/javascript">
        (function($) {
            $(".form_contact_ajax").on('submit', function(e) {
                e.preventDefault();
                $('#loader').show();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        $('#loader').hide();
                        if (data.code == 0) {
                            $.each(data.error_message, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val[0]);
                            });
                        } else if (data.code == 1) {
                            $(form)[0].reset();
                            iziToast.success({
                                title: '',
                                position: 'topRight',
                                message: data.success_message,
                            });
                        }
                    }
                });
            });
        })(jQuery);
    </script>
    <div id="loader"></div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.master_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/pages/warranty.blade.php ENDPATH**/ ?>