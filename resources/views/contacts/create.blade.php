@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{!! route('contacts.index') !!}">< View All Contacts</a>
            <br/>
            <h2>Add a Contact</h2>
            <hr/>
            {!! Form::open(['route' => 'contacts.store']) !!}
                @include('contacts.fields')
            {!! Form::close() !!}
        </div>
    </div>
  </div>
@endsection