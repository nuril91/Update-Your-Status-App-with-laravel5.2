@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><center>Twitter Application</center></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">

                        <div class="form-group col-md-6" style="float:none;margin:0 auto;">
                          <label>LOGIN</label>
                        </div>

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-6" style="float:none;margin:0 auto;">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-6" style="float:none;margin:0 auto;">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                            </div>
                        </div>
                    </form>

                    <hr />

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register2') }}">

                      <div class="form-group col-md-6" style="float:none;margin:0 auto;">
                        <label>REGISTER</label>
                      </div>

                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email2') ? ' has-error' : '' }}">
                            <div class="col-md-6" style="float:none;margin:0 auto;">
                                <input id="email" type="email" class="form-control" name="email2" value="{{ old('email2') }}" placeholder="Email" required>

                                @if(Session::has('status'))
                                  <span class="help-block">
                                    <strong>{{ Session::get('status') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name2') ? ' has-error' : '' }}">
                            <div class="col-md-6" style="float:none;margin:0 auto;">
                                <input id="name" type="text" class="form-control" name="name2" value="{{ old('name') }}" placeholder="Nama" required>

                                @if ($errors->has('name2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password2') ? ' has-error' : '' }}">
                          <div class="col-md-6" style="float:none;margin:0 auto;">
                                <input id="password" type="password" class="form-control" name="password2" placeholder="Password" required>

                                @if ($errors->has('password2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
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
