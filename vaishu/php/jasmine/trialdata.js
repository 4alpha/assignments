  angular.module('ChaayWaayApp', [])
    .controller('DemoCtrl', function($scope) {
      $scope.openLeftMenu = function() {
      $mdSidenav('left').toggle();
    };
     $scope.avaliableItems[
       { itemId: 1, ItemName: "Methi", QuantityUnit: "1.Kilogram", Price: 30 },
       { itemId: 2, ItemName: "Potato", QuantityUnit: "1.Kilogram", Price: 10 },
       { itemId: 3, ItemName: "Val", QuantityUnit: "1.Kilogram", Price: 10 },
       { itemId: 4, ItemName: "Shimla", QuantityUnit: "1.Kilogram", Price: 25 }
     ];

      $scope.totalBillAmt = 0;
      $scope.items = [];
      $scope.addItem = function(itemId,itemName,itemQuantity,itemPrice) {
        selectedItem = {};
        selectedItem.itemId = itemId;
        selectedItem.itemName = itemName;
        selectedItem.itemQuantity = itemQuantity;
        selectedItem.itemPrice = itemPrice;
        $scope.items.push(selectedItem);
        totalBillItem();
     };

      $scope.deleteItem = function(itemId) {
        for(i=0; i<$scope.items.length; i++ ) { 
          if($scope.items[i].itemId == itemId) {
            $scope.items.splice(i,1);
            totalBillItem();
          }
          }
      };

      totalBillItem = function() {
        $scope.totalBillAmt=0;
       for(i=0; i<$scope.items.length; i++ ) { 
         $scope.totalBillAmt = $scope.totalBillAmt + $scope.items[i].itemPrice;
          }
      }


      $scope.updateItem = function(itemId,quantity) {
        $scope.itemId = itemId;
        $scope.quantity = quantity;
      };
});
