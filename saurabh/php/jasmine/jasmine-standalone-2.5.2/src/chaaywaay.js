angular.module('ChaayWaayApp', [])
  .controller('DemoCtrl', function ($scope) {
    // $scope.openLeftMenu = function () {
    //   $mdSidenav('left').toggle();
    // };

    $scope.total = 0;
    $scope.selectedItems = [];

    $scope.availableItems = [{
        itemId: 1,
        itemName: 'Sausage',
        price: 25
      },
      {
        itemId: 2,
        itemName: 'Pepperoni',
        price: 50
      },
      {
        itemId: 3,
        itemName: 'Sausage',
        price: 25
      },
      {
        itemId: 4,
        itemName: 'Black Olives',
        price: 50
      },
      {
        itemId: 5,
        itemName: 'Green Peppers',
        price: 25
      }
    ];

    this.add = function () {
      $scope.addItem($scope.availableItems[1]);
    }

    $scope.addItem = function (item) {
      $scope.selectedItems.push(item);
      // $scope.calculateTotal();
      var index = $scope.availableItems.indexOf(item);
      if (index > -1) {
        $scope.availableItems.splice(index, 1);
      }
    }

    $scope.calculateTotal = function () {
      $scope.selectedItems.forEach(function (item) {
        $scope.total += (item["price"] * item["quantity"]);
      });
    }

    this.deleteItem = function (item) {
      var index = $scope.selectedItems.indexOf(item);
      if (index > -1) {
        $scope.selectedItems.splice(index, 1);
      }
      $scope.availableItems.push(item);
      // $scope.calculateTotal();
    }

    this.updateItem = function (id, updatedQuantity) {
      $scope.selectedItems.forEach(function (item) {
        if (item["itemId"] == id) {
          item["quantity"] = updatedQuantity;
        }
      });
      console.log($scope.selectedItems);
    }
  });