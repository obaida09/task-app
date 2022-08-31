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
                    <form action="{{ route('healer.update', $healer->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" value="{{ old('name', $healer->name) }}" name="name"
                                        class="form-control">
                                </div>
                                @error('name')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" value="{{ old('name', $healer->email) }}" name="email"
                                        class="form-control">
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
                                    <input type="text" value="{{ old('name', $healer->mobile) }}" name="mobile"
                                        class="form-control">
                                </div>
                                @error('mobile')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Academic Achievement</label>
                                    <input type="text" value="{{ old('name', $healer->academic_achievement) }}"
                                        name="academic_achievement" class="form-control">
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
                                    <input type="text" value="{{ old('name', $healer->gendor) }}" name="gendor"
                                        class="form-control">
                                </div>
                                @error('gendor')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Age</label>
                                    <input type="text" value="{{ old('name', $healer->age) }}" name="age"
                                        class="form-control">
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
                        @if (auth()->user()->is_admin)
                            <div class="input-group input-group-outline my-3">
                                <select class="form-control" name="status" id="exampleFormControlSelect1">
                                    <option value="0"@if ($healer->status == 0) selected @endif>In-Active
                                    </option>
                                    <option value="1"@if ($healer->status == 1) selected @endif>Active</option>
                                </select>
                                @error('status')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif
                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary">Edit healer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
