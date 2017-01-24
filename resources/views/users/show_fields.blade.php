<div class="panel-body">
    <div class="row">
        <!-- First Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'disabled'=>'disabled']) !!}
        </div>
        <!-- Last Name Field 
        <div class="form-group col-sm-4">
            {!! Form::label('lastName', 'Last Name:') !!}
            {!! Form::text('lastName', null, ['class' => 'form-control', 'disabled'=>'disabled']) !!}
        </div-->
        <!-- Email Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'disabled'=>'disabled']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 {{ $errors->has('roles') ? 'has-error' : '' }}">
            {!! Form::label('roles', 'Role:') !!}
            {!! Form::text('roles[]', $user->roles[0]->display_name, ['id' => 'roles', 'class'=>'form-control', 'disabled'=>'disabled']) !!}
        </div>
        <div class="form-group col-sm-6"></div>
    </div>
</div>
<div class="panel-footer">
        <!-- Submit Field -->
    <div class="form-group">
        <a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>
    </div>
</div>