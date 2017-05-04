  var app = angular.module('ChaayWaayApp', ['ngMaterial', 'ngMessages']);
  $scope.totalAmount = 0;

  app.controller('DemoCtrl', function($scope,  $mdSidenav) {
    $scope.openLeftMenu = function() {
      $mdSidenav('left').toggle();
    };  

    $scope.addItem = function(item, quantity) {
      var selectedItemsList = [];
       selectedItemsList.push(item);
      for(var i=$scope.availableList.length - 1; i >= 0; i--) {
        if($scope.availableList[i].itemCode == item.itemCode) {
          $scope.availableList.splice(i, 1);
        }
      }
      $scope.totalBill(item.price * quantity);
    };

    $scope.totalBill = function(amount) {
      $scope.totalAmount += amount;
    };

    $scope.availableList = [
      {itemCode:1, itemName:'tomat', price: 20},
      {itemCode:2, itemName:'potato', price: 30},
      {itemCode:3, itemName:'water melon', price: 60}
    ];

    $scope.orders = [
      { customer_id:1, customer_name: 'Prashant', date: '2017-09-22', total: '1254' },
      { customer_id:2, customer_name: 'Saurabh', date: '2017-09-22', total: '1254' },
      { customer_id:55, customer_name: 'Mukund', date: '2017-09-22', total: '1254' },
      { customer_id:12, customer_name: 'Nilesh', date: '17-09-22' , total: '1254' },
      { customer_id:132, customer_name: 'Pallavi', date: '17-09-22' , total: '0' }
    ];
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
