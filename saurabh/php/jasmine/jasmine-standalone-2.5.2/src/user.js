'use strict'
var userApp = angular.module("UserApp", ['restangular']);
userApp.config(function (RestangularProvider) {
  RestangularProvider.setBaseUrl('/js');
})

userApp.controller("UserCtrl", function ($scope, Restangular) {
  var userSvc = Restangular.all('admin/users');
  var ctrl = this;
  ctrl.users = null;
  var userRestObjects = null;
  ctrl.name = null;
  ctrl.email = null;
  ctrl.selectedUser = null;

  ctrl.getUsers = function () {
    userSvc.getList().then(function (data) {
      userRestObjects = data;
      ctrl.users = userRestObjects.plain();
    }, function (error) {
      ctrl.users = [];
    });
  }

  ctrl.createUser = function () {
    var user = {};
    user.name = ctrl.name;
    user.email = ctrl.email;
    userSvc.post(user).then(function (data) {
      ctrl.getUsers();
    }, function (error) {
      alert("try again ");
    });
  }

  ctrl.updateUser = function () {
    var user = Restangular.copy(getSelectedRestObj());
    user.name = ctrl.name;
    user.email = ctrl.email;
    user.put().then(function (id) {
      ctrl.getUsers();
    }, function (error) {
      alert("try again not updated");
    });
  }

  ctrl.deleteUser = function (idd) {
    var user = Restangular.copy(getSelectedRestObj());
    user.remove().then(function (id) {
      ctrl.getUsers();
    }, function (error) {
      alert("try again not deleted");
    });
  }

  function getSelectedRestObj() {
    for (var i = 0; i < userRestObjects.length; i++)
      if (userRestObjects[i].id = ctrl.selectedUser)
        return userRestObjects[i];
  }

  function init() {
    ctrl.getUserList();
  }

  init();
});