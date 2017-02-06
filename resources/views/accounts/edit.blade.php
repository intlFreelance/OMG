@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form  ng-controller="AccountController" name="accountForm" ng-init="loadModel({!! $id !!})">
            <a href="{!! route('accounts.index') !!}">< View All Accounts</a>
            <br/>
            <h2><% account.name %></h2>
            <hr/>
                @include('accounts.fields')
            </form>
        </div>
    </div>
</div>
@endsection