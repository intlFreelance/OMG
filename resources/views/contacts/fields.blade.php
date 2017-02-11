<div class="panel panel-default">
    <div class="panel-heading"><div class="panel-title">&nbsp;</div></div>
    <div class="panel-body">
        <div class="row">
            <!-- First Name Field -->
            <div class="form-group col-sm-6 {{ $errors->has('firstName') ? 'has-error' : '' }}">
                {!! Form::label('firstName', 'First Name:', ["class"=>"control-label"]) !!}
                {!! Form::text('firstName', null, ['class' => 'form-control', 'required'=>'required']) !!}
                @if ($errors->has('firstName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('firstName') }}</strong>
                    </span>
                @endif
            </div>
            <!-- Last Name Field -->
            <div class="form-group col-sm-6 {{ $errors->has('lastName') ? 'has-error' : '' }}">
                {!! Form::label('lastName', 'Last Name:', ["class"=>"control-label"]) !!}
                {!! Form::text('lastName', null, ['class' => 'form-control', 'required'=>'required']) !!}
                @if ($errors->has('lastName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lastName') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row">
            <!-- Customer Account Field -->
            <div class="form-group col-sm-6 {{ $errors->has('account_id') ? 'has-error' : '' }}">
                {!! Form::label('account_id', 'Customer Account:', ["class"=>"control-label"]) !!}
                {!! Form::select('account_id', App\Account::pluck('name', 'id'),
                                    isset($contact)  ? $contact->account_id : null, ["class"=>"form-control"]) !!}
                <a href="{{ url('accounts/create') }}">+ Add New Account</a>
                @if ($errors->has('account_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('account_id') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-sm-6 {{ $errors->has('jobTitle') ? 'has-error' : '' }}">
                {!! Form::label('jobTitle', 'Job Title:', ["class"=>"control-label"]) !!}
                {!! Form::text('jobTitle', null, ['class' => 'form-control']) !!}
                @if ($errors->has('jobTitle'))
                    <span class="help-block">
                        <strong>{{ $errors->first('jobTitle') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row">
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
            <div class="form-group col-sm-6 {{ $errors->has('mainPhone') ? 'has-error' : '' }}">
                {!! Form::label('mainPhone', 'Main Phone:', ["class"=>"control-label"]) !!}
                {!! Form::text('mainPhone', null, ['class' => 'form-control', 'required'=>'required']) !!}
                @if ($errors->has('mainPhone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('mainPhone') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6 {{ $errors->has('cellPhone') ? 'has-error' : '' }}">
                {!! Form::label('cellPhone', 'Cell Phone:', ["class"=>"control-label"]) !!}
                {!! Form::text('cellPhone', null, ['class' => 'form-control']) !!}
                @if ($errors->has('cellPhone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cellPhone') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-sm-6 {{ $errors->has('workPhone') ? 'has-error' : '' }}">
                {!! Form::label('workPhone', 'Work Phone:', ["class"=>"control-label"]) !!}
                {!! Form::text('workPhone', null, ['class' => 'form-control']) !!}
                @if ($errors->has('workPhone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('workPhone') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-xs-6 col-sm-3 col-md-3 col-sm-push-6 col-md-push-6 ">
            <a href="{!! route('contacts.index') !!}" class="btn btn-block btn-default">Cancel</a>
        </div>
        <div class="col-xs-6 col-sm-3 col-md-3 col-sm-push-6 col-md-push-6">
            {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
</div><br/>
