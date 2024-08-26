
<?php $__env->startSection('title', $page_data['about_seo_title']); ?>
<?php $__env->startSection('meta_description', $page_data['about_seo_meta_description']); ?>
<?php $__env->startSection('og_image', $page_data['about_banner']); ?>
<?php $__env->startSection('twitter_image', $page_data['about_banner']); ?>
<?php $__env->startSection('main'); ?>


    <!-- ***** About Area Starts ***** -->
    <div style="margin-top: 120px;">
        <div class="container">
            <div class="container mt-5">
                <div class="section-header bg-warning p-5 text-center text-light">
                    <h2>Stores</h2>
                </div>



                <p>
                    <button class="bg-dark border-0 btn btn-primary mt-4 p-4 rounded-0 w-100" type="button"
                        data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                        aria-controls="collapseExample">
                        BANGLADESH
                    </button>
                </p>
                <div class="collapse" id="collapseExample">

                    <div class="card bg-light border-0  p-5">
                        <div class="row mt-4">
                            <div class="col-md-4 border-bottom mb-3 pb-3">
                                <h5>LUGGAGE PARK</h5>
                                <p>129-130, Govt. New Market, Dhaka 1205</p>
                                <p>P: +88 02 58612708, +88 02 58612706</p>
                                <p>Opening Hours</p>
                                <p>Mon to Sun (10:00am – 9:00pm daily)</p>
                            </div>
                            <div class="col-md-4 border-bottom mb-3 pb-3">
                                <h5>PRESIDENT GARDEN</h5>
                                <p>Shop No.21,22, S. B Plaza, Plot No.37,Road No.2, Sector.3, Uttara, Dhaka 1230</p>
                                <p>P: +880 1710 379726</p>
                                <p>Opening Hours</p>
                                <p>Mon to Sun (10:00am – 9:00pm daily)</p>
                            </div>
                            <div class="col-md-4 border-bottom mb-3 pb-3">
                                <h5>PRESIDENT LIFE STYLE</h5>
                                <p>137, Govt. New Market, Dhaka 1205</p>
                                <p>P: +88 02 9676408</p>
                                <p>Opening Hours</p>
                                <p>Mon to Sun (10:00am – 9:00pm daily)</p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4 border-bottom mb-3 pb-3">
                                <h5>PRESIDENT PARK</h5>
                                <p>266-267, Govt. New Market, Dhaka 1205</p>
                                <p>P: +88 02 9672227</p>
                                <p>Opening Hours</p>
                                <p>Mon to Sun (10:00am – 9:00pm daily)</p>
                            </div>
                            <div class="col-md-4 border-bottom mb-3 pb-3">
                                <h5>PRESIDENT WORLD</h5>
                                <p>Hazi Salim Tower (Lift-4), 1/2, Jail Road, Chawkbazar, Dhaka 1211</p>
                                <p>P: +880 1911 937289</p>
                                <p>Opening Hours</p>
                                <p>Mon to Sun (10:00am – 9:00pm daily)</p>
                            </div>
                            <div class="col-md-4 border-bottom mb-3 pb-3">
                                <h5>TRAVEL CENTER</h5>
                                <p>16, Baitul Mukarram, Dhaka 1000</p>
                                <p>P: +88 02 9583262</p>
                                <p>Opening Hours</p>
                                <p>Mon to Sun (10:00am – 9:00pm daily)</p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12 border-bottom mb-3 pb-3">
                                <h5>TRAVEL ZONE</h5>
                                <p>104, Baitul Mukarram, Dhaka 1000</p>
                                <p>P: +88 02 9586156</p>
                                <p>Opening Hours</p>
                                <p>Mon to Sun (10:00am – 9:00pm daily)</p>
                            </div>
                        </div>
                    </div>
                </div>









            </div>
        </div>
    </div>
    <!-- ***** About Area Ends ***** -->


    
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/pages/where_to_buy.blade.php ENDPATH**/ ?>