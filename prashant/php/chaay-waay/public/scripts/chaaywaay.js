  var app = angular.module('ChaayWaayApp', ['ngMaterial', 'ngMessages']);
  app.controller('DemoCtrl', function($scope,  $mdSidenav) {
    $scope.openLeftMenu = function() {
      $mdSidenav('left').toggle();
    };
    // $scope.grandTotal = calculateGrandTotal();
    $scope.orders = [
      { customer_name: 'Prashant', date: '2017-09-22', total: '1254' },
      { customer_name: 'Saurabh', date: '2017-09-22', total: '1254' },
      { customer_name: 'Mukund', date: '2017-09-22', total: '1254' },
      { customer_name: 'Nilesh', date: '17-09-22' , total: '1254' },
      { customer_name: 'Pallavi', date: '17-09-22' , total: '0' }
    ];
  });

  calculateGrandTotal = function(){
    for(var i = $scope.orders.length - 1; i >= 0; i--){
				$scope.grandTotal += value;
			}
      console.log($scope.grandTotal);
  };

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
