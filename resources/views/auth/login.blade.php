@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-primary" style="border-color: #009788">
                <div class="panel-heading" style="color: lightgray !important;">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="login">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-5 control-label">E-Mail Address</label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-5 control-label">Password</label>

                            <input id="password" type="password" class="form-control" name="password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-5">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-5">
                                <button type="submit" class="btn btn-primary" style="background-color: #009788;border-color: #009788">
                                    Bejelentkezés
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection