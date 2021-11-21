<?php 
    include "dbpdo.php";
    $conn = dbConnect();
    $el;

 
?>

<html>
 <head>
  <title>Final List</title>
 </head>
 <body>
 <h1>Manage Account </h1>
     <hr>
    <h2>Edit Table</h2>
     <div>
		<table border="3">
			<thead>
				<th>SID</th>
				<th>firstname</th>
                <th>lastname</th>
				<th>email</th>
                <th>password</th>
                <th>sadmin</th>
                <th bgcolor = #009933>Update</th>
                <th bgcolor = #FF0000 >Delete</th>
				<!--<th>Lastname</th>!-->
				<th></th>
			</thead>
			<tbody>
				<?php

                         $query = "SELECT * FROM staff";
                         $index = 1;
                        foreach ($conn->query($query) as $row) {
						?>
						<tr>


                            <form action = "updateDB.php" method = "post">

                            <td><?php echo '<input type = "text" name ="inSID'.$index.'" value ="'.$row['sid'].'"  />';?></td>                      
                            <td><?php echo '<input type = "text" name = "inFname'.$index.'"  value ="'.$row['fname'].'"/>'; ?></td>
                            <td><?php echo '<input type = "text" name = "inLname'.$index.'" value ="'.$row['lname'].'"/>'; ?></td>
                            <td><?php echo '<input type = "text" name = "inEmail'.$index.'" value ="'.$row['email'].'"/>'; ?></td>
                            <td><?php echo '<input type = "text" name = "inPass'.$index.'" value ="'.$row['password'].'"/>'; ?></td>
                            <td><?php echo '<input type = "text" name = "inSadmin'.$index.'" value ="'.$row['sadmin'].'"/>'; ?></td>

                            <?php echo '<input type = "hidden" name = "index" value ="'.$index.'"/>'; ?>

							<td>
  

                                <?php 
                                        echo '<input type="submit" value = "update" name = "updateBtn'.$index.'"/>';
                                        echo '</form>';

                                ?>					
                            </td>


                            <td>

                            <?php 
                                        echo '<input type="submit" value = "Delete" name = "deleteBtn'.$index.'"/>';

                                ?>								
							</td>                           
						</tr>


						<?php
                          $index++;
					}                   
				?>
                           <?php $index ;  echo $index ?> 
                            <form action = "addStaffTuple.php" method = "post">
                            <?php $index ;  echo $index ?> 
                            <td><?php echo '<input type = "text" name ="inSID'.$index.'" value ="" />';?></td>                      
                            <td><?php echo '<input type = "text" name = "inFname'.$index.'"  value =""/>'; ?></td>
                            <td><?php echo '<input type = "text" name = "inLname'.$index.'" value =""/>'; ?></td>
                            <td><?php echo '<input type = "text" name = "inEmail'.$index.'" value =""/>'; ?></td>
                            <td><?php echo '<input type = "text" name = "inPass'.$index.'" value =""/>'; ?></td>
                            <td><?php echo '<input type = "text" name = "inSadmin'.$index.'" value =""/>'; ?></td>   
                            <?php echo '<input type = "hidden" name = "index" value ="'.$index.'"/>'; ?>           
                            <td>
                            <?php
                            echo '<input type="submit" value = "Addii" name = "addBtn'.$index.'"/>';
                            $index++;
                              echo '</form>';
                            ?>
     
                                
							</td>                 
			</tbody>
		</table>
	</div> 


 </body>
</html>
