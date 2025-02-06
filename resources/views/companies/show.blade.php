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
    <h3>Name : {{$company->companyName}}</h3>
    <h3>Address : {{$company->companyAddress}}</h3>
    <h3>Telephon : {{$company->companyTelephone}}</h3>
    <h3>Email : {{$company->companyEmail}}</h3>

    <br>

    <h2>Contact Info</h2>
    <h4>Name : {{$company->contact->contactName}}</h4>
    <h4>Telephon : {{$company->contact->contactNumber}}</h4>
    <h4>Email : {{$company->contact->contactEmail}}</h4>
    <br>
    <h2>Owner Info</h2>
    <h4>Name : {{$company->owner->ownerName}}</h4>
    <h4>Telephon : {{$company->owner->ownerNumber}}</h4>
    <h4>Email : {{$company->owner->ownerEmail}}</h4>
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
            @if(($company->product)->isNotEmpty())
                @foreach($company->product as $product)
                <tr>
                    <td>{{ Str::limit($product->GTIN ,25) }}</td>
                    <td>{{ Str::limit($product->productNameEnglish,25) }}</td>
                    <td>{{ Str::limit($product->productDescriptionEnglish,50) }}</td>
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