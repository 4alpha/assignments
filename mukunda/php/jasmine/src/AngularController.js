(function() {
  angular.module('ChaayWaayApp', [])
    .controller('DemoCtrl', function ($scope) {
      $scope.selectedItems = [];

      $scope.availableItems = [
        { itemId: 1, itemName: "sugar", price: 40 },
        { itemId: 2, itemName: "salt", price: 20 },
        { itemId: 3, itemName: "onion", price: 30 },
        { itemId: 4, itemName: "potato", price: 25 }
      ];

      $scope.createNewOrder = function () {
        $scope.selectedItemsLength = 0;
        $scope.totalBill = 0;
      }

      $scope.addItem = function (itemId, itemName, itemQuantity, price) {
        menu = {};
        menu.itemId = itemId;
        menu.itemName = itemName;
        menu.itemQuantity = itemQuantity;
        menu.price = price;
        $scope.selectedItems.push(menu);

        $scope.totalBill = 0;
        for (i = 0; i < $scope.selectedItems.length; i++) {
          $scope.totalBill = $scope.totalBill + $scope.selectedItems[i].price;
        }

        for (i = 0; i < $scope.availableItems.length; i++){
          if ($scope.availableItems[i].itemId == menu.itemId) {
            $scope.availableItems.splice(i, 1);
          }
        }
        //console.log("number of the items in availableItems" + $scope.availableItems.length);
      }

      $scope.deleteItem = function(id) {
        for (i = 0; i < $scope.selectedItems.length; i++) {
          if ($scope.selectedItems[i].itemId ==  id) {
            console.log($scope.totalBill);
            $scope.totalBill = $scope.totalBill - $scope.selectedItems[i].price;
            $scope.selectedItems.splice(i, id);
            console.log($scope.totalBill);
          }
        }
        //console.log("number of the items in selectedItems" + $scope.selectedItems.length);
      }

      $scope.updateItemQuantity = function (id, quantity) {
        $scope.totalBill = 0;
        for (i = 0; i < $scope.selectedItems.length; i++) {
          if ($scope.selectedItems[i].itemId == id) {
            $scope.totalBill = $scope.totalBill + (($scope.selectedItems[i].price/$scope.selectedItems[i].itemQuantity) * quantity);
            console.log($scope.totalBill);
           }
        }
      }
    });
  })();