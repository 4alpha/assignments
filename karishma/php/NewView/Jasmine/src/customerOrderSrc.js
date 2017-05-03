angular.module('LeAaApp', [])
.controller('customerOrderCtrl', function($scope) {
   $scope.totalBillAmt = 0;
   $scope.orderView = true;
   $scope.createOrderForm = false;
   $scope.selectedProvider = null;
   $scope.selectedList = [];
   $scope.done = false;
   $scope.save = false;
   $scope.createOrder = function() {
    $scope.availableList = [
      { id:1, name: 'Sugar', quantity:'1 Kg.', price:44},
      { id:2, name: 'Onion', quantity:'1 Kg.', price:24},
      { id:3, name: 'Panir', quantity:'1 Kg.', price:4 },
      { id:4, name: 'Potato', quantity:'1 Kg.', price:10}
    ];
    if($scope.availableList == null) {
      alert("error in fetching");
    } else {
    $scope.orderView = false;
     $scope.createOrderForm = true;
     $scope.onSelect(1);
     $scope.onSelect(2);
     $scope.totalBill();
    }
   }

   $scope.selectedProvider = function(providerId) {
      $scope.done = true;
      $scope.finalOrder = $scope.selectedList;
      $scope.productProvider = [
       {1:[
        { id:1, name: 'Sugar', quantity:'1 Kg.', price:40},
        { id:2, name: 'Onion', quantity:'1 Kg.', price:24},
        { id:3, name: 'Panir', quantity:'1 Kg.', price:4 },
        { id:4, name: 'Potato', quantity:'1 Kg.', price:10}]},
      {2:[
        { id:1, name: 'Sugar', quantity:'1 Kg.', price:44},
        { id:2, name: 'Onion', quantity:'1 Kg.', price:24},
        { id:3, name: 'Panir', quantity:'1 Kg.', price:4 },
        { id:4, name: 'Potato', quantity:'1 Kg.', price:10}]}
      ];
      for(var j=0;j<$scope.productProvider.length;j++) {
        if($scope.productProvider[j]==providerId) {
          for(var i=0;i<$scope.productProvider[j].length;i++) {
            if($scope.productProvider[j].id == finalOrder[j].id) {
              $scope.finalOrder[j].price = $scope.productProvider[j].price;
            }
          }
        }
      }
   }

   $scope.onSelect = function(productId) {
    menu = {};
      for(var i=0; i<$scope.availableList.length; i++) {
      if($scope.availableList[i].id == productId) {
        menu.id = productId;
        menu.name = $scope.availableList[i].name;
        menu.quantity = $scope.availableList[i].quantity;
        menu.price = $scope.availableList[i].price;
        $scope.selectedList.push(menu);
        $scope.availableList.splice(i,1);
      }
    }
    $scope.selectedCount();
    $scope.totalBill();
  }

  $scope.updateQuantity = function(productId,quantity) {
    for(var i=0; i<$scope.selectedList.length; i++) {
      if($scope.selectedList[i].id == productId){
        $scope.selectedList[i].quantity = quantity;
        $scope.selectedList[i].price = $scope.selectedList[i].price* quantity;
      }
    }
    $scope.totalBill();
  }

  $scope.deleteProduct = function(productId) {
    for(var i=0; i<$scope.selectedList.length; i++) {
      if($scope.selectedList[i].id == productId){
          $scope.selectedList.splice(i,1);
          menu.id = productId;
          menu.name = $scope.selectedList[i].name;
          menu.quantity = 1;
          menu.price = $scope.selectedList[i].price/$scope.selectedList[i].quantity;
          $scope.availableList.push(menu);
      }
    }
        $scope.selectedCount();
    $scope.totalBill();
  }

  $scope.totalBill = function() {
    $scope.totalBillAmt = 0;
      for(var i=0; i<$scope.selectedList.length; i++) {
        $scope.totalBillAmt = $scope.totalBillAmt + $scope.selectedList[i].price;
      }
  }

   $scope.selectedCount = function() {
        $scope.selectedListCount = 0;
        $scope.availableListCount = 0;
        for(var i=0; i<$scope.selectedList.length; i++) {
        $scope.selectedListCount++;
      }
      for(var i=0; i<$scope.availableList.length; i++) {
        $scope.availableListCount++;
      }
    }
    
  })


