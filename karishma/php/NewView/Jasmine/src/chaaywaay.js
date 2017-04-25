
  angular.module('ChaayWaayApp', [])
  .controller('DemoCtrl', function($scope) {
    
   $scope.selectedProductList = 0;
   $scope.items = [];
    $scope.totalBillAmt = 0;
    $scope.availableItems = [
      { id:1, name: 'Sugar', quantity:'1 Kg.', price:44},
      { id:2, name: 'Onion', quantity:'1 Kg.', price:24},
      { id:3, name: 'Panir', quantity:'1 Kg.', price:4 },
      { id:4, name: 'Potato', quantity:'1 Kg.', price:10}
    ];
    $scope.addItem = function(productId, productQuantity){
      menu = {};
      for(var i=0; i<$scope.availableItems.length; i++) {
        if($scope.availableItems[i].id == productId) {
          menu.id = productId;
          menu.name = $scope.availableItems[i].name;
          menu.quantity = productQuantity;
          menu.price = $scope.availableItems[i].price*productQuantity;
          $scope.items.push(menu);
          $scope.availableItems.splice(i,1);
      }
    }
      $scope.totalBill();
      $scope.selectedProduct();
    }

    $scope.avialable = function() {
      $scope.avialableCount = $scope.avialableCount-1;
    }

    $scope.selectedProduct = function() {
        $scope.selectedProductList = 0;
        for(var i=0; i<$scope.items.length; i++) {
        $scope.selectedProductList++;
      }
    }
  
    $scope.totalBill = function(){
      $scope.totalBillAmt = 0;
      for(var i=0; i<$scope.items.length; i++) {
        $scope.totalBillAmt = $scope.totalBillAmt + $scope.items[i].price;
      }
    }

    $scope.deleteItem = function(productId) {
      for(var i=0; i<$scope.items.length; i++) {
        if($scope.items[i].id == productId){
            $scope.items.splice(i,1);
            menu.id = productId;
            menu.name = $scope.items[i].name;
            menu.quantity = 1;
            menu.price = $scope.items[i].price/$scope.items[i].quantity;
            $scope.availableItems.push(menu);
        }
      }
      $scope.selectedProduct();
      $scope.totalBill();
    }
  
    $scope.updateItemList = function(productId,productQuantity){
       for(var i=0; i<$scope.items.length; i++) {
        if($scope.items[i].id == productId){
          var amt = ($scope.items[i].price/$scope.items[i].quantity)* productQuantity;
          $scope.items[i].quantity = productQuantity;
          $scope.items[i].price = amt;
      }
      }
      $scope.selectedProduct();
      $scope.totalBill();
    }
  })

  

  
