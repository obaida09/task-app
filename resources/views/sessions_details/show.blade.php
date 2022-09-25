@extends('layouts.app')
@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3"> {{ $session_details->patient()->first()->name }} (
                                session notes ) </h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="col-md-6 float-start px-5">
                            <p><span class="text-dark fw-bold">Session's Notes </span> :
                                {{ $session_details->session_notes }}</p>
                        </div>
                        <div class="col-md-6 float-start px-5">
                            <p><span class="text-dark fw-bold">Session Created At </span> :
                                {{ $session_details->created_at->toFormattedDateString() }}</p>
                            <a class="btn btn-primary mt-3 py-2 px-3" href="{{ route('session_details_pdf', $session_details->id) }}" target="_blank" class="text-dark fw-bold">print <i class="fa-solid fa-file-pdf ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <div class="row mt-3">  
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Session Files</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="px-4 py-3">
                            @forelse ($session_details->sessionDetailsFiles as $file)
                                @if (strpos($file->name, '.pdf') == false)
                                    <div class="float-start show_img col-md-3 mb-4">
                                        <img id="session_img"
                                            onclick="addImag('{{ asset('assets/files/session_details/' . $file->name) }}')"
                                            src="{{ asset('assets/files/session_details/' . $file->name) }}"
                                            alt="{{ $file->name }}">
                                    </div>
                                @endif
                            @empty
                                <div class="p-3">No File in this Session</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function addImag(src) {
                console.log(src);
                $(".full_screen").empty();
                $(".full_screen").append(
                    '<img class="p-5 w-100" src="' + src + '" alt="">' +
                    '<div onclick="removeImag()" class="closee"><i class="fa-solid fa-xmark"></i></div>'
                );
                $(".full_screen").removeClass('hid');
            };

            function removeImag() {
                $(".full_screen").addClass('hid'); 
                console.log('asdf')
            };

        </script>
    @endpush
@endsection
