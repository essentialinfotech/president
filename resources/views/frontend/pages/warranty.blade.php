@extends('frontend.master_dashboard')
@section('title', $page_data['about_seo_title'])
@section('meta_description', $page_data['about_seo_meta_description'])
@section('og_image', $page_data['about_banner'])
@section('twitter_image', $page_data['about_banner'])
@section('main')


    <!-- ***** Main Banner Area Start ***** -->
    <div class=" about-page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Warranty</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <div class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('contact-sendmail') }}" method="post" id="contact"
                                class="form_contact_ajax">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Your Name">
                                            <span class="text-danger error-text name_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <input name="email" type="text" class="form-control" id="email"
                                                placeholder="Your email">
                                            <span class="text-danger error-text email_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <input type="text" name="phone" class="form-control"
                                                placeholder="Phone Number">
                                            <span class="text-danger error-text phone_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <textarea name="message" class="form-control" placeholder="Your Message" rows="5"></textarea>
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
                        {{-- <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod kon tempor
                                incididunt ut labore.</p>
                        </div> --}}
                        <p>Our warranty covers a period of FIVE years or TWO years, depending on the product you purchased.
                            The warranty period is indicated on the warranty card of each product. The warranty starts from
                            the date of purchase, for any defective materials or workmanship, with the exceptions of damage
                            caused by accidents, transport damage, abuse of the product, purely cosmetic damage and
                            incidental or consequential damages.</p>
                        <ul>
                            @foreach ($global_socials as $item)
                                <li><a href="{{ $item->url }}">{!! $item->icon !!}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** About Area Ends ***** -->


    {{-- Send Mail --}}
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
@endsection
