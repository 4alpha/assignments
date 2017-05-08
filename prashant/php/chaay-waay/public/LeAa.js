  var app = angular.module('Le-Aa',[]);
  app.controller('DemoCtrl', function($scope, $http) { 
    $scope.grandTotal = 0;
    $scope.totalBill = 0;
    $scope.packedItems = [];
    getUndeliveredOrders = function() {
      $scope.undeliveredOrders = {};
      $http.get("undeliveredOrders.php").then(function(response) {
		  $scope.undeliveredOrders = response.data;
		 });
     calculateGrandTotal();
    };
	  

    calulateGrandTotal = function() {
      angular.forEach($scope.undeliveredOrders.total, function(value, index) {
        $scope.grandTotal += value;
      });
    };

    $scope.packItem = function($event, itemId, quantity, total){
      var checkbox = $event.target;
      var packedItems = [];
      var item = {'itemId':itemId, 'quantity':quantity, 'total':total};
      if(checkbox.checked){
        selectedItems += 1;
        $scope.packedItems.push(item);
        $scope.totalBill += total;
      } else{
        selectedItems -= 1;
        for(var i=packedItems.length - 1; i>= 0; i--){
         if(packedItems.itemId == itemId){
          $scope.packedItems.splice(i, 1);
          $scope.totalBill -= total;
         }
        } 
        $scope.selectedItems = selectedItems;
      }
    }

    $scope.dispatchOrder = function() {
      $http({
        url:"deliveredOrders.php",
        method:'POST',
        data:{packedItems:$scope.packedItems, operation:'add'}
      }).then(function(response) {
        $http({
        url:"undeliveredOrders.php",
        method:'POST',
        data:{orderId:response.data, operation:'delete'}
        }).then(function(response) {
          getUndeliveredOrders();
          $scope.showForm = false;
        });
		  },
     function(){
       alert("opder not dilivered try again!!!");
     });
    };

    $scope.cancelDilivery = function() {
      $scope.showForm = false;
    }

	});
    
    
 
  app.controller('customerOrder', function($scope, $mdSidenav) {
     $scope.openLeftMenu = function() {
      $mdSidenav('left').toggle();
    };
});

  app.config(function($mdThemingProvider) {
    // Configure a dark theme with primary foreground yellow
    $mdThemingProvider.theme('default')
      .primaryPalette('yellow')
      .dark();
  });
