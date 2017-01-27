@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2>Edit Customer Account</h2><br/>
            <form  ng-controller="AccountController" name="accountForm" ng-init="loadModel({!! $id !!})">
                <input type="hidden" ng-model="readOnly" ng-value="false" />
                @include('accounts.fields')
            </form>
        </div>
    </div>
</div>
@endsection