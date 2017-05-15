//   angular.module('ChaayWaayApp', [])
//     .controller('DemoCtrl', function($scope) {
//       $scope.openLeftMenu = function() {
//       $mdSidenav('left').toggle();
//     };

//      $scope.avaliableItems = [
//        { itemId: 1, ItemName: "Methi", itemQuantity: "1.Kilogram", itemPrice: 30 },
//        { itemId: 2, ItemName: "Potato", itemQuantity: "1.Kilogram", itemPrice: 10 },
//        { itemId: 3, ItemName: "Val", itemQuantity: "1.Kilogram", itemPrice: 10 },
//        { itemId: 4, ItemName: "Shimla", itemQuantity: "1.Kilogram", itemPrice: 25 }
//      ];

//       $scope.totalBillAmt = 0;
//       $scope.items = [];
//       $scope.addItem = function(itemId, itemQuantity) {
//         selectedItem = {};
//         for(var i=0; i<$scope.avaliableItems.length; i++){
//           if($scope.avaliableItems[i].itemId == itemId) {
//             selectedItem.itemId = itemId;
//             selectedItem.itemName = $scope.avaliableItems[i].itemName;
//             selectedItem.itemQuantity = itemQuantity;
//             selectedItem.itemPrice = $scope.avaliableItems[i].itemPrice*itemQuantity;
//             $scope.items.push(selectedItem);
//             $scope.avaliableItems.splice(i,1);
//           }
//         }
//        totalBillItem();
//      };
    
//      $scope.deleteItem = function(itemId) {
//        for(i=0; i<$scope.items.length; i++ ) { 
//          if($scope.items[i].itemId == itemId) {
//            $scope.items.splice(i,1);
//            totalBillItem();
//          }
//        }
//      };
    
//     totalBillItem = function() {
//       $scope.totalBillAmt=0;
//         for(i=0; i<$scope.items.length; i++ ) { 
//           $scope.totalBillAmt = $scope.totalBillAmt + $scope.items[i].itemPrice;
//         }
//     }
    
//     $scope.updateItem = function(itemId,itemQuantity) {
//         var itemName = "temporary";
//         var price = 0;
//         for(i=0; i<$scope.items.length; i++ ) { 
//           if($scope.items[i].itemId == itemId) {
//             if($scope.items[i].itemPrice != 0 && $scope.items[i].itemQuantity != 0) {
//               price = ($scope.items[i].itemPrice / $scope.items[i].itemQuantity) * itemQuantity;
//               $scope.items[i].itemPrice = price;
//             }
//          }
//        }
//        totalBillItem();
//     };
// });
//   angular.module('ChaayWaayApp', [])
//     .controller('DemoCtrl', function($scope) {
//       $scope.openLeftMenu = function() {
//       $mdSidenav('left').toggle();
//     };
//      $scope.avaliableItems[
//        { itemId: 1, ItemName: "Methi", QuantityUnit: "1.Kilogram", Price: 30 },
//        { itemId: 2, ItemName: "Potato", QuantityUnit: "1.Kilogram", Price: 10 },
//        { itemId: 3, ItemName: "Val", QuantityUnit: "1.Kilogram", Price: 10 },
//        { itemId: 4, ItemName: "Shimla", QuantityUnit: "1.Kilogram", Price: 25 }
//      ];

//       $scope.totalBillAmt = 0;
//       $scope.items = [];
//       $scope.addItem = function(itemId,itemName,itemQuantity,itemPrice) {
//         selectedItem = {};
//         selectedItem.itemId = itemId;
//         selectedItem.itemName = itemName;
//         selectedItem.itemQuantity = itemQuantity;
//         selectedItem.itemPrice = itemPrice;
//         $scope.items.push(selectedItem);
//         totalBillItem();
//      };

//       $scope.deleteItem = function(itemId) {
//         for(i=0; i<$scope.items.length; i++ ) { 
//           if($scope.items[i].itemId == itemId) {
//             $scope.items.splice(i,1);
//             totalBillItem();
//           }
//           }
//       };

