@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>View User</h2></div>
                  {!! Form::model($user) !!}
                        @include('users.show_fields')
                   {!! Form::close() !!} 
            </div>
        </div>
    </div>
  </div>
@endsection