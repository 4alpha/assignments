(function () {
  describe("Le Aa App", function () {
    beforeEach(module('ChaayWaayApp'));
    var $controller;

    beforeEach(inject(function (_$controller_) {
      $controller = _$controller_;
    }));

    describe('Vendor Registration', function () {
      it('Test case for vendor\'s unique phone and location', function () {
        var $scope = {};
        var controller = $controller('providerRegistration', { $scope: $scope });
        $scope.onRegisterDetails('8989898989','A-2/10 Fatimanagar Pune');
        expect($scope.count).toBe(1);
        expect($scope.vendorID).toBe(1);
      });
    });

    // describe('Customer Registration', function () {
    //   it('Test case for customer\'s unique phone number', function () {
    //     var $scope = {};
    //     var controller = $controller('customerRegistration', { $scope: $scope });
    //     $scope.onRegisterDetailsCustomer('8989898989');
    //     expect($scope.customerRegisterTable.count).toBe(1);
    //     expect($scope.customerID).toBe(1);
    //   });
    // });

    // describe('Vendor -Customer View', function () {
    //   it('Test case for total unpaid bill amount', function () {
    //     var $scope = {};
    //     var controller = $controller('customerViewContoller', { $scope: $scope });
    //     $scope.onRequestPay(500);
    //     expect($scope.unPaidOrderList.count).not.toBe(0);
    //     expect($scope.total).toBe(500);
    //   });
    // });

  });
})();