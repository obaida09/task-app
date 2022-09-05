@extends('layouts.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3"> {{ $patient->name }} ( information ) </h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="col-md-6 float-start px-5">
                            <p><span class="text-dark fw-bold">Patient Name </span> : {{ $patient->name }}</p>
                            <p><span class="text-dark fw-bold">Patient age </span> : {{ $patient->age }}</p>
                            <p><span class="text-dark fw-bold">Patient mobile </span> : {{ $patient->mobile }}</p>
                            <p><span class="text-dark fw-bold">Patient address </span> : {{ $patient->address }}</p>
                        </div>
                        <div class="col-md-6 float-start px-5">
                            <p><span class="text-dark fw-bold">Patient gendor </span> : {{ $patient->gendor }}</p>
                            <p><span class="text-dark fw-bold">Patient domination </span> : {{ $patient->domination }}</p>
                            <p><span class="text-dark fw-bold">Patient Healer </span> : {{ $patient->user_id }}</p>
                            <p><span class="text-dark fw-bold">Patient Created At </span> :
                                {{ $patient->created_at->toFormattedDateString() }}</p>
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
                            <h6 class="text-white text-capitalize ps-3">The Session's ( {{ $patient->name }} )</h6>
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
                                        created_at</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        updated_at</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sessions as $item)
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
                                                <span class="text-dark text-xs">{{ $item->updated_at->toFormattedDateString() }}</span>
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="d-flex align-items-center">
                                                <span class="me-2 text-xs">{{ $item->created_at->toFormattedDateString() }}</span>
                                            </div>
                                        </td>

                                        <td class="align-middle">
                                            @if (auth()->user()->is_admin)
                                                <a href="{{ route('session.show', $item->id) }}"
                                                    class="btn btn-primary btn-table btn-sm mt-2">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('session.edit', $item->id) }}"
                                                class="btn btn-primary btn-table btn-sm mt-2">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);"
                                                onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-product-category-{{ $item->id }}').submit(); } else { return false; }"
                                                class="btn btn-danger btn-table btn-sm mt-2">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form action="{{ route('session.destroy', $item->id) }}" method="post"
                                                id="delete-product-category-{{ $item->id }}" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No Session </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
