@extends('layouts.auth')

@section('auth-content')
<div class="row mt-5">
    <div class="col-6 m-auto">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Meta Health System | Register</h6>
                </div>
            </div>
            <div class="card-body px-4 pb-2 py-4">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Name</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Passowrd</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Confirm Passowrd</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Age</label>
                                <input id="age" type="text"
                                    class="form-control @error('age') is-invalid @enderror" name="age"
                                    value="{{ old('age') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Side Dominance</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="side_dominance"
                                    value="{{ old('side_dominance') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Sex (Hormonal Status)</label>
                                <select class="form-control" name="sex" id="exampleFormControlSelect1">
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Mobile</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="mobile"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Current Medications (Treatements)</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="treatments"
                                    value="{{ old('treatments') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Sumptom</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="symptom"
                                    value="{{ old('symptom') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label"> What is the Biological Theme (Function)</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="function"
                                    value="{{ old('function') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">What Emotions are connected</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="emotions_plan"
                                    value="{{ old('emotions_plan') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label"> What are the connected Beliefs</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="connected_beliefs"
                                    value="{{ old('connected_beliefs') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">What is the META-Meaning</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="meta_meaning"
                                    value="{{ old('meta_meaning') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">UDIN Moment</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="udin_moment"
                                    value="{{ old('udin_moment') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Strss Triggers (VAKOGS)</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="vakogs"
                                    value="{{ old('vakogs') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label"> Stress Phase Symptoms</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="symptoms"
                                    value="{{ old('symptoms') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label"> Regeneration Trigger</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="regeneration_trigger"
                                    value="{{ old('regeneration_trigger') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label"> Regeneration Phase A Symptoms</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="regeneration_symptoms_a"
                                    value="{{ old('regeneration_symptoms_a') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label"> Healing Peak/s Symptoms</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="healing_symptoms"
                                    value="{{ old('healing_symptoms') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label"> Regeneration Phase B Symptoms</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="regeneration_symptoms_b"
                                    value="{{ old('regeneration_symptoms_b') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">META-Health Practice</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="meta_practice"
                                    value="{{ old('meta_practice') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Action (Transformation Plan)</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="action"
                                    value="{{ old('action') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label"> Follow-Up</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="follow_up"
                                    value="{{ old('follow_up') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label"> Additional Information</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="information"
                                    value="{{ old('information') }}" required autocomplete="name" autofocus>
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
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Associations</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="associations"
                                    value="{{ old('associations') }}" required autocomplete="name" autofocus>
                            </div>
                            @error('associations')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group pt-4">
                        <button type="submit" class="btn btn-primary">Register</button>
                        <a href="{{ route('login') }}" class="btn btn-light mx-1">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
