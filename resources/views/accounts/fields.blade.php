<input type="hidden" ng-model="account.id"/>
<div class="panel panel-default">
    <div class="panel-heading">Basic Account Info</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group col-sm-12">
                    <label for="name">Account Name</label>
                    <input type="text" name="name" ng-model="account.name" ng-disabled="readOnly" class="form-control" required placeholder="enter a name..."/>
                </div>
                <div class="form-group col-sm-12">
                    <label for="taxID">Tax ID</label>
                    <input type="text" name="taxID" ng-model="account.taxID" ng-disabled="readOnly" class="form-control" required placeholder="ex: 12-3456789"/>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <label for="dba">DBA</label>
                <textarea name="dba" ng-model="account.dba" class="form-control" ng-disabled="readOnly" required placeholder="separate entries with a comma" style="height: 120px;"></textarea>
            </div>
        </div>
        <div class="row">
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
                <div class="col-sm-3 form-group">
                    <select ng-model="account.billingAddress.state" ng-disabled="readOnly" class="form-control" required placeholder="state">
                        <option ng-repeat="state in states"><%state%></option>
                    </select>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" ng-model="account.billingAddress.zip" ng-disabled="readOnly" class="form-control" required placeholder="ZIP"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <label for="shippingAddress">Ship to Address</label>&nbsp;&nbsp;
                    <input type="checkbox" name="shippingAddressSameAsBilling" ng-disabled="readOnly" ng-model="account.shippingAddressSameAsBilling" ng-click="toggleShippingAddressSameAsBilling()" />
                    <label for="shippingAddressSameAsBilling">Same as Bill to Address</label>
                </div>
            </div>
        </div>
        <div class="row"  ng-repeat="shippingAddress in account.shipping_addresses">
            <div class="col-sm-12">
                <input type="hidden" ng-model="shippingAddress.id" />
                <div class="col-sm-12">
                    <label ng-show="$index > 0">Ship to Address <% $index + 1 %></label><a title="Remove address" class="remove-icon pull-right" href="javascript:void(0)" ng-show="!readOnly && $index > 0" ng-click="removeShippingAddress($index)"><span class="glyphicon glyphicon-remove"></span></a>
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
                <div class="col-sm-3 form-group">
                    <select ng-model="shippingAddress.address.state" ng-disabled="readOnly" class="form-control" required placeholder="state">
                        <option ng-repeat="state in states"><%state%></option>
                    </select>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" ng-model="shippingAddress.address.zip" ng-disabled="readOnly" class="form-control" required placeholder="ZIP"/>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-12"><a href="javascript:void(0)" ng-click="addShippingAddress()" ng-show="!readOnly && !account.shippingAddressSameAsBilling">+ Add another shipping address</a></div>
            </div>
        </div>
        <div class="row">
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
                <div class="col-sm-6 form-group">
                    <label for="website">Web Site</label>
                    <input type="text" ng-model="account.website" ng-disabled="readOnly" class="form-control" placeholder="enter website..."/>
                </div>
                <div class="col-sm-6">
                    <label for="contacts">Primary Contact</label>
                    <div class="form-group" ng-repeat="contact in account.contacts">
                            <label ng-show="$index > 0">Contact <% $index + 1 %></label><a title="Remove contact" class="remove-icon pull-right" href="javascript:void(0)" ng-show="!readOnly && $index > 0" ng-click="removeContact($index)"><span class="glyphicon glyphicon-remove"></span></a>
                            <md-autocomplete
                                    ng-disabled="readOnly"
                                    required
                                    md-selected-item-change="selectedContact($index, item)"
                                    md-selected-item="contact.name"
                                    md-search-text="searchContact_$index"
                                    md-items="item in searchContacts(searchContact_$index)"
                                    md-item-text="item.name"
                                    md-min-length=3
                                    placeholder="start typing a contact name...">
                                <md-item-template>
                                    <span><%item.name%></span>
                                </md-item-template>
                                <md-not-found>
                                    No contacts matching "<%searchContact_$index%>" were found.
                                </md-not-found>
                            </md-autocomplete>
                    </div>
                    <div class="col-sm-12"><a href="javascript:void(0)" ng-show="!readOnly"  ng-click="addContact()">+ Add new contact</a></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group ">
                <div class="col-sm-12 form-group">
                    <label for="notes">Notes</label>
                    <textarea ng-model="account.notes" ng-disabled="readOnly" class="form-control" placeholder="Enter notes..."></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-heading">Sales Info</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-6 form-group">
                    <label for="primarySalesRep">Primary Sales Rep</label>
                    <md-autocomplete
                            ng-disabled="readOnly"
                            required
                            md-selected-item="account.primary_sales_rep"
                            md-search-text="searchRep1"
                            md-items="rep in searchSalesReps(searchRep1)"
                            md-item-text="rep.name"
                            md-min-length=3
                            placeholder="start typing rep name...">
                        <md-item-template>
                            <span><%rep.name%></span>
                        </md-item-template>
                        <md-not-found>
                            No sales reps matching "<%searchRep1%>" were found.
                        </md-not-found>
                    </md-autocomplete>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="secondarySalesRep">Secondary Sales Rep</label>
                    <md-autocomplete
                            ng-disabled="readOnly"
                            required
                            md-selected-item="account.secondary_sales_rep"
                            md-search-text="searchRep2"
                            md-items="rep in searchSalesReps(searchRep2)"
                            md-item-text="rep.name"
                            md-min-length=3
                            placeholder="start typing rep name...">
                        <md-item-template>
                            <span><%rep.name%></span>
                        </md-item-template>
                        <md-not-found>
                            No sales reps matching "<%searchRep2%>" were found.
                        </md-not-found>
                    </md-autocomplete>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
            <!-- Submit Field -->
        <div class="form-group">
            <input type="submit" ng-click="submitForm(accountForm)" ng-show="!readOnly" class="btn btn-primary" value="Save"/>
            <a href="{!! route('accounts.index') !!}" ng-show="!readOnly" class="btn btn-default">Cancel</a>
            <a href="{!! route('accounts.index') !!}" ng-show="readOnly" class="btn btn-default">Back</a>
        </div>
    </div>
</div>