@extends('layout')
@section('lang','en')
@section('title','Show a Product')
@section('content')
    @if(Session::has('isAdmin'))
    <nav>
        <section>
            <a href="{{route('products')}}" class="sec">Back</a>
        </section>

        <section>
            <a href="{{route('products.edit',['GTIN'=>$product->GTIN])}}" class="warn">Edit</a>
        </section>
    </nav>
    @endif
    <br><br>
    <h1>{{$product->companyName}}</h1>
    @if(Empty($product->productImage))
    <img src="{{url('public/images/products/placeholder.jpg')}}" alt="Empty product image" height="400px">
    @else
    <img src="{{url('public/images/products/'.$product->productImage)}}" alt="Product image" height="400px">
    @if(Session::has('isAdmin'))
        <a href="{{route('products.image.delete',['GTIN'=>$product->GTIN])}}" class="danger">Delete image</a>
        <br>
        @endif
    @endif
    <h2>{{$product->GTIN}}</h2>
    <h3>{{$product->productDescription}}</h3>
    <h3>{{$product->productGross}} {{$product->productUnit}}</h3>
    <h3>{{$product->productNet}} {{$product->productUnit}}</h3>
@endsection