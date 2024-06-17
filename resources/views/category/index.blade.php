@extends('layouts.mainlayout')

@section('content')
    <div class="card">
        <h2>Manage Category</h2>
        <div class="btn">
            <a href="/category/create">
                <span class="desc">Add</span>
                <i class='bx bx-plus-circle icon'></i>
            </a>
        </div>
        @if (session('msg'))
            <div class="alert">
                <strong>Succeed</strong> {{ session('msg') }}
                <button 
                type="button" 
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
                        <th>All Category</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>
                                <a href="{{ route('category.edit', [$row->id]) }}" class="link-no-decoration">
                                    <button class="btn-edit">
                                        <i style="font-size: 20px;" class='bx bx-edit'></i>
                                    </button>
                                </a>
                                <form onsubmit="return deleteData()" style="display: inline;" method="POST" action="{{ route('category.destroy', $row->id) }}">
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


@section('page_title', 'Category')

