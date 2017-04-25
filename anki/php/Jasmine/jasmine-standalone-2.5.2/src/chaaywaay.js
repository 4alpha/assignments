angular.module('ChaayWaayApp', [])
  .controller('customerViewContoller', function ($scope) {
    $scope.selectList = [];
    $scope.total = 0;
    $scope.availableList = [
      { id: '1', name: "Pen", quantity:'1', Price:'20' },
      { id: '2', name: "Pensil", quantity:'1', Price:'10' },
      { id: '3', name: "Sugar", quantity:'1', Price:'60' },
      { id: '4', name: "Orbit", quantity:'1', Price:'10' },
      { id: '5', name: "Watch", quantity:'1', Price:'200' },
      { id: '6', name: "Mobile", quantity:'1', Price:'5005' },
    ];

    $scope.addItem = function (id, quantity) {
      selectedItem = {};
      for (var i = 0; i < $scope.availableList.length; i++) {
        if (id == $scope.availableList[i].id) {
          selectedItem.id = id;
          selectedItem.name = $scope.availableList.name;
          selectedItem.quantity = quantity;
          selectedItem.Price = $scope.availableList[i].Price * quantity;
          $scope.selectList.push(selectedItem);
        }
      }
      calculateTotal();
    }

    calculateTotal = function () {
      $scope.total = 0;
      for (var i = 0; i < $scope.selectList.length; i++) {
        $scope.total = $scope.total + $scope.selectList[i].Price;
      }
    }

    $scope.updateItem = function (id, quantity) {
      for (var i = 0; i < $scope.selectList.length; i++) {
        if ($scope.selectList[i].id == id) {
          $scope.selectList[i].Price = ($scope.selectList[i].Price/$scope.selectList[i].quantity) * quantity;
          $scope.selectList[i].quantity = quantity;
        }
      }
      calculateTotal();
    }

    $scope.deleteItem = function (id) {
      for (var i = 0; i < $scope.selectList.length; i++) {
        if ($scope.selectList[i].id == id) {
          $scope.selectList.splice(i, 1);
          calculateTotal();
        }
      }
    }

    $scope.createNewOrder = function () {
      for (var i = 0; i < $scope.selectList.length; i++) {
        if ($scope.selectList[i].id == null) {
          calculateTotal();
        }
      }
    }

  });





