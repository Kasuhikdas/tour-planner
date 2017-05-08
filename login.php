<?php
session_start();
if(isset($_SESSION['type'])){
if($_SESSION['type']=='admin'){
  header('Location:admin_home.php');
}
}
?>
<html>
    <head>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">

        <style>
        @import url(http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300ita‌​lic,400italic,500,500italic,700,700italic,900italic,900);
        html, html * {
            font-family: Roboto;
            font-weight: 400;
        }
             .fit { /* set relative picture size */
                  max-width: 100%;
                  height: 100%;
                  margin: 0px;
                    overflow-x: hidden;
                    margin-left: -15px;
                margin-right: -15px;
                }
                .main{
                    margin: 0px;
                }
                 .logdiv{
                    width: 100%;
                    height: 35%;
                    margin-top:50%;
                    border-color: #F5F5F5 ;
                    border-radius:2px;
         }
         input{
             width: 100%;
             margin-top:5%;
             padding: 10px;
         }
    .logintextbox{
    font-size: 15px;
    width: 100%;
    padding: 8px 20px;
    margin: 15px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 1px solid #E0E0E0;
}
.logintextbox:focus{
    outline: none;
    border-bottom: 1px solid #283593;

}
.loginbtn{
    margin-top: 15px;
    padding: 10px 25px;
    width: 90%;
    background-color:#283593;
    color: #FFFFfF;
    margin: 30px;
    font-size: 15px;
    border: 0px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}
.vcenter {
    margin-top: 700px;
    height: 100px;
  line-height: 90px;
  text-align: center;
}
.loginbtn:hover{
    outline: none;
    opacity: 0.9;
}
.thumbnail {
    border: 0 none;
    box-shadow: none;
        height: 100px;  
}
        </style>
    </head>
    <body>
    <div class="container-fluid main">
        <div class="row fit">
              <div class="col-md-8">
                  <div class="thumbnail" style="height:100%;margin:-20px;margin-bottom:-20px">
                  <img class="fit" src="plane.jpg" style="height:102%;">
                  </div>
            </div>
             <div class="col-md-4">
                 <div class="logdiv">
                 <form action="admin_login.php" method="post">
                     <h2 style="font-weight: 300;color:#283593">Login</h2>
                     <input class="logintextbox" type="email" placeholder="Email" name="user_id" required />
                      <input class="logintextbox" type="password" placeholder="Password" name="password" required />
                    <input class="loginbtn" type="submit" value="Login">
                    </form>
                 </div>
             </div>
         </div>
   </div>
    </body>
</html>
