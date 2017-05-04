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
    // POST -> will create user -> database -> response -> http status => 201 => <id>
    // success callback -> getUsers -> show updated list
    // error callback -> create error
  }

  ctrl.updateUser = function() {
    // PUT => /users/<ID> => update object
    // error code ? http response code ?
  }

  ctrl.deleteUser = function() {
    // DELETE
  }


  function init() {
    ctrl.getUsers();
  }
  init();
});