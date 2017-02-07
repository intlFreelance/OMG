var app = angular.module('app', ['ngMaterial'])
  .config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
  }).config(function($compileProvider) {
        $compileProvider.preAssignBindingsEnabled(true);
  });;