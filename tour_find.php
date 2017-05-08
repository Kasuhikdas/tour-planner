 <?php
                include 'connection.php';
                $return_arr = array();
                $sql="SELECT * from tours";
                $result = $conn->query($sql);
                $numrow=mysqli_num_rows($result);
                if ($numrow > 0) {
                    while($row = $result->fetch_assoc()) { 

                       
                       $row_array['tour_name']=$row['tour_name'];

                      
                        array_push($return_arr,$row_array);
                    }
                  }
                echo json_encode($return_arr);
                
            ?>