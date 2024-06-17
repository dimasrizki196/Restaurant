@extends('layouts.mainlayout')

@section('content')
<form method="POST" action="{{ route('category.update', $categories->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="content-container">
        <div class="thead">
            <span>Edit Category</span>
            <a href="/category">
                <span>Back</span>
            </a>
        </div>
        <div class="isi">
            <div class="tbody">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ $categories->name, old('name') }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div>
                    <button class="tbl">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('page_title', 'Category > Edit')