@extends('layouts.app')
@section('content')
    @if ($message = Session::get('message'))
        <div class="position-fixed top-2 end-2 z-index-3">
            <div class="toast fade p-2 bg-white show" role="alert" aria-live="assertive" id="successToast" aria-atomic="true">
                <div class="toast-header border-0">
                    <i class="material-icons text-success me-2">check</i>
                    <i class="fas fa-times translate-middle-y float-end text-md ms-9 cursor-pointer" data-bs-dismiss="toast"
                        aria-label="Close" aria-hidden="true"></i>
                </div>
                <hr class="horizontal dark m-0">
                <div class="toast-body">
                    {{ $message }}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">The Session's : from {{ $today->toFormattedDateString() }} to {{ $time }}</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <table id="#session-table" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    date_time</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Patient</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    created_at</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    updated_at</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($session as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">{{ $item->id }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot me-4">
                                            <i class="bg-info"></i>
                                            <span class="text-dark text-xs">{{ $item->date_time }}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot me-4">
                                            <i class="bg-info"></i>
                                            <span class="text-dark text-xs">{{ $item->patient()->first()->name }}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot me-4">
                                            <i class="bg-info"></i>
                                            <span
                                                class="text-dark text-xs">{{ $item->updated_at->toFormattedDateString() }}</span>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center">
                                            <span
                                                class="me-2 text-xs">{{ $item->created_at->toFormattedDateString() }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('session.show', $item->id) }}" class="btn btn-primary btn-table btn-sm">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Session's </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mx-4 mt-2">
                    {{ $session->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
