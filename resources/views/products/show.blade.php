@extends('layout')
@section('lang',Str::lower($lang))
@section('title','Show a Product')
@section('content')
    <nav>
    @if(Session::has('isAdmin'))
        <section>
            <a href="{{route('products')}}" class="sec">Back</a>
        </section>

        <section>
            <a href="{{route('products.edit',['GTIN'=>$product->GTIN])}}" class="warn">Edit</a>
        </section>
    @else
    <section></section>
    <section>
        <a href="{{route('public.product.show',['GTIN'=>$product->GTIN,'lang'=>'EN'])}}" class="text">en</a> |
        <a href="{{route('public.product.show',['GTIN'=>$product->GTIN,'lang'=>'FR'])}}" class="text">Fr</a>
    </section>
    @endif
    </nav>
    <br><br>
    <h1>{{($product->company)->companyName}}</h1>
    @if(Empty($product->productImage))
    <img src="{{url('public/images/products/placeholder.jpg')}}" alt="Empty product image" height="400px">
    @else
    <img src="{{url('public/images/products/'.$product->productImage)}}" alt="Product image" height="400px">
    @if(Session::has('isAdmin'))
        <a href="{{route('products.image.delete',['GTIN'=>$product->GTIN])}}" onclick="return confirm('Are you sure to remove {{$product->productImage}}')" class="danger">Delete image</a>
        <br>
        @endif
    @endif
    <h2>{{$product->GTIN}}</h2>
    @if($lang == "EN")
    <h3>{{$product->productDescriptionEnglish}}</h3>
    @else
    <h3>{{$product->productDescriptionFrance}}</h3>
    @endif
    <h3>Weight : {{$product->productGross}} {{$product->productUnit}}</h3>
    <h3>Net : {{$product->productNet}} {{$product->productUnit}}</h3>
@endsection