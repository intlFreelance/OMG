@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{!! route('users.index') !!}">< View All Users</a>
            <br/>
            <h2>Add a User</h2>
            <hr/>
            {!! Form::open(['route' => 'users.store']) !!}
                @include('users.fields')
            {!! Form::close() !!}
        </div>
    </div>
  </div>
@endsection