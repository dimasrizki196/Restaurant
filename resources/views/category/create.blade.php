@extends('layouts.mainlayout')

@section('content')
<form method="POST" action="{{ route('category.store') }}">
    @csrf
    <div class="content-container">
        <div class="thead">
            <span>Add Category</span>
            <a href="/category">
                <span>Back</span>
            </a>
        </div>
        <div class="isi">
            <div class="tbody">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div>
                    <button class="tbl">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('page_title', 'Category > Create')