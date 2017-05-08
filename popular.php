<?php
	 include 'connection.php';
      $return_arr = array();
      $return_arr3=array();
      $sql="SELECT * from tours ORDER BY tour_id DESC LIMIT 4 ";//select all tours
     $t="";
     $p="";
      $result = $conn->query($sql);
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
      			$sql2="SELECT * from plans where tour_name='$t'";
            //fetched plan based on plans
      			$result2 = $conn->query($sql2);
      			while($row2 = $result2->fetch_assoc()) { 
      			
      				
      				$row_array['places']=$row2['places'];
      				$row_array['duration']=$row2['duration'];
      				$row_array['price']=$row2['price'];
      				 
      				 array_push($return_arr2,$row_array);
      				 


                    
      			}

      			$row_array2['destinations']=$return_arr2;

      			array_push($return_arr3,$row_array2);
            // $return_arr2=" ";


         }
          $a=$return_arr3;
            $return_arr=$a;

        
      }
      
       echo json_encode($return_arr);
       
?>