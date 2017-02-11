<input type="hidden" ng-model="account.id"/>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title pull-left">
            Basic Account Info
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group col-sm-12" ng-class="accountForm.name.$invalid  && (!accountForm.name.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                    <label for="name" class="control-label">Account Name</label> <a title="Remove taxID" class="remove-icon pull-right" href="javascript:void(0)" ng-if="!readOnly && $index > 0" ng-click="removeTaxID($index)"><span class="glyphicon glyphicon-remove"></span></a>
                    <input type="text" name="name" ng-model="account.name"  class="form-control" required placeholder="enter a name..."/>
                    <p ng-show="accountForm.name.$invalid  && (!accountForm.name.$pristine || accountForm.$submitted)" class="help-block">Account name is required.</p>
                </div>
                <div ng-if="longForm">
                    <div class="row" ng-repeat="taxID in account.taxID">
                        <ng-form name="taxIDForm">
                            <div class="col-sm-12">
                                <div class="col-sm-12 form-group" ng-class="taxIDForm.$invalid  && ((!taxIDForm.taxID.$pristine && !taxIDForm.state.$pristine) || accountForm.$submitted) ? 'has-error' : ''">
                                    <label ng-if="$index > 0" class="control-label">Tax ID <% $index + 1 %></label>
                                    <label ng-if="$index == 0" class="control-label">Tax ID</label>
                                    <a title="Remove Tax ID" class="remove-icon pull-right" href="javascript:void(0)" ng-if="!readOnly && $index > 0" ng-click="removeTaxID($index)"><span class="glyphicon glyphicon-remove"></span></a>
                                </div>
                                <div class="col-xs-6 form-group" ng-class="taxIDForm.taxID.$invalid  && (!taxIDForm.taxID.$pristine  || accountForm.$submitted) ? 'has-error' : ''">
                                    <input type="text" name="taxID" ng-model="taxID.taxID"  class="form-control" required placeholder="ex: 12-3456789"/>
                                    <p ng-show="taxIDForm.taxID.$invalid  && (!taxIDForm.taxID.$pristine || accountForm.$submitted)" class="help-block">Tax ID is required.</p>
                                </div>
                                <div class="col-xs-6 form-group" ng-class="taxIDForm.state.$invalid  && (!taxIDForm.state.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                                    <select name="state" ng-model="taxID.state"  class="form-control" required ng-options="s as s for s in states"><option value='' disabled>state</option></select>
                                    <p ng-show="taxIDForm.state.$invalid  && (!taxIDForm.state.$pristine || accountForm.$submitted)" class="help-block">Tax ID state is required.</p>
                                </div>
                            </div>
                        </ng-form>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                                <a href="javascript:void(0)" ng-click="addTaxID()" >+ Add another Tax ID</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6" ng-if="longForm">
                <div class="form-group col-sm-12">
                    <label for="dba" class="control-label">DBA</label>
                    <textarea name="dba" ng-model="account.dba" class="form-control"  placeholder="separate entries with a comma" style="height: 120px;"></textarea>
                </div>
            </div>
        </div>
        <div ng-if="longForm"><br /><br/></div>
        <div class="row" ng-if="longForm">
            <ng-form name="billingAddressForm">
                <div class="col-sm-12">
                    <div class="col-sm-12 form-group" ng-class="billingAddressForm.$invalid  && ((!billingAddressForm.line1.$pristine && !billingAddressForm.city.$pristine && !billingAddressForm.state.$pristine && !billingAddressForm.zip.$pristine) || accountForm.$submitted) ? 'has-error' : ''">
                        <label for="billingAddress" class="control-label">Bill to Address</label>
                        <p ng-show="billingAddressForm.$invalid  && ((!billingAddressForm.line1.$pristine && !billingAddressForm.city.$pristine && !billingAddressForm.state.$pristine &&  !billingAddressForm.zip.$pristine) || accountForm.$submitted)" class="help-block">Bill to Address is required.</p>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6 form-group" ng-class="billingAddressForm.line1.$invalid  && (!billingAddressForm.line1.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                        <input type="text" name="line1" ng-model="account.billingAddress.line1" class="form-control" required placeholder="ex: 123 Main St"/>
                    </div>
                    <div class="col-sm-6 form-group" >
                        <input type="text" name="line2" ng-model="account.billingAddress.line2"  class="form-control" placeholder="ex: apt. 9, Unit 500, etc"/>
                    </div>
                    <div class="col-sm-6 form-group" ng-class="billingAddressForm.city.$invalid  && (!billingAddressForm.city.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                        <input type="text" name="city" ng-model="account.billingAddress.city"  class="form-control" required placeholder="city"/>
                    </div>
                    <div class="col-sm-3 col-xs-6 form-group" ng-class="billingAddressForm.state.$invalid  && (!billingAddressForm.state.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                        <select name="state" ng-model="account.billingAddress.state"  class="form-control" required  ng-options="s as s for s in states"><option value='' disabled>state</option></select>
                    </div>
                    <div class="col-sm-3 col-xs-6 form-group" ng-class="billingAddressForm.zip.$invalid  && (!billingAddressForm.zip.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                        <input type="text" name="zip" ng-model="account.billingAddress.zip"  class="form-control" required placeholder="ZIP"/>
                    </div>
                </div>
            </ng-form>
        </div><br/>
        <div ng-if="longForm">
            <ng-form name="shippingAddressForm">
                <div class="row">
                    <div class="col-sm-12 form-group" ng-class="shippingAddressForm.$invalid  && ((!shippingAddressForm.line1.$pristine && !shippingAddressForm.city.$pristine && !shippingAddressForm.state.$pristine &&  !shippingAddressForm.zip.$pristine) || accountForm.$submitted) ? 'has-error' : ''">
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <label for="shippingAddress" class="control-label">Ship to Address</label>
                        </div>
                        <div class="col-md-4 col-md-pull-2 col-sm-pull-1 col-sm-4 col-xs-6 text-right">
                            <label style="font-weight: normal">
                                <input type="checkbox" ng-model="account.shippingAddressSameAsBilling" ng-click="toggleShippingAddressSameAsBilling()" />
                                Same as Bill to Address
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row"  ng-repeat="shippingAddress in account.shipping_addresses">

                        <div class="col-sm-12">
                            <div class="col-sm-12 form-group" ng-class="shippingAddressForm.$invalid  && ((!shippingAddressForm.line1.$pristine && !shippingAddressForm.city.$pristine && !shippingAddressForm.state.$pristine &&  !shippingAddressForm.zip.$pristine) || accountForm.$submitted) ? 'has-error' : ''">
                                <label ng-if="$index > 0" class="control-label">Ship to Address <% $index + 1 %></label><a title="Remove address" class="remove-icon pull-right" href="javascript:void(0)" ng-if="!readOnly && $index > 0" ng-click="removeShippingAddress($index)"><span class="glyphicon glyphicon-remove"></span></a>
                                <p ng-show="$index == 0 && shippingAddressForm.$invalid  && ((!shippingAddressForm.line1.$pristine && !shippingAddressForm.city.$pristine && !shippingAddressForm.state.$pristine &&  !shippingAddressForm.zip.$pristine) || accountForm.$submitted)" class="help-block">Ship to Address is required.</p>
                                <p ng-show="$index > 0 && shippingAddressForm.$invalid  && ((!shippingAddressForm.line1.$pristine && !shippingAddressForm.city.$pristine && !shippingAddressForm.state.$pristine &&  !shippingAddressForm.zip.$pristine) || accountForm.$submitted)" class="help-block">Ship to Address <% $index + 1 %> is required.</p>
                            </div>
                            <div class="col-sm-6 form-group" ng-class="shippingAddressForm.line1.$invalid  && (!shippingAddressForm.line1.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                                <input type="text" name="line1" ng-model="shippingAddress.address.line1"  class="form-control" required placeholder="ex: 123 Main St"/>
                            </div>
                            <div class="col-sm-6 form-group">
                                <input type="text" name="line2" ng-model="shippingAddress.address.line2"  class="form-control" placeholder="ex: apt. 9, Unit 500, etc"/>
                            </div>
                            <div class="col-sm-6 form-group" ng-class="shippingAddressForm.city.$invalid  && (!shippingAddressForm.city.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                                <input type="text" name="city" ng-model="shippingAddress.address.city"  class="form-control" required placeholder="city"/>
                            </div>
                            <div class="col-sm-3 col-xs-6 form-group" ng-class="shippingAddressForm.state.$invalid  && (!shippingAddressForm.state.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                                <select ng-model="shippingAddress.address.state"  name="state" class="form-control" required ng-options="s as s for s in states"><option value='' disabled>state</option></select>
                            </div>
                            <div class="col-sm-3 col-xs-6 form-group" ng-class="shippingAddressForm.zip.$invalid  && (!shippingAddressForm.zip.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                                <input type="text" ng-model="shippingAddress.address.zip" name="zip"  class="form-control" required placeholder="ZIP"/>
                            </div>
                        </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12"><a href="javascript:void(0)" ng-click="addShippingAddress()" ng-if="!readOnly && !account.shippingAddressSameAsBilling">+ Add another shipping address</a></div>
                    </div>
                </div>
                <br ng-if="!account.shippingAddressSameAsBilling"/><br ng-if="!account.shippingAddressSameAsBilling"/>
            </ng-form>
        </div>
        <div class="row" ng-if="longForm">
            <div class="col-sm-12">
                <div class="col-sm-4 form-group" ng-class="accountForm.phone1.$invalid  && (!accountForm.phone1.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                    <label for="phone1" class="control-label">Phone 1</label>
                    <input type="text" ng-model="account.phone1" name="phone1"  class="form-control" required placeholder="enter number..."/>
                    <p ng-show="accountForm.phone1.$invalid  && (!accountForm.phone1.$pristine || accountForm.$submitted)" class="help-block">Phone 1 is required.</p>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="phone2">Phone 2</label>
                    <input type="text" ng-model="account.phone2"  class="form-control" placeholder="enter number..."/>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="fax">FAX</label>
                    <input type="text" ng-model="account.fax"  class="form-control" placeholder="enter number..."/>
                </div>
            </div>
        </div>
        <div class="row" ng-if="!longForm">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-6 form-group" ng-if="!longForm" ng-class="accountForm.phone1.$invalid  && (!accountForm.phone1.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                            <label for="phone1" class="control-label">Phone</label>
                            <input type="text" ng-model="account.phone1"  name="phone1" class="form-control" required placeholder="enter number..."/>
                            <p ng-show="accountForm.phone1.$invalid  && (!accountForm.phone1.$pristine || accountForm.$submitted)" class="help-block">Phone is required.</p>
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Email</label>
                            <input type="email" ng-model="account.email"  class="form-control" placeholder="enter email..."/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-6 form-group">
                            <label for="website">Web Site</label>
                            <input type="text" ng-model="account.website"  class="form-control" placeholder="enter website..."/>
                        </div>
                        <div class="col-sm-6">
                            <div ng-repeat="contact in account.contacts track by $index">
                                <ng-form name = "contactsForm">
                                    <div class="form-group" ng-class="contactsForm.$invalid  && (!contactsForm.contact.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                                        <label ng-if="$index == 0" class="control-label">Primary Contact</label>
                                        <label ng-if="$index > 0" class="control-label">Contact <% $index + 1 %></label><a title="Remove contact" class="remove-icon pull-right" href="javascript:void(0)" ng-if="!readOnly && $index > 0" ng-click="removeContact($index)"><span class="glyphicon glyphicon-remove"></span></a>
                                        <md-autocomplete
                                                required
                                                md-selected-item-change="selectedContact($index, item)"
                                                md-selected-item="contact"
                                                md-search-text="contactSearch"
                                                md-items="item in searchContacts(contactSearch)"
                                                md-item-text="item.firstName + ' ' + item.lastName"
                                                md-min-length=3
                                                placeholder="start typing a contact name..."
                                                ng-blur="contactAutoCompleteBlur(contact, this)"
                                                md-input-name="contact">
                                            <md-item-template>
                                                <span><%item.firstName%> <%item.lastName%></span>
                                            </md-item-template>
                                            <md-not-found>
                                                Contact not found. <a data-toggle="modal" data-target="#newContactModal" ng-click="createNewContact(this,  contactSearch)">Create a new one!</a>
                                            </md-not-found>
                                        </md-autocomplete>
                                        <p ng-show="$index == 0 && contactsForm.contact.$invalid  && (!contactsForm.contact.$pristine || accountForm.$submitted)" class="help-block">Primary Contact is required.</p>
                                        <p ng-show="$index > 0 && contactsForm.contact.$invalid  && (!contactsForm.contact.$pristine || accountForm.$submitted)" class="help-block">Contact <% $index + 1 %> is required.</p>
                                    </div>
                                </ng-form>
                            </div>
                            <div class="col-sm-12"><a href="javascript:void(0)"   ng-click="addContact()">+ Add new contact</a></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" ng-if="longForm">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <label for="email">Email</label>
                            <input type="email" ng-model="account.email"  class="form-control" placeholder="enter email..."/>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="website">Web Site</label>
                            <input type="text" ng-model="account.website"  class="form-control" placeholder="enter website..."/>
                        </div>
                        <div class="col-sm-4">
                            <div ng-repeat="contact in account.contacts track by $index">
                                <ng-form name = "contactsForm">
                                    <div class="form-group" ng-class="contactsForm.$invalid  && (!contactsForm.contact.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                                        <label ng-if="$index == 0" class="control-label">Primary Contact</label>
                                        <label ng-if="$index > 0" class="control-label">Contact <% $index + 1 %></label><a title="Remove contact" class="remove-icon pull-right" href="javascript:void(0)" ng-if="!readOnly && $index > 0" ng-click="removeContact($index)"><span class="glyphicon glyphicon-remove"></span></a>
                                        <md-autocomplete
                                                required
                                                md-selected-item-change="selectedContact($index, item)"
                                                md-selected-item="contact"
                                                md-search-text="contactSearch"
                                                md-items="item in searchContacts(contactSearch)"
                                                md-item-text="item.firstName + ' ' + item.lastName"
                                                md-min-length=3
                                                placeholder="start typing a contact name..."
                                                ng-blur="contactAutoCompleteBlur(contact, this)"
                                                md-input-name="contact">
                                            <md-item-template>
                                                <span><%item.firstName%> <%item.lastName%></span>
                                            </md-item-template>
                                            <md-not-found>
                                                Contact not found. <a data-toggle="modal" data-target="#newContactModal" ng-click="createNewContact(this,  contactSearch)">Create a new one!</a>
                                            </md-not-found>
                                        </md-autocomplete>
                                        <p ng-show="$index == 0 && contactsForm.contact.$invalid  && (!contactsForm.contact.$pristine || accountForm.$submitted)" class="help-block">Primary Contact is required.</p>
                                        <p ng-show="$index > 0 && contactsForm.contact.$invalid  && (!contactsForm.contact.$pristine || accountForm.$submitted)" class="help-block">Contact <% $index + 1 %> is required.</p>
                                    </div>
                                </ng-form>
                            </div>
                            <div class="col-sm-12"><a href="javascript:void(0)"   ng-click="addContact()">+ Add new contact</a></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-sm-12 form-group ">
                <div class="col-sm-12 form-group">
                    <label for="notes" class="control-label">Notes</label>
                    <table class="table table-stripped">
                        <thead class="secondary-header">
                            <tr><th class="col-sm-11">Comments</th><th class="col-sm-1"></th></tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="note in account.notes">
                                <td><input type="text" ng-model="note.comments" class="form-control" placeholder="enter comments..."/></td>
                                <td>
                                    <a title="Remove note" class="remove-icon pull-right" href="javascript:void(0)"  ng-click="removeNote($index)"><span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12 form-group"><a href="javascript:void(0)" ng-click="addNote()">+ Add note</a> </div>
            </div>
        </div>
    </div>
</div><br/>
<!-- Sales info -->
<div class="panel panel-default" ng-if="longForm">
    <div class="panel-heading">
        <div class="panel-title pull-left">
            Sales Info
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-6 form-group" ng-class="accountForm.primary_sales_rep.$invalid  && (!accountForm.primary_sales_rep.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                    <label for="primarySalesRep" class="control-label">Primary Sales Rep</label>
                    <md-autocomplete
                            required
                            md-no-cache="true"
                            md-selected-item="account.primary_sales_rep"
                            md-search-text="salesRep1Search"
                            md-items="rep in searchSalesReps(salesRep1Search)"
                            md-item-text="rep.name"
                            md-min-length=3
                            placeholder="start typing rep name..."
                            ng-blur="salesRep1AutoCompleteBlur(account.primary_sales_rep, this)"
                            md-input-name="primary_sales_rep">
                        <md-item-template>
                            <span><%rep.name%></span>
                        </md-item-template>
                        <md-not-found>
                            No sales reps matching "<%salesRep1Search%>" were found.
                        </md-not-found>
                    </md-autocomplete>
                    <p ng-show="accountForm.primary_sales_rep.$invalid  && (!accountForm.primary_sales_rep.$pristine || accountForm.$submitted)" class="help-block">Primary Sales Rep is required.</p>
                </div>
                <div class="col-sm-6 form-group" ng-class="accountForm.secondary_sales_rep.$invalid  && (!accountForm.secondary_sales_rep.$pristine || accountForm.$submitted) ? 'has-error' : ''">
                    <label for="secondarySalesRep" class="control-label">Secondary Sales Rep</label>
                    <md-autocomplete
                            
                            required
                            md-no-cache="true"
                            md-selected-item="account.secondary_sales_rep"
                            md-search-text="salesRep2Search"
                            md-items="rep in searchSalesReps(salesRep2Search)"
                            md-item-text="rep.name"
                            md-min-length=3
                            placeholder="start typing rep name..."
                            ng-blur="salesRep2AutoCompleteBlur(account.secondary_sales_rep, this)"
                            md-input-name="secondary_sales_rep">
                        <md-item-template>
                            <span><%rep.name%></span>
                        </md-item-template>
                        <md-not-found>
                            No sales reps matching "<%salesRep2Search%>" were found.
                        </md-not-found>
                    </md-autocomplete>
                    <p ng-show="accountForm.secondary_sales_rep.$invalid  && (!accountForm.secondary_sales_rep.$pristine || accountForm.$submitted)" class="help-block">Secondary Sales Rep is required.</p>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <label for="classification">Classification</label>
                    <select ng-model="account.classification"  class="form-control" >
                        <option ng-repeat="n in [1,2,3,4,5]">Item <% n %></option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="industry">Industry</label>
                    <select ng-model="account.industry"  class="form-control" >
                        <option ng-repeat="n in [1,2,3,4,5]">Item <% n %></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-3 col-md-3 col-sm-push-6 col-md-push-6 ">
        <a href="{!! route('accounts.index') !!}"  class="btn btn-block btn-default">Cancel</a>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3 col-sm-push-6 col-md-push-6">
        <input type="submit" ng-click="submitForm(accountForm)"  class="btn btn-block btn-primary" value="Save"/>
    </div>
</div><br/>

<!-- Modal -->
<div id="newContactModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create New Contact</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>First Name</label>
                        <input id="contact-firstName" type="text" ng-model="newContact.firstName" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Last Name</label>
                        <input type="text" ng-model="newContact.lastName" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Email</label>
                        <input type="text" ng-model="newContact.email" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Main Phone</label>
                        <input type="text" ng-model="newContact.mainPhone" class="form-control" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" ng-click="saveContact()" >Save</button>
            </div>
        </div>
    </div>
</div>
