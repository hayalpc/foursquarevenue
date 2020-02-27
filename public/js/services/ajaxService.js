var app = angular.module('ajaxService', []);
app.service('AjaxService',
    [
        '$http',
        function ($http) {
            var api_path = 'ajax/';
            return {
                getCategories: function () {
                    return $http.get(api_path + 'get_categories');
                },
                postExplore: function (near,query,limit) {
                    var postFields = {
                        near:near,
                        qquery:query,
                        limit:limit
                    };
                    return $http.post(api_path + 'post_explore', postFields);
                }

            };
        }

    ]
);