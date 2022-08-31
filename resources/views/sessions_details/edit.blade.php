@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit Session Details</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2 py-4">
                    <form action="{{ route('session_details.update', $session->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Date</label>
                                    <input type="text" value="{{ old('age', $session->date) }}" name="date"
                                        class="form-control">
                                </div>
                                @error('date')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Time</label>
                                    <input type="text" value="{{ old('age', $session->time) }}" name="time"
                                        class="form-control">
                                </div>
                                @error('time')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <select class="form-control" name="patient_id" id="exampleFormControlSelect1">
                                @foreach ($patient as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $session->patient_id) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('patient_id')
                                <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary">Edit Session Details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
