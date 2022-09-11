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
                            <div class="col-md-12">
                                <label class="">Name</label>
                                <div class="input-group input-group-outline mb-3">
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
                                <label class="">Email</label>
                                <div class="input-group input-group-outline mb-3">
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
                                <label class="">Passowrd</label>
                                <div class="input-group input-group-outline mb-3">
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
                                <label class="">Confirm Passowrd</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        @if (auth()->user()->is_admin)
                            <div class="input-group input-group-outline my-3">
                                <select class="form-control" name="status" id="exampleFormControlSelect1">
                                    <option value="1">Active</option>
                                    <option value="0">In-Active</option>
                                </select>
                                @error('status')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif
                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary">Add healer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