//       totalBillItem = function() {
//         $scope.totalBillAmt=0;
//        for(i=0; i<$scope.items.length; i++ ) { 
//          $scope.totalBillAmt = $scope.totalBillAmt + $scope.items[i].itemPrice;
//           }
//       }


//       $scope.updateItem = function(itemId,quantity) {
//         $scope.itemId = itemId;
//         $scope.quantity = quantity;
//       };
// });

// // ////////////////////////////////////////////////////
// // GlobalmenuListspec
// describe('angularTest', function () {
//   beforeEach(angular.mock.module('ChaayWaayApp'));
//   var $controller;
//   beforeEach(angular.mock.inject(function(_$controller_){
// 	  $controller = _$controller_;
// 	}));

//   describe("add  test", function(){
//     it("add from disply test", function(){
//          $scope ={};
//          var controller = $controller("GlobalMenuListController",{$scope: $scope});
//          $scope.addItem();
//          expect($scope.id).toBe('');
//          expect($scope.name).toBe('');
//          expect($scope.quantity).toBe('');
//          expect($scope.price).toBe('');
//     });
//   }); 

//  describe("save item test", function(){
//     it("save item in database", function(){
//          $scope ={};
//          var controller = $controller("GlobalMenuListController",{$scope: $scope});
//          $scope.addItem();
//          $scope.saveItem(5, "babycorn", 1, 40);
//          expect($scope.items.length).toBe(5);
//     });
//  }); 

//  describe("delete  test", function(){
//     it("delete element items test", function(){
//          $scope ={};
//          var controller = $controller("GlobalMenuListController",{$scope: $scope});
//          $scope.addItem();
//          $scope.saveItem(5, "babycorn", 1, 40);
//          expect($scope.items.length).toBe(5);
//          $scope.saveItem(6, "flaver", 1, 20);
//          expect($scope.items.length).toBe(6);
//          $scope.deleteItem(4);
//          expect($scope.items.length).toBe(5);
//     });
//   }); 

//   describe("Update  test", function(){
//     it("Update element items test", function(){
//          $scope ={};
//          var controller = $controller("GlobalMenuListController",{$scope: $scope});
//          $scope.saveItem(5, "babycorn", 1, 40);
//          expect($scope.items.length).toBe(5);
         
//     });

//     it("Update element itemsPrice test", function(){
//         $scope ={};
//         var controller = $controller("GlobalMenuListController",{$scope: $scope});
//         $scope.addItem();
//         expect($scope.items.length).toBe(4);
//         $scope.saveItem(5, "babycorn", 1, 20);
//         expect($scope.items.length).toBe(5);
//         $scope.updateItem(5, "babycorn", 1, 40);
//         expect($scope.items.length).toBe(5);
//         for(i=0; i<$scope.items.length; i++ ) { 
//           if($scope.items[i].itemId == 5) {
//             expect($scope.items[i].itemPrice).toBe(40);
//           }
//         }
//     });
   
//     it("Update element itemsQuantity test", function(){
//         $scope ={};
//         var controller = $controller("GlobalMenuListController",{$scope: $scope});
//         $scope.addItem();
//         $scope.saveItem(5,"babycorn",1,40);
//         expect($scope.items.length).toBe(5);
//         $scope.updateItem(5,"babycorn",1,40);
//         expect($scope.items.length).toBe(5);
//         for(i=0; i<$scope.items.length; i++ ) { 
//             if($scope.items[i].itemId == 5) {
//               expect($scope.items[i].itemQuantity).toBe(1);
//             }
//         }
//     });
//   });

//   describe("Test GlobalMenuListController", function() {
//     it("Empty items on initialization", function() {
//       $scope ={};
//       var controller = $controller("GlobalMenuListController",{$scope: $scope});
//         expect($scope.items.length).toBe(4);
//     });
//   });

// });



// //////////////////////////////////////////////////////////


   
   
