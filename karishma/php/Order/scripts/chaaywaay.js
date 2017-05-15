angular.module('ChaayWaayApp', ['ngMaterial', 'ngMessages'])
.controller('DemoCtrl', function ($scope, $mdSidenav, $http) {
  $scope.openLeftMenu = function () {
    $mdSidenav('left').toggle();
  };
  $scope.selectedItems = [];
  $scope.items = [{
      itemName: 'Sausage',
      price: 25
    },
    {
      itemName: 'Black Olives',
      price: 50
    },
    {
      itemName: 'Green Peppers',
      price: 25
    },
    {
      itemName: 'Pepperoni',
      price: 50
    },
    {
      itemName: 'Sausage',
      price: 25
    },
    {
      itemName: 'Black Olives',
      price: 50
    },
    {
      itemName: 'Green Peppers',
      price: 25
    }
  ];

  $scope.addItem = function (item) {
    $scope.selectedItems.push(item);
  }
})

.config(function ($mdThemingProvider) {
  $mdThemingProvider.theme('default')
    .primaryPalette('yellow')
    .dark();
});