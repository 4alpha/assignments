 (function() {
  angular.module('ChaayWaayApp', [])
    .controller('DemoCtrl', function ($scope, $http) {

      $scope.selectedItems = [];
      $scope.totalBill = 0;
      $scope.availableItems = [];

      $http.get("/src/availableItems.php")
        .success(function (response) {
          alert("hjdcs");
          $scope.availableItems = response.data.availableItems;
          // console.log(response.data.availableItems);
        }). error(function (response) {
          alert(response);
          alert("error");
        });
      // $scope.availableItems = [
      //   { itemId: 1, itemName: "sugar", price: 40 },
      //   { itemId: 2, itemName: "salt", price: 20 },
      //   { itemId: 3, itemName: "onion", price: 30 },
      //   { itemId: 4, itemName: "potato", price: 25 }
      // ];

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
        calculateTotalBill();
        for (i = 0; i < $scope.availableItems.length; i++){
          if ($scope.availableItems[i].itemId == menu.itemId) {
            $scope.availableItems.splice(i, 1);
          }
        }

      }

      calculateTotalBill = function () {
        $scope.totalBill = 0;
        for (i = 0; i < $scope.selectedItems.length; i++) {
          $scope.totalBill = $scope.totalBill + $scope.selectedItems[i].price;
        }
      }

      // $scope.deleteItem = function(id) {
      //   for (i = 0; i < $scope.selectedItems.length; i++) {
      //     if ($scope.selectedItems[i].itemId ==  id) {
      //       $scope.totalBill = $scope.totalBill - $scope.selectedItems[i].price;
      //       $scope.selectedItems.splice(i, id);
      //     }
      //   }
      // }

      // $scope.updateItemQuantity = function (id, quantity) {
      //   $scope.totalBill = 0;
      //   for (i = 0; i < $scope.selectedItems.length; i++) {
      //     if ($scope.selectedItems[i].itemId == id) {
      //        var billAmount = ($scope.selectedItems[i].price/$scope.selectedItems[i].itemQuantity) * quantity;
      //        $scope.selectedItems[i].itemQuantity = quantity;
      //        $scope.selectedItems[i].price = billAmount;
      //     }
      //   }
      //   calculateTotalBill();
      // }
    });
   })();