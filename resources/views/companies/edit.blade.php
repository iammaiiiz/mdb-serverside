@extends('layout')
@section('lang','en')
@section('title','Edit a Company')
@section('content')
    <nav>
        <section>
            <a href="{{route('companies')}}" class="sec">Back</a>
        </section>

        <section>
        </section>
    </nav>
    <form action="{{route('companies.update',['id'=>$company->companyId])}}" method="post">
        @csrf
        @include('components.alert')
        <h1>Edit a Company</h1>
        <h3>Company</h3>
        <label for="companyName">Company Name</label>
        <input type="text" id="companyName" value="{{$company->companyName}}" name="companyName">
        <label for="companyAddress">Company Address</label>
        <input type="text" id="companyAddress" value="{{$company->companyAddress}}" name="companyAddress">
        <label for="companyTelephone">Company Telephone</label>
        <input type="text" id="companyTelephone" value="{{$company->companyTelephone}}" name="companyTelephone">
        <label for="companyEmail">Company Email</label>
        <input type="text" id="companyEmail" value="{{$company->companyEmail}}" name="companyEmail">
        <h3>Contact</h3>
        <label for="contactName">Contact Name</label>
        <input type="text" id="contactName" value="{{$company->contact->contactName}}" name="contactName">
        <label for="contactNumber">Contact Number</label>
        <input type="text" id="contactNumber" value="{{$company->contact->contactNumber}}" name="contactNumber">
        <label for="contactEmail">Contact Email</label>
        <input type="text" id="contactEmail" value="{{$company->contact->contactEmail}}" name="contactEmail">
        <h3>Owner</h3>
        <label for="ownerName">Owner Name</label>
        <input type="text" id="ownerName" value="{{$company->owner->ownerName}}" name="ownerName">
        <label for="ownerNumber">Owner Number</label>
        <input type="text" id="ownerNumber" value="{{$company->owner->ownerNumber}}" name="ownerNumber">
        <label for="ownerEmail">Owner Email</label>
        <input type="text" id="ownerEmail" value="{{$company->owner->ownerEmail}}" name="ownerEmail">
        <input type="submit" value="Edit">
    </form>
@endsection