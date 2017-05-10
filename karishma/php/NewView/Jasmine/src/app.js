'use strict'
var leaaApp = angular.module("LeAaApp", ['restangular']);
  leaaApp.config(function(RestangularProvider) {
  RestangularProvider.setBaseUrl('/rest');
})



leaaApp.controller("UserCtrl", function($scope,$http, Restangular) {
  var ctrl = this;
  ctrl.users = null;
  ctrl.status = null;
  ctrl.getUsers = function() {
    var userSvc = Restangular.all('admin/users');
    userSvc.getList().then(function(data) {
      ctrl.users = data;
      ctrl.status = 201;
    }, function(error) {
      ctrl.users = [];
    });
  }

  ctrl.createUser = function() {
    var userSvc = Restangular.all('admin/users/createUser');
    userSvc.post({name:ctrl.name,email:ctrl.email}).then(function(data){ 
      ctrl.getUsers();
    }, function(error){
      ctrl.users = [];
    });
  }

  ctrl.updateUser = function() {
    var userSvc = Restangular.all('admin/users/id');
    userSvc.patch({id:ctrl.id, name:ctrl.name, email:ctrl.email}).then(function(data){ 
      ctrl.getUsers();
    }, function(error){
      ctrl.users = [];
    });
  }

  ctrl.deleteUser = function() { 
    var userSvc = Restangular.all('admin/users/2');
    var id = ctrl.id;
    userSvc.remove().then(function(id){ alert(id)
      ctrl.getUsers();
    }, function(error){
      ctrl.users = [];
    });
  }

  function init() {
    ctrl.getUsers();
  }
  init();
});