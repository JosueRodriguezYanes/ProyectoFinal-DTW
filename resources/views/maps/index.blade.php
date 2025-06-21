@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mapa Interactivo</h1>
    <div id="map" style="height: 500px; width: 100%;"></div>
</div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

<script src="{{ asset('js/map.js') }}"></script>
@endsection
