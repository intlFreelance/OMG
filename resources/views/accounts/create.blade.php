@extends('layouts.app')
@section('head')
    <title>OMG - Add an Account</title>

    <!-- Android Devices-->
    <link href="{{ asset('/img/icons/OMG_accounts_192.png') }}" rel="icon" sizes="192x192" />
    <link href="{{ asset('/img/icons/OMG_accounts_128.png') }}" rel="icon" sizes="128x128" />

    <!-- Apple Devices -->
    <link href="{{ asset('/img/icons/OMG_accounts_120.png') }}" rel="apple-touch-icon" />
    <link href="{{ asset('/img/icons/OMG_accounts_152.png') }}" rel="apple-touch-icon" sizes="152x152" />
    <link href="{{ asset('/img/icons/OMG_accounts_167.png') }}" rel="apple-touch-icon" sizes="167x167" />
    <link href="{{ asset('/img/icons/OMG_accounts_180.png') }}" rel="apple-touch-icon" sizes="180x180" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form  ng-controller="AccountController" name="accountForm" ng-init="loadModel(null)" novalidate>
                <a href="{!! route('accounts.index') !!}">< View All Accounts</a>
                <br/>
                <h2 class="pull-left">Add an Account</h2>
                <a class="btn btn-default pull-right text-muted" style="margin-top: 25px" href="javascript:void(0)" ng-if="!longForm" ng-click="toggleForm()">Show more</a>
                <a class="btn btn-default pull-right text-muted" style="margin-top: 25px" href="javascript:void(0)" ng-if="longForm" ng-click="toggleForm()">Show less</a>
                <div class="clearfix"></div>
                <hr/>
                @include('accounts.fields')
            </form>
        </div>
    </div>
</div>
@endsection