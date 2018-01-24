@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-panel">
        
        <div class="row valign-wrapper" style="margin-bottom: 0">
            <div class="input-field col s12 m10">
                <i class="material-icons prefix">directions</i>
                <select id="tujuan">
                    @foreach($apotek as $list)
                    <option value="{{$list->lat}}, {{$list->lng}}">{{$list->nama}}</option>
                    @endforeach
                </select>
                <label>Pilih Tujuan:</label>
            </div>
            <button class="btn waves-effect waves-light col m2" type="button" onclick="calculateAndDisplayRoute()">Lihat
                <i class="material-icons right">send</i>
            </button>
        </div>

    </div>
    <div class="card-panel">
        <div id="map" style="width:100%;height: 475px"></div>
    </div>
    <div class="card-panel">
        <h5>Rute Menuju Apotek:</h5>
        <div id="panel"></div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
<script>
var directionsDisplay;
var directionsService;
var map;

function initMap() {
    directionsDisplay = new google.maps.DirectionsRenderer(
    {
        suppressMarkers: true
    });
    var lokasi = [
            @foreach($apotek as $ap)
            ['{{$ap->nama}}','{{$ap->alamat}}','{{$ap->kontak}}','{{$ap->lat}}','{{$ap->lng}}'],
            @endforeach
        ];

    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -7.3505808, lng: 108.2171633},
        zoom: 15
    });

    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById('panel'));
    // var onChangeHandler = function() {
    //     calculateAndDisplayRoute(directionsService, directionsDisplay);
    // };
    // document.getElementById('tujuan').addEventListener('change', onChangeHandler);

    var infoWindow = new google.maps.InfoWindow;

    var marker, i;

        for (i = 0; i < lokasi.length; i++) { 
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(lokasi[i][3], lokasi[i][4]),
                map: map,
                title: lokasi[i][0],
                label: 'A',
                animation: google.maps.Animation.DROP
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    map.setZoom(15);
                    map.setCenter(marker.getPosition());
                    infoWindow.setContent('Nama: ' +lokasi[i][0]+ '<br> Alamat: ' +lokasi[i][1]+ '<br> No Telp/HP: ' +lokasi[i][2]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));
        }


    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            map.setCenter(pos);
            var marker = new google.maps.Marker({
                position: pos,
                map: map
            });            

            google.maps.event.addListener(marker, 'click', (function(marker) {
                return function() {
                    infoWindow.setContent('Lokasi Anda.');
                    infoWindow.open(map, marker);
                }
            })(marker));

        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}

function calculateAndDisplayRoute() {
    navigator.geolocation.getCurrentPosition(function(position) {
        directionsService = new google.maps.DirectionsService();
        var tujuan = document.getElementById('tujuan').value;
        var latlng = tujuan.split(',');
        var lat = Number(latlng[0]);
        var lng = Number(latlng[1]);
        var start = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };
        var end = {
            lat: lat,
            lng: lng
        };
        directionsService.route({
            origin: start,
            destination: end,
            travelMode: 'DRIVING'
        }, function(response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    });
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAg-wNGqNz13toE-Cu30VWYov93-0GJW1I&callback=initMap&language=id&region=ID"></script>
@endpush