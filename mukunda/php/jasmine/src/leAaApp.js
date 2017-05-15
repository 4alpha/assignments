'use strict'
var leaaApp = angular.module("LeAaApp", ['restangular']);
leaaApp.config(function(RestangularProvider) {
  RestangularProvider.setBaseUrl('/rest');
})

leaaApp.controller("UserCtrl", function($scope, Restangular) {
  var userSvc = Restangular.all('admin/users');
  var ctrl = this;
  ctrl.users = null;
  var userRestObjects = null;
  ctrl.getUsers = function() {
    userSvc.getList().then(function(data) {
      userRestObjects = data;
      ctrl.users = userRestObjects.plain();
      console.log(ctrl.users);
    }, function(error) {
      ctrl.users = [];
    });
  }

  ctrl.name = null;
  ctrl.email = null;
  ctrl.createUser = function() {
    // POST -> will create user -> database -> response -> http status => 201 => <id>
    // success callback -> getUsers -> show updated list
    // error callback -> create error
    var user = {};
    user.name = ctrl.name;
    user.email = ctrl.email;
    userSvc.post(user).then(function (data) {

      ctrl.getUsers();
    }, function(error) {

    });
  }

  ctrl.selectedUser = null;
  ctrl.updateUser = function() {
    // PUT => /users/<ID> => update object
    // error code ? http response code ?
    var user = Restangular.copy(getSelectedRestObject());
    user.name = ctrl.name;
    user.email = ctrl.email;
    user.put().then(function(id) {
      ctrl.getUsers();
    }, function(error) {

    });
  }

  ctrl.deleteUser = function() {
    // DELETE
    var user = Restangular.copy(getSelectedRestObject());

    user.remove().then(function (id) {
      ctrl.getUsers();
    }, function(error) {

    });
  }

  function getSelectedRestObject() {
    for (var i = 0; i < userRestObjects.length; i++) {
      if (userRestObjects[i].id == ctrl.selectedUser) {
        return userRestObjects[i];
      }
    }
  }

  function init() {
    ctrl.getUsers();
  }
  init();
});