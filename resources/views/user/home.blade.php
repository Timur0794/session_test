@extends('layouts.main')
@section('page.title')
    Home
@endsection
@section('content')
    <h1>
       Welcome
    </h1>
    <div>
    </div>
    <div>
        <a href="{{route('session.index')}}">Активные сессии {{$sessions -> count()}}</a>
    </div>
@endsection
