@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Contact</div>
                    {!! Form::open(['route' => 'contacts.store']) !!}
                        @include('contacts.fields')
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
  </div>
@endsection