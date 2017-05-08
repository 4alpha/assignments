'use strict'
var userApp = angular.module("UserApp", ['restangular']);
userApp.config(function (RestangularProvider) {
  RestangularProvider.setBaseUrl('/js');
})

userApp.controller("UserCtrl", function ($scope, Restangular) {
  var ctrl = this;
  ctrl.users = null;
  ctrl.status = null;
  ctrl.deleteID = null;
  ctrl.deleteU = null;
  ctrl.getUserList = function () {
    var userService = Restangular.all('/users');
    userService.getList().then(function (data) {
      ctrl.users = data;
    }, function (error) {
      ctrl.users = [];
    });
    console.log(ctrl.users);
  }

  ctrl.createUser = function () {
    var userSvc = Restangular.all('/users');
    userSvc.post({
      name: ctrl.name,
      email: ctrl.email
    }).then(function (data) {
      ctrl.getUserList();
    }, function (error) {
      ctrl.users = [];
    });
  }
  ctrl.updateUser = function (updateID) {
    ctrl.id = updateID;
    var userSvc = Restangular.all('/users');
    var updatedUser = {
      name: ctrl.name,
      email: ctrl.email
    }
    userSvc.patch(
      updatedUser
    ).then(function (data) {
      console.log(data);
      ctrl.getUserList();
    }, function (error) {
      ctrl.users = [];
    });
  }

  ctrl.deleteUser = function (idd) {
    var userService = Restangular.all('/users');
    userService.remove({

      id: ctrl.id

    }).then(function (data) {
      var list = ctrl.getUserList();
      ctrl.status = data;
    }, function (error) {

      ctrl.status = "try again record not deleted";
    })
  }

  function init() {
    ctrl.getUserList();
  }

  init();
});