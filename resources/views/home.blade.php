@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading"><center>Twitter Application</center></div>

                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post" id="aa" name="aa" action="{{ route('simpanstatus') }}">
                      {{ csrf_field() }}
                      <input type="hidden" id="id_user" name="id_user" value="{{ Auth::user()->id }}">
                      <input type="hidden" id="foto" name="foto" value="{{ Auth::user()->foto }}">
                      <input type="hidden" id="nama" name="nama" value="{{ Auth::user()->name }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                          <div class="col-md-12">
                              <input id="status" type="text" class="form-control" name="status" placeholder="Update status.." required>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-2" style="float:right;margin:0 auto;">
                              <button type="submit" class="btn btn-primary">
                                  Update
                              </button>
                          </div>
                      </div>
                  </form>

                  @foreach ($tampil as $r)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div style="display:inline-block;vertical-align:top;"><img src="../resources/assets/images/{{ $r->foto }}" class="img-circle" width="50px" /></div>
                            <div style="display:inline-block;"><strong>{{$r->name}}</strong><br />{{$r->isi_status}}</div><br />
                        </div>
                    </div>
                  @endforeach

                    @if(count($tampil2))
                      @foreach ($tampil2 as $r2)
                        <div id="result">
                          <div class="panel panel-default">
                            <div class="panel-body" style="background-color:lightgreen;">
                                <div style="display:inline-block;vertical-align:top;float:right"><img src="../resources/assets/images/{{ $r2->foto }}" class="img-circle" width="50px" /></div>
                                <div style="display:inline-block;float:right;text-align:right;"><strong>{{$r2->name}}</strong><br />{{$r2->isi_status}}</div><br />
                            </div>
                        </div>
                      </div><br />
                      @endforeach
                    @else
                        <div id="result"></div><br />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
