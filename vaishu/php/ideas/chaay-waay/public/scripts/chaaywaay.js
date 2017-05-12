  angular.module('ChaayWaayApp', ['ngMaterial', 'ngMessages'])
  .controller('DemoCtrl', function($scope,  $mdSidenav) {
    $scope.openLeftMenu = function() {
      $mdSidenav('left').toggle();
    };
    $scope.minlength = 3;
    $scope.maxlength = 10;
    $scope.pattern = /^[a-zA-Z\s]+$/;
    $scope.items = [
        { ItemName: "Methi", QuantityUnit: "1.Kg", Price: 30 },
        { ItemName: "Potato", QuantityUnit: "1.Kg", Price: 10 },
        { ItemName: "Val", QuantityUnit: "1.Kg", Price: 10 },
        { ItemName: "Shimla", QuantityUnit: "1.Kg", Price: 25 },
        { ItemName: "Tomato", QuantityUnit: "1.Kg", Price: 20 },
        { ItemName: "matar", QuantityUnit: "1.Kg", Price: 60 },
        { ItemName: "flavar", QuantityUnit: "1.Kg", Price: 30 },
        { ItemName: "Kobi", QuantityUnit: "1.Kg", Price: 40 },
        { ItemName: "Tomato", QuantityUnit: "1.Kg", Price: 20 },
        { ItemName: "Tomato", QuantityUnit: "1.Kg", Price: 20 },
      ];
    
    
        this.items = [];
        for (var i = 0; i < 1000; i++) {
          var j = {};
          j.key = i;
          j.squared = i*i;
          this.items.push(j);
        }
      
      $scope.IsHidden = true;
      $scope.ShowHide = function () {
        $scope.IsHidden = $scope.IsHidden ? false : true;
      }
  })
  .config(function($mdThemingProvider) {
    // Configure a dark theme with primary foreground yellow
    $mdThemingProvider.theme('default')
      .primaryPalette('yellow')
      .dark();

    

  });
