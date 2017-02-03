@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}
                        @include('users.fields')
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
  </div>
@endsection