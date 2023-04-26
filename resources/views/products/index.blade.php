@extends('layouts.app')

@section('content')
    <div class="container">

    <div class="row">
<div class="col-6"> Lista produktów</div> 
<div class="col-6">
<a class="float-right" href="{{route('products.create')}}">
    <button type="buttton" class="btn btn-primary">Dodaj</button>
</a>

    </div>
    </div>

    <div class="row" >

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Ilość</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Akcje</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->amount}}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{route('products.edit',$product->id)}}">
                                <button class="btn btn-primary btn-sm">E</button>
                            </a>

                            <a href="{{route('products.show',$product->id)}}">
                                <button class="btn btn-success btn-sm">P</button>
                            </a>

                            <button class="btn btn-danger btn-sm delete" data-id="{{ $product->id }}">X</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
    </div>
@endsection

@section('javascript')
const deleteURL = "{{url('products')}}/"

@endsection
@section('js-files')
    @vite(['resources/js/delete.js'])

@endsection
