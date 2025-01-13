@extends('layout')
@section('lang','en')
@section('title','Show a Company')
@section('content')
    <nav>
        <section>
            <a href="{{route('companies')}}" class="sec">Back</a>
        </section>

        <section>
            <a href="{{route('companies.edit',['id'=>$company->companyId])}}" class="warn">Edit</a>
        </section>
    </nav>
    <br><br>
    <h1>Company Info</h1>
    <h3>{{$company->companyName}}</h3>
    <h3>{{$company->companyAddress}}</h3>
    <h3>{{$company->companyTelephone}}</h3>
    <h3>{{$company->companyEmail}}</h3>

    <br>

    <h2>Contact Info</h2>
    <h4>{{$contact->contactName}}</h4>
    <h4>{{$contact->contactNumber}}</h4>
    <h4>{{$contact->contactEmail}}</h4>
    <br>
    <h2>Owner Info</h2>
    <h4>{{$owner->ownerName}}</h4>
    <h4>{{$owner->ownerNumber}}</h4>
    <h4>{{$owner->ownerEmail}}</h4>
    <br>
    <h2>All Products</h2>
    <table>
        <thead>
            <tr>
                <th>GTIN </th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @if($products->isNotEmpty())
                @foreach($products as $product)
                <tr>
                    <td>{{ Str::limit($product->GTIN ,25) }}</td>
                    <td>{{ Str::limit($product->productName,25) }}</td>
                    <td>{{ Str::limit($product->productDescription,50) }}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">Empty . . .</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection