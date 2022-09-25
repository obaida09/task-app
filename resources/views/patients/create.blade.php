@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Create Patient</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2 py-4">
                    <form action="{{ route('patient.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="">Name</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" required name="name" value="{{ old('name') }}" class="form-control">
                                    @error('name')
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="">Age</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" required name="age" value="{{ old('age') }}" class="form-control">
                                    @error('age')
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="">Address</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" required name="address" value="{{ old('address') }}" class="form-control">
                                    @error('address')
                                        <br>
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="">Mobile</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" required name="mobile" value="{{ old('mobile') }}" class="form-control">
                                    @error('mobile')
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="">Sex</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-control" name="sex" value="{{ old('sex') }}">
                                        <option value="male">Male</option>
                                        <option value="famle">Famle</option>
                                    </select>
                                    @error('sex')
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="">Domination</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-control" name="domination" value="{{ old('domination') }}">
                                        <option value="left">Left</option>
                                        <option value="right">Right</option>
                                    </select>
                                    @error('domination')
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary">Add Patient</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
