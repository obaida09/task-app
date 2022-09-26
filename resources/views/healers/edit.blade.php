@extends('layouts.app')
@section('content')
    @if ($message = Session::get('message'))
        <div class="position-fixed top-2 end-2 z-index-3">
            <div class="toast fade p-2 bg-white show" role="alert" aria-live="assertive" id="successToast" aria-atomic="true">
                <div class="toast-header border-0">
                    <i class="material-icons text-success me-2">check</i>
                    <i class="fas fa-times translate-middle-y float-end text-md ms-9 cursor-pointer" data-bs-dismiss="toast"
                        aria-label="Close" aria-hidden="true"></i>
                </div>
                <hr class="horizontal dark m-0">
                <div class="toast-body">
                    {{ $message }}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit Healer</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2 py-4">
                    <form action="{{ route('healer.update', $healer->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">Name</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', $healer->name) }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">Email</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email', $healer->email) }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="">Passowrd</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="">Confirm Passowrd</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="">Session Price</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" value="{{ old('session_price', $healer->session_price) }}"
                                        class="form-control" name="session_price">
                                        @error('session_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>

                        @if (auth()->user()->is_admin)
                            <div class="input-group input-group-outline my-3">
                                <select class="form-control" name="status">
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
