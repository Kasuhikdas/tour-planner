<?php
$source="";
  $destination="";
  $date="";
  $id="";
  $room="";
  $person="";
  $flight="";

  if(isset($_GET["source"]) && isset($_GET["dst"]) && isset($_GET["date"]) &&  isset($_GET["id"]) &&  isset($_GET["room"]) &&  isset($_GET["person"]))
  {
    $source=$_GET["source"];
    $destination=$_GET["dst"];
    $date=$_GET["date"];
    $id=$_GET["id"];
    $room=$_GET["room"];
    $person=$_GET["person"];
    $flight=$person*5000;

  
  }
  session_start();
  if (!isset($_SESSION['Name'])) {
    # code...
    $msg="";
    $msg1="";
    $pop='0';
  
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
        font-weight: 300;
    }
    </style>
    <script type="text/javascript">

    $(document).ready(function(){
      var pop=<?php echo $pop; ?>;
            if (pop==2) {
              $("#myModal").modal("show");
               
            }
            else if(pop==1){
              $("#signup").modal("show");
            }
        var width=0;
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

</head>

<body ng-app="myApp">

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
<ul class="nav navbar-nav">
  <li class="nav-color"><a class="nav-color" style="color:white;" href="home.php">Home</a></li>
 </ul>
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
<div class="searchtour">
  <div  class="container" >
      <div class="row">
          <div class="col-md-1">
          </div>
      </div>
   <div  class="row">
       <div class="col-md-2">
       </div>
       <div style="margin-bottom:10px;" class="col-md-5">
           <p style="font-size:25px; font-family:Roboto; font-weight:300; color:#878787;">Book Tours</p>
       </div>

</div>
</div>
</div>
<script>
 var app = angular.module('myApp',[]);
app.controller('card', function($scope, $http) {
  $scope.flight= <?php echo $flight;?>;
  $scope.person=<?php echo $person;?>;
$http.get("booking.php?id=<?php echo $id ;?>")
    .then(function (response) {
      $scope.records = response.data;
      });
 
});
</script>
<div class="container" style="margin-bottom:15px;" ng-controller="card">
    <div class="row" ng-repeat="x in records">
    <div ">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div style="border:1px solid #E0E0E0 ;border-radius: 2px; padding:15px; ">
            <p style="font-size:25px; font-family:Roboto; font-weight:300; color:#878787;">My Package inclusions</p>
                <div style="border:1px solid #E0E0E0 ;border-radius: 2px; padding:15px;">
                    <div class="yourflight_div">
                        <p class="yourflight">Your Flight</p>
                    </div>
                    <div class="row">

                    <div class="col-md-2">
                        <p>09:50</p>
                        <p><?php echo $source;?></p>
                    </div>
                    <div class="col-md-2">
                        <img src="img/depart.png" alt="Lights" style="width:120px; height:70px;">
                    </div>
                    <div class="col-md-2">
                        <p>14:15</p>
                        <p><?php echo $destination;?></p>
                    </div>
                    <div class="col-md-2">
                         <p>5000</p>
                    </div>
                    <div class="col-md-2">
                         <p><?php echo $person;?> PEOPLE</p>
                    </div>
                    <div class="col-md-2">
                         <p>Total : <?php echo $flight;?></p>
                    </div>

                </div>
                <hr>
                <div class="row">

                    <div class="col-md-2">
                        <p>14:15</p>
                        <p><?php echo $destination;?></p>
                    </div>
                    <div class="col-md-2">
                        <img class="icon-rotate icon-flipped" src="img/depart.png" alt="Lights" style="width:120px; height:70px;">
                    </div>
                    <div class="col-md-2">
                        <p>09:50</p>
                        <p><?php echo $source;?></p>

                    </div>
                    <div class="col-md-2">
                         <p>5000</p>
                    </div>
                    <div class="col-md-2">
                         <p><?php echo $person;?> PEOPLE</p>
                    </div>
                    <div class="col-md-2">
                         <p>Total : <?php echo $flight;?></p>
                    </div>
                    </div>

                </div>
                <div style="border:1px solid #E0E0E0 ;border-radius: 2px; padding:15px;margin-top:15px;">
                    <div class="yourflight_div">
                        <p class="yourflight">Your Room(s)</p>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                             <div  class="panel with-nav-tabs panel-default">
                     <di
                     FO class="panel-heading">
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
                                                <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td style="padding:20px; background-color:#E0E0E0">Total :{{x.total}}</td>

                                                        </tr>
                                             </tbody>
                                             </table>
                                         </div>
                                     </div>
                                      <div class="" style="margin-top:15px;">
                <div style="border:1px solid #E0E0E0 ;border-radius: 2px; padding:15px; ">

            <div class="row">
                    <div class="col-md-12">
                    <p style="display:inline-block">Summary</p>
                   <span id="menu-toggle" style="display:inline-block;float:right; margin-bottom:15px;"  data-toggle="collapse" data-target="#demo1" class="glyphicon glyphicon glyphicon-chevron-down"></span>
                   <p style="display:inline-block; float:right; margin-right:10px;">Total : {{x.total*person+flight+flight}}</p>
                    <div id="demo1" class="collapse">
                    <table class="table table-hover">
                       <tbody>
                       <tr>
                           <td><p>Flight Charges(Each Person)</p></td>
                           <td><p>5000 x {{person}}: {{flight}}</p></td>
                       </tr>
                       <tr>
                           <td><p>Tour Charges</p></td>
                           <td><p>{{x.total}} x {{person}}: {{x.total*person}}</p></td>
                       </tr>
                       
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

               <div class="row">
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-4">
                      <a class="button button2" href="book_submit.php?id={{x.id}}&type=permium&numperson=<?php echo $person;?>&date=<?php echo $date;?>&total={{x.total*person+flight+flight}}&&source=<?php echo $source;?>">Book</a>
                  </div>
              </div>

          

        </div>
        <div class="col-md-2">
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
                                                 <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td style="padding:20px; background-color:#E0E0E0">Total :{{x.total*.5}}</td>

                                                        </tr>
                                             </tbody>
                                             </table>
                                         </div>
                                     </div>
                    <div style="border:1px solid #E0E0E0 ;border-radius: 2px; padding:15px; ">

            <div class="row">
                    <div class="col-md-12">
                    <p style="display:inline-block">Summary</p>
                   <span id="menu-toggle" style="display:inline-block;float:right; margin-bottom:15px;"  data-toggle="collapse" data-target="#demo" class="glyphicon glyphicon glyphicon-chevron-down"></span>
                   <p style="display:inline-block; float:right; margin-right:10px;">Total : {{x.total*0.5*person+flight+flight}}</p>
                    <div id="demo" class="collapse">
                    <table class="table table-hover">
                       <tbody>
                       <tr>
                           <td><p>Flight Charges(Each Person)</p></td>
                           <td><p>5000 x {{person}}: {{flight}}</p></td>
                       </tr>
                       <tr>
                           <td><p>Tour Charges</p></td>
                           <td><p>{{x.total}} x {{person}}: {{x.total*.05*person}}</p></td>
                       </tr>
                       
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
               <div class="row">
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-4">
                      <a class="button button2" href="book_submit.php?id={{x.id}}&type=standard&numperson=<?php echo $person;?>&date=<?php echo $date;?>&total={{x.total*0.5*person+flight+flight}}&&source=<?php echo $source;?>">Book</a>
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
