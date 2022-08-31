@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit Session</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2 py-4">
                    <form action="{{ route('session.update', $session->id) }}" method="post">
                        @csrf
                        @method('PATCH')



                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <input type="text" value="{{ old('age', $session->date_time) }} class="form-control"
                                        name="date_time" value="10/24/2022" />
                                </div>
                                @error('date_time')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <select class="form-control" name="patient_id" id="exampleFormControlSelect1">
                                        @foreach ($patient as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $session->patient_id) selected @endif>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('patient_id')
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary">Edit Session</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
