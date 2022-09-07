@extends('layouts.app')
@section('content')
    @foreach ($session_details as $item)
        <div class="container mt-5 mb-5">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="re px-4">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="d-flex flex-column mt-3"> <span
                                            class="font-weight-bold fs-3">{{ $item->patient->user->name }}</span> <small
                                            class="text-primary">{{ $item->patient->name }}</small> </div>
                                </div>
                                <div class="d-flex flex-row mt-4 px-3 ellipsis"> <small class="mr-2">{{ $item->posted_at }}</small></div>
                            </div>
                            {{-- <p class="text-justify">{{ $item->session }}</p> --}}
                            <p class="text-justify">{{ $item->session_notes }}</p>
                            <div id="comment_view" class="d-flex flex-row muted-color mt-4 text-dark fw-bold">
                                <span>Comments</span><span class="mx-2 co-num">5</span>
                            </div>
                        </div>
                        <div class="px-5">
                            <div onclick="show_comment({{ $item->id }})" id="arrow"><i class="fas fa-chevron-down"></i></div>
                            <div class="comments-{{ $item->id }} hid mt-3">
                                @comments([
                                    'model' => $item,
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @push('js')
        <script>
            function show_comment(id) {
                $(".comments-" + id).toggleClass("show").toggleClass("hid");
                
                if ($(".comments-" + id).hasClass("show")) {
                    $("#arrow").empty();
                    $("#arrow").append("<i class='fas fa-chevron-up'></i>");
                }else {
                    $("#arrow").empty();
                    $("#arrow").append("<i class='fas fa-chevron-down'></i>");
                }
            };
        </script>
    @endpush
@endsection
