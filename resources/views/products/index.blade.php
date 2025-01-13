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
    <table>
        <thead>
            <tr>
                <th>GTIN</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($showProducts->isNotEmpty())
                @foreach($showProducts as $showProduct)
                <tr>
                    <td>{{ Str::limit($showProduct->GTIN,25) }}</td>
                    <td>{{ Str::limit($showProduct->productName,15) }}</td>
                    <td>{{ Str::limit($showProduct->productDescription,35) }}</td>
                    <td>
                        <section class="action">
                            <a href="{{route('products.status',['GTIN'=>$showProduct->GTIN])}}" class="warn">Hide</a>
                            <a href="{{route('products.show',['GTIN'=>$showProduct->GTIN])}}" class="info">View</a>
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
                <th>GTIN</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($hideProducts->isNotEmpty())
                @foreach($hideProducts as $hideProduct)
                <tr>
                    <td>{{ Str::limit($hideProduct->GTIN,25) }}</td>
                    <td>{{ Str::limit($hideProduct->productName,15) }}</td>
                    <td>{{ Str::limit($hideProduct->productDescription,35) }}</td>
                    <td>
                        <section class="action">
                            <a href="{{route('products.status',['GTIN'=>$hideProduct->GTIN])}}" class="warn">Hide</a>
                            <a href="{{route('products.show',['GTIN'=>$hideProduct->GTIN])}}" class="info">View</a>
                            <a href="{{route('products.destroy',['GTIN'=>$hideProduct->GTIN])}}" onclick="return confirm('Do you want to delete this product?')" class="danger">Delete</a>
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
@endsection