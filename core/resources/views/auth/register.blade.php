@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-bottom: 0">
        <div class="col s12 m6 offset-m3">
            <div class="card-panel">
                <h5>Daftar Administrator</h5>
            </div>
        </div>

        <div class="col s12 m6 offset-m3">
            <div class="card-panel">
                <div class="row" style="margin-bottom: 0">
                    <form class="col s12" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="row" style="margin-bottom: 0">
                            <div class="input-field col s12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                <label class="{{ $errors->has('name') ? ' red-text' : '' }}" for="name">Nama</label>
                                @if ($errors->has('name'))
                                <small class="red-text">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </small>
                                @endif
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 0">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <label class="{{ $errors->has('email') ? ' red-text' : '' }}" for="email">E-Mail Address</label>
                                @if ($errors->has('email'))
                                    <small class="red-text">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 0">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <label class="{{ $errors->has('password') ? ' red-text' : '' }}" for="password">Password</label>
                                @if ($errors->has('password'))
                                    <small class="red-text">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 0">
                            <div class="input-field col s12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <label for="password-confirm">Confirm Password</label>
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 0">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
