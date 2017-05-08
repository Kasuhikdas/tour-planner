<?php 
$email=$_GET['email'];
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
    .center {
    margin: auto;
    width: 60%;
    padding: 10px;
}
.circle{
            background: red;
            border-radius: 200px;
            color: white;
            height: 10px;
            font-weight: bold;
            width: 10px;
        }
    </style>
    <script type="text/javascript">
    function printDiv(divName) {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;

         document.body.innerHTML = printContents;

         window.print();

         document.body.innerHTML = originalContents;
    }

    $(document).ready(function(){
        $('#something').click(function() {
            $('#test').focus();
    });
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
    <div class="progress" style="height:1px;" >
<div class="progress-bar" role="progressbar" aria-valuenow="0"
aria-valuemin="0" aria-valuemax="100" style="background-color: #283593;width:0%; height:1px;">
</div>
</div>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
      <a class="navbar-brand " href="#" style="font-size:25px; font-family:Roboto; font-weight:300; color:white;">PlanIt</a>
       </a>
</div>

<ul class="nav navbar-nav navbar-right">
<!--   <li><a style="color:white;" href="#"><span class="glyphicon glyphicon-log-out"></span>   Logout</a></li>
 --></ul>
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
           <p style="font-size:25px; font-family:Roboto; font-weight:300; color:#878787;">Print Tickets(s)</p>
       </div>

</div>
</div>
</div>
 <script>
  var app = angular.module('myApp',[]);
  app.controller('card', function($scope, $http) {
 $http.get("ticket.php?email=<?php echo $email;?>")
  .then(function(response) {
      $scope.records = response.data;
      });
});
</script>
<div id="printableArea">

<div class="container" style="margin-bottom:15px;" ng-controller='card'> 
    <div class="row" ng-repeat='x in records'>
        <div class="col-md-2">
        </div>
        <div class="col-md-8">

            <div style="border:1px solid #E0E0E0 ;border-radius: 2px; padding:15px; ">
                      <div class="jumbotron" style="background: #ffffff;">
            <p style="font-size:25px; font-family:Roboto; font-weight:300; color:#878787;">YOUR TICKET(s)</p>
            <p style="font-size:20px; font-family:Roboto; font-weight:300; color:#878787;">GenieTravela Booking ID : {{x.booking_id}}</p>
            <p style="font-size:20px; font-family:Roboto; font-weight:300; color:#878787;">Booking Date : {{x.date_of_booking}}</p>
            </div>
                    <div style="border:1px solid #E0E0E0 ;border-radius: 2px; padding:15px;">
                        <div class="container">
                            <div class="row">
                                <div class="">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="center">
                                            <span>
                                        
                                        <p style="font-size:35px; font-family:Roboto; font-weight:300; color:#878787;display: inline;">PlanIt.com</p>
                                        </span>
                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                </div>
                            </div>
                            <div style="border:1px solid #E0E0E0 ;border-radius: 2px; padding:15px;">
                                <div class="container">
                                    <div class="row">

                                        <div class="col-md-12" style="text-align:center">
                                            <h3 style="display: inline;float:left;padding-left:70px;">{{x.source}}</h3>
                                            <img src="img/depart.png" alt="Lights" style="width:120px; height:70px;display:inline; ">

                                            <h3 style="display: inline;float:right;padding-right:70px;">{{x.location}}</h3>
                                        </div>

                                    </div>
                                        <div class="row">

                                            <div class="col-md-12" style="text-align:center">
                                                <h3 style="display: inline;float:left;padding-left:70px;">{{x.location}}</h3>
                                                <img class="icon-rotate icon-flipped" src="img/depart.png" alt="Lights" style="width:120px; height:70px;">

                                                <h3 style="display: inline;float:right;padding-right:70px;">{{x.source}}</h3>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div style="border:1px solid #E0E0E0 ;border-radius: 2px; padding:15px;margin-top:15px;">
                                    <div class="container">
                                        <div class="row" style="border:1px solid #E0E0E0 ;border-radius: 2px; padding:15px;margin-top:15px;">
                                            <div class="col-md-12" style="text-align:center">
                                            <h3 style="display: inline;float:left;padding-left:70px;">1/ PNR - R52IPI</h3>

                                            <h3 style="display:inline; float:right;padding-right:70px;" >{{x.date_of_journey}}</h3>
                                    </div>
                                    <img src="img\myimag\barcode.png" alt="barcode" width="170" height="40" style="float:right;margin-right:85px;">
                                </div>
                                        <div class="row" style="border:1px solid #E0E0E0 ;border-radius: 2px; padding:15px;margin-top:15px;">
                                              <div class="col-md-12" style="text-align:center">

                                            <div>
                                            <h3 style="float:left;padding-left:70px;"><span>PASSENGERS</span><span style="padding-left: 30px;">:</span><span style="padding-left: 30px;">{{x.name}}</span></h3>
                                            </div>
                                            <div>
                                             <h3 style="float:left;padding-left:70px;"><span>NO. OF PASSENGERS</span><span style="padding-left: 30px;">:</span><span style="padding-left: 30px;">{{x.no_of_person}}</span></h3>
                                                </div>

                                             <div>
                                              <h3 style="float:left;padding-left:70px;"><span>Trip</span><span style="padding-left: 30px;">:</span><span style="padding-left: 30px;">{{x.location}}</span></h3>
                                              </div>
                                        </div>

                                        </div>
                                     </div>
    

                                        <h3>Important Information</h3>
                                        <div class="container-fluid">


                                                <ul  style="float:left">
                                                    <li class="pull-left">The E-Ticket can be displayed on your Mobile/Tablet at the time of check-in.</li>
                                                    <li class="pull-left">Delhi and Mumbai airports have multiple terminals catering to domestic flights. Please check the terminal details of your flight by contacting the airline. Indicative information available here.</li>
                                                    <li class="pull-left">Check-in starts 2 hours and closes 60 minutes prior before scheduled departure time.</li>
                                                    <li class="pull-left">It is mandatory to carry Government recognized photo identification (ID) along with your E-Ticket. Valid IDs: Driving License, Passport, PAN Card, Voter ID Card or any other ID issued by the Government of India. For infant passengers, it is mandatory to carry the Date of Birth certificate.</li>
                                                    <li class="pull-left">Any refund claims arising due to cancellation or delay of flight by the Airline shall be subject to MakeMyTrip receiving the refund amount from the Airline. In the event Airline does not refund the amount to MakeMyTrip, MakeMyTrip shall not be held liable for the same.</li>
                                                </ul>

                                        

                                    </div>

                                    </div>




                        </div>
                        </div>




                </div>

        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>
</div>
</div>

<input type="button" onclick="printDiv('printableArea')" value="print Ticket" />


</body>
</html>
