@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Create Session Details</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2 py-4">
                    <form action="{{ route('session_details.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label>Select Session</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-control" name="session_id">
                                        @foreach ($session as $item)
                                            <option value="{{ $item->id }}">{{ $item->date_time }} => {{ $item->patient()->first()->name }}</option>
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
                                <label>Sahre With Communetiy</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-control" name="marital_status">
                                        <option value="private">Private</option>
                                        <option value="public">Public</option>
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
                                    <textarea class="form-control" name="session_notes" id="" cols="30" rows="4"></textarea>
                                </div>
                                @error('session_notes')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary">Add Session Details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
