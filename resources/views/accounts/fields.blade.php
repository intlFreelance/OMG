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
                <div class="form-group col-sm-12">
                    <label for="name">Account Name</label> <a title="Remove taxID" class="remove-icon pull-right" href="javascript:void(0)" ng-if="!readOnly && $index > 0" ng-click="removeTaxID($index)"><span class="glyphicon glyphicon-remove"></span></a>
                    <input type="text" name="name" ng-model="account.name" ng-disabled="readOnly" class="form-control" required placeholder="enter a name..."/>
                </div>
                <div ng-if="longForm">
                    <div class="col-sm-12">
                        <label for="taxID">Tax ID</label>
                    </div>
                    <div class="row" ng-repeat="taxID in account.taxID">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                                <label ng-if="$index > 0">Tax ID <% $index + 1 %></label>
                                <a title="Remove Tax ID" class="remove-icon pull-right" href="javascript:void(0)" ng-if="!readOnly && $index > 0" ng-click="removeTaxID($index)"><span class="glyphicon glyphicon-remove"></span></a>
                            </div>
                            <div class="col-xs-6 form-group">
                                <input type="text" ng-model="taxID.taxID" ng-disabled="readOnly" class="form-control" required placeholder="ex: 12-3456789"/>
                            </div>
                            <div class="col-xs-6 form-group">
                                <select ng-model="taxID.state" ng-disabled="readOnly" class="form-control" required ng-options="s as s for s in states"><option value='' disabled>state</option></select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                                <a href="javascript:void(0)" ng-click="addTaxID()" ng-if="!readOnly">+ Add another Tax ID</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6" ng-if="longForm">
                <div class="form-group col-sm-12">
                    <label for="dba">DBA</label>
                    <textarea name="dba" ng-model="account.dba" class="form-control" ng-disabled="readOnly" placeholder="separate entries with a comma" style="height: 120px;"></textarea>
                </div>
            </div>
        </div>
        <div ng-if="longForm"><br /><br/></div>
        <div class="row" ng-if="longForm">
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <label for="billingAddress">Bill to Address</label>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-6 form-group">
                    <input type="text" name="billingAddress[line1]" ng-disabled="readOnly" ng-model="account.billingAddress.line1" class="form-control" required placeholder="ex: 123 Main St"/>
                </div>
                <div class="col-sm-6 form-group">
                    <input type="text" ng-model="account.billingAddress.line2" ng-disabled="readOnly" class="form-control" placeholder="ex: apt. 9, Unit 500, etc"/>
                </div>
                <div class="col-sm-6 form-group">
                    <input type="text" ng-model="account.billingAddress.city" ng-disabled="readOnly" class="form-control" required placeholder="city"/>
                </div>
                <div class="col-sm-3 col-xs-6 form-group">
                    <select ng-model="account.billingAddress.state" ng-disabled="readOnly" class="form-control" required  ng-options="s as s for s in states"><option value='' disabled>state</option></select>
                </div>
                <div class="col-sm-3 col-xs-6 form-group">
                    <input type="text" ng-model="account.billingAddress.zip" ng-disabled="readOnly" class="form-control" required placeholder="ZIP"/>
                </div>
            </div>
        </div>
        <div ng-if="longForm">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <label for="shippingAddress">Ship to Address</label>
                    </div>
                    <div class="col-md-4 col-md-pull-2 col-sm-pull-1 col-sm-4 col-xs-6 text-right">
                        <label style="font-weight: normal">
                            <input type="checkbox"  name="shippingAddressSameAsBilling" ng-disabled="readOnly" ng-model="account.shippingAddressSameAsBilling" ng-click="toggleShippingAddressSameAsBilling()" />
                            Same as Bill to Address
                        </label>
                    </div>

                    <!--div class="col-sm-12 show-mobile">
                        <label for="shippingAddressSameAsBilling">Same as Bill to Address</label>
                        <select ng-model="account.shippingAddressSameAsBilling" ng-change="toggleShippingAddressSameAsBilling()" name="shippingAddressSameAsBilling"
                                ng-options="o.v as o.n for o in [{ n: 'No', v: false }, { n: 'Yes', v: true }]">
                        </select>
                    </div-->
                </div>
            </div>
            <div class="row"  ng-repeat="shippingAddress in account.shipping_addresses">
                <div class="col-sm-12">
                    <input type="hidden" ng-model="shippingAddress.id" />
                    <div class="col-sm-12">
                        <label ng-if="$index > 0">Ship to Address <% $index + 1 %></label><a title="Remove address" class="remove-icon pull-right" href="javascript:void(0)" ng-if="!readOnly && $index > 0" ng-click="removeShippingAddress($index)"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input type="text" ng-model="shippingAddress.address.line1" ng-disabled="readOnly" class="form-control" required placeholder="ex: 123 Main St"/>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input type="text" ng-model="shippingAddress.address.line2" ng-disabled="readOnly" class="form-control" placeholder="ex: apt. 9, Unit 500, etc"/>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input type="text" ng-model="shippingAddress.address.city" ng-disabled="readOnly" class="form-control" required placeholder="city"/>
                    </div>
                    <div class="col-sm-3 col-xs-6 form-group">
                        <select ng-model="shippingAddress.address.state" ng-disabled="readOnly" class="form-control" required ng-options="s as s for s in states"><option value='' disabled>state</option></select>
                    </div>
                    <div class="col-sm-3 col-xs-6 form-group">
                        <input type="text" ng-model="shippingAddress.address.zip" ng-disabled="readOnly" class="form-control" required placeholder="ZIP"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-12"><a href="javascript:void(0)" ng-click="addShippingAddress()" ng-if="!readOnly && !account.shippingAddressSameAsBilling">+ Add another shipping address</a></div>
                </div>
            </div>
            <br ng-if="!account.shippingAddressSameAsBilling"/><br ng-if="!account.shippingAddressSameAsBilling"/>
        </div>
        <div class="row" ng-if="longForm">
            <div class="col-sm-12">
                <div class="col-sm-4 form-group">
                    <label for="phone1">Phone 1</label>
                    <input type="text" ng-model="account.phone1" ng-disabled="readOnly"  class="form-control" required placeholder="enter number..."/>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="phone2">Phone 2</label>
                    <input type="text" ng-model="account.phone2" ng-disabled="readOnly" class="form-control" placeholder="enter number..."/>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="fax">FAX</label>
                    <input type="text" ng-model="account.fax" ng-disabled="readOnly" class="form-control" placeholder="enter number..."/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-6 form-group" ng-if="!longForm">
                    <label for="phone1">Phone</label>
                    <input type="text" ng-model="account.phone1" ng-disabled="readOnly"  class="form-control" required placeholder="enter number..."/>
                </div>
                <div ng-class="longForm ? 'col-sm-4 form-group' : 'col-sm-6 form-group'">
                    <label for="email">Email</label>
                    <input type="email" ng-model="account.email" ng-disabled="readOnly" class="form-control" placeholder="enter email..."/>
                </div>
                <div ng-class="longForm ? 'col-sm-4 form-group' : 'col-sm-6 form-group'">
                    <label for="website">Web Site</label>
                    <input type="text" ng-model="account.website" ng-disabled="readOnly" class="form-control" placeholder="enter website..."/>
                </div>
                <div ng-class="longForm ? 'col-sm-4 form-group' : 'col-sm-6 form-group'">
                    <label for="contacts">Primary Contact</label>
                    <div class="form-group" ng-repeat="contact in account.contacts">
                            <label ng-if="$index > 0">Contact <% $index + 1 %></label><a title="Remove contact" class="remove-icon pull-right" href="javascript:void(0)" ng-if="!readOnly && $index > 0" ng-click="removeContact($index)"><span class="glyphicon glyphicon-remove"></span></a>
                            <md-autocomplete
                                    ng-disabled="readOnly"
                                    required
                                    md-selected-item-change="selectedContact($index, item)"
                                    md-selected-item="contact"
                                    md-search-text="contactSearch"
                                    md-items="item in searchContacts(contactSearch)"
                                    md-item-text="item.firstName + ' ' + item.lastName"
                                    md-min-length=3
                                    placeholder="start typing a contact name..."
                                    ng-blur="contactAutoCompleteBlur(contact, this)">
                                <md-item-template>
                                    <span><%item.firstName%> <%item.lastName%></span>
                                </md-item-template>
                                <md-not-found>
                                    Contact not found. <a data-toggle="modal" data-target="#newContactModal" ng-click="createNewContact(this,  contactSearch)">Create a new one!</a>
                                </md-not-found>
                            </md-autocomplete>
                    </div>
                    <div class="col-sm-12"><a href="javascript:void(0)" ng-if="!readOnly"  ng-click="addContact()">+ Add new contact</a></div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-sm-12 form-group ">
                <div class="col-sm-12 form-group">
                    <label for="notes">Notes</label>
                    <table class="table table-stripped">
                        <thead class="secondary-header">
                            <tr><th class="col-sm-11">Comments</th><th class="col-sm-1"></th></tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="note in account.notes">
                                <td><input type="text" ng-model="note.comments" class="form-control"/></td>
                                <td>
                                    <a title="Remove note" class="remove-icon pull-right" href="javascript:void(0)" ng-if="!readOnly" ng-click="removeNote($index)"><span class="glyphicon glyphicon-remove"></span></a>
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
                <div class="col-sm-6 form-group">
                    <label for="primarySalesRep">Primary Sales Rep</label>
                    <md-autocomplete
                            ng-disabled="readOnly"
                            required
                            md-no-cache="true"
                            md-selected-item="account.primary_sales_rep"
                            md-search-text="salesRep1Search"
                            md-items="rep in searchSalesReps(salesRep1Search)"
                            md-item-text="rep.name"
                            md-min-length=3
                            placeholder="start typing rep name..."
                            ng-blur="salesRep1AutoCompleteBlur(account.primary_sales_rep, this)">
                        <md-item-template>
                            <span><%rep.name%></span>
                        </md-item-template>
                        <md-not-found>
                            No sales reps matching "<%salesRep1Search%>" were found.
                        </md-not-found>
                    </md-autocomplete>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="secondarySalesRep">Secondary Sales Rep</label>
                    <md-autocomplete
                            ng-disabled="readOnly"
                            required
                            md-no-cache="true"
                            md-selected-item="account.secondary_sales_rep"
                            md-search-text="salesRep2Search"
                            md-items="rep in searchSalesReps(salesRep2Search)"
                            md-item-text="rep.name"
                            md-min-length=3
                            placeholder="start typing rep name..."
                            ng-blur="salesRep2AutoCompleteBlur(account.secondary_sales_rep, this)">
                        <md-item-template>
                            <span><%rep.name%></span>
                        </md-item-template>
                        <md-not-found>
                            No sales reps matching "<%salesRep2Search%>" were found.
                        </md-not-found>
                    </md-autocomplete>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <label for="classification">Classification</label>
                    <select ng-model="account.classification" ng-disabled="readOnly" class="form-control" >
                        <option ng-repeat="n in [1,2,3,4,5]">Item <% n %></option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="industry">Industry</label>
                    <select ng-model="account.industry" ng-disabled="readOnly" class="form-control" >
                        <option ng-repeat="n in [1,2,3,4,5]">Item <% n %></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-3 col-md-3 col-sm-push-6 col-md-push-6 ">
        <a href="{!! route('accounts.index') !!}" ng-if="!readOnly" class="btn btn-block btn-default">Cancel</a>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3 col-sm-push-6 col-md-push-6">
        <input type="submit" ng-click="submitForm(accountForm)" ng-if="!readOnly" class="btn btn-block btn-primary" value="Save"/>
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
