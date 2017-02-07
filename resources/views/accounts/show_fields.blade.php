<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title pull-left">
            Basic Account Info
        </div>
        <div class="panel-title pull-right">
            <a href="{!! route('accounts.edit', [$id]) !!}">edit <span class="glyphicon glyphicon-edit"></span></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <dl>
                            <dt class="text-muted">Account Name</dt>
                            <dd><% account.name %></dd>
                        </dl>
                    </div>
                    <div class="col-sm-12 form-group">
                        <dl>
                            <dt class="text-muted">Tax ID</dt>
                            <dd ng-repeat="taxID in account.taxID"><% taxID.taxID %> &nbsp; &nbsp; &nbsp; (<% taxID.state %>)</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12 form-group">
                        <dl>
                            <dt class="text-muted">DBA</dt>
                            <dd><% account.dba %></dd>
                        </dl>
                    </div>
                    <div class="col-sm-12 form-group">
                        <dl>
                            <dt class="text-muted">Bill to Address</dt>
                            <dd>
                                <% account.billingAddress.line1 %><br/>
                                <% account.billingAddress.line2%> <br ng-if="account.billingAddress.line2"/>
                                <% account.billingAddress.city %>, <% account.billingAddress.state %> <% account.billingAddress.zip %>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-sm-12 form-group">
                        <dl ng-if="account.shippingAddressSameAsBilling">
                            <dt class="text-muted">Ship to Address</dt>
                            <dd>Same as Bill to</dd>
                        </dl>
                        <dl ng-if="!account.shippingAddressSameAsBilling" ng-repeat="shippingAddress in account.shipping_addresses">
                            <dt class="text-muted">Ship to Address <span ng-if="$index > 0"><% $index + 1 %></span></dt>
                            <dd ng-if="account.shippingAddressSameAsBilling">
                                Same as Bill to</dd>
                            <dd>
                                <% shippingAddress.address.line1 %><br/>
                                <% shippingAddress.address.line2%> <br ng-if="shippingAddress.address.line2"/>
                                <% shippingAddress.address.city %>, <% shippingAddress.address.state %> <% shippingAddress.address.zip %>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <dl>
                            <dt class="text-muted">Phone 1</dt>
                            <dd><% account.phone1 %></dd>
                        </dl>
                    </div>
                    <div class="col-sm-12 form-group">
                        <dl>
                            <dt class="text-muted">Phone 2</dt>
                            <dd><% account.phone2 %></dd>
                        </dl>
                    </div>
                    <div class="col-sm-12 form-group">
                        <dl>
                            <dt class="text-muted">FAX</dt>
                            <dd><% account.fax %></dd>
                        </dl>
                    </div>
                    <div class="col-sm-12 form-group">
                        <dl>
                            <dt class="text-muted">Email</dt>
                            <dd><a href="mailto:<% account.email %>" ><% account.email %></a></dd>
                        </dl>
                    </div>
                    <div class="col-sm-12 form-group">
                        <dl>
                            <dt class="text-muted">Website</dt>
                            <dd><a href="<% account.website %>" ><% account.website %></a></dd>
                        </dl>
                    </div>
                    <div class="col-sm-12 form-group">
                        <dl>
                            <dt class="text-muted">Primary Contact</dt>
                            <dd>
                                <% account.contacts[0].firstName %> <% account.contacts[0].lastName %>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <dl>
                            <dt class="text-muted">Notes</dt>
                            <dd>
                                <table class="table table-stripped">
                                    <thead>
                                    <tr><th class="col-sm-4">Date</th><th class="col-sm-8">Comments</th></tr>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="note in account.notes">
                                        <td><% formatDate(note.date) %></td>
                                        <td><% note.comments %></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <a href="{!! route('accounts.edit', [$id]) !!}" class="pull-right btn btn-primary">Add Note</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br/>
<!-- Sales info -->
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title pull-left">
            Sales Info
        </div>
        <div class="panel-title pull-right">
            <a href="{!! route('accounts.edit', [$id]) !!}">edit <span class="glyphicon glyphicon-edit"></span></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="form-group col-xs-6">
                <dl>
                    <dt class="text-muted">Primary Sales Rep</dt>
                    <dd><% (account.primary_sales_rep) ? account.primary_sales_rep.name : "" %></dd>
                </dl>
            </div>
            <div class="form-group col-sm-5">
                <dl>
                    <dt class="text-muted">Secondary Sales Rep</dt>
                    <dd><% (account.secondary_sales_rep) ? account.secondary_sales_rep.name : "" %></dd>
                </dl>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <div class="row">
            <div class="form-group col-xs-6">
                <dl>
                    <dt class="text-muted">Classification</dt>
                    <dd><%  account.classification %></dd>
                </dl>
            </div>
            <div class="form-group col-sm-5">
                <dl>
                    <dt class="text-muted">Industry</dt>
                    <dd><%  account.industry %></dd>
                </dl>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-3 col-md-3 col-sm-push-9 col-md-push-9 ">
        <a href="{!! route('accounts.index') !!}" class="btn btn-block btn-default">Back</a>
    </div>
</div><br/>
