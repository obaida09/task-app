@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Update Category</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2 py-4">
                    <form action="{{ route('category.update', $category->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" value="{{ old('name', $category->name) }}" name="name"
                                        class="form-control">
                                </div>
                                @error('name')
                                    <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <select class="form-control" name="parent_id" id="exampleFormControlSelect1">
                                        <option value="0">Select Category ... </option>
                                        @foreach ($main_categories as $main_category)
                                            <option value="{{ $main_category->id }}"
                                                {{ old('parent_id', $category->parent_id) == $main_category->id ? 'selected' : null }}>
                                                {{ $main_category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <div style="color: rgba(255, 0, 0, 0.692)" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
