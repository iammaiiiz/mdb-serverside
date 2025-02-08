@extends('layout')
@section('lang','en')
@section('title','Create a Product')
@section('content')
    <nav>
        <section>
            <a href="{{route('products')}}" class="dark">Back</a>
        </section>

        <section>
        </section>
    </nav>
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('components.alert')
        <h1>Create a Product</h1>
        <h3>Product</h3>
        <label for="productNameEnglish">Product Name English</label>
        <input type="text" id="productNameEnglish" name="productNameEnglish">
        <label for="productNameFrance">Product Name France</label>
        <input type="text" id="productNameFrance" name="productNameFrance">
        <label for="productDescriptionEnglish">Product Description English</label>
        <textarea name="productDescriptionEnglish" id="productDescriptionEnglish" width="100%" rows="7"></textarea>
        <label for="productDescriptionFrance">Product Description France</label>
        <textarea name="productDescriptionFrance" id="productDescriptionFrance" width="100%" rows="7"></textarea>
        <label for="GTIN">Product GTIN</label>
        <input type="text" id="GTIN" name="GTIN">
        <label for="companyId">Company</label>
        <select name="companyId" id="companyId">
            @foreach($companies as $company)
                <option value="{{$company->companyId}}">{{$company->companyName}}</option>
            @endforeach
        </select>
        <label for="productBrandName">Product Brand Name</label>
        <input type="text" id="productBrandName" name="productBrandName">
        <label for="productCountryOfOrigin">Product Country Of Origin</label>
        <input type="text" id="productCountryOfOrigin" name="productCountryOfOrigin">
        <label for="productGross">Product Gross</label>
        <input type="number" step="0.01" id="productGross" name="productGross">
        <label for="productNet">Product Net</label>
        <input type="number" step="0.01" id="productNet" name="productNet">
        <label for="productUnit">Product Unit</label>
        <input type="text" id="productUnit" name="productUnit">
        <label for="productBrandName">Product Email</label>
        <input type="file" name="productImage" id="productImage">
        <input type="submit" value="Create">
    </form>
@endsection