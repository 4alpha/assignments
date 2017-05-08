'use strict'
var leaaApp = angular.module("LeAaApp", ['restangular']);
leaaApp.config(function(RestangularProvider) {
  RestangularProvider.setBaseUrl('/rest');
})

leaaApp.controller("UserCtrl", function($scope, Restangular) {
  var ctrl = this;
  ctrl.users = null;
	ctrl.userName;
	ctrl.email;

  ctrl.getUsers = function() {
    var userSvc = Restangular.all('admin/users');
    userSvc.getList().then(function(data) {
      ctrl.users = data;
    }, function(error) {
      ctrl.users = [];
    });
  }

  ctrl.createUser = function() {
    var user = {name:ctrl.userName, email:ctrl.email}
    var userSvc = Restangular.all('admin/users');
    userSvc.post(user).then(function(data) {
      ctrl.getUsers();
		}, function(data) {
			$scope.errorMsg = 'failed to create new user';
			alert('unable to create user, please try agian...');
		});
  }

  ctrl.updateUser = function() {
    var user = {id:ctrl.id, name:ctrl.userName, email:ctrl.email}
    var userSvc = Restangular.all('admin/users');
    userSvc.patch(user).then(function(data) {
      ctrl.getUsers();
    }, function(data){
      alert('unable to update please try again');
    })
  };

  ctrl.deleteUser = function() {
    var userSvc = Restangular.all('admin/users');
    userSvc.remove(ctrl.id).then(function(data) {
      ctrl.getUsers();
    }, function(data) {
      alert("unable to delete user");
    });
  }


  function init() {
    ctrl.getUsers();
  }
  init();
});