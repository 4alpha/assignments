angular.module('ChaayWaayApp', ['ngMaterial', 'ngMessages'])
  .controller('DemoCtrl', function ($scope, $mdSidenav, $mdDialog) {
    $scope.openLeftMenu = function() {
      $mdSidenav('left').toggle();
    };

    $scope.days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

    $scope.paymentTypes = ['Credit', 'Cash on delivery'];

    $scope.clearValue = function () {
      $scope.provide = null;
      $scope.type = null;
      $scope.delivery = null;
      $scope.weeklyOffDays = null;
      $scope.workingHours = null;
      $scope.paymentType = null;
   };

   $scope.save = function(ev) {
     if($scope.provide == undefined || $scope.type == undefined || $scope.delivery == undefined || $scope.weeklyOffDays == undefined || $scope.workingHours == undefined || $scope.paymentType == undefined){
       $mdDialog.show(
         $mdDialog.alert()
           .clickOutsideToClose(true)
           .title('ALERT')
           .textContent('Please fill up all information')
           .ok('Close')
           .targetEvent(ev)
           .parent(angular.element(document.querySelector('#right')))
         );
     } else {
          $mdDialog.show(
            $mdDialog.alert()
            .parent(angular.element(document.querySelector('#popupContainer')))
            .clickOutsideToClose(true)
            .title('Ok')
            .textContent('Data saved successfully')
            .ok('Close')
            .targetEvent(ev)
          );
    }
  };
})

  .config(function($mdThemingProvider) {
    $mdThemingProvider.theme('default')
      .primaryPalette('yellow')
      .dark();
   });




