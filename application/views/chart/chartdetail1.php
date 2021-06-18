<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width" />
    <title>Index</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.js"></script>
    <script src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['corechart','orgchart']}]}"></script>
    <script src="~/Scripts/myApp.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/angular.js"></script>


    <style>
        #chart table {
            border-spacing: 0;
            border-collapse: separate;
        }

        #chart tr td {
            line-height: 15px;
        }

        .title {
            color: red;
        }

        .google-visualization--orgchart-node-medium {
            font-size: 13px;
        }
    </style>
</head>

<body ng-app="myApp">
    <div ng-controller="myController">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div id="chart" ng-model="chartData" org-chart="chartData" style="text-align:center">
            Please Wait...
        </div>
    </div>
</body>

</html>