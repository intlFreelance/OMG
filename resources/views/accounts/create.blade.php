@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{!! route('accounts.index') !!}">< View All Accounts</a>
            <br/>
            <h2>Add an Account</h2>
            <hr/>
            <form  ng-controller="AccountController" name="accountForm" ng-init="loadModel(null)">
                @include('accounts.fields')
            </form>
        </div>
    </div>
</div>
@endsection