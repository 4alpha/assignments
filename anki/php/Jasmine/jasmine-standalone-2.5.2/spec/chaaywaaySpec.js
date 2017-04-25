(function () {
  describe("Le Aa App", function () {
    beforeEach(module('ChaayWaayApp'));
    var $controller;

    beforeEach(inject(function (_$controller_) {
      $controller = _$controller_;
    }));

    describe('add test for item', function () {
      it('Add Item to customer order list', function () {
        var $scope = {};
        var controller = $controller('customerViewContoller', { $scope: $scope });
        $scope.addItem(1, 2);
        $scope.addItem(2, 3);
        expect($scope.total).toBe(70);
      });
    });

    describe('Update test for item', function () {
      it('Update Item from customer List', function () {
        var $scope = {};
        var controller = $controller('customerViewContoller', { $scope: $scope });
        $scope.addItem(5, 1);
        // $scope.addItem(1, 2);
        $scope.updateItem(5, 3);
        expect($scope.total).toBe(600);
      });
    });

    describe('Delete test for item', function () {
      it('Delete Item from customer List', function () {
        var $scope = {};
        var controller = $controller('customerViewContoller', { $scope: $scope });
        $scope.addItem(5, 1);
        $scope.deleteItem(5);
        expect($scope.total).not.toBe(200);
      });
    });

    describe('Test for create new order', function () {
      it('Create New Order', function () {
        var $scope = {};
        var controller = $controller('customerViewContoller', { $scope: $scope });
        $scope.createNewOrder();
        expect($scope.total).toBe(0);
      });
    });
    // it('Add available product into selected product', function () {
    //   var $scope = {};
    //   var controller = $controller('customerViewContoller', { $scope: $scope });
    //   var cntAvailable = $scope.availableProduct.count();
    //   expect(cntAvailable).toBe(cntAvailable - 1);
    //   var cntSelect = $scope.selectProduct.count();
    //   expect(cntSelect).toBe(cntSelect + 1);
    // });
  });
})();