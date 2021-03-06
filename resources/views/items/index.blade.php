@extends('layout/main')
@section('title','Barang')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-5">
            <h1 class="mt-2">Your Item List</h1>

            <a href="/items/create" class="btn btn-primary my-3">Add Item</a>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <ul class="list-group">
                
                @foreach ($items as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item->item_name }}
                    <a href="/items/{{$item->id}}"class="badge badge-info">detail</a>
                </li>
                @endforeach
                
            </ul>
        </div>
    </div>
</div>
@endsection
