(function() {
  describe("ChaayWaayApp", function () {
    beforeEach(module('ChaayWaayApp'));
    var $controller;
    beforeEach(inject(function (_$controller_) {
      $controller = _$controller_;
    }));

    describe("test the totalbill", function () {
      it("create new order", function () {
        var $scope = {};
        var controller = $controller('DemoCtrl', { $scope: $scope });
        $scope.createNewOrder();
        expect($scope.selectedItemsLength).toBe(0);
        expect($scope.totalBill).toBe(0);
      });

      it("test addItem function", function () {
        var $scope = {};
        var controller = $controller('DemoCtrl', { $scope: $scope });
        $scope.addItem(1, "sugar", 1, 40);
        expect($scope.totalBill).toBe(40);
        expect($scope.availableItems.length).toBe(3);
      });

      it("test totalbill of 2 items", function () {
        var $scope = {};
        var controller = $controller('DemoCtrl', { $scope: $scope });
        $scope.addItem(2, "salt", 1, 20);
        $scope.addItem(3, "onion", 1, 30);
        expect($scope.totalBill).toBe(50);
      });

      it("test for checking length of available array length", function () {
        var $scope = {};
        var controller = $controller('DemoCtrl', { $scope: $scope });
        $scope.addItem(2, "salt", 1, 20);
        $scope.addItem(3, "onion", 1, 30);
        expect($scope.totalBill).toBe(50);
        expect($scope.availableItems.length).toBe(2);

      });


      describe("Delete test suite", function () {
        it(" test for delete item ", function () {
          var $scope = {};
          var controller = $controller('DemoCtrl', { $scope: $scope });
          $scope.addItem(1, "sugar", 1, 40);
          $scope.deleteItem(1);
          expect($scope.totalBill).toBe(0);
        });

        it("test for checking totalbill after deleting item", function () {
          var $scope = {};
          var controller = $controller('DemoCtrl', { $scope: $scope });
          $scope.addItem(2, "salt", 1, 20);
          $scope.addItem(3, "onion", 1, 30);
          $scope.deleteItem(3);
          expect($scope.selectedItems.length).toBe(1);
          expect($scope.totalBill).toBe(20);
        });
      });

      describe("update quantity test suite", function () {
        it("test for update quantity of single item", function () {
          var $scope = {};
          var controller = $controller('DemoCtrl', { $scope: $scope });
          $scope.addItem(1, "sugar", 1, 40);
          $scope.updateItemQuantity(1, 3);
          expect($scope.totalBill).toBe(120);
          expect($scope.availableItems.length).toBe(3);
        });

        it("test for update quantity of 2 items", function () {
          var $scope = {};
          var controller = $controller('DemoCtrl', { $scope: $scope });
          $scope.addItem(1, "sugar", 1, 40);
          $scope.addItem(2, "salt", 1, 20);
          $scope.updateItemQuantity(1, 2);
          expect($scope.totalBill).toBe(100);
          expect($scope.availableItems.length).toBe(2);
        });
      });
    });
  });
})();