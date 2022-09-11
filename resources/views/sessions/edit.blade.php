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
                                <label>Date & Time</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" value="{{ old('age', $session->date_time) }}" class="form-control"
                                        name="date_time" value="10/24/2022" />
                                </div>
                                @error('date_time')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label>Patient Name</label>
                                <div class="input-group input-group-outline mb-3">
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
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label>Session Status</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-control" name="session_status">
                                        <option @if ($session->session_status == 'pending') selected @endif value="pending">Pending</option>
                                        <option @if ($session->session_status == 'attended') selected @endif value="attended">Attended</option>
                                        <option @if ($session->session_status == 'not_attended') selected @endif value="not_attended">Not Attended</option>
                                    </select>
                                    @error('session_status')
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label>Payment Status</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-control" name="payment_status">
                                        <option @if ($session->payment_status == 'paid') selected @endif value="paid">Paid</option>
                                        <option @if ($session->payment_status == 'not_paid') selected @endif value="not_paid">not Paid Yet</option>
                                    </select>
                                    @error('payment_status')
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

    @push('js')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        <script>
            $(function() {
                $('input[name="date_time"]').daterangepicker({
                    timePicker: true,
                    singleDatePicker: true,
                    locale: {
                        format: 'YY-MM-DD hh:mm A'
                    }
                });
            });
        </script>
    @endpush
@endsection
