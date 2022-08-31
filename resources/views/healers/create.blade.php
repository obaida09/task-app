@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Create healer</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2 py-4">
                    <form action="{{ route('healer.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                @error('name')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                @error('email')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">mobile</label>
                                    <input type="text" name="mobile" class="form-control">
                                </div>
                                @error('mobile')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Academic Achievement</label>
                                    <input type="text" name="academic_achievement" class="form-control">
                                </div>
                                @error('academic_achievement')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Gendor</label>
                                    <input type="text" name="gendor" class="form-control">
                                </div>
                                @error('gendor')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Age</label>
                                    <input type="text" name="age" class="form-control">
                                </div>
                                @error('age')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                @error('password')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Confirmed Password</label>
                                    <input type="password" name="confirm_password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <select class="form-control" name="status" id="exampleFormControlSelect1">
                                <option value="0">In-Active</option>
                                <option value="1">Active</option>
                            </select>
                            @error('status')
                                <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group pt-4">
                            <a href="{{ route('healer.index') }}" class="btn btn-secondary">healer Table</a>
                            <button type="submit" class="btn btn-primary">Add healer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
