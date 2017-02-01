<div class="panel-body">
    <div class="row">
        <!-- First Name Field -->
        <div class="form-group col-sm-6 {{ $errors->has('firstName') ? 'has-error' : '' }}">
            {!! Form::label('firstName', 'First Name:') !!}
            {!! Form::text('firstName', null, ['class' => 'form-control', 'disabled'=>'disabled']) !!}
        </div>
        <!-- Last Name Field -->
        <div class="form-group col-sm-6 {{ $errors->has('lastName') ? 'has-error' : '' }}">
            {!! Form::label('lastName', 'Last Name:') !!}
            {!! Form::text('lastName', null, ['class' => 'form-control', 'disabled'=>'disabled']) !!}
        </div>
    </div>
    <div class="row">
        <!-- Customer Account Field -->
        <div class="form-group col-sm-6 {{ $errors->has('account_id') ? 'has-error' : '' }}">
            {!! Form::label('account_id', 'Customer Account:') !!}
            {!! Form::select('account_id', App\Account::pluck('name', 'id'),
                                isset($contact)  ? $contact->account_id : null,
                                ['class'=>'form-control', 'placeholder'=>'', 'disabled'=>'disabled']) !!}
        </div>
        <div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : '' }}">
            {!! Form::label('jobTitle', 'Job Title:') !!}
            {!! Form::text('jobTitle', null, ['class' => 'form-control', 'disabled'=>'disabled']) !!}
        </div>
    </div>
    <div class="row">
        <!-- Email Field -->
        <div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : '' }}">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'disabled'=>'disabled']) !!}
        </div>
        <div class="form-group col-sm-6 {{ $errors->has('mainPhone') ? 'has-error' : '' }}">
            {!! Form::label('mainPhone', 'Main Phone:') !!}
            {!! Form::text('mainPhone', null, ['class' => 'form-control', 'disabled'=>'disabled']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 {{ $errors->has('cellPhone') ? 'has-error' : '' }}">
            {!! Form::label('cellPhone', 'Cell Phone:') !!}
            {!! Form::text('cellPhone', null, ['class' => 'form-control', 'disabled'=>'disabled']) !!}
        </div>
        <div class="form-group col-sm-6 {{ $errors->has('workPhone') ? 'has-error' : '' }}">
            {!! Form::label('workPhone', 'Work Phone:') !!}
            {!! Form::text('workPhone', null, ['class' => 'form-control', 'disabled'=>'disabled']) !!}
        </div>
    </div>
</div>
<div class="panel-footer">
        <!-- Submit Field -->
    <div class="form-group">
        <a href="{!! route('contacts.index') !!}" class="btn btn-default">Back</a>
    </div>
</div>