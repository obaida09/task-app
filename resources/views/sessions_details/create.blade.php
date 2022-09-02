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
                    <form action="{{ route('session_details.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Copmplaint or Offer</label>
                                    <input type="text" name="offer" class="form-control">
                                </div>
                                @error('offer')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Shock Moment</label>
                                    <input type="text" name="shock_moment" class="form-control">
                                </div>
                                @error('shock_moment')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Tretment</label>
                                    <input type="text" name="tretment" class="form-control">
                                </div>
                                @error('tretment')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Session Notes</label>
                                    <input type="text" name="session_notes" class="form-control">
                                </div>
                                @error('session_notes')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="input-group input-group-outline my-3">
                            <select class="form-control" name="session_id" id="exampleFormControlSelect1">
                                @foreach ($session as $item)
                                    <option value="{{ $item->id }}">{{ $item->date_time }} => {{ $item->patient()->first()->name }}</option>
                                @endforeach
                            </select>
                            @error('session_id')
                                <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group pt-4">
                            <a href="{{ route('session_details.index') }}" class="btn btn-secondary">Session Details Table</a>
                            <button type="submit" class="btn btn-primary">Add Session Details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
