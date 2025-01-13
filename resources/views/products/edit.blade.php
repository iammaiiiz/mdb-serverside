@extends('layout')
@section('lang','en')
@section('title','Create a Product')
@section('content')
    <nav>
        <section>
            <a href="{{route('products.show',['GTIN'=>$product->GTIN])}}" class="sec">Back</a>
        </section>

        <section>
        </section>
    </nav>
    <form action="{{route('products.update',['GTIN'=>$product->GTIN])}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('components.alert')
        <h1>Create a Product</h1>
        <h3>Product</h3>
        <label for="productName">Product Name</label>
        <input type="text" id="productName" value="{{$product->productName}}" name="productName">
        <label for="GTIN">Product GTIN</label>
        <input type="text" id="GTIN" value="{{$product->GTIN}}" name="GTIN">
        <label for="productDescription">Product Description</label>
        <textarea name="productDescription" id="productDescription" width="100%" rows="7">{{$product->productDescription}}</textarea>
        <label for="companyId">Company</label>
        <select name="companyId" id="companyId">
            @foreach($companies as $company)
                <option value="{{$company->cId}}">{{$company->cName}}</option>
            @endforeach
        </select>
        <label for="productBrandName">Product Brand Name</label>
        <input type="text" id="productBrandName" value="{{$product->productBrandName}}" name="productBrandName">
        <label for="productCountryOfOrigin">Product Country Of Origin</label>
        <input type="text" id="productCountryOfOrigin" value="{{$product->productCountryOfOrigin}}" name="productCountryOfOrigin">
        <label for="productGross">Product Gross</label>
        <input type="number" id="productGross" value="{{$product->productGross}}" name="productGross">
        <label for="productNet">Product Net</label>
        <input type="number" id="productNet" value="{{$product->productNet}}" name="productNet">
        <label for="productUnit">Product Unit</label>
        <input type="text" id="productUnit" value="{{$product->productUnit}}" name="productUnit">
        <label for="productBrandName">Product Email</label>
        <input type="file"name="productImage" id="productImage">
        <input type="submit" value="Create">
    </form>
@endsection