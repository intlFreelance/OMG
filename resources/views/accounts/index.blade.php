@extends('layouts.app')

@section('content')
  <div class="container">
        <h1 class="pull-left">Customer Accounts</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('accounts.create') !!}">Add New</a>
        <?= $grid ?>
  </div>
@endsection