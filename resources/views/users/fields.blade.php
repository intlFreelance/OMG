<div class="panel panel-default">
    <div class="panel-heading"><div class="panel-title">&nbsp;</div></div>
<div class="panel-body">
    <div class="row">
        <!-- First Name Field -->
        <div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('name', 'Name:', ["class"=>"control-label"]) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required'=>'required']) !!}
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <!-- Last Name Field 
        <div class="form-group col-sm-4 {{ $errors->has('lastName') ? 'has-error' : '' }}">
            {!! Form::label('lastName', 'Last Name:', ["class"=>"control-label"]) !!}
            {!! Form::text('lastName', null, ['class' => 'form-control', 'required'=>'required']) !!}
            @if ($errors->has('lastName'))
                <span class="help-block">
                    <strong>{{ $errors->first('lastName') }}</strong>
                </span>
            @endif
        </div>
        -->
        <!-- Email Field -->
        <div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : '' }}">
            {!! Form::label('email', 'Email:', ["class"=>"control-label"]) !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'required'=>'required']) !!}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 {{ $errors->has('password') ? 'has-error' : '' }}">
            {!! Form::label('password', 'Password:', ["class"=>"control-label"]) !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group col-sm-6 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
            {!! Form::label('password_confirmation', 'Confirm Password:', ["class"=>"control-label"]) !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 {{ $errors->has('roles') ? 'has-error' : '' }}">
            {!! Form::label('roles', 'Role:', ["class"=>"control-label"]) !!}
            {!! Form::select('roles[]', App\Role::pluck('display_name', 'id'), 
                                isset($user) && count($user->roles) > 0 ? $user->roles[0]->id : null, 
                                ['id' => 'roles', 'class'=>'form-control']) !!}
             @if ($errors->has('roles'))
                <span class="help-block">
                    <strong>{{ $errors->first('roles') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group col-sm-6"></div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-3 col-md-3 col-sm-push-6 col-md-push-6 ">
        <a href="{!! route('users.index') !!}" class="btn btn-block btn-default">Cancel</a>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3 col-sm-push-6 col-md-push-6">
        {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
</div><br/>