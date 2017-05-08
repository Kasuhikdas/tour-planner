<?php
session_start();
if (isset($_SESSION['type'])) {
  # code...

if ($_SESSION['type']!='admin') {
  header('Location:home.php');
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="style.css">
        <style media="screen">
        @import url(http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300ita‌​lic,400italic,500,500italic,700,700italic,900italic,900);
        html, html * {
            font-family: Roboto;
            font-weight: 400;
        }
        </style>

         <style media="screen">
        </style>
        </head>
        <body ng-app="myApp">
           <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
      <a class="navbar-brand " href="#" style="font-size:25px; font-family:Roboto; font-weight:300; color:white;">PlanIt</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a style="color:white;" href="#" data-toggle="modal" data-target="#Add_Tours"><span class="glyphicon "></span>Add Tour</a></li>
      <li><a style="color:white;" href="#" data-toggle="modal" data-target="#Add_Location"><span class="glyphicon "></span>Add Location</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">

      <li><a href="admin_logout.php">Logout</a></li>
    </ul>
  </div>

</nav>


 <!-- Modal content Add Tours-->





 <div class="modal fade" id="Add_Tours" role="dialog" style="margin-top:100px;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <p style="font-size:30px; font-family:Roboto; font-weight:300;">Add Tour</p>
        </div>
        <div class="modal-body"  ng-controller="myCtrl">
            <div class="logdiv">
            <form class="form-group">
                <input class="logintextbox" type="text" ng-model="tname" placeholder="Place" required />
                <input type="text" name="name" ng-model="tourname" class="logintextbox" placeholder="Tour Name" required>
                 <input class="logintextbox" type="file" onchange="angular.element(this).scope().setFile(this)" required />
               <input class="loginbtn" type="submit" name="Add Tour" ng-click="insertData()">
               
              </form>
            </div>
          </div>
        <!-- <div class="modal-footer">
            <p><a href="#" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Login</a></p>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>

    </div>

  </div>
  <script>
    var app = angular.module('myApp',[]);
    app.controller('myCtrl',function($scope,$http){    
       
         $scope.setFile = function(element) {
        $scope.$apply(function($scope) {
            $scope.theFile = element.files[0];
        });
    };  
        $scope.insertData=function(){    
         
            $http.post("add_tour.php", {
                'tname':$scope.tname,
                'image':$scope.theFile.name,
                'tourname':$scope.tourname
            }).then(function(response){
                    console.log("Data Inserted Successfully");
                    location.reload();
                },function(error){
                    alert("Sorry! Data Couldn't be inserted!");
                    console.error(error);

                });
            }
        });
  </script>
  <div class="modal fade" id="EditTours" role="dialog" style="margin-top:100px;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <p style="font-size:30px; font-family:Roboto; font-weight:300;">Add Tour</p>
        </div>
        <div class="modal-body"  >
            <div class="logdiv">
            <form class="form-group" action="add_tour.php" method="post">
                <input class="logintextbox" type="text" name="place" placeholder="Place" required />
                 <input class="logintextbox" type="file" name="image" required />
               <input class="loginbtn" type="submit" name="Add Tour">
              </form>
            </div>
          </div>
        <!-- <div class="modal-footer">
            <p><a href="#" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Login</a></p>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>

    </div>

  </div>
    <script>
    
 /*   app.controller('edittour',function($scope,$http){    
       
         $scope.setFile = function(element) {
        $scope.$apply(function($scope) {
            $scope.theFile = element.files[0];
        });
    };  
        $scope.insertData=function(){    
         
            $http.post("add_tour.php", {
                'tname':$scope.tname,
                'image':$scope.theFile.name
            }).then(function(response){
                    console.log("Data Inserted Successfully");
                },function(error){
                    alert("Sorry! Data Couldn't be inserted!");
                    console.error(error);

                });
            }
        });*/
  </script>


 <div class="modal fade" id="Add_Location" role="dialog" style="margin-top:100px;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <p style="font-size:30px; font-family:Roboto; font-weight:300;">Add Location</p>
        </div>
        <div class="modal-body"  ng-controller="plan">
            <div class="logdiv">
            <form class="form-group">
            
               <select name="tname" class="form-control" ng-model="tour_name" >
                 <option ng-repeat="x in record" >{{x.tour_name}}</option>";    
            </select> 
                <input class="logintextbox" name="location" type="text" placeholder="location" ng-model="location" required/>
                 <input class="logintextbox" name="duration" type="text" placeholder="Duration" ng-model="duration" required />
                 <input class="logintextbox" name="price" type="text" placeholder="Price" ng-model="price" required/>
               <input class="loginbtn" type="submit" value="Add Location" ng-click="insertPlan()">
              </form>
              

  <script>

app.controller('plan', function($scope, $http) {
 $http.get("tour_find.php")
  .then(function(response) {
      $scope.record = response.data;
      });
   $scope.insertPlan=function(){    
         
            $http.post("add_location.php", {
             
                'tname':$scope.tour_name,
                'location':$scope.location,
                'duration':$scope.duration,
                'price':$scope.price
            }).then(function(response){
                    console.log("Data Inserted Successfully");
                    location.reload();
                },function(error){
                    alert("Sorry! Data Couldn't be inserted!");
                    console.error(error);

                });
            }
  
});
</script>

            </div>
          </div>
        <!-- <div class="modal-footer">
            <p><a href="#" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Login</a></p>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>

    </div>

  </div>


<div class="modal fade" id="Edit_location" role="dialog" style="margin-top:100px;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <p style="font-size:30px; font-family:Roboto; font-weight:300;">Add Location</p>
        </div>
        <div class="modal-body">
            <div class="logdiv">
            <form class="form-group">
            <select class="form-control">
              <option>Kerala</option>
            </select>
                <input class="logintextbox" type="text" placeholder="location" required/>
                 <input class="logintextbox" type="text" placeholder="Duration" required/>
                 <input class="logintextbox" type="text" placeholder="Price" required/>
               <input class="loginbtn" type="submit" value="Add Tour">
              </form>
            </div>
          </div>
        <!-- <div class="modal-footer">
            <p><a href="#" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Login</a></p>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>

    </div>

  </div>
    <div class="populartour">
      <div  class="container" >
       <div  class="row">
           <div class="col-md-1">
           </div>
           <div style="top: 25px;" class="col-md-5">
               <p style="font-size:25px; font-family:Roboto; font-weight:300; color:#878787;">All Tours</p>
           </div>

  </div>
</div>
</div>

 <div  class="container" ng-controller="card" >
      
    <div  class="row" style="padding-left: 60px;padding-right: 60px">
    <div class="container" style="padding-left: 30px">
          <div ng-repeat="x in records" >
<!--     <div class="container" style="padding-left: 30px">
 -->        

<div style="top: 25px;" class="col-md-6">
 <div class="thumbnail ">
     <img class="imgzoom" ng-src="img\myimag\{{x.image}}" alt="Lights" style="width:100%; height:200px;">
     <div class="caption post-content vcenter imgzoom">
       <p style="font-size:25px; font-family:Roboto; font-weight:300; color:#424242;opacity:1;">{{x.location}}</p>
     </div>
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div  class="panel with-nav-tabs panel-default">
                     <div class="panel-heading">
                         <form class="">
                             <ul class="nav nav-tabs">
                                 <li class="active"><a class="tabs" href="#{{x.tour_name.split(' ').join('')}}premium" data-toggle="tab">Premium</a></li>
                                     <li><a class="tabs" href="#{{x.tour_name.split(' ').join('')}}standard" data-toggle="tab">Standard</a></li>
                             </ul>
                         </form>
                                                   <div class="panel-body">
                             <div class="tab-content">
                                 <div class="tab-pane fade in active" id="{{x.tour_name.split(' ').join('')}}premium">
                                     <div class="row">
                                         <div class="col-md-12">
                                             <table class="table table-hover">
                                                 <thead>
                                                 <tr >
                                                     <th><b> City</b></th>
                                                     <th><b>Hold</b></th>
                                                     <th><b> Price</b></th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <tr ng-repeat="y in x.destinations">
                                                     <td>{{y.places}}</td>
                                                     <td>{{y.duration}}</td>
                                                     <td>{{y.price}}</td>
                                                 </tr>
                                                
                                             </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="tab-pane fade" id="{{x.tour_name.split(' ').join('')}}standard">
                                     <div class="row">
                                         <div class="col-md-12">
                                             <table class="table table-hover">
                                                 <thead>
                                                 <tr >
                                                     <th><b> City</b></th>
                                                     <th><b>Hold</b></th>
                                                     <th><b> Price</b></th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <tr ng-repeat="y in x.destinations">
                                                     <td>{{y.places}}</td>
                                                     <td>{{y.duration}}</td>
                                                     <td>{{y.price*.5}}</td>
                                                 </tr>
                                                 
                                             </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     </div>
                 </div>
               
             </div>
         </div>
        
                <!-- </div> -->
                    <div class="row">
                       <div class="col-md-4">
                       </div>
                       <div class="col-md-4">
                       </div>
                       <div class="col-md-4">
                           <input style="background: #F44336" class="button button2" type="submit" name="" value="Delete" ng-click="DeletePlan(x.id,x.tour_name)">

                       </div>
                   </div>
         </div>

     </div>

 </div>
</div>

</div>


 </div>
 
<script >
 app.controller('card', function($scope, $http) {
 $http.get("tourcard.php")
  .then(function(response) {
      $scope.records = response.data;
      });
  $scope.DeletePlan=function(id,tour_name){    
         $scope.id=id
         $scope.tour_name=tour_name
            $http.post("delete_plan.php", {
             'plan_id' : $scope.id,
              'tour_name':$scope.tour_name
            }).then(function(response){
                    console.log("Data Inserted Successfully");
                   location.reload();
                },function(error){
                    alert("Sorry! Data Couldn't be inserted!");
                    console.error(error);

                });
            }
});

</script>

</body>

</html>
