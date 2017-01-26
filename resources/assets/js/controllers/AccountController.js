app.controller('AccountController', function($scope, $http, $log) {
    $scope.loadModel = loadModel;
    $scope.searchSalesReps = searchSalesReps;
    $scope.searchContacts = searchContacts;
    $scope.account = {};
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

    function searchSalesReps(query){
        return $http
                .get('/accounts/search-sales-rep/'+query)
                .then(function(response){
                    return response.data;
                });
    }
    function searchContacts(query){
        return $http
            .get('/accounts/search-contacts/'+query)
            .then(function(response){
                return response.data;
            });
    }
    function addContact(){
        $scope.account.contacts.push({});
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
    function loadModel(id){
        if(id==null){
            $scope.account.contacts.push({});
            $scope.account.shipping_addresses.push({});
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
                    'Something went wrong! see log for more info.',
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
    $scope.states = ["Alabama", "Alaska", "American Samoa", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "District Of Columbia", "Federated States Of Micronesia", "Florida", "Georgia", "Guam", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Marshall Islands", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Northern Mariana Islands", "Ohio", "Oklahoma", "Oregon", "Palau", "Pennsylvania", "Puerto Rico", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virgin Islands", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"];
});