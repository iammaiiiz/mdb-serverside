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
            <a href="{{route('products.new')}}" class="success">Craete a Product</a>
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
                <h4>Name : {{$showProduct->productName}}</h4>
                <section><strong>Description :</strong> {{$showProduct->productDescription}}</section>
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
    <h2>Deactivate Company</h2>
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
                <h4>Name : {{$hideProduct->productName}}</h4>
                <section><strong>Description :</strong> {{$hideProduct->productDescription}}</section>
                <div class="action">
                    <a href="{{route('products.status',['GTIN'=>$hideProduct->GTIN])}}" class="warn">Show</a>
                    <a href="{{route('products.show',['GTIN'=>$hideProduct->GTIN])}}" class="info">View</a>
                    <a href="{{route('products.destroy',['GTIN'=>$hideProduct->GTIN])}}" class="danger" onclick="return confirm('Are you sure to delete {{$hideProduct->productName}}')">Delete</a>
                </div>
            </div>
        @endforeach
        </div>
    @else
        <h3>Visible Product is empty</h3>
    @endif
@endsection