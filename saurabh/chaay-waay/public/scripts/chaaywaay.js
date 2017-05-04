  angular.module('ChaayWaayApp', ['ngMaterial', 'ngMessages'])
    .controller('DemoCtrl', function ($scope, $mdSidenav, $http) {
      $scope.openLeftMenu = function () {
        $mdSidenav('left').toggle();
      };



      $http({
        method: "GET",
        url: "display.php"
      }).then(function mySucces(response) {
          console.log(response.data);
          $scope.items = response.data;
        },
        function myError(response) {
          $scope.myWelcome = response.statusText;
        });


      $scope.selectedItems = [];

      // $scope.items = [{
      //     itemName: 'Sausage',
      //     price: 25
      //   },
      //   {
      //     itemName: 'Black Olives',
      //     price: 50
      //   },
      //   {
      //     itemName: 'Green Peppers',
      //     price: 25
      //   },
      //   {
      //     itemName: 'Pepperoni',
      //     price: 50
      //   },
      //   {
      //     itemName: 'Sausage',
      //     price: 25
      //   },
      //   {
      //     itemName: 'Black Olives',
      //     price: 50
      //   },
      //   {
      //     itemName: 'Green Peppers',
      //     price: 25
      //   }
      // ];

      $scope.addItem = function (item) {
        $scope.selectedItems.push(item);
      }
    })

    .config(function ($mdThemingProvider) {
      // Configure a dark theme with primary foreground yellow
      $mdThemingProvider.theme('default')
        .primaryPalette('yellow')
        .dark();
    });