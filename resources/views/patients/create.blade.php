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
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Age</label>
                                    <input type="text" name="age" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" name="mobile" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group input-group-outline my-3">
                                <select class="form-control" name="gendor" id="exampleFormControlSelect1">
                                    <option value="male">Male</option>
                                    <option value="famle">Famle</option>
                                </select>
                                @error('gendor')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <select class="form-control" name="domination" id="exampleFormControlSelect1">
                                    <option value="left">Left</option>
                                    <option value="right">Right</option>
                                </select>
                                @error('domination')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
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
