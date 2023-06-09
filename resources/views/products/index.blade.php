@extends('layouts.app')

@section('content')

    <div class="container">
              @include('helpers.flash-messages')

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
                    <th scope="col">Zdjęcie</th>
                    <th scope="col">Kategoria</th>
                    <th scope="col">Akcje</th>
                </tr>
            </thead>
            <tbody>
<i class="fa-solid fa-cart-arrow-down"></i>
<i class="fa-solid fa-cart-arrow-down"></i>

                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->amount}}</td>
                        <td>{{ $product->price }}</td>
                        <td>@if(!is_null($product->image_path))   
                            <p>{{$product->image_path}}</p>                  
                                 <img src="{{Vite::asset('/public/storage/'.$product->image_path)}}" class="img-fluid mx-auto d-block" width="15px"  alt="Zdjecie produktu">
                                                                                                                                                                    @endif</td>
                        <td>@if(!is_null($product->category)){{ $product->category->name }}@endif</td>
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
