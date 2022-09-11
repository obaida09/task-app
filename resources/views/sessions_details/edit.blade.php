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
                        <h6 class="text-white text-capitalize ps-3">Edit Session Details</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2 py-5">
                    <form action="{{ route('session_details.update', $session_details->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-6">
                                <label>Select Session</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-control" name="session_id">
                                        @foreach ($session as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $session_details->session_id) selected @endif>
                                                {{ $item->date_time }} => {{ $item->patient()->first()->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('session_id')
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Upload Files</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="file" name="files[]" class="form-control" multiple>
                                </div>
                                @error('files')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Share With Communtiy</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-control" name="marital_status">
                                        <option @if ($session_details->marital_status == 'private') selected @endif value="private">Private
                                        </option>
                                        <option @if ($session_details->marital_status == 'public') selected @endif value="public">Public
                                        </option>
                                    </select>
                                    @error('marital_status')
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>




                        <div class="row">
                            <div class="col-md-12">
                                <label>Session Notes</label>
                                <div class="input-group input-group-outline mb-3">
                                    <textarea class="form-control" name="session_notes" id="" cols="30" rows="4">{{ old('session_notes', $session_details->session_notes) }}</textarea>
                                </div>
                                @error('session_notes')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group pt-4">
                                <button type="submit" class="btn btn-primary">Edit Session Details</button>
                            </div>
                    </form>

                    {{-- @foreach ($session_details->sessionDetailsFiles as $file)
                        <div class="col-2 mb-3">
                            <a class="btn-primary" href="{{ route('remove_file', $file->id) }}" onclick="file_del({{ $file->id }})">x</a>
                            <img src="{{ asset('assets/files/session_details/' . $file->name) }}">
                            <a href="#x">{{ $file->name }}</a>
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function file_del(id) {
                console.log(id);
            };
        </script>
    @endpush
@endsection
