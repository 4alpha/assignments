'use strict'
var leaaApp = angular.module("LeAaApp", ['restangular']);
leaaApp.config(function(RestangularProvider) {
  RestangularProvider.setBaseUrl('/rest');
})

leaaApp.controller("UserCtrl", function($scope, Restangular) {
  var ctrl = this;
  ctrl.users = null;

  ctrl.getUsers = function() {
    var userSvc = Restangular.all('admin/users');
    userSvc.getList().then(function(data) {
      ctrl.users = data;
    }, function(error) {
      ctrl.users = [];
    });
  }

  ctrl.createUser = function() {
    var userSvc = Restangular.all('admin/users');
    userSvc.post({name: ctrl.name, email: ctrl.email}).then(function(data) {
      ctrl.getUsers();
    }, function(error) {
      ctrl.users = [];
    });
  }

  ctrl.updateUser = function(id) {
    var userSvc = Restangular.all('admin/users');
    userSvc.patch({id: ctrl.id, name: ctrl.name, email: ctrl.email}).then(function(data) {
      ctrl.getUsers();
    }, function(error) {
      ctrl.users = [];
    });
    
  }

  ctrl.deleteUser = function(id) {
    var userSvc = Restangular.all('admin/users');
    userSvc.remove({ id: 2 }).then(function(data) {
      ctrl.getUsers();
    }, function(error) {
      ctrl.users = [];
    });
   
  }


  function init() {
     ctrl.getUsers();
   
  }
  init();
});