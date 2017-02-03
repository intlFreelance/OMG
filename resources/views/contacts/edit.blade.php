@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Contact</div>
                    {!! Form::model($contact, ['route' => ['contacts.update', $contact->id], 'method' => 'patch']) !!}
                        @include('contacts.fields')
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
  </div>
@endsection