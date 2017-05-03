describe('angularTest', function () {
  beforeEach(angular.mock.module('ChaayWaayApp'));
  var $controller;
  beforeEach(angular.mock.inject(function(_$controller_){
	  $controller = _$controller_;
	}));

  describe("add  test", function(){
    it("add from disply test", function(){
         $scope ={};
         var controller = $controller("GlobalMenuListController",{$scope: $scope});
         $scope.addItem();
         expect($scope.id).toBe('');
         expect($scope.name).toBe('');
         expect($scope.quantity).toBe('');
         expect($scope.price).toBe('');
    });
  }); 

 describe("save item test", function(){
    it("save item in database", function(){
         $scope ={};
         var controller = $controller("GlobalMenuListController",{$scope: $scope});
         $scope.addItem();
         $scope.saveItem(5, "babycorn", 1, 40);
         expect($scope.items.length).toBe(5);
    });
 }); 

 describe("delete  test", function(){
    it("delete element items test", function(){
         $scope ={};
         var controller = $controller("GlobalMenuListController",{$scope: $scope});
         $scope.addItem();
         $scope.saveItem(5, "babycorn", 1, 40);
         expect($scope.items.length).toBe(5);
         $scope.saveItem(6, "flaver", 1, 20);
         expect($scope.items.length).toBe(6);
         $scope.deleteItem(4);
         expect($scope.items.length).toBe(5);
    });
  }); 

  describe("Update  test", function(){
    it("Update element items test", function(){
         $scope ={};
         var controller = $controller("GlobalMenuListController",{$scope: $scope});
         $scope.saveItem(5, "babycorn", 1, 40);
         expect($scope.items.length).toBe(5);
         
  });

    it("Update element itemsPrice test", function(){
        $scope ={};
        var controller = $controller("GlobalMenuListController",{$scope: $scope});
        $scope.addItem();
        expect($scope.items.length).toBe(4);
        $scope.saveItem(5, "babycorn", 1, 20);
        expect($scope.items.length).toBe(5);
        $scope.updateItem(5, "babycorn", 1, 40);
        expect($scope.items.length).toBe(5);
        for(i=0; i<$scope.items.length; i++ ) { 
          if($scope.items[i].itemId == 5) {
            expect($scope.items[i].itemPrice).toBe(40);
          }
        }
    });
   
    it("Update element itemsQuantity test", function(){
        $scope ={};
        var controller = $controller("GlobalMenuListController",{$scope: $scope});
        $scope.addItem();
        $scope.saveItem(5,"babycorn",1,40);
        expect($scope.items.length).toBe(5);
        $scope.updateItem(5,"babycorn",1,40);
        expect($scope.items.length).toBe(5);
        for(i=0; i<$scope.items.length; i++ ) { 
            if($scope.items[i].itemId == 5) {
              expect($scope.items[i].itemQuantity).toBe(1);
            }
        }
    });
  });

  describe("Test GlobalMenuListController", function() {
    it("Empty items on initialization", function() {
      $scope ={};
      var controller = $controller("GlobalMenuListController",{$scope: $scope});
        expect($scope.items.length).toBe(4);
    });
  });

});
   
   
