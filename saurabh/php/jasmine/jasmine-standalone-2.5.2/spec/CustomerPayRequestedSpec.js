(function () {
  describe('Le Aa App', function () {
    beforeEach(angular.mock.module('LeAaApp'));
    var $controller;

    beforeEach(angular.mock.inject(function (_$controller_) {
      $controller = _$controller_;
    }));

    it('test vendor list should not empty', function () {
      $scope = {};
      var controller = $controller('LeAaCtrl', {
        $scope: $scope
      });
      expect($scope.vendorListWithOrders.length).not.toBe(0);
    });

    it('test total count of orders for perticular vendor', function () {
      $scope = {};
      var controller = $controller('LeAaCtrl', {
        $scope: $scope
      });
      $scope.calculateCountOfOrders();
      expect($scope.countOfOrders).toBe(2);
    });

    it('test total amount of orders for perticular vendor', function () {
      $scope = {};
      var controller = $controller('LeAaCtrl', {
        $scope: $scope
      });
      $scope.calculateTotalAmountOfOrders();
      expect($scope.totalAmountOfOrders).toBe(82);
    });

    it('test confirmation of payment', function () {
      $scope = {};
      var controller = $controller('LeAaCtrl', {
        $scope: $scope
      });
      $scope.doPayment()
      expect($scope.confirmationMessage).toBe("Successfull");
    });

    it('test when we click on order count', function () {
      $scope = {};
      var controller = $controller('LeAaCtrl', {
        $scope: $scope
      });
      $scope.displayOrderDetails();
      expect($scope.orderDetails).toBe(true);
    });

    it('test when we click on order count', function () {
      $scope = {};
      var controller = $controller('LeAaCtrl', {
        $scope: $scope
      });
      $scope.displayOrderDetails();
      expect($scope.payRequestedList).toBe(false);
    });
  });
})();