@extends('layout')
@section('lang','en')
@section('title','Product dashbord')
@section('content')
    <nav>
        <section>
            <a href="{{route('companies')}}" class="sec">Company</a>
            <a href="{{route('products')}}" class="sec">Product</a>
        </section>
        <section>
            <a href="{{route('products.new')}}" class="outline-dark">Craete a Product</a>
        </section>
    </nav>
    <h2>Visible Product</h2>
    <hr>
    @if($showProducts->isNotEmpty())
        <div class="row">
            @php
                $showProductIndex = 0
            @endphp
        @foreach($showProducts as $showProduct)
            <div class="card">
                <h4>#{{++$showProductIndex}} | {{$showProduct->GTIN}}</h4>
                <hr>
                <section><strong>English Name :</strong> {{$showProduct->productNameEnglish}}</section>
                <section><strong>English Description :</strong> {{$showProduct->productDescriptionEnglish}}</section>
                <div class="action">
                    <a href="{{route('products.status',['GTIN'=>$showProduct->GTIN])}}" class="warn">Hide</a>
                    <a href="{{route('products.show',['GTIN'=>$showProduct->GTIN])}}" class="info">View</a>
                </div>
            </div>
        @endforeach
        </div>
    @else
        <h3>Visible Product is empty</h3>
    @endif
    <h2>Hide Product</h2>
    <hr>
    @if($hideProducts->isNotEmpty())
        <div class="row">
            @php
                $hideProductIndex = 0
            @endphp
        @foreach($hideProducts as $hideProduct)
            <div class="card">
                <h4>#{{++$hideProductIndex}} | {{$hideProduct->GTIN}}</h4>
                <hr>
                <section><strong>English Name :</strong> {{$hideProduct->productNameEnglish}}</section>
                <section><strong>English Description :</strong> {{$hideProduct->productDescriptionEnglish}}</section>
                <div class="action">
                    <a href="{{route('products.status',['GTIN'=>$hideProduct->GTIN])}}" class="warn">Show</a>
                    <a href="{{route('products.show',['GTIN'=>$hideProduct->GTIN])}}" class="info">View</a>
                    <a href="{{route('products.destroy',['GTIN'=>$hideProduct->GTIN])}}" class="danger" onclick="return confirm('Are you sure to delete {{$hideProduct->GTIN}}')">Delete</a>
                </div>
            </div>
        @endforeach
        </div>
    @else
        <h3>Hide Product is empty</h3>
    @endif
@endsection