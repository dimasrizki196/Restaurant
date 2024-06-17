@extends('layouts.mainlayout')

@section('content')
<div class="card">
    <h2>Manage Food and Drink</h2>
    <div class="btn" id="other-menu">
        <a href="/menu/create">
            <span class="desc">Add</span class="desc">
            <i class='bx bx-plus-circle icon'></i>
        </a>
    </div>
    @if (session('msg'))
        <div class="alert">
            <strong>Succeed</strong> {{ session('msg') }}
            <button type="button" 
            onclick="closeAlert(this)" 
            style="background: transparent; border: 0; float: right;" 
            aria-label="Close">&times;</button>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->names }}</td>
                        <td>{{ $row->description }}</td>
                        <td>{{ $row->price }}</td>
                        <td><img src="{{ asset('storage/image-fd/'.$row->image) }}" alt="" width="70"></td>
                        <td>{{ $row->name }}</td>
                        <td>
                            <a href="{{ route('menu.edit', [$row->id]) }}" class="link-no-decoration">
                                <button class="btn-edit">
                                    <i style="font-size: 20px;" class='bx bx-edit'></i>
                                </button>
                            </a>
                            <form onsubmit="return deleteData()" style="display: inline;" method="POST" action="{{ route('menu.destroy', $row->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn-delete">
                                    <i style="font-size: 20px;" class='bx bx-trash'></i>
                                </button>
                            </form>
                        </td>                
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('page_title', 'Menu')