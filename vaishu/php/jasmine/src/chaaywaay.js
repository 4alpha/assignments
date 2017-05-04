  angular.module('ChaayWaayApp', [])
    .controller('DemoCtrl', function($scope,$http) {
    $scope.openLeftMenu = function() {
      $mdSidenav('left').toggle();
    };

    //  $scope.avaliableItems = [
    //    { itemId: 1, ItemName: "Methi", itemQuantity: "1.Kilogram", itemPrice: 30 },
    //    { itemId: 2, ItemName: "Potato", itemQuantity: "1.Kilogram", itemPrice: 10 },
    //    { itemId: 3, ItemName: "Val", itemQuantity: "1.Kilogram", itemPrice: 10 },
    //    { itemId: 4, ItemName: "Shimla", itemQuantity: "1.Kilogram", itemPrice: 25 }
    //  ];
     
    $scope.avaliableItems = [];
    //   $http.get("./avaliableTable.json").success( function(response) {
    //     $scope.avaliableItems = response; 
    //     alert("hii");
    //   });
    $http.get("./avaliableTable.json").success( function(response) {
        $scope.avaliableItems = response; 
      });
      
      $scope.totalBillAmt = 0;
      $scope.items = [];
      $scope.addItem = function(itemId, itemQuantity) {
        selectedItem = {};
        for(var i=0; i<$scope.avaliableItems.length; i++){
          if($scope.avaliableItems[i].itemId == itemId) {
            selectedItem.itemId = itemId;
            selectedItem.itemName = $scope.avaliableItems[i].itemName;
            selectedItem.itemQuantity = itemQuantity;
            selectedItem.itemPrice = $scope.avaliableItems[i].itemPrice*itemQuantity;
            $scope.items.push(selectedItem);
            $scope.avaliableItems.splice(i,1);
          }
        }
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
    
    $scope.updateItem = function(itemId,itemQuantity) {
        var itemName = "temporary";
        var price = 0;
        for(i=0; i<$scope.items.length; i++ ) { 
          if($scope.items[i].itemId == itemId) {
            if($scope.items[i].itemPrice != 0 && $scope.items[i].itemQuantity != 0) {
              price = ($scope.items[i].itemPrice / $scope.items[i].itemQuantity) * itemQuantity;
              $scope.items[i].itemPrice = price;
            }
         }
       }
       totalBillItem();
    };
});
