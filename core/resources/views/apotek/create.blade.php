@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row" style="margin-bottom: 0">
		<div class="col s12">
			<div class="card-panel">
				<h4>Tambah Data Apotek</h4>
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
					<form class="col s12" action="{{route('apotek.store')}}" method="POST" role="form">
					{{csrf_field()}}
						<div class="row" style="margin-bottom: 0">
							<div class="input-field col s12">
								<input name="nama" id="nama" type="text" class="validate">
								<label for="nama">Nama Apotek</label>
							</div>
						</div>
						<div class="row" style="margin-bottom: 0">
							<div class="input-field col s12">
								<textarea name="alamat" id="alamat" class="materialize-textarea" data-length="120"></textarea>
					            <label for="alamat">Alamat</label>
							</div>
						</div>
						<div class="row" style="margin-bottom: 0">
							<div class="input-field col s12">
								<input name="kontak" id="kontak" type="text" class="validate">
								<label for="kontak">No Telp/HP</label>
							</div>
						</div>
						<div class="row" style="margin-bottom: 0">
							<div class="input-field col s12">
								<input value="-7.3505808" name="lat" id="lat" type="text" class="validate">
								<label for="lat" class="active">Latitude</label>
							</div>
						</div>
						<div class="row" style="margin-bottom: 0">
							<div class="input-field col s12">
								<input value="108.2171633" name="lng" id="lng" type="text" class="validate">
								<label for="lng" class="active">Longitude</label>
							</div>
						</div>
						<button class="btn waves-effect waves-light" type="submit">Simpan
							<i class="material-icons right">send</i>
						</button>
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
        var tasik = {lat: -7.3505808, lng: 108.2171633};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: tasik
        });
        var marker = new google.maps.Marker({
            position: tasik,
            map: map,
            draggable: true
        });
        google.maps.event.addListener(marker,'position_changed',function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAg-wNGqNz13toE-Cu30VWYov93-0GJW1I&callback=initMap"></script>
@endpush