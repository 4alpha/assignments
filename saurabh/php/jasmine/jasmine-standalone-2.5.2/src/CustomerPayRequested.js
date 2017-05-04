angular.module('LeAaApp', [])
  .controller('LeAaCtrl', function ($scope) {

    $scope.getVendorListWithOrders = function () {
      $http({
        method: "GET",
        url: "getVedorList.php"
      }).then(function onSuccess(response) {
        $scope.vendorListWithOrders[] = response.data;
      }, function onError(response) {
        $scope.errorMessage = response.statusText;
      });
    }

    $scope.calculateCountOfOrders = function () {
      $scope.vendorListWithOrders.forEach(function (row) {
        $scope.countOfOrders += row["vendor"]["order"];
      });
    }

    $scope.calculateTotalAmountOfOrders = function () {
      $scope.vendorListWithOrders.forEach(function (order) {
        $scope.totalAmountOfOrders += order["orderAmount"];
      });
    }

    $scope.doPayment = function (amount) {
      $http({
        method: "GET",
        url: "Payment.php"
      }).then(function onSuccess(response) {
        $scope.confirmationMessage = response.data;
      }, function onError(response) {
        $scope.errorMessage = response.statusText;
      });
    }

    $scope.displayOrderDetails = function () {
      $scope.payRequestedList = false;
      $scope.orderDetails = true;
    }

  });