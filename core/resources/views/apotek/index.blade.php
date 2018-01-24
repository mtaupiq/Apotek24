@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row" style="margin-bottom: 0">
		<div class="col s12">
			<div class="card-panel">
				<h5>Data Apotek</h5>
			</div>
		</div>
	</div>
	<div class="row" style="margin-bottom: 0">
		<div class="col s12">
			<div class="card-panel">
				@auth
				<a href="{{route('apotek.create')}}" class="waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Tambah"><i class="material-icons">add</i></a>
				@endauth
				<table class="highlight responsive-table">
					<thead>
						<tr>
							<th class="center-align">No</th>
							<th class="center-align">Nama Apotek</th>
							<th class="center-align">Alamat</th>
							<th class="center-align">No Telp/HP</th>
							@auth
							<th class="center-align">Aksi</th>
							@endauth
						</tr>
					</thead>

					<tbody>
						@foreach($apotek as $no=>$item)
						<tr>
							<td class="center-align">{{$no+1}}</td>
							<td class="center-align">{{$item->nama}}</td>
							<td class="center-align">{{$item->alamat}}</td>
							<td class="center-align">{{$item->kontak}}</td>
							@auth
							<td class="center-align">
								<form action="{{route('apotek.destroy', $item->id)}}" method="post" role="form">
									{{csrf_field()}}
									<a href="{{route('apotek.show', $item->id)}}" class="waves-effect waves-light btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Lihat"><i class="material-icons">visibility</i></a>
									<a href="{{route('apotek.edit', $item->id)}}" class="waves-effect waves-light btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ubah"><i class="material-icons">edit</i></a>
									<input type="hidden" name="_method" value="delete">
									<button type="submit" class="waves-effect waves-light btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Hapus" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?');"><i class="material-icons">delete</i></button>
								</form>
							</td>
							@endauth
						</tr>
						@endforeach
					</tbody>
				</table>
				{{ $apotek->links() }}
			</div>
		</div>
	</div>
</div>
@endsection