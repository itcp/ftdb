'use strict';

/**
 * @ngdoc function
 * @name yeomanProjectsApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the yeomanProjectsApp
 */
angular.module('yeomanProjectsApp')
  .controller('AboutCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
