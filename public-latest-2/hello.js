	var helloApp = angular.module("helloApp", []);


/*helloApp.config(['$httpProvider', '$provide', function ($httpProvider, $provide) {
  $provide.factory('requestInterceptorChangeDeleteToPost', function () { 
    return {
      request: function (request) {
      	.
        if (request.method === 'DELETE') {
          request.method = 'POST';
          request.headers = request.headers || {}; 
          request.headers['X­-HTTP-­Method-­Override'] = 'DELETE';
        }
        return request; 
      }
    };
  });

  $httpProvider.interceptors.push('requestInterceptorChangeDeleteToPost'); 
}]);*/


	helloApp.controller("Customer", 
		function($scope, $http) {
		    $http.get('https://localhost/customer-relationship-management/apps/dataAll/type/invoices_test/format/json').
        	success(function(data) {
        	//var newStr = data.substring(1, data .length-1);
            $scope.customers = data.invoices_test;
            console.log(data);
        });



	  $scope.deleteCustomer = function(customer){
	  	

          $http.post('https://localhost/customer-relationship-management/apps/dataAll/6',{
          	header : {'X-HTTP-Method-Override': 'DELETE'}})
	      .success(function(response, status, headers, config){
	          var index = $scope.customers.indexOf(customer);
	          $scope.customers.splice(index,1);
	      })
	      .error(function(response, status, headers, config){
	      	console.log(headers);
	        //$scope.error_message = response.error_message;
	      });
	  	 

	    
	  }


	});
/*
$httpProvider.defaults.useXDomain = true;
$httpProvider.defaults.withCredentials = true;
delete $httpProvider.defaults.headers.common["X-Requested-With"];
$httpProvider.defaults.headers.common["Accept"] = "application/json";
$httpProvider.defaults.headers.common["Content-Type"] = "application/json";*/

