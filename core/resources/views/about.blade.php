@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-panel center-align">
        <h4>About Me</h4>
    </div>
    <div class="card-panel">
        <div class="row" style="margin-bottom: 0">
            <div class="col s12 m6 push-m6">
                <img src="http://satelitpost.com/wp-content/uploads/2017/07/Chelsea-Islan-TRIBUNNEWS-MASTER.jpg" alt="" class="circle responsive-img">
            </div>
            <div class="col s12 m6 pull-m6">
                <form class="col s12">
                    <div class="row" style="margin-bottom: 0">
                        <div class="input-field col s12">
                            <input name="nama" id="nama" type="text" class="validate" value="Chelsea Elizabeth Islan" readonly>
                            <label for="nama" class="active">Nama</label>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 0">
                        <div class="input-field col s12">
                            <input name="nama" id="nama" type="text" class="validate" value="2 Juni 1995" readonly>
                            <label for="nama" class="active">Tanggal Lahir</label>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 0">
                        <div class="input-field col s12">
                            <input name="nama" id="nama" type="text" class="validate" value="Washington, D.C., Amerika" readonly>
                            <label for="nama" class="active">Tempat Lahir</label>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 0">
                        <div class="input-field col s12">
                            <textarea name="alamat" id="alamat" class="materialize-textarea" data-length="120" readonly>Perum Abdi Negara Blok E.45, Mangkubumi, Tasikmalaya</textarea>
                            <label for="alamat" class="active">Alamat</label>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 0">
                        <div class="input-field col s12">
                            <input name="kontak" id="kontak" type="text" class="validate" value="081220371641" readonly>
                            <label for="kontak" class="active">No Telp/HP</label>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 0">
                        <div class="input-field col s12">
                            <input name="lat" id="lat" type="text" class="validate" value="167 cm" readonly>
                            <label for="lat" class="active">Tinggi</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
