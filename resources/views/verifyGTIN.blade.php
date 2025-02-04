@extends('layout')
@section('lang','en')
@section('title','Verify GTIN')
@section('content')
    <form action="{{route('bulk')}}" method="post">
        <h1>Verify GTIN</h1>
        @csrf
        <label for="GTIN">Bulk GTIN</label>
        <textarea name="GTIN" id="GTIN" rows="10"></textarea>
        <input type="submit" value="Check">
        @if(Session::has("isAllValid"))
            @if(Session::get("isAllValid") == true)
                <center><img src="{{url('public/images/medies/green-tick.png')}}" alt="green tick" width="100" height="100"></center>
            @endif
            <center>
            <table>
                <thead>
                    <tr>
                        <th>GTIN</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Session::get("result") as $item)
                        <tr>
                            <td>{{$item["GTIN"]}}</td>
                            <td>{{$item["status"]}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </center>
        @endif
    </form>
@endsection