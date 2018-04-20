
<?php

Require('supportFunctions.php');

//function load_stationery_table(){
  
    $con = getdb();
    $Sql = "SELECT * FROM stationery";
    $result = mysqli_query($con, $Sql);  


     if (mysqli_num_rows($result)>0 ) {
    echo "<table class='table table-striped table-hover'>
                <thead>
                    <tr>
            <th>
              <span class='custom-checkbox'>
                <input type='checkbox' id='selectAll'>
                <label for='selectAll'></label>
              </span>
            </th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Date in</th>
                        <th>Received By</th>
                        <th>Actions</th>
                    </tr>
                </thead><tbody>";


        while($row = mysqli_fetch_assoc($result)){ 

           echo" <tr>

            <td>
              <span class='custom-checkbox'>
                <input type='checkbox' id='checkbox1' name='options[]' value='1'>
                <label for='checkbox1'></label>
              </span>
            </td>

                        <td>".$row['item_name'].
                        "</td><td>".$row['quantity'].
                        "</td><td>".$row['date_in'].
                        "</td><td>".$row['received_by'].
                        "</td><td>";

                        echo'
           
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>';
              }
              echo "</tbody></table>";
    // }
  }

    ?>