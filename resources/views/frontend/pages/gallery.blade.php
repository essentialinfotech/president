@extends('frontend.master_dashboard')
@section('main')
    <!-- Start Gallery Section -->
    <section>
        <div class="container">
            <div class="head-title">
                <h2><span class="animate-heading">Our Gallery</span></h2>
            </div>
            <div class="row">
                @foreach ($galleries as $item)
                    <div class="col-6 col-md-2 mb-2 px-1"
                        data-aos="{{ ($loop->iteration % 4) + 1 == 1 ? 'fade-left' : (($loop->iteration % 4) + 1 == 2 ? 'fade-right' : (($loop->iteration % 4) + 1 == 3 ? 'fade-up' : 'fade-down')) }}">
                        <a href="{{ asset($item->photo) }}" data-lightbox="image-1" data-title="{{ $item->title }}">
                            <div class="zoom-overlay">
                                <img src="{{ asset($item->photo) }}" class="rounded w-100"
                                    alt="photo">
                            </div>
                        </a>
                    </div>
                    <!-- End Item -->
                @endforeach
            </div>

        </div>
    </section>
    <!-- End Gallery Section -->
@endsection

@push('custom-scripts')
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })
    </script>



    <script>
        // on preview show iframe
        $('#staticBackdrop').on('show.bs.modal', function(e) {
            var idVideo = $(e.relatedTarget).data('id');
            $('#staticBackdrop .modal-body').html(
                '<iframe width="100%" height="450px" src="https://www.youtube.com/embed/wTcNtgA6gHs?autoplay=true" frameborder="0" allowfullscreen></iframe>'
            );
        });
        //on close remove
        $('#staticBackdrop').on('hidden.bs.modal', function() {
            $('#staticBackdrop .modal-body').empty();
        });
    </script>
@endpush
