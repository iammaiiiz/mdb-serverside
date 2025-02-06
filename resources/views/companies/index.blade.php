@extends('layout')
@section('lang','en')
@section('title','Company dashbord')
@section('content')
    <nav>
        <section>
            <a href="{{route('companies')}}" class="sec">Company</a>
            <a href="{{route('products')}}" class="sec">Product</a>
        </section>
        <section>
            <a href="{{route('companies.new')}}" class="success">Craete a Company</a>
        </section>
    </nav>
    <h2>Activate Company</h2>
    <hr>
    <div class="row">
        @if($activateCompanies->isNotEmpty())
            @php
                $activateIndex = 0
            @endphp
            @foreach($activateCompanies as $activateCompany)
            <div class="card">
                <h4>#{{++$activateIndex}} | {{$activateCompany->companyName}}</h4>
                <hr>
                <section><strong>Address :</strong> {{$activateCompany->companyAddress}}</section>
                <section><strong>Telephone :</strong> {{$activateCompany->companyTelephone}}</section>
                <section><strong>Email :</strong> {{$activateCompany->companyEmail}}</section>
                <div class="action">
                    <a href="{{route('companies.show',['id'=>$activateCompany->companyId])}}" class="info">View</a>
                    <a href="{{route('companies.status',['id'=>$activateCompany->companyId])}}" class="warn">Deactivate</a>
                </div>
            </div>
            @endforeach
        @else
            <h3>ACtivate company is empty</h3>
        @endif
    </div>
    <br>
    <h2>Deactivate Company</h2>
    @if($deactivateCompanies->isNotEmpty())
    <div class="row">
        @php
            $deactivateIndex = 0
        @endphp
        @foreach($deactivateCompanies as $deactivateCompany)
        <div class="card">
            <h4>#{{++$deactivateIndex}} | {{$deactivateCompany->companyName}}</h4>
            <hr>
            <section><strong>Address :</strong> {{$deactivateCompany->companyAddress}}</section>
            <section><strong>Telephone :</strong> {{$deactivateCompany->companyTelephone}}</section>
            <section><strong>Email :</strong> {{$deactivateCompany->companyEmail}}</section>
            <div class="action">
                <a href="{{route('companies.show',['id'=>$deactivateCompany->companyId])}}" class="info">View</a>
                <a href="{{route('companies.status',['id'=>$deactivateCompany->companyId])}}" class="warn">Activate</a>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <hr>
        <center><h3>Deactivate company is empty</h3></center>
    @endif
@endsection