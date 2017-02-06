@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{!! route('users.index') !!}">< View All Contacts</a>
            <br/>
            <h2>{!! $contact->fullName !!}</h2>
            <hr/>
                  {!! Form::model($contact) !!}
                        @include('contacts.show_fields')
                   {!! Form::close() !!} 
            </div>
        </div>
    </div>
  </div>
@endsection