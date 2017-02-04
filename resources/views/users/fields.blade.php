<div class="panel panel-default">
    <div class="panel-heading"><div class="panel-title">&nbsp;</div></div>
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
        <!-- Last Name Field 
        <div class="form-group col-sm-4 {{ $errors->has('lastName') ? 'has-error' : '' }}">
            {!! Form::label('lastName', 'Last Name:') !!}
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
        <div class="form-group col-sm-6 {{ $errors->has('password') ? 'has-error' : '' }}">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group col-sm-6 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
            {!! Form::label('password_confirmation', 'Confirm Password:') !!}
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
            {!! Form::label('roles', 'Role:') !!}
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
    <div class="col-sm-12">
        <div class="form-group pull-right">
            <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>
