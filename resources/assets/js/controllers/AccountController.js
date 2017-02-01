app.controller('AccountController', function($scope, $http, $log) {
    $scope.readOnly = false;
    $scope.loadModel = loadModel;
    $scope.searchSalesReps = searchSalesReps;
    $scope.searchContacts = searchContacts;
    $scope.account = {};
    $scope.newContact = {};
    $scope.shippingAddressSameAsBilling = false;
    $scope.account.contacts = [];
    $scope.addContact = addContact;
    $scope.removeContact = removeContact;
    $scope.selectedContact = selectedContact;
    $scope.account.shipping_addresses = [];
    $scope.addShippingAddress = addShippingAddress;
    $scope.removeShippingAddress = removeShippingAddress;
    $scope.submitForm = submitForm;
    $scope.toggleShippingAddressSameAsBilling = toggleShippingAddressSameAsBilling;
    $scope.createNewContact = createNewContact;
    $scope.contactAutoCompleteBlur = contactAutoCompleteBlur;
    $scope.salesRep1AutoCompleteBlur = salesRep1AutoCompleteBlur;
    $scope.salesRep2AutoCompleteBlur = salesRep2AutoCompleteBlur;
    $scope.saveContact = saveContact;

    function searchSalesReps(query){
        return $http
                .get('/accounts/search-sales-rep/'+query)
                .then(function(response){
                    return response.data;
                });
    }
    function searchContacts(query){
        var account_id = $scope.account.id;
        if(!account_id){
            account_id = "null";
        }
        return $http
            .get('/accounts/search-contacts/'+query+'/'+account_id)
            .then(function(response){
                return response.data;
            });
    }
    function addContact(){
        $scope.account.contacts.push("");
    }
    function removeContact(index){
        $scope.account.contacts.splice(index, 1);
    }
    function addShippingAddress(){
        $scope.account.shipping_addresses.push({});
    }
    function removeShippingAddress(index){
        $scope.account.shipping_addresses.splice(index, 1);
    }
    function loadModel(id, readOnly){
        $scope.readOnly = readOnly;
        if(id==null){
            $scope.account.contacts.push(null);
            $scope.account.shipping_addresses.push(null);
            return;
        }
        $http.get('/accounts/get-by-id/'+id)
            .then(function(response){
                $scope.account = response.data;
                $scope.toggleShippingAddressSameAsBilling();
            });
    }
    function submitForm(form){
        if(!form.$valid) return;
        $http.post('/accounts/save', {
            data : JSON.stringify($scope.account)
        }).then(function(response){
            if(response.data.success){
                window.location.href = '/accounts';
            }else{
                $log.error(response.data.message);
                swal(
                    'Oops...',
                    response.data.message,
                    'error'
                ).then(function () {}, function (dismiss) {});
            }
        });
    }
    function toggleShippingAddressSameAsBilling(){
        if($scope.account.shippingAddressSameAsBilling){
            $scope.account.shipping_addresses = [];
        }else{
            if($scope.account.shipping_addresses.length == 0)
                $scope.account.shipping_addresses.push({});
        }
    }
    function selectedContact(index, contact){
        $scope.account.contacts[index] = contact;
    }
    function createNewContact(autocomplete, contactSearch){
        var index = contactSearch.indexOf(" ");
        var firstName = "";
        var lastName = "";
        if(index >= 0){
            firstName = contactSearch.substr(0, index);
            lastName = contactSearch.substr(index + 1);
        }else{
            firstName = contactSearch;
        }
        $scope.contactIndex = autocomplete.$parent.$index;
        $scope.newContact.firstName = firstName;
        $scope.newContact.lastName = lastName;
    }
    function contactAutoCompleteBlur(selectedItem, autocomplete){
        if(!selectedItem){
            autocomplete.contactSearch = "";
        }
    }
    function salesRep1AutoCompleteBlur(selectedItem, autocomplete){
        if(!selectedItem){
            autocomplete.salesRep1Search = "";
        }
    }
    function salesRep2AutoCompleteBlur(selectedItem, autocomplete){
        if(!selectedItem){
            autocomplete.salesRep2Search = "";
        }
    }
    function saveContact(){
        if($scope.newContact.firstName == "" || $scope.newContact.lastName == "" || $scope.newContact.email == "" || $scope.newContact.mainPhone == ""){
            swal(
                'Oops...',
                'Please complete all contact fields.',
                'error'
            ).then(function () {}, function (dismiss) {});
            return;
        }
        $scope.account.contacts[$scope.contactIndex] = $scope.newContact;
        $scope.newContact = {};
        $("#newContactModal").modal("toggle");
    }
    $scope.states = ["Alabama", "Alaska", "American Samoa", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "District Of Columbia", "Federated States Of Micronesia", "Florida", "Georgia", "Guam", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Marshall Islands", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Northern Mariana Islands", "Ohio", "Oklahoma", "Oregon", "Palau", "Pennsylvania", "Puerto Rico", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virgin Islands", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"];
});