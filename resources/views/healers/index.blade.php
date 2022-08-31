@extends('layouts.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">The Patient's</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-3">
                            {!! $dataTable->table(['class' => 'table align-items-center mb-0'], true) !!}
                        </div>
                        <a href="{{ route('healer.create') }}" class="btn btn-secondary mx-3">Add healer</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('js')
        {!! $dataTable->scripts() !!}
    @endpush
@endsection
