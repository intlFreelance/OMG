<div class="panel panel-default">
    <div class="panel-heading"><div class="panel-title">&nbsp;</div></div>
    <div class="panel-body">
        <div class="row">
            <!-- First Name Field -->
            <div class="form-group col-sm-6 {{ $errors->has('firstName') ? 'has-error' : '' }}">
                {!! Form::label('firstName', 'First Name:') !!}
                {!! Form::text('firstName', null, ['class' => 'form-control', 'required'=>'required']) !!}
                @if ($errors->has('firstName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('firstName') }}</strong>
                    </span>
                @endif
            </div>
            <!-- Last Name Field -->
            <div class="form-group col-sm-6 {{ $errors->has('lastName') ? 'has-error' : '' }}">
                {!! Form::label('lastName', 'Last Name:') !!}
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
                {!! Form::label('account_id', 'Customer Account:') !!}
                <select class="form-control" id="account_id" name="account_id">
                    <option value="" {{ (!isset($contact)) ? 'selected' : '' }}>select one...</option>
                    @foreach ($accounts as $id => $name)
                        <option value="{{ $id }}" {{ (isset($contact) && $contact->account_id == $id) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                <a href="{{ url('accounts/create') }}">+ Add New Account</a>
                @if ($errors->has('account_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('account_id') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                {!! Form::label('jobTitle', 'Job Title:') !!}
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
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'required'=>'required']) !!}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-sm-6 {{ $errors->has('mainPhone') ? 'has-error' : '' }}">
                {!! Form::label('mainPhone', 'Main Phone:') !!}
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
                {!! Form::label('cellPhone', 'Cell Phone:') !!}
                {!! Form::text('cellPhone', null, ['class' => 'form-control']) !!}
                @if ($errors->has('cellPhone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cellPhone') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-sm-6 {{ $errors->has('workPhone') ? 'has-error' : '' }}">
                {!! Form::label('workPhone', 'Work Phone:') !!}
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
