@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit Patient</h6>
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
                                <label>Sex</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" value="{{ old('gendor', $patient->gendor) }}" name="gendor"
                                        class="form-control">
                                </div>
                                @error('gendor')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Domination</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" value="{{ old('domination', $patient->domination) }}"
                                        name="domination" class="form-control">
                                </div>
                                @error('domination')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
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
    @endpush
@endsection
