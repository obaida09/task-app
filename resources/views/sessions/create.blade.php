@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Create Session</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2 py-4">
                    <form action="{{ route('session.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <span>Session's Number</span>
                                <select id="session_num" class="px-1 mt-2 mx-1">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <input type="text" class="form-control" name="date_time[]" value="2022-10-10" />
                                </div>
                                @error('date_time')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <select class="form-control" name="patient_id" id="exampleFormControlSelect1">
                                        @foreach ($patient as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('patient_id')
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group input-group-outline my-3">
                            <input type="text" class="form-control" name="date_time[]" value="2022-10-10" />
                        </div>

                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary">Add Session</button>
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
                        format: 'YYYY-MM-DD hh:mm A'
                    }
                });
            });

            // jQuery('#session_num').on('change', function() {
            //     let input_num = $(this).val();
            //     console.log(input_num)
            //     for(var i; i < input_num; i++) {
            //         console.log(i)
            //     }
            // });

            $('#session_num').on('change', function() {
                // $('.rr').empty();
                $.each(new Array(+this.value), function(i) {
                    $( ".rr" ).appendTo( "form" );
                });
            });
        </script>
    @endpush
@endsection
