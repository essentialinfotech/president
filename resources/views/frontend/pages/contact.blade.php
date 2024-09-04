@extends('frontend.master_dashboard')
@section('title', $page_data['contact_seo_title'])
@section('meta_description', $page_data['contact_seo_meta_description'])
@section('og_image', $page_data['contact_banner'])
@section('twitter_image', $page_data['contact_banner'])
@section('main')

    {{-- ////////////////////////////////////// --}}
    <!-- ***** Main Banner Area Start ***** -->
    <div class="about-page-heading" id="top"
        style=" background-image: url({{ asset($global_page_item->contact_banner) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Contact Area Starts ***** -->
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    {!! $page_data->contact_map !!}
                </div>
                <div class="col-lg-6" style="background: #eeeeee;">
                    <div class="section-heading">
                        <h2>Need Assistance? Let's Talk</h2>
                    </div>
                    <form action="{{ route('contact-sendmail') }}" method="post" id="contact" class="form_contact_ajax">
                        @csrf
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
                                    <input type="email" name="email" id="email" placeholder="Your email">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" name="phone" id="phone" class="form-control"
                                        placeholder="Phone Number">
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
    </div>
    <!-- ***** Contact Area Ends ***** -->



    {{-- Send Mail --}}

@endsection

@push('script')
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
@endpush
