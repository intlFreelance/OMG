@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{!! route('users.index') !!}">< View All Users</a>
            <br/>
            <h2>{!! $user->name !!}</h2>
            <hr/>

                  {!! Form::model($user) !!}
                        @include('users.show_fields')
                   {!! Form::close() !!} 

        </div>
    </div>
  </div>
@endsection