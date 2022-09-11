@extends('layouts.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg px-2 pt-3 pb-0 overflow-hidden">
                            <h6 class="text-white text-capitalize ps-2 float-start mt-2"> {{ $patient->name }} ( information ) </h6>
                            <div class="fl-right">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn float-end mx-4 text-white" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    More Info
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="re mt-4 card-body px-0 pb-2">
                        <div class="col-md-6 float-start px-5">
                            <p><span class="text-dark fw-bold">Patient Name </span> : {{ $patient->name }}</p>
                            <p><span class="text-dark fw-bold">Patient age </span> : {{ $patient->age }}</p>
                            <p><span class="text-dark fw-bold">Patient mobile </span> : {{ $patient->mobile }}</p>
                            <p><span class="text-dark fw-bold">Patient address </span> : {{ $patient->address }}</p>
                        </div>
                        <div class="col-md-6 float-start px-5">
                            <p><span class="text-dark fw-bold">Patient gendor </span> : {{ $patient->sex }}</p>
                            <p><span class="text-dark fw-bold">Patient domination </span> : {{ $patient->side_dominance }}
                            </p>
                            <p><span class="text-dark fw-bold">Patient patient </span> :
                                {{ $patient->user()->first()->name }}</p>
                            <p><span class="text-dark fw-bold">Patient Created At </span> :
                                {{ $patient->created_at->toFormattedDateString() }}</p>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-1 pb-2">
                        <div class="me-4" onclick="show_info()" id="arrow"><i class="fas fa-chevron-down"></i></div>
                        <div class="info hid">
                            <div class="col-md-6 mt-4 pt-1 float-start px-3">
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">Current Medications (Treatements) </h6> 
                                    <div class="mb-3 fs-6">{{ $patient->treatments }}</div>                                        
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">Sumptom </h6>
                                    <div class="mb-3 fs-6">{{ $patient->symptom }}</div>
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">What is the Biological Theme (Function) </h6>
                                    <div class="mb-3 fs-6">{{ $patient->function }}</div>
                                        
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">What Emotions are connected </h6>
                                    <div class="mb-3 fs-6">{{ $patient->emotions_plan }}</div>
                                        
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">What are the connected Beliefs </h6>
                                    <div class="mb-3 fs-6">{{ $patient->connected_beliefs }}</div>
                                        
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">What is the META-Meaning </h6>
                                    <div class="mb-3 fs-6">{{ $patient->meta_meaning }}</div>
                                        
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">UDIN Moment </h6>
                                    <div class="mb-3 fs-6">{{ $patient->udin_moment }}</div>
                                        
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">Strss Triggers (VAKOGS) </h6>
                                    <div class="mb-3 fs-6">{{ $patient->vakogs }}</div>
                                        
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">Stress Phase Symptoms </h6>
                                    <div class="mb-3 fs-6">{{ $patient->symptoms }}</div>
                                        
                                </div>
                                
                            </div>
                            <div class="col-md-6 float-start px-5">
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">Regeneration Trigger </h6> 
                                    <div class="mb-3 fs-6">{{ $patient->regeneration_trigger }}</div>                                        
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">Regeneration Phase A Symptoms </h6>
                                    <div class="mb-3 fs-6">{{ $patient->regeneration_symptoms_a }}</div>
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">Healing Peak/s Symptoms </h6>
                                    <div class="mb-3 fs-6">{{ $patient->healing_symptoms }}</div>
                                        
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">Regeneration Phase B Symptoms </h6>
                                    <div class="mb-3 fs-6">{{ $patient->regeneration_symptoms_b }}</div>
                                        
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">META-Health Practice </h6>
                                    <div class="mb-3 fs-6">{{ $patient->meta_practice }}</div>
                                        
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">Action (Transformation Plan) </h6>
                                    <div class="mb-3 fs-6">{{ $patient->action }}</div>
                                        
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">Follow-Up </h6>
                                    <div class="mb-3 fs-6">{{ $patient->follow_up }}</div>
                                        
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">Additional Information </h6>
                                    <div class="mb-3 fs-6">{{ $patient->information }}</div>
                                        
                                </div>
                                
                                <div class="re mb-4 px-3">
                                    <h6 class="text-dark fw-bold">Associations </h6>
                                    <div class="mb-3 fs-6">{{ $patient->associations }}</div>
                                        
                                </div>
                                
                            </div>
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
                    <div class="mx-4 mt-2">
                        {{ $sessions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Add More Information -->
    <div class="modal fade mb-5" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('patient.update', $patient->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">Age</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="age" type="text"
                                        class="form-control @error('age') is-invalid @enderror" name="age"
                                        value="{{ old('age', $patient->age) }}" autocomplete="name" autofocus>
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
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}
                                        </div>
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
                                        value="{{ old('mobile', $patient->mobile) }}" autocomplete="name"
                                        autofocus>
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
                                        value="{{ old('treatments', $patient->treatments) }}"
                                        autocomplete="name" autofocus>
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
                                        value="{{ old('symptom', $patient->symptom) }}" autocomplete="name"
                                        autofocus>
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
                                        value="{{ old('function', $patient->function) }}" autocomplete="name"
                                        autofocus>
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
                                        value="{{ old('emotions_plan', $patient->emotions_plan) }}"
                                        autocomplete="name" autofocus>
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
                                        value="{{ old('connected_beliefs', $patient->connected_beliefs) }}"
                                        autocomplete="name" autofocus>
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
                                        value="{{ old('meta_meaning', $patient->meta_meaning) }}"
                                        autocomplete="name" autofocus>
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
                                        value="{{ old('udin_moment', $patient->udin_moment) }}"
                                        autocomplete="name" autofocus>
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
                                        value="{{ old('vakogs', $patient->vakogs) }}" autocomplete="name"
                                        autofocus>
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
                                        value="{{ old('symptoms', $patient->symptoms) }}" autocomplete="name"
                                        autofocus>
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
                                        class="form-control @error('name') is-invalid @enderror"
                                        name="regeneration_trigger"
                                        value="{{ old('regeneration_trigger', $patient->regeneration_trigger) }}"
                                        autocomplete="name" autofocus>
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
                                        class="form-control @error('name') is-invalid @enderror"
                                        name="regeneration_symptoms_a"
                                        value="{{ old('regeneration_symptoms_a', $patient->regeneration_symptoms_a) }}"
                                     autocomplete="name" autofocus>
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
                                        value="{{ old('healing_symptoms', $patient->healing_symptoms) }}"
                                        autocomplete="name" autofocus>
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
                                        class="form-control @error('name') is-invalid @enderror"
                                        name="regeneration_symptoms_b"
                                        value="{{ old('regeneration_symptoms_b', $patient->regeneration_symptoms_b) }}"
                                     autocomplete="name" autofocus>
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
                                        value="{{ old('meta_practice', $patient->meta_practice) }}"
                                        autocomplete="name" autofocus>
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
                                        value="{{ old('action', $patient->action) }}" autocomplete="name"
                                        autofocus>
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
                                        value="{{ old('follow_up', $patient->follow_up) }}" autocomplete="name"
                                        autofocus>
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
                                        value="{{ old('information', $patient->information) }}"
                                        autocomplete="name" autofocus>
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
                                        value="{{ old('associations', $patient->associations) }}"
                                        autocomplete="name" autofocus>
                                </div>
                                @error('associations')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Copmplaint or Offer</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" name="offer" value="{{ old('offer', $patient->offer) }}"
                                        class="form-control">
                                </div>
                                @error('offer')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Shock Moment</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" name="shock_moment"
                                        value="{{ old('shock_moment', $patient->shock_moment) }}" class="form-control">
                                </div>
                                @error('shock_moment')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Tretment</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" name="tretment"
                                        value="{{ old('tretment', $patient->tretment) }}" class="form-control">
                                </div>
                                @error('tretment')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Information's</button>
                    </form>
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
            
            function show_info() {
                $(".info").toggleClass("show").toggleClass("hid");
    
                if ($(".info").hasClass("show")) {
                    $("#arrow").empty();
                    $("#arrow").append("<i class='fas fa-chevron-up'></i>");
                } else {
                    $("#arrow").empty();
                    $("#arrow").append("<i class='fas fa-chevron-down'></i>");
                }
            };
        </script>
    @endpush
@endsection
