@extends('layouts.app')
@section('head')
    <title>OMG - Add a Contact</title>

    <!-- Android Devices-->
    <link href="{{ asset('/img/icons/OMG_contacts_192.png') }}" rel="icon" sizes="192x192" />
    <link href="{{ asset('/img/icons/OMG_contacts_128.png') }}" rel="icon" sizes="128x128" />

    <!-- Apple Devices -->
    <link href="{{ asset('/img/icons/OMG_contacts_120.png') }}" rel="apple-touch-icon" />
    <link href="{{ asset('/img/icons/OMG_contacts_152.png') }}" rel="apple-touch-icon" sizes="152x152" />
    <link href="{{ asset('/img/icons/OMG_contacts_167.png') }}" rel="apple-touch-icon" sizes="167x167" />
    <link href="{{ asset('/img/icons/OMG_contacts_180.png') }}" rel="apple-touch-icon" sizes="180x180" />
@endsection
@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{!! route('contacts.index') !!}">< View All Contacts</a>
            <br/>
            <h2 class="form-header">Add a Contact</h2>
            <hr/>
            {!! Form::open(['route' => 'contacts.store']) !!}
                @include('contacts.fields')
            {!! Form::close() !!}
        </div>
    </div>
  </div>
@endsection