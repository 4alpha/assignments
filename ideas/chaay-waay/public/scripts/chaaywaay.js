  angular.module('ChaayWaayApp', ['ngMaterial', 'ngMessages'])
  .controller('DemoCtrl', function($scope,  $mdSidenav) {
    $scope.openLeftMenu = function() {
      $mdSidenav('left').toggle();
    };
  })
  .config(function($mdThemingProvider) {
    // Configure a dark theme with primary foreground yellow
    $mdThemingProvider.theme('default')
      .primaryPalette('yellow')
      .dark();

    // $urlRouterProvider.otherwise('/home');
    
    // $stateProvider
    //   .state('home', {
    //     url: '/home',
    //     templateUrl: './views/venderregistration.html'
    //     //
    //   })

  });
