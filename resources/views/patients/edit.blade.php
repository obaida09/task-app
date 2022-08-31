@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit Patient</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2 py-4">
                    <form action="{{ route('patient.update', $patient->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" value="{{ old('name', $patient->name) }}" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Age</label>
                                    <input type="text" value="{{ old('age', $patient->age) }}" name="age" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" value="{{ old('address', $patient->address) }}" name="address" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" value="{{ old('mobile', $patient->mobile) }}" name="mobile" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Gendor</label>
                                    <input type="text" value="{{ old('gendor', $patient->gendor) }}" name="gendor" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Domination</label>
                                    <input type="text" value="{{ old('domination', $patient->domination) }}" name="domination" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary">Edit Patient</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
