@extends('layout')
@section('lang','en')
@section('title','Create a Company')
@section('content')
    <nav>
        <section>
            <a href="{{route('companies')}}" class="dark">Back</a>
        </section>

        <section>
        </section>
    </nav>
    <form action="{{route('companies.store')}}" method="post">
        @csrf
        @include('components.alert')
        <h1>Create a Company</h1>
        <h3>Company</h3>
        <label for="companyName">Company Name</label>
        <input type="text" id="companyName" name="companyName">
        <label for="companyAddress">Company Address</label>
        <input type="text" id="companyAddress" name="companyAddress">
        <label for="companyTelephone">Company Telephone</label>
        <input type="text" id="companyTelephone" name="companyTelephone">
        <label for="companyEmail">Company Email</label>
        <input type="text" id="companyEmail" name="companyEmail">
        <h3>Contact</h3>
        <label for="contactName">Contact Name</label>
        <input type="text" id="contactName" name="contactName">
        <label for="contactNumber">Contact Number</label>
        <input type="text" id="contactNumber" name="contactNumber">
        <label for="contactEmail">Contact Email</label>
        <input type="text" id="contactEmail" name="contactEmail">
        <h3>Owner</h3>
        <label for="ownerName">Owner Name</label>
        <input type="text" id="ownerName" name="ownerName">
        <label for="ownerNumber">Owner Number</label>
        <input type="text" id="ownerNumber" name="ownerNumber">
        <label for="ownerEmail">Owner Email</label>
        <input type="text" id="ownerEmail" name="ownerEmail">
        <input type="submit" value="Create">
    </form>
@endsection