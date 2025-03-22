@extends('layouts.master')
@section('header')
@parent()
@endsection

@section('content')
<h1>{{$title}}</h1>
@if(empty($actors))
    <FONT COLOR="red">No se ha encontrado ningun actor</FONT>
@else
    <div align="center">
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de nacimiento</th>
                <th>Pais</th>
                <th>Foto</th>
            </tr>

            @foreach($actors as $actor)
                <tr>
                    <td>{{$actor['name']}}</td>
                    <td>{{$actor['surname']}}</td>
                    <td>{{$actor['birthdate']}}</td>
                    <td>{{$actor['country']}}</td>
                    <td><img src={{$actor['img_url']}} style="width: 100px; height: 120px;" /></td>
                </tr>
            @endforeach
        </table>
    </div>
@endif
@endsection

@section('footer')
@parent
@endsection