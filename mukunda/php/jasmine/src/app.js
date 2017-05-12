
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

  ctrl.createUser = function () {
    var userSvc = Restangular.all('admin/users');
    var user = {
          name: ctrl.name,
          email: ctrl.email
    }
    userSvc.post(user).then(function (data) {
      // console.log(data);
      ctrl.status = 201;
      ctrl.getUsers();
    }, function (error) {
      alert("user not created please try again");
    })
  }

  ctrl.updateUser = function () {
    var userSvc = Restangular.all('admin/users');
    userSvc.patch({ id: ctrl.id, name:ctrl.name, email:ctrl.email}).then(function (data) {
      //console.log(ctrl.users.length);
      ctrl.getUsers();
      //console.log(ctrl.users.length);
    }, function (error) {
      alert("id not found");
    });
  }

  ctrl.deleteUser = function () {
    var userSvc = Restangular.all('admin/users');
    alert(ctrl.id);
    console.log(ctrl.users.length);
    userSvc.remove({ id: ctrl.id }).then(function (data) {
     alert(data);
      ctrl.getUsers();
    }, function(error) {
      alert("id not found");
    });
  }

  function init() {
    ctrl.getUsers();
  }
  init();
});