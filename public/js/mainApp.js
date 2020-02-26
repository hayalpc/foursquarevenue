var app = angular.module('mainApp', ['mainRoutes', 'ajaxService'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('mainController', ['$scope', '$http', 'AjaxService', function ($scope, $http, AjaxService) {
    $scope.categories = [];
    $scope.venues = [];
    $scope.near = "";
    $scope.query = "";
    $scope.limit = 10;

    var initializeCategories = function () {
        AjaxService.getCategories().then(function (data) {
            if (data.data.status == 1) {
                $scope.categories = data.data.categories;
            }else{
                $scope.categories = [];
                //TODO make something
            }
        });

        $scope.postExplore = function (query) {
            $scope.query = query;
            AjaxService.postExplore($scope.near, $scope.query, $scope.limit).then(function (data) {
                if (data.data.status == 1) {
                    $scope.venues = data.data.venues;
                    console.log($scope.venues);
                }else{
                    $scope.venues = [];
                    //TODO make something
                }
            });
        }
    };

    initializeCategories();
}]);