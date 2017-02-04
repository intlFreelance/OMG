@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-sm-12">
              <h1 class="pull-left">View Users</h1>
              <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('users.create') !!}">+ Add User</a>
          </div>
      </div>
      <hr/>
        <?= $grid ?>
  </div>
@endsection