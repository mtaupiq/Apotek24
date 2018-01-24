@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row" style="margin-bottom: 0">
		<div class="col s12">
			<div class="card-panel">
				<h4>Lihat Data Apotek</h4>
			</div>
		</div>
	</div>
	<div class="row" style="margin-bottom: 0">
		<div class="col s12 m6 push-m6">
			<div class="card-panel">
				<div id="map" style="width:100%;height: 400px"></div>
			</div>
		</div>
		<div class="col s12 m6 pull-m6">
			<div class="card-panel">
				<div class="row" style="margin-bottom: 0">
					<form class="col s12">
						<div class="row" style="margin-bottom: 0">
							<div class="input-field col s12">
								<input name="nama" id="nama" type="text" class="validate" value="{{$apotek->nama}}" readonly>
								<label for="nama" class="active">Nama Apotek</label>
							</div>
						</div>
						<div class="row" style="margin-bottom: 0">
							<div class="input-field col s12">
								<textarea name="alamat" id="alamat" class="materialize-textarea" data-length="120" readonly>{{$apotek->alamat}}</textarea>
					            <label for="alamat" class="active">Alamat</label>
							</div>
						</div>
						<div class="row" style="margin-bottom: 0">
							<div class="input-field col s12">
								<input name="kontak" id="kontak" type="text" class="validate" value="{{$apotek->kontak}}" readonly>
								<label for="kontak" class="active">No Telp/HP</label>
							</div>
						</div>
						<div class="row" style="margin-bottom: 0">
							<div class="input-field col s12">
								<input name="lat" id="lat" type="text" class="validate" value="{{$apotek->lat}}" readonly>
								<label for="lat" class="active">Latitude</label>
							</div>
						</div>
						<div class="row" style="margin-bottom: 0">
							<div class="input-field col s12">
								<input name="lng" id="lng" type="text" class="validate" value="{{$apotek->lng}}" readonly>
								<label for="lng" class="active">Longitude</label>
							</div>
						</div>
						<a href="{{route('apotek.index')}}" class="waves-effect waves-light btn">Kembali</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('script')
<script>
	function initMap() {
        var lokasi = {lat: {{$apotek->lat}}, lng: {{$apotek->lng}}}
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 18,
            center: lokasi,
            clickableIcons: false
        });
        var marker = new google.maps.Marker({
            position: lokasi,
            map: map
        });
        marker.addListener('click', toggleBounce);

        map.addListener('center_changed', function() {
          window.setTimeout(function() {
            map.panTo(marker.getPosition());
          }, 3000);
        });
        function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
          setTimeout(function(){ marker.setAnimation(null); }, 2100);
        }
      }
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAg-wNGqNz13toE-Cu30VWYov93-0GJW1I&callback=initMap"></script>
@endpush