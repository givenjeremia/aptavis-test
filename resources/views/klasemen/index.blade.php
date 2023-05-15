@extends('layouts.app')

@section('content')
<h3>Klasemen</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Klub</th>
            <th scope="col">Ma</th>
            <th scope="col">Me</th>
            <th scope="col">S</th>
            <th scope="col">K</th>
            <th scope="col">GM</th>
            <th scope="col">GK</th>
            <th scope="col">Point</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($klasemen as $key => $item)
        <tr>
            <th scope="row">{{ $key +1 }}</th>
            <td>{{ $item['nama_club'] }}</td>
            <td>{{ $item['total_main'] }}</td>
            <td>{{ $item['total_menang'] }}</td>
            <td>{{ $item['total_seri'] }}</td>
            <td>{{ $item['total_kalah'] }}</td>
            <td>{{ $item['goal_menang'] }}</td>
            <td>{{ $item['goal_lose'] }}</td>
            <td>{{ $item['point'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>



@endsection