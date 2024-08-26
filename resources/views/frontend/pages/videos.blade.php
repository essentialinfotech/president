@extends('frontend.master_dashboard')
@section('main')
    {{-- video section --}}
    <section>
        <div class="container">
            <div class="head-title">
                <h2><span class="animate-heading">Video Gallery</span></h2>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($videos as $item)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body p-0">
                                    <a href="#" data-bs-toggle="modal" data-id="{{ $item->video_code }}"
                                        data-bs-target="#staticBackdrop">
                                        <img src="http://img.youtube.com/vi/{{ $item->video_code }}/maxresdefault.jpg"
                                            alt="Video Thumbnail 2" class="img-fluid rounded">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach



                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    {{-- video --}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>

        </div>

    </section>
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
                '<iframe width="100%" height="450px" src="https://www.youtube.com/embed/' + idVideo +
                '?autoplay=true" frameborder="0" allowfullscreen></iframe>'
            );
        });
        //on close remove
        $('#staticBackdrop').on('hidden.bs.modal', function() {
            $('#staticBackdrop .modal-body').empty();
        });
    </script>
@endpush
