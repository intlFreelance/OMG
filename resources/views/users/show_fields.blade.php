<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title pull-right">
            <a href="{!! route('users.edit', [$user->id]) !!}">edit <span class="glyphicon glyphicon-edit"></span></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <div class="container">
            <div class="row">
                <!-- First Name Field -->
                <div class="form-group col-sm-4 col-sm-offset-2">
                    <dl>
                        <dt class="text-muted">Name</dt>
                        <dd>{!! $user->name !!}</dd>
                    </dl>
                </div>
                <!-- Email Field -->
                <div class="form-group col-sm-6">
                    <dl>
                        <dt class="text-muted">Email</dt>
                        <dd>{!! $user->email !!}</dd>
                    </dl>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-4 col-sm-offset-2">
                    <dl>
                        <dt class="text-muted">Role</dt>
                        <dd>{!! $user->roles[0]->display_name !!}</dd>
                    </dl>
                </div>
                <div class="form-group col-sm-6"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group pull-right">
            <a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>
        </div>
    </div>
</div>