angular.module('ChaayWaayApp', ['ngMaterial', 'ngMessages'])
.controller('DemoCtrl', function($scope, $http) {
  $http.get("customers.php").success(function (response) {
    console.log(response.data);
    $scope.myData = response.data;
    console.log($scope.myData);
  });
});