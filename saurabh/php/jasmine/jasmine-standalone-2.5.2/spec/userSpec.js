'use strict'

describe("UserApp", function () {
  beforeEach(angular.mock.module('UserApp'));

  var httpBackend, userData;
  beforeEach(inject(function (_$httpBackend_) {
    httpBackend = _$httpBackend_;
    userData = [{
        id: 1,
        name: 'saurabh',
        email: 'saurabh@4alpha.in'
      },
      {
        id: 2,
        name: 'prashant',
        email: 'prashant@4alpha.in'
      }
    ];
  }));
  var $controller;
  beforeEach(inject(function (_$controller_) {
    $controller = _$controller_;
  }));

  afterEach(function () {
    httpBackend.verifyNoOutstandingExpectation();
    httpBackend.verifyNoOutstandingRequest();
  });

  describe('UserCtrl', function () {
    it('should define users collection', function () {
      var ctrl = $controller('UserCtrl', {
        $scope: {}
      });
      expect(ctrl.users).toBeDefined();
    });

    it('should have return list of users on intialization', function () {
      httpBackend.whenGET('/js/users').respond(userData);
      var ctrl = $controller('UserCtrl', {
        $scope: {}
      });
      httpBackend.flush();
      expect(ctrl.users).toEqual(jasmine.any(Array));
      expect(ctrl.users.length).toEqual(2);
    });

    it("it should have create user and show updated list", function () {
      httpBackend.whenGET('/js/users').respond(userData);
      var ctrl = $controller('UserCtrl', {
        $scope: {}
      });
      httpBackend.whenPOST('/js/users').respond(function (method, url, data) {
        var newUser = angular.fromJson(data);
        console.log(newUser);
        newUser.id = 3;
        userData.push(newUser)
        return [201, 3];
      });
      ctrl.name = 'dfkxhg';
      ctrl.email = 'kfh@alpha.in';
      ctrl.createUser();
      httpBackend.flush();
      expect(ctrl.users.length).toEqual(3);
    })

    it("it should have update user and show new list", function () {
      httpBackend.whenGET('/js/users').respond(userData);
      var ctrl = $controller('UserCtrl', {
        $scope: {}
      });

      httpBackend.whenPATCH('/js/users').respond(function (method, url, data) {
        console.log(angular.fromJson(data));
        userData.forEach(function (element) {
          if (element.id == 2) {
            element.name = "xyz";
            element.email = "xyz@a.in";
            ctrl.message = "updated successfully";
          }
        })
        return [201, 201];
      });
      ctrl.updateUser(2);
      httpBackend.flush();
      console.log(userData);
      expect(ctrl.users[1].name).toEqual("xyz");
      expect(ctrl.users[1].email).toEqual("xyz@a.in");
      expect(ctrl.message).toEqual("updated successfully")
    })

    it("should have delete the user and return list", function () {
      httpBackend.whenGET('/js/users').respond(userData);
      var ctrl = $controller('UserCtrl', {
        $scope: {}
      });
      var deleteID = null;
      httpBackend.whenDELETE('/js/users').respond(function (method, url, data) {
        console.log(data);
        var deletUser = angular.fromJson(data);
        console.log(deletUser);
        userData.forEach(function (element) {
          if (element.id == 1) {
            userData.splice(element, 1);
            ctrl.message = "deleted successfully";
          }
        })
        return [201, 201];
      });
      ctrl.id = 1;
      ctrl.deleteUser(2);
      httpBackend.flush();
      expect(ctrl.users.length).toBe(1);
    });
  })
});