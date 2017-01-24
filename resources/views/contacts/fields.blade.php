<div class="panel-body">
    <div class="row">
        <!-- First Name Field -->
        <div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required'=>'required']) !!}
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <!-- Email Field -->
        <div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : '' }}">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'required'=>'required']) !!}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 {{ $errors->has('phoneNumber') ? 'has-error' : '' }}">
            {!! Form::label('phoneNumber', 'Phone Number:') !!}
            {!! Form::text('phoneNumber', null, ['class' => 'form-control', 'required'=>'required']) !!}
            @if ($errors->has('phoneNumber'))
                <span class="help-block">
                    <strong>{{ $errors->first('phoneNumber') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-sm-6"></div>
    </div>
</div>
<div class="panel-footer">
        <!-- Submit Field -->
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('contacts.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>