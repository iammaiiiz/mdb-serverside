@extends('layout')
@section('lang','en')
@section('title','Edit a Product')
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
        <h1>Edit a Product</h1>
        <h3>Product</h3>
        <label for="productNameEnglish">Product Name</label>
        <input type="text" id="productNameEnglish" value="{{$product->productNameEnglish}}" name="productNameEnglish">
        <label for="productNameFrance">Product Name</label>
        <input type="text" id="productNameFrance" value="{{$product->productNameFrance}}" name="productNameFrance">
        <label for="productDescriptionEnglish">Product Description</label>
        <textarea name="productDescriptionEnglish" id="productDescriptionEnglish" width="100%" rows="7">{{$product->productDescriptionEnglish}}</textarea>
        <label for="productDescriptionFrance">Product Description</label>
        <textarea name="productDescriptionFrance" id="productDescriptionFrance" width="100%" rows="7">{{$product->productDescriptionFrance}}</textarea>
        <label for="GTIN">Product GTIN</label>
        <input type="text" id="GTIN" value="{{$product->GTIN}}" name="GTIN">
        <label for="companyId">Company</label>
        <select name="companyId" id="companyId">
            @foreach($companies as $company)
                <option value="{{$company->companyId}}">{{$company->companyName}}</option>
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
        <input type="submit" value="Edit">
    </form>
@endsection