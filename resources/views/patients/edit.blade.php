@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit Patient ( {{ $patient->name }} )</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2 py-4">
                    <div class="row border pb-2 mx-1 mt-4 pt-2">
                        <div class="col-6 mt-2">
                            <span>Patient's Debts</span> = {{ $patient->patient_debts }} <span
                                class="fs-7 fw-bolder text-blue"> IQD</span>
                        </div>
                        <div class="col-2">
                            <div class="input-group input-group-outline my-0">
                                <label class="form-label">Been Paid</label>
                                <input type="text" value="" id="Paid" class="form-control">
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <div>Remaining amount = <span class="amount">{{ $patient->patient_debts }}</span><span class="fs-7 fw-bolder text-blue">
                                    IQD</span></div>
                        </div>
                    </div>
                    <form action="{{ route('patient.update', $patient->id) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label clasbel">Name</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" value="{{ old('name', $patient->name) }}" name="name"
                                        class="form-control">
                                </div>
                                @error('name')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Age</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" value="{{ old('age', $patient->age) }}" name="age"
                                        class="form-control">
                                </div>
                                @error('age')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Address</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" value="{{ old('address', $patient->address) }}" name="address"
                                        class="form-control">
                                </div>
                                @error('address')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Mobile</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" value="{{ old('mobile', $patient->mobile) }}" name="mobile"
                                        class="form-control">
                                </div>
                                @error('mobile')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label class="">Sex</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-control" name="sex" id="exampleFormControlSelect1">
                                        <option @if($patient->sex == 'male') selected @endif value="male">Male</option>
                                        <option @if($patient->sex == 'famle') selected @endif value="famle">Famle</option>
                                    </select>
                                    @error('sex')
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="">Side Dominance</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-control" name="side_dominance" id="exampleFormControlSelect1">
                                        <option @if($patient->side_dominance == 'left')  selected @endif value="left">Left</option>
                                        <option @if($patient->side_dominance == 'right') selected @endif value="right">Right</option>
                                    </select>
                                    @error('side_dominance')
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="patient_debts" value="{{ $patient->patient_debts }}" name="patient_debts">
                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary">Edit Patient</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @inject('carbon', 'Carbon\Carbon')
    <div class="row mt-5 mb-6">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Create Session for this Patient</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2 py-4">
                
                    <div class="row border pb-2 mx-1 pt-2">
                        <div class="col-4">
                            <span>Session's Number</span>
                            <select id="session_num" class="px-1  mx-1">
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
                        <div class="col-4 px-5">
                            <span>Discount</span>
                            <select id="discount" class=" mx-1">
                                <option value="0">0%</option>
                                <option value="10">10%</option>
                                <option value="20">20%</option>
                                <option value="30">30%</option>
                                <option value="40">40%</option>
                                <option value="50">50%</option>
                                <option value="60">60%</option>
                                <option value="70">70%</option>
                                <option value="80">80%</option>
                                <option value="90">90%</option>
                                <option value="100">100%</option>
                            </select>
                        </div>
                        <div class="col-4 px-6">
                            <div>Price = <span id="price" value-3="{{ auth()->user()->session_price }}"> {{ auth()->user()->session_price }}</span><span class="fs-7 fw-bolder text-blue"> IQD</span></div>
                        </div>
                    </div>
                    <form action="{{ route('session.store') }}" method="post">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <label>Date & Time</label>
                                <div class="input-group input-group-outline date mb-3" id="copy">
                                    <input type="text" id="date" class="form-control" name="date_time[]" value="{{ $carbon->now() }}" />
                                </div>
                                @error('date_time')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="hidden" name="session_id" value="{{ $patient->id }}">
                        </div>
                        <div class="put"></div>
                        
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label>Session's Status</label>
                                <div class="input-group input-group-outline mb-3">
                                    <select class="form-control" name="session_status">
                                        <option value="pending">Pending</option>
                                        <option value="attended">Attended</option>
                                        <option value="not_attended">Not Attended</option>
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
                                        <option value="paid">Paid</option>
                                        <option value="not_paid">not Paid Yet</option>
                                    </select>
                                    @error('payment_status')
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="patient_debts" name='patient_debts' value="{{ auth()->user()->session_price }}">
                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary">Add Session</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    
    @push('js')
        <script>
            $("#Paid").on("keyup change", function(e) {
                var result = {{ $patient->patient_debts }} - $(this).val();
                if ($(this).val() < {{ $patient->patient_debts }}) {
                    $(".amount").html(result)
                    $("#patient_debts").val(result)
                }
            })
        </script>
        
        {{-- for Create session --}}
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        <script>
            $(function() {
                $('#date:eq(0)').daterangepicker({
                    timePicker: true,
                    singleDatePicker: true,
                    locale: {
                        format: 'YYYY-MM-DD hh:mm A'
                    }
                });
            });

            $('#session_num').on('change', function() {
                $('.put').empty();
                for (var i=1; i < $(this).val(); i++) {
                    $(".date:first").clone().appendTo(".put");
                    $(function() {
                        $('#date:eq(1)').daterangepicker({
                            timePicker: true,
                            singleDatePicker: true,
                            locale: {
                                format: 'YYYY-MM-DD hh:mm A'
                            }
                        });
                    });
                }
                
                let price = {{ auth()->user()->session_price }};
                let pr = i * price;
                $('#price').html(pr);
                $('#price').attr("value-3", pr)
                $('#patient_debts').val(pr)
                $('#discount option:first').prop('selected',true);
            });
            
            $('#discount').on('change', function() {   
                let price = $('#price').attr("value-3")
                let price_after = price - (price * $(this).val()/100)
                $('#price').html(price_after);   
                $('#patient_debts').val(price_after)
            });
        </script>
        
    @endpush
@endsection
