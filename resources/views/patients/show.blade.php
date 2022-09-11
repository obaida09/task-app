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
                            <p><span class="text-dark fw-bold">Patient Healer </span> : {{ $patient->user()->first()->name }}</p>
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


{{-- 

 <div class="row">
                            <div class="col-md-12">
                                <label class="">Age</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="age" type="text"
                                        class="form-control @error('age') is-invalid @enderror" name="age"
                                        value="{{ old('age', $healer->age) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">Side Dominance</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-control" name="side_dominance">
                                        <option value="right">Right</option>
                                        <option value="left">Left</option>
                                    </select>
                                </div>
                                @error('side_dominance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">Sex (Hormonal Status)</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-control" name="sex">
                                        <option value="male">Male</option>
                                        <option value="famle">Famle</option>
                                    </select>
                                    @error('sex')
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">Mobile</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="mobile"
                                        value="{{ old('mobile', $healer->mobile) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">Current Medications (Treatements)</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="treatments"
                                        value="{{ old('treatments', $healer->treatments) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('treatments')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">Sumptom</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="symptom"
                                        value="{{ old('symptom', $healer->symptom) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('symptom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class=""> What is the Biological Theme (Function)</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="function"
                                        value="{{ old('function', $healer->function) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('function')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">What Emotions are connected</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="emotions_plan"
                                        value="{{ old('emotions_plan', $healer->emotions_plan) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('emotions_plan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class=""> What are the connected Beliefs</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="connected_beliefs"
                                        value="{{ old('connected_beliefs', $healer->connected_beliefs) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('connected_beliefs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">What is the META-Meaning</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="meta_meaning"
                                        value="{{ old('meta_meaning', $healer->meta_meaning) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('meta_meaning')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">UDIN Moment</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="udin_moment"
                                        value="{{ old('udin_moment', $healer->udin_moment) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('udin_moment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">Strss Triggers (VAKOGS)</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="vakogs"
                                        value="{{ old('vakogs', $healer->vakogs) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('vakogs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class=""> Stress Phase Symptoms</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="symptoms"
                                        value="{{ old('symptoms', $healer->symptoms) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('symptoms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class=""> Regeneration Trigger</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="regeneration_trigger"
                                        value="{{ old('regeneration_trigger', $healer->regeneration_trigger) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('regeneration_trigger')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class=""> Regeneration Phase A Symptoms</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="regeneration_symptoms_a"
                                        value="{{ old('regeneration_symptoms_a', $healer->regeneration_symptoms_a) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('regeneration_symptoms_a')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class=""> Healing Peak/s Symptoms</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="healing_symptoms"
                                        value="{{ old('healing_symptoms', $healer->healing_symptoms) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('healing_symptoms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class=""> Regeneration Phase B Symptoms</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="regeneration_symptoms_b"
                                        value="{{ old('regeneration_symptoms_b', $healer->regeneration_symptoms_b) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('regeneration_symptoms_b')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">META-Health Practice</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="meta_practice"
                                        value="{{ old('meta_practice', $healer->meta_practice) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('meta_practice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">Action (Transformation Plan)</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="action"
                                        value="{{ old('action', $healer->action) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('action')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class=""> Follow-Up</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="follow_up"
                                        value="{{ old('follow_up', $healer->follow_up) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('follow_up')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class=""> Additional Information</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="information"
                                        value="{{ old('information', $healer->information) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('information')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">Associations</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="associations"
                                        value="{{ old('associations', $healer->associations) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('associations')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


--}}