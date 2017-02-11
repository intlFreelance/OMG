@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{!! route('contacts.index') !!}">< View All Contacts</a>
            <br/>
            <h2>Edit Contact</h2>
            <hr/>
            {!! Form::model($contact, ['route' => ['contacts.update', $contact->id], 'method' => 'patch', 'novalidate'=>true]) !!}
                @include('contacts.fields')
            {!! Form::close() !!}
        </div>
    </div>
  </div>
@endsection