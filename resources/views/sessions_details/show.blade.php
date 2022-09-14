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
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
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
                                    <img class="px-1" src="{{ asset('assets/files/session_details/' . $file->name) }}"
                                        alt="{{ $file->name }}">
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
@endsection
