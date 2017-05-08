<?php
  include 'connection.php';
  $source="";
  $destination="";
  $date="";
  $result="";
  $count=0;
  
  $flight=10000;
   $return_arr = array();
      $return_arr3=array();
  if($_GET["destination"]!='' && $_GET['source']!='' && $_GET['date']!='')
  {
    $source=$_GET["source"];
    $destination=$_GET["destination"];
    $date=$_GET["date"];
    $sql="SELECT * from tours where location='$destination'";//select all tours
     $t="";
     $p="";
      $result = $conn->query($sql);
  }
  else
  {
  	$sql="SELECT * from tours ";//select all tours
     $t="";
     $p="";
      $result = $conn->query($sql);
  }
   
      $numrow=mysqli_num_rows($result);
      if ($numrow > 0) {

        while($row = $result->fetch_assoc()) { 
                $return_arr2 = array();

                      // $row_array['name']=$row['Name'];
                        //array_push($return_arr,$row_array);
            $t=$row['tour_name'];//fetched plan name and tourname
            
            $row_array2['tour_name']=$t;
            $row_array2['location']=$row['location'];
            $row_array2['image']=$row['image'];
             $row_array2['id']=$row['tour_id'];
          	$row_array2['src']=$source;
          	$row_array2['dest']=$destination;
          	$row_array2['date']=$date;
            $sql2="SELECT * from plans where tour_name='$t'";
            //fetched plan based on plans
            $result2 = $conn->query($sql2);
            while($row2 = $result2->fetch_assoc()) { 
            
              
              $row_array['places']=$row2['places'];
              $row_array['duration']=$row2['duration'];
              $row_array['price']=$row2['price'];
              $count=$count+$row2['price'];
               
               array_push($return_arr2,$row_array);
               


                    
            }
            $count+=$flight;
            
            $row_array2['destinations']=$return_arr2;
            $row_array2['total']=$count; 
            array_push($return_arr3,$row_array2);
            $count=0;
            // $return_arr2=" ";


         }
          $a=$return_arr3;
            $return_arr=$a;

        
      }
      
    echo json_encode($return_arr);
  



?>
