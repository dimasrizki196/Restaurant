@extends('layouts.mainlayout')

@section('content')
<form method="POST" action="{{ route('menu.update', $menus->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="content-container">
        <div class="thead">
            <span>Edit Food and Drink</span>
            <a href="/menu">
                <span>Back</span>
            </a>
        </div>
        <div class="isi">
            <div class="tbody">
                <div class="list">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $menus->names, old('name') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="list">
                    <label for="desc">Description</label>
                    <textarea name="description">{{ $menus->description, old('description') }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="list">
                    <label for="price">Price</label>
                    <input type="number" name="price" value="{{ $menus->price, old('price') }}">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="list">
                    <label for="image">Image</label>
                    <input type="file" name="image" value="{{ $menus->image, old('image') }}">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="list">
                    <label for="category">Category</label>
                    <select class="form-select" name="category_id" id="category_id">
                        <option value="{{ $menus->id }}">{{ $menus->name }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button class="tbl">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('page_title', 'Menu > Edit')