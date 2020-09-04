@extends('layout.app')

@section('header')
    This is Header
@endsection

@section('content')
    I am from [helloadmin] view file
    <br /><br />
    {{$data}}

    @foreach ($users as $item)
        <h3>{{$item}}</h3>
    @endforeach

    @if ($users[0] == 'aaa@gmail.com')
        <br /> Mathed !!
    @else
        <br /> Missmathed !!
    @endif
@endsection

@section('script')
    <script>
        alert('Hello!!');
    </script>
@endsection
