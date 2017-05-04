 angular.module('ChaayWaayApp', [])
    .controller('GlobalMenuListController', function($scope,$http) {
    
      $scope.items = [
         { id: 1, name: "Methi", quantity: "1.Kilogram", price: 30 },
         { id: 2, name: "Potato", quantity: "1.Kilogram", price: 10 },
         { id: 3, name: "Val", quantity: "1.Kilogram", price: 10 },
         { id: 4, name: "Shimla", quantity: "1.Kilogram", price: 25 }
      ];

      cleanFormInputs();

      $scope.showForm = false;

      function cleanFormInputs() {
        $scope.id = "";
        $scope.name = "";
        $scope.quantity = "";
        $scope.price = "";
      }

      $scope.addItem = function() {
        $scope.showForm = true;
        cleanFormInputs();
      }

      $scope.saveItem = function(id,name,quantity,price) {
        var item = {};
        item.id = $scope.id;
        item.name = $scope.name;
        item.quantity = $scope.quantity;
        item.price = $scope.price;
        server.save(item, function(data){
          $scope.getList();
        },
        function(){
          $scope.items = [];
          $scope.showError();
        });
      };

      $scope.deleteItem = function(id) {
        for(i=0; i<$scope.items.length; i++ ) { 
         if($scope.items[i].id == id) {
           $scope.items.splice(i,1);
         }
       }
      };

      $scope.updateItem = function(id,name,quantity,price) {
        for(i=0; i<$scope.items.length; i++ ) { 
          if($scope.items[i].id == id) {
             $scope.items.splice(i,1);
          }
        }
        var item = {};
        item.id = $scope.id;
        item.name = $scope.name;
        item.quantity = $scope.quantity;
        item.price = $scope.price;
        server.save(item, function(data){
          $scope.getList();
        },
        function(){
          $scope.items = [];
          $scope.showError();
        });
        
     };
});

 