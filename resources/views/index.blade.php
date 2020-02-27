@extends('layouts.main')

@section('content')
<div class="container" ng-app="mainApp" ng-controller="mainController">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Softlab Task</h1>
        </div>
        <div class="col-xs-4">
            <!--   <ul  ng-app="mainApp" ng-controller="mainController">
                   <li ng-repeat="list in lists">
                       <img ng-src="<% list.icon.prefix + '32' + list.icon.suffix %>"> <i><% list.name + ' (' + list.categories.length + ')'  %></i>
                   </li>
               </ul>-->

            <div style="*width:200px; float:left; margin:0 0px 20px 0">
                <div class="row">
                    <div class="col-xs-8">
                        <input type='text' ng-model='near' ng-change="postExplore()" class="form-control" placeholder="Near" ng-init="near = 'Valletta'">
                    </div>
                    <div class="col-xs-4">
                        <input type="number" ng-model='limit' ng-change="postExplore()" class="form-control" placeholder="Limit" ng-init="limit = 10">
                    </div>
                </div>

                <ul class="anyClass2 skinPlank">
                    <li ng-repeat="category in categories">
                        <a href="#" ng-click="postExplore(category.name);">
                            <img ng-src="<% category.icon.prefix + '32' + category.icon.suffix %>"> <% category.name + ' (' + category.categories.length + ')' %>
                        </a>
                        <ul ng-if="category.categories.length > 0">
                            <li ng-repeat="cat in category.categories">
                                <a href="#" ng-click="postExplore(cat.name);">
                                    <% cat.name + (cat.categories.length > 0 ? ' (' + cat.categories.length + ')' : '')%>
                                </a>
                                <ul ng-if="cat.categories.length > 0">
                                    <li ng-repeat="subcat in cat.categories">
                                        <a href="#" ng-click="postExplore(subcat.name);"><% subcat.name %></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <div class="col-xs-8">
            <div class="box" ng-repeat="venue in venues">
                <img ng-src="<% venue.venue.categories[0].icon.prefix + '64' + venue.venue.categories[0].icon.suffix %>">
                <br>
                <% venue.venue.name %>
            </div>

        </div>
    </div>
</div>
@endsection
