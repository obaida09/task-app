@extends('layouts.app')
@section('content')

<div class="container mt-4 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="px-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex flex-row align-items-center">
                            <div class="d-flex flex-column mt-4"> <span
                                    class="font-weight-bold fs-3">{{ $pathologicalCase->category()->first()->name }}</span> 
                            </div>
                        </div>

                    </div>
                    <p class="text-justify ml-3 me-5 mt-4 mb-5 fs-5">{{ $pathologicalCase->content }}</p> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
