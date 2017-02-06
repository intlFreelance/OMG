<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title pull-right">
            <a href="{!! route('contacts.edit', [$contact->id]) !!}">edit <span class="glyphicon glyphicon-edit"></span></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <div class="row">
            <!-- First Name Field -->
            <div class="form-group col-xs-6">
                <dl>
                    <dt class="text-muted">First Name</dt>
                    <dd>{!! $contact->firstName !!}</dd>
                </dl>
            </div>
            <!-- Last Name Field -->
            <div class="form-group col-xs-6">
                <dl>
                    <dt class="text-muted">Last Name</dt>
                    <dd>{!! $contact->lastName !!}</dd>
                </dl>
            </div>
        </div>
        <div class="row">
            <!-- Customer Account Field -->
            <div class="form-group col-xs-6">
                <dl>
                    <dt class="text-muted">Customer Account</dt>
                    <dd>{!! $contact->account->name !!}</dd>
                </dl>
            </div>
            <div class="form-group col-xs-6">
                <dl>
                    <dt class="text-muted">Job Title</dt>
                    <dd>{!! $contact->jobTitle !!}</dd>
                </dl>
            </div>
        </div>
        <div class="row">
            <!-- Email Field -->
            <div class="form-group col-xs-6">
                <dl>
                    <dt class="text-muted">Email</dt>
                    <dd><a href="mailto:{!! $contact->email !!}"></a>{!! $contact->email !!}</dd>
                </dl>
            </div>
            <div class="form-group col-xs-6">
                <dl>
                    <dt class="text-muted">Main Phone</dt>
                    <dd>{!! $contact->mainPhone !!}</dd>
                </dl>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row">
            <div class="form-group col-xs-6">
                <dl>
                    <dt class="text-muted">Cell Phone</dt>
                    <dd>{!! $contact->cellPhone !!}</dd>
                </dl>
            </div>
            <div class="form-group col-xs-6">
                <dl>
                    <dt class="text-muted">Work Phone</dt>
                    <dd>{!! $contact->workPhone !!}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group pull-right">
            <a href="{!! route('contacts.index') !!}" class="btn btn-default">Back</a>
        </div>
    </div>
</div>