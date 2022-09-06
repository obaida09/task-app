@extends('layouts.app')
@section('content')
    @foreach ($session_details as $item)
        <div class="container mt-5 mb-5">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="card px-3">
                        <div class="d-flex justify-content-between p-2">
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex flex-column mt-3"> <span
                                        class="font-weight-bold fs-3">{{ $item->patient->user->name }}</span> <small
                                        class="text-primary">{{ $item->patient->name }}</small> </div>
                            </div>
                            <div class="d-flex flex-row mt-4 px-3 ellipsis"> <small class="mr-2">20 mins</small></div>
                        </div>
                        <div class="p-2">
                            <p class="text-justify">{{ $item->session_notes }}</p>
                            <p class="text-justify">{{ $item->session_notes }}</p>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row icons d-flex align-items-center"></div>
                                <div class="d-flex flex-row muted-color"> <span>2 comments</span> <span
                                        class="ml-2">Share</span> </div>
                            </div>
                            <hr>
                            <div class="comments">
                                <div class="d-flex flex-row mb-2">
                                    <div class="d-flex flex-column ml-2"> <span class="name">Daniel Frozer</span> <small
                                            class="comment-text">I like this alot! thanks alot</small>
                                        <div class="d-flex flex-row align-items-center status"> <small>Like</small>
                                            <small>Reply</small> <small>Translate</small> <small>18 mins</small> </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-row mb-2">
                                    <div class="d-flex flex-column ml-2"> <span class="name">Elizabeth goodmen</span>
                                        <small class="comment-text">Thanks for sharing!</small>
                                        <div class="d-flex flex-row align-items-center status"> <small>Like</small>
                                            <small>Reply</small> <small>Translate</small> <small>8 mins</small> </div>
                                    </div>
                                </div>
                                <div class="comment-input"> <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- {{ $item->patient->user->name }}<br>
        {{ $item->patient->name }}<br>
        {{ $item->session->date_time }}<br>
        {{ $item->offer }}<br>
        {{ $item->session_notes }}<br> --}}
    @endforeach
@endsection
