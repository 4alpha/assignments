zangular.module('ChaayWaayApp', ['ngMaterial', 'ngMessages']);
  
  app.controller('DemoCtrl', function($scope,  $mdSidenav) {
    $scope.openLeftMenu = function() {
      $mdSidenav('left').toggle();
    };
    
    $scope.orders = [
      { customer_id:1, customer_name: 'Prashant', date: '2017-09-22', total: '1254/-' },
      { customer_id:2, customer_name: 'Saurabh', date: '2017-09-22', total: '1254/-' },
      { customer_id:55, customer_name: 'Mukund', date: '2017-09-22', total: '1254/-' },
      { customer_id:12, customer_name: 'Nilesh', date: '17-09-22' , total: '1254/-' },
      { customer_id:132, customer_name: 'Pallavi', date: '17-09-22' , total: '0/-' }
    ];
  });
  app.controller('customerOrder', function($scope, $mdSidenav) {
     $scope.openLeftMenu = function() {
      $mdSidenav('left').toggle();
  };


  });

  app.config(function($mdThemingProvider) {
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
