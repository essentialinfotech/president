
<?php $__env->startSection('title', $page_data['about_seo_title']); ?>
<?php $__env->startSection('meta_description', $page_data['about_seo_meta_description']); ?>
<?php $__env->startSection('og_image', $page_data['about_banner']); ?>
<?php $__env->startSection('twitter_image', $page_data['about_banner']); ?>
<?php $__env->startSection('main'); ?>
    <style>
        .timeline-section {
            position: relative;
            color: #fff;
        }

        .timeline-image {
            width: 100%;
            height: auto;
            display: block;
        }

        .timeline-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .timeline-text {
            text-align: center;
            padding: 20px;
        }

        .timeline-text h1 {
            margin-bottom: 10px;
            font-size: 2.5rem;
        }

        .timeline-text p {
            margin-bottom: 0;
        }

        .timeline-details {
            background: #f8f9fa;
            padding: 20px;
        }

        .timeline-year {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>


    <section style="margin-top: 110px;">
        <div class="container">

            <div class="timeline-section mb-4">
                <img src="https://plugolive.s3.ap-southeast-1.amazonaws.com/vendors/4246/assets/image/our-story-bg.jpg"
                    alt="Timeline Image" class="timeline-image">
                <div class="timeline-overlay">
                    <div class="timeline-text">
                        <h1>By your side since 1960</h1>
                        <p class="text-light w-75 m-auto">We at President understand your diverse and unconventional travel
                            needs. Combining our Japanese heritage of creativity and discipline with our dedication to
                            innovation and technology, we deliver smart and reliable travel goods to generations of
                            customers around the world.</p>
                    </div>
                </div>
            </div>

            <div class="timeline-section mb-4">
                <img src="https://plugolive.s3.ap-southeast-1.amazonaws.com/vendors/4246/assets/image/our-story-1960-1970.jpg"
                    alt="Timeline Image" class="timeline-image">
                <div class="timeline-overlay">
                    <div class="timeline-text">
                        <h1>1960 - 1970</h1>
                        <p class="text-light w-75 m-auto">Our story began in 1960. The first President product was an
                            attaché
                            case
                            created by Matsuzaki Co.
                            Ltd, Japan that became a symbol of our quality and style amongst business travelers.</p>
                    </div>
                </div>
            </div>

            <div class="timeline-details">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex">
                                <div class="timeline-year text-muted">1960</div>
                                <p class="ml-4">President started in Japan by Matsuzaki Co. Ltd, selling attaché cases to
                                    discerning business travelers.</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex">
                                <div class="timeline-year text-muted">1964</div>
                                <p class="ml-4">First President travel case made with molded plastic material and
                                    aero-grade aluminum
                                    frame.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex">
                                <div class="timeline-year text-muted">1970</div>
                                <p class="ml-4">Indonesia factory established.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="timeline-section mb-4">
                <img src="https://plugolive.s3.ap-southeast-1.amazonaws.com/vendors/4246/assets/image/our-story-1988-1996.jpg"
                    alt="Timeline Image" class="timeline-image">
                <div class="timeline-overlay">
                    <div class="timeline-text">
                        <h1>1988 - 1996</h1>
                        <p class="text-light w-75 m-auto">In 1996, we earned the coveted ISO9000 certification for quality
                            assurance management. Being the first luggage company certified, we continued to deliver our
                            value of creating smart and durable travel goods for active, self-assured frequent travelers.
                        </p>
                    </div>
                </div>
            </div>

            <div class="timeline-details">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex">
                                <div class="timeline-year text-muted">1988</div>
                                <p class="ml-4">President was registered and sold in over 40 countries worldwide.</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex">
                                <div class="timeline-year text-muted">1995</div>
                                <p class="ml-4">First President trolley case with telescopic handle and integrated wheel system introduced.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex">
                                <div class="timeline-year text-muted">1996</div>
                                <p class="ml-4">
                                    First luggage company to be certified by ISO9000 quality management system.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/pages/our_story.blade.php ENDPATH**/ ?>