(function () {
  describe('chaaywaay', function () {
    beforeEach(module('ChaayWaayApp'));
    var $controller;

    beforeEach(inject(function (_$controller_) {
      $controller = _$controller_;
    }));

    it('if item added', function () {
      $scope = {};
      var controller = $controller('DemoCtrl', {
        $scope: $scope
      });
      items = [item1 = {
          "itemId": 1,
          "itemName": "sugar",
          "price": 40,
          "quantity": 2
        },
        item2 = {
          "itemId": 1,
          "itemName": "sugar",
          "price": 40,
          "quantity": 2
        }
      ];
      $scope.addItem(items[0]);
      $scope.addItem(items[1]);
      expect($scope.selectedItems.length).toBe(2);
    });
    it('checking total', function () {
      $scope = {};
      var controller = $controller('DemoCtrl', {
        $scope: $scope
      });
      items = [item1 = {
          "itemId": 1,
          "itemName": "sugar",
          "price": 40,
          "quantity": 2

        },
        item2 = {
          "itemId": 1,
          "itemName": "sugar",
          "price": 40,
          "quantity": 2

        }
      ];
      $scope.addItem(items[0]);
      $scope.calculateTotal();
      expect($scope.total).toBe(80);
    });
    it('checking availale item list with externally added item', function () {
      $scope = {};
      var controller = $controller('DemoCtrl', {
        $scope: $scope
      });
      items = [item1 = {
          "itemId": 1,
          "itemName": "sugar",
          "price": 40,
          "quantity": 2

        },
        item2 = {
          "itemId": 1,
          "itemName": "sugar",
          "price": 40,
          "quantity": 2

        }
      ];
      $scope.addItem(items[0]);
      expect($scope.availableItems.length).toBe(1);
    });
    it('checking availale item list with internally added item', function () {
      $scope = {};
      var controller = $controller('DemoCtrl', {
        $scope: $scope
      });
      controller.add();
      expect($scope.availableItems.length).toBe(4);
    });
    it('delete item test check selected list', function () {
      $scope = {};
      var controller = $controller('DemoCtrl', {
        $scope: $scope
      });
      items = [item1 = {
          "itemId": 1,
          "itemName": "sugar",
          "price": 40,
          "quantity": 2

        },
        item2 = {
          "itemId": 1,
          "itemName": "sugar",
          "price": 40,
          "quantity": 2

        }
      ];
      $scope.addItem(items[0], 1);
      $scope.addItem(items[1], 1);
      controller.deleteItem(items[0]);
      expect($scope.selectedItems.length).toBe(1);
    });
    it('delete item test check availabel list', function () {
      $scope = {};
      var controller = $controller('DemoCtrl', {
        $scope: $scope
      });
      items = [item1 = {
          "itemId": 1,
          "itemName": "sugar",
          "price": 40,
          "quantity": 2

        },
        item2 = {
          "itemId": 1,
          "itemName": "sugar",
          "price": 40,
          "quantity": 2

        }
      ];
      $scope.addItem(items[0], 1);
      $scope.addItem(items[1], 1);
      controller.deleteItem(items[0]);
      expect($scope.availableItems.length).toBe(6);
    });
    it('delete item test check total', function () {
      $scope = {};
      var controller = $controller('DemoCtrl', {
        $scope: $scope
      });
      items = [item1 = {
          "itemId": 1,
          "itemName": "sugar",
          "price": 40,
          "quantity": 2

        },
        item2 = {
          "itemId": 1,
          "itemName": "sugar",
          "price": 40,
          "quantity": 2

        }
      ];
      $scope.addItem(items[0]);
      $scope.addItem(items[1]);
      controller.deleteItem(items[0]);
      $scope.calculateTotal();
      expect($scope.total).toBe(80);
    });
    it('update item test check total', function () {
      $scope = {};
      var controller = $controller('DemoCtrl', {
        $scope: $scope
      });
      items = [item1 = {
          "itemId": 1,
          "itemName": "sugar",
          "price": 40,
          "quantity": 1

        },
        item2 = {
          "itemId": 2,
          "itemName": "sugar",
          "price": 40,
          "quantity": 1

        }
      ];
      $scope.addItem(items[0]);
      $scope.addItem(items[1]);
      controller.updateItem(1, 4);
      $scope.calculateTotal();
      expect($scope.total).toBe(200);
    });

  });
})();