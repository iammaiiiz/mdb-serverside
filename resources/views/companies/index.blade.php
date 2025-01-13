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
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Telephon</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($activateCompanies->isNotEmpty())
                @foreach($activateCompanies as $activateCompany)
                <tr>
                    <td>{{ Str::limit($activateCompany->companyName,25) }}</td>
                    <td>{{ Str::limit($activateCompany->companyAddress,25) }}</td>
                    <td>{{ Str::limit($activateCompany->companyTelephone,25) }}</td>
                    <td>{{ Str::limit($activateCompany->companyEmail,25) }}</td>
                    <td>
                        <section class="action">
                            <a href="{{route('companies.show',['id'=>$activateCompany->companyId])}}" class="info">View</a>
                            <a href="{{route('companies.status',['id'=>$activateCompany->companyId])}}" class="warn">Deactivate</a>
                        </section>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Empty . . .</td>
                </tr>
            @endif
        </tbody>
    </table>
    <h2>Deactivate Company</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Telephon</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($deactivateCompanies->isNotEmpty())
                @foreach($deactivateCompanies as $deactivateCompany)
                <tr>
                    <td>{{ Str::limit($deactivateCompany->companyName,25) }}</td>
                    <td>{{ Str::limit($deactivateCompany->companyAddress,25) }}</td>
                    <td>{{ Str::limit($deactivateCompany->companyTelephone,25) }}</td>
                    <td>{{ Str::limit($deactivateCompany->companyEmail,25) }}</td>
                    <td>
                        <section class="action">
                            <a href="{{route('companies.show',['id'=>$deactivateCompany->companyId])}}" class="info">View</a>
                            <a href="{{route('companies.status',['id'=>$deactivateCompany->companyId])}}" class="warn">Activate</a>
                        </section>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5"><center>Empty . . .</center></td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection