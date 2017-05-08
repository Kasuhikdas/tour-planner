
    <?php
    session_start();
    $msg="";
    $msg1="";
    $pop='0';
       if(!isset($_SESSION['Name'])){
      if (isset($_GET['msg']) && isset($_GET['pop'])) {
        
        if ($_GET['pop']==1) {
           
          $pop=$_GET['pop'];
          $msg=$_GET['msg'];
        }
        else if($_GET['pop']==2){
           $pop=$_GET['pop'];
            $msg1=$_GET['msg'];
        }
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
        <script type="text/javascript">

       
           $(document).ready(function(){
                  $('[data-toggle="tooltip"]').tooltip();   
            var width=0;
            var pop=<?php echo $pop; ?>;
            if (pop==2) {
              $("#myModal").modal("show");
               
            }
            else if(pop==1){
              $("#signup").modal("show");
            }
            var id = setInterval(frame, 100);

                function frame() {
                    if (width > 20) {
                            clearInterval(id);
                            $(".progress").hide();
                        } else {
                            width++;
                            $(".progress-bar").css("width", 10*(width)+"%");
                        }
                    }
                    // $('.nav-tabs a').on('shown.bs.tab', function(event){
                    //     var x = $(event.target).text();         // active tab
                    //     alert(x)
                    // });
                    $('#menu-toggle').click(function(){
                        $(this).toggleClass('glyphicon-chevron-up').toggleClass('glyphicon-chevron-down');
                    });
                    $(document).ready(function(){
                       $('.imgzoom').hover(function() {
                           $(".imgzoom").addClass('transition');
                           $(".vcenter").addClass('transition');

                       }, function() {
                           $(".imgzoom").removeClass('transition');
                           $(".vcenter").removeClass('transition');

                       });
                   });

        });

        </script>
        <style media="screen">
        </style>
    </head>

    <body ng-app="myApp">
        <div class="progress" style="height:1px;" >
  <div class="progress-bar" role="progressbar" aria-valuenow="0"
  aria-valuemin="0" aria-valuemax="100" style="background-color: #283593;width:0%; height:1px;">
  </div>
</div>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
      <a class="navbar-brand " href="#" style="font-size:25px; font-family:Roboto; font-weight:300; color:white;">PlanIt</a>
    </div>
    
     <ul class="nav navbar-nav navbar-right">
    <?php if (isset($_SESSION['Name'])){
      
      echo '
        
          
      <li><a style="color:white;"  href="logout.php">Logout</a></li>
         
     ';
    }
        else{
          echo '
           
        
      <li><a style="color:white;" href="#" data-toggle="modal" data-target="#signup"><span class="glyphicon glyphicon-user"></span>  Sign Up</a></li>
      <li><a style="color:white;" href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span>   Login</a></li>
    ';}
     ?>
      
  </ul>
   
  </div>

</nav>
<div class="container" style="padding-left:0px;padding-right:0px;">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/myimag/img1.jpg" alt="Chania" width="100%" height="300">
      </div>

      <div class="item">
        <img src="img/myimag/img2.jpg" alt="Chania" width="100%" >
      </div>

      <div class="item">
        <img src="img/myimag/img3.jpg" alt="Chania" width="100%" >
      </div>
 <form style="bottom: 150px;"  class="col-sm-12" id="searchForm" action="search.php" method="POST">
     <div class="form-group col-sm-4 col-sm-offset-4" action="search.php" method="POST">
      <div class="input-group input-group-lg center-block">

        <input type="text" class="logintextbox" placeholder="Origin" data-toggle="tooltip" title="Enter Origin" name="source" class="form-control" required>
        <input type="text" class="logintextbox" placeholder="Destination" name="destination" data-toggle="tooltip" title="Enter destination" class="form-control" required>
        <input class="logintextbox" type="date" date="yyyy-MM-dd"  data-toggle="tooltip" title="Enter Date"  name="date" required min="<?php echo date('Y-m-d');?>" class="form-control" >

        <button  style="width:100%; margin-top:10px" class="button button2"><i class=""></i>Search</button>
      </div>
  </div>
  </form>

      
     <!-- <div class="form-group col-sm-4 col-sm-offset-4" style="padding-bottom:50px; ">
      <div class="input-group input-group-lg center-block">
      <form action="search.php" method="POST">
      <input type="text" name="source" placeholder="Source" class="form-control">
      <input type="text" name="destination" placeholder="Destination" class="form-control">
      <input type="date" date="yyyy-MM-dd" name="date" class="form-control" min="<?php echo date('Y-m-d');?>">

        <button  style="width:100%; margin-top:10px" class="button button2"><i class=""></i>Search</button>
        </form>
      </div>
  </div> -->
 
  </div>


    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div ng-controller="card">
<div ng-repeat="x in records">
<div class="modal fade" id="{{x.id}}" role="dialog" style="margin-top:100px;" >
   <div class="modal-dialog">

     <!-- Modal content-->
     <div class="modal-content" >
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <p style="font-size:30px; font-family:Roboto; font-weight:300;">Book</p>
       </div>
       <div class="modal-body">
           <div class="logdiv">
           <form action="book.php?" method="GET">
               <input class="logintextbox" type="text"  data-toggle="tooltip" title="Enter source"  name="source" placeholder="source" ng-model="source" required />
                <input  class="logintextbox" type="date"  data-toggle="tooltip" title="Enter Date"   name="date" min='<?php echo date('Y-m-d');?>' ng-model="date" required/>
                <input class="logintextbox" type="number"  data-toggle="tooltip" title="Enter Enter no. preson"  name="person" placeholder="Person" ng-model="person" required>
                <input class="logintextbox" type="number"  data-toggle="tooltip" title="Enter No. room"  name="room" placeholder="Room" ng-model="room" required>
                <input type="hidden" name="dst" value="{{x.location}}">
                <input type="hidden" name="id" value="{{x.id}}">
                <input class="button button2" type="submit" name="Book">
              <!--<a class="button button2" href="book.php?id={{x.id}}&person={{person}}&room={{room}}&src={{source}}&dst={{x.location}}&date={{date}}">Book</a>
               
-->
              </form>
           </div>
         </div>
       <div class="modal-footer">
         <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
       </div>
     </div>

   </div>

 </div>
 </div>
</div>

<div class="modal fade" id="myModal" role="dialog" style="margin-top:100px;">
   <div class="modal-dialog">

     <!-- Modal content-->
     <div class="modal-content" >
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <p style="font-size:30px; font-family:Roboto; font-weight:300;">Login</p>
       </div>
       <div class="modal-body">
           
           <div class="logdiv">
           <form action="user_login.php" method="POST">
               <input class="logintextbox" type="email" name="email" placeholder="Email"/>
                <input class="logintextbox" type="password" name="password" placeholder="Password"/>
              <input class="loginbtn" type="submit" value="Login">
              </form>
              <center><p style="color:red;"><?php echo $msg1?></p></center>
              <p align=center style="margin-bottom:20px;"><a href="#" data-toggle="modal" data-target="#signup" data-dismiss="modal">SignUp</a></p>
           </div>

         </div>
       
     </div>

   </div>

 </div>
 <div class="modal fade" id="signup" role="dialog" style="margin-top:100px;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <p style="font-size:30px; font-family:Roboto; font-weight:300;">SignUp</p>
        </div>
        <div class="modal-body">
         <p style="color:red;"><?php echo $msg?></p>
            <div class="logdiv">
                 <form action="register.php" method="POST">
                <input class="logintextbox" type="text" placeholder="Name"  name="name"  required />
                <input class="logintextbox" type="email" placeholder="Email" name="email" required />
                 <input class="logintextbox" type="password" placeholder="Password" name="password" required />
                 <input class="logintextbox" type="password" placeholder="Confirm Password" name="confirm_password" required />
               
                  <button class="loginbtn">Submit</button>
                 
               <p align=center style="margin-bottom:20px;"><a href="#" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Login</a></p>
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
               <p style="font-size:25px; font-family:Roboto; font-weight:300; color:#878787;">Popular Tours</p>
           </div>

  </div>
</div>
</div>

  <script>
  var app = angular.module('myApp',[]);
  app.controller('card', function($scope, $http) {
 $http.get("popular.php")
  .then(function(response) {
      $scope.records = response.data;
      });
});
</script>

      <div  class="container" ng-controller="card">
      
    <div  class="row" style="padding-left: 60px;padding-right: 60px">
    <div class="container" style="padding-left: 30px">
          <div ng-repeat="x in records" >
            
 
  
      
   <div style="top: 25px;" class="col-md-6">
     <div class="thumbnail ">
         <img ng-src="img\myimag\{{x.image}}" alt="Lights" style="width:100%; height:200px;">
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
                                     <div class="container" style="border:1px solid #E0E0E0 ;border-radius: 2px; padding:15px; margin-left:1px;margin-right:1px;margin-top:10px;">
             <!-- <div class="container"> -->
                 <div class="row">
                         <div class="col-md-12">
                         <p style="display:inline-block">Summary</p>
                        <span id="menu-toggle" style="display:inline-block;float:right; margin-bottom:15px;"  data-toggle="collapse" data-target="#demo" class="glyphicon glyphicon glyphicon-chevron-down"></span>
                        <p style="display:inline-block; float:right; margin-right:10px;">Total : {{x.total}}</p>
                         <div id="demo" class="collapse">
                         <table class="table table-hover">
                          
                            
                            <!-- <tr style="background-color: #f5f5f5;">
                                <td><p>Total</p></td>
                                <td><p>32000</p></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                    </div>

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
                                     <div class="container" style="border:1px solid #E0E0E0 ;border-radius: 2px; padding:15px; margin-left:1px;margin-right:1px;margin-top:10px;">
             <!-- <div class="container"> -->
                 <div class="row">
                         <div class="col-md-12">
                         <p style="display:inline-block">Summary</p>
                        <span id="menu-toggle" style="display:inline-block;float:right; margin-bottom:15px;"  data-toggle="collapse" data-target="#demo" class="glyphicon glyphicon glyphicon-chevron-down"></span>
                        <p style="display:inline-block; float:right; margin-right:10px;">Total : {{x.total*0.5}}</p>
                         <div id="demo" class="collapse">
                         <table class="table table-hover">
                            
                            <!-- <tr style="background-color: #f5f5f5;">
                                <td><p>Total</p></td>
                                <td><p>32000</p></td>
                            </tr> -->
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
                               <input class="button button2" type="submit" name="" value="BOOK" data-toggle="modal" data-target="#{{x.id}}">
                           </div>
                       </div>
             </div>

         </div>

     </div>
</div>
</div>

     </div>
     </div>
</body>
</html>
