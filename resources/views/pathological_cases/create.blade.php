@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Create Pathological Case</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2 py-4">
                    <form action="{{ route('pathological_case.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <select class="form-control" id="category">
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <select class="form-control" name="category_id" id="sub_category">
                                       
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Pathological Case</label>
                                    <textarea name="content" rows="4" class="form-control"></textarea>
                                </div>
                                @error('content')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary">Add Pathological Case</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            jQuery('#category').on('change', function() {
                jQuery.ajax({
                    url: "{{ route('sub_category') }}",
                    method: 'get',
                    data: {
                        category_id: $(this).val(),
                    },
                    success: function(data) {
                        for (var i=0; i < data.length; i++) {  
                            $("#sub_category").append(
                                '<option value="' + data[i].id + '">' + data[i].name + '</option>'
                            ); 
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
