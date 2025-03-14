@extends('layouts.master')
@section('header')
@parent()
@endsection
@section('content')
<h2>{{$title}} {{$count}}</h2>
@endsection
@section('footer')
@parent
@endsection