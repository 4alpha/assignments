'use strict'
var LeaaApp = angular.module("LeAaApp", ['restangular']);
  LeaaApp.config(function(RestangularProvider) {
  RestangularProvider.setBaseUrl('/rest');
})

LeaaApp.controller('customerOrder', function($scope,Restangular) {
  var ctrl = this;
  ctrl.selectedProducts = [];
  ctrl.availableList = [];
  ctrl.totalBillAmt = 0;
  var userRestObjects = null;
  ctrl.getProductsList = function() { 
      var userSvc = Restangular.all('order/get/globleList');
     ctrl.orderView = true;
    userSvc.getList().then(function(data) {
      userRestObjects = data; 
      ctrl.availableList = userRestObjects.plain();
    }, function(error) {
      ctrl.availableList = [];
    });
  }

 ctrl.getSelectedList = function() { 
     var userSvc = Restangular.all('customer/order/seelctedList');
    userSvc.getList().then(function(data) { 
      userRestObjects = data; 
      ctrl.selectedProducts = userRestObjects.plain();
    }, function(error) {
      ctrl.selectedProducts = [];
    });
  }

  ctrl.totalBill = function() {
    ctrl.totalBillAmt = 0;
    for(var i=0; i<ctrl.selectedProducts.length; i++) { 
       ctrl.totalBillAmt = ctrl.selectedProducts[i].price + ctrl.totalBillAmt; 
    }
    return ctrl.totalBillAmt;
  }

ctrl.onSelect = function() { 
    var userSvc = Restangular.all('customer/order/selectedList');
    var product = Restangular.copy(getSelectedRestObject());
    var selectedProduct = {};
    var userRestObjects = null;
    selectedProduct.id = product.id;
    selectedProduct.name = product.name;
    selectedProduct.quantity = product.quantity;
    selectedProduct.price = product.price;
    userSvc.post(selectedProduct).then(function(data) { 
      userRestObjects = data; 
      ctrl.selectedProducts = userRestObjects.plain();
      ctrl.totalBillAmt = ctrl.totalBill();
      ctrl.removeFromGloble();
    },function(error) {
      ctrl.selectedProducts = [];
    });
  }

  ctrl.updateQuantity = function() { 
     var userSvc = Restangular.all('customer/order/selectedList/1');
    var product = Restangular.copy(getSelectedRestObject());
    product.id = ctrl.id;
    product.quantity = ctrl.quantity;
    product.price = ctrl.quantity * product.price;
    product.put().then(function(id){ 
      userRestObjects = id; 
      ctrl.selectedProducts = userRestObjects.plain();
      ctrl.totalBillAmt = ctrl.totalBill();
    },function(error) {
      ctrl.selectedProducts = [];
    })
   
  }
  
  ctrl.removeFromGloble = function(){ 
    var userSvc = Restangular.all('customer/order/availableList/1');
    var product = Restangular.copy(getSelectedRestObject());
    for(var i=0; i<ctrl.availableList.length; i++) { 
      if(ctrl.availableList[i].id == product.id){
          ctrl.availableList.splice(i,1);
      }
    }
  }

   function getSelectedRestObject() {
    for (var i = 0; i < userRestObjects.length; i++) {
      if (userRestObjects[i].id == ctrl.id) {
        return userRestObjects[i];
      }
    }
  }
  //  var cntrl = this;
  //  cntrl.totalBillAmt = 0;
  //  cntrl.orderView = true;
  //  cntrl.createOrderForm = false;
  //  cntrl.selectedProvider = null;
  //  cntrl.selectedList = [];
  //  cntrl.done = false;
  //  cntrl.save = false;
  //  cntrl.createOrder = function() {
    
  //   cntrl.getProducts = function() {
  //      var userSvc = Restangular.all('customer/products');
  //       userSvc.getList().then(function(data) {
  //         ctrl.users = data;
  //         ctrl.status = 201;
  //       }, function(error) {
  //         ctrl.users = [];
  //       });

  //   }
  //   $scope.orderView = false;
  //    $scope.createOrderForm = true;
  //    $scope.onSelect(1);
  //    $scope.onSelect(2);
  //   //  $scope.totalBill();
  //   }
  

  //  $scope.selectedProvider = function(providerId) {
  //     $scope.done = true;
  //     $scope.orderView = true;
  //     $scope.createOrderForm = false;
  //     $scope.finalOrder = $scope.selectedList;
  //     $scope.productProvider = [
  //      {1:[
  //       { id:1, name: 'Sugar', quantity:'1 Kg.', price:40},
  //       { id:2, name: 'Onion', quantity:'1 Kg.', price:24},
  //       { id:3, name: 'Panir', quantity:'1 Kg.', price:4 },
  //       { id:4, name: 'Potato', quantity:'1 Kg.', price:10}]},
  //     {2:[
  //       { id:1, name: 'Sugar', quantity:'1 Kg.', price:44},
  //       { id:2, name: 'Onion', quantity:'1 Kg.', price:24},
  //       { id:3, name: 'Panir', quantity:'1 Kg.', price:4 },
  //       { id:4, name: 'Potato', quantity:'1 Kg.', price:10}]}
  //     ];
  //     for(var j=0;j<$scope.productProvider.length;j++) {
  //       if(Object.keys($scope.productProvider[j])==providerId) {
  //         alert(Object.entries(Object.keys(1)));
  //         for(var i=0;i<$scope.productProvider[j].length;i++) {
  //           if($scope.productProvider[j].id == finalOrder[j].id) {
  //             $scope.finalOrder[j].price = $scope.productProvider[j].price;
  //           }
  //         }
  //       }
  //     }
  //    $scope.totalBill();
  //  }

  //  $scope.onSelect = function(productId) {
  //   menu = {};
  //     for(var i=0; i<$scope.availableList.length; i++) {
  //     if($scope.availableList[i].id == productId) {
  //       menu.id = productId;
  //       menu.name = $scope.availableList[i].name;
  //       menu.quantity = $scope.availableList[i].quantity;
  //       menu.price = $scope.availableList[i].price;
  //       $scope.selectedList.push(menu);
  //       $scope.availableList.splice(i,1);
  //     }
  //   }
  //   $scope.selectedCount();
  //   $scope.totalBill();
  // }

  // $scope.updateQuantity = function(productId,quantity) {
  //   for(var i=0; i<$scope.selectedList.length; i++) {
  //     if($scope.selectedList[i].id == productId){
  //       $scope.selectedList[i].quantity = quantity;
  //       $scope.selectedList[i].price = $scope.selectedList[i].price* quantity;
  //     }
  //   }
  //   $scope.totalBill();
  // }

  // $scope.deleteProduct = function(productId) {
  //   for(var i=0; i<$scope.selectedList.length; i++) {
  //     if($scope.selectedList[i].id == productId){
  //         $scope.selectedList.splice(i,1);
  //         menu.id = productId;
  //         menu.name = $scope.selectedList[i].name;
  //         menu.quantity = 1;
  //         menu.price = $scope.selectedList[i].price/$scope.selectedList[i].quantity;
  //         $scope.availableList.push(menu);
  //     }
  //   }
  //       $scope.selectedCount();
  //   $scope.totalBill();
  // }

  // $scope.totalBill = function() {
  //   $scope.totalBillAmt = 0;
  //     for(var i=0; i<$scope.selectedList.length; i++) {
  //       $scope.totalBillAmt = $scope.totalBillAmt + $scope.selectedList[i].price;
  //     }
  // }

  //  $scope.selectedCount = function() {
  //       $scope.selectedListCount = 0;
  //       $scope.availableListCount = 0;
  //       for(var i=0; i<$scope.selectedList.length; i++) {
  //       $scope.selectedListCount++;
  //     }
  //     for(var i=0; i<$scope.availableList.length; i++) {
  //       $scope.availableListCount++;
  //     }
    // }
  });


