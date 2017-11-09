@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading"><center>Twitter Application</center></div>
                <div class="panel-body">
                  <div class="col-xs-12 col-md-4">
                        <form action="{{ route('uploadfoto') }}" method="POST" enctype="multipart/form-data">
                            <img src="../resources/assets/images/{{ Auth::user()->foto }}" class="img-responsive img-circle" width="200px" height="200px"/>
                            <hr>
                            <label>Ubah Foto</label><br/>
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}" />
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            <input type="file" name="foto" id="foto" required /><br>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    @if ($errors->has('foto'))
                      <br />
                      <div class="alert alert-danger" role="alert">
                        <strong>{{ $errors->first('foto') }}</strong>
                      </div>
                    @endif
                    <br class="visible-xs visible-sm" />
                  </div><!-- /.col -->
                  <div class="col-xs-12 col-md-8">
                    <form action="{{ route('simpanbio') }}" method="POST" enctype="multipart/form-data">
                      <div class="panel panel-default">
                          <div class="panel-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                              <div class="col-md-12" style="float:none;margin:0 auto;">
                                  <input id="nama" type="nama" class="form-control" name="nama" value="{{ $tampil->name }}">
                                  @if ($errors->has('nama'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('nama') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-12" style="float:none;margin:0 auto;">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ $tampil->email }}">
                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-12" style="float:none;margin:0 auto;">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Ubah Passsword">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-10 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </div>
                          </div>
                      </div>
                    </form>
                    @if(Session::has('status'))
                      <div class="alert alert-success" role="alert">
                        <strong>{{ Session::get('status') }}</strong>
                      </div>
                    @endif
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
