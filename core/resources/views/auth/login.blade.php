@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-bottom: 0">
        <div class="col s12 m6 offset-m3">
            <div class="card-panel">
                <h5>Login Administrator</h5>
            </div>
        </div>
        <div class="col s12 m6 offset-m3">
            <div class="card-panel">
                <div class="row" style="margin-bottom: 0">
                    <form class="col s12" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="row" style="margin-bottom: 0">
                            <div class="input-field col s12">
                                <input style="margin-bottom: 0" id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autofocus>
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
                                <input style="margin-bottom: 0" id="password" type="password" class="validate" name="password" required>
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
                                <button type="submit" class="waves-effect waves-light btn">
                                    Login
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
