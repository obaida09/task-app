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
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg px-2 py-3 overflow-hidden">
                            <h6 class="text-white text-capitalize ps-2 float-start mt-2">{{ $healer->name }} ( Information )
                            </h6>
                            <div class="fl-right">
                                <!-- form activate user -->
                                <form action="{{ route('healer.update', $healer->id) }}" class="float-end mt-2 me-4" method="post">
                                    @csrf
                                    @method('PATCH')
                                    @if ($healer->status == 1)
                                        <button class="activeted" type="submit">Activeted</button>
                                        <input type="hidden" name="status" value="0">
                                    @else
                                        <button class="inactiveted" type="submit">inActiveted</button>
                                        <input type="hidden" name="status" value="1">
                                    @endif
                                </form>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="col-md-6 float-start px-5">
                                <p><span class="text-dark fw-bold">Healer Name </span> : {{ $healer->name }}</p>
                                <p><span class="text-dark fw-bold">Healer email </span> : {{ $healer->email }}</p>
                            </div>
                            <div class="col-md-6 float-start px-5">
                                <p><span class="text-dark fw-bold">Healer Session Price </span> :
                                    {{ $healer->session_price }}</p>
                                <p><span class="text-dark fw-bold">Healer Registerd At </span> :
                                    {{ $healer->created_at->toFormattedDateString() }}</p>
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
                                <h6 class="text-white text-capitalize ps-3">The Patient's ( {{ $healer->name }} )</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <table id="#session-table" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Age</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            gendor</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            created_at</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            updated_at</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($patients as $item)
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
                                                    <span class="text-dark text-xs">{{ $item->name }}</span>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot me-4">
                                                    <i class="bg-info"></i>
                                                    <span class="text-dark text-xs">{{ $item->age }}</span>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot me-4">
                                                    <i class="bg-info"></i>
                                                    <span class="text-dark text-xs">{{ $item->gendor }}</span>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot me-4">
                                                    <i class="bg-info"></i>
                                                    <span
                                                        class="text-dark text-xs">{{ $item->created_at->toFormattedDateString() }}</span>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="me-2 text-xs">{{ $item->updated_at->toFormattedDateString() }}</span>
                                                </div>
                                            </td>

                                            <td class="align-middle">
                                                @if (auth()->user()->is_admin)
                                                    <a href="{{ route('patient.show', $item->id) }}"
                                                        class="btn btn-primary btn-table btn-sm mt-2">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </a>
                                                @endif
                                                <a href="{{ route('patient.edit', $item->id) }}"
                                                    class="btn btn-primary btn-table btn-sm mt-2">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-product-category-{{ $item->id }}').submit(); } else { return false; }"
                                                    class="btn btn-danger btn-table btn-sm mt-2">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <form action="{{ route('patient.destroy', $item->id) }}" method="post"
                                                    id="delete-product-category-{{ $item->id }}" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>No Patient's </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mx-4 mt-2">
                            {{ $patients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('js')
            {{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
            <script>
                $('#session-table').DataTable({
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
                    },

                    "columnDefs": [{
                            "targets": [5],
                            "searchable": true
                        },
                        {
                            "bSortable": true,
                            "aTargets": [0, 5]
                        }
                    ],

                    /* active column position */
                    "order": [
                        [3, "asc"]
                    ]
                });
            </script>
        @endpush
    @endsection
