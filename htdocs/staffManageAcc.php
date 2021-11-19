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
                <th>sid</th>
                <th bgcolor = #009933>Update</th>
                <th bgcolor = #FF0000 >Delete</th>
				<!--<th>Lastname</th>!-->
				<th></th>
			</thead>
			<tbody>
				<?php
                     //$query = "SELECT * FROM staff";
                     //foreach ($conn->query($query) as $row) {
/*
                        print "sid: " .$row['sid'] ."<br>";
                        print "Fname: " .$row['fname']. "<br>";
                        print "Lname: " .$row['lname']. "<br>";
                        print "Email: " .$row['email']. "<br>";
                        print "Password: " .$row['password']. "<br>";
                        print "Sadmin: " .$row['sadmin']. "<br>";
*/

                         $query = "SELECT * FROM staff";
                         $index = 1;
                        foreach ($conn->query($query) as $row) {
						?>
						<tr>

							<!--<td><?php echo $row['sid']; ?></td>!-->

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
                                        if(isset($_POST['updateBtn'.$index.'']))


                                            $sid = $_POST['inSID'.$index.''];


                                            //$fname = $_POST[$row['fname']];
                                            $sid =$row['sid'];
                                     
                                            //$update = "UPDATE staff SET sid = '$sid'";
                                            /*
                                            $fname = $_POST[$row['fname']];
                                            $lname = $_POST[$row['lname']];
                                            $email = $_POST[$row['email']];
                                            $password = $_POST[$row['password']];
                                            $sadmin = $_POST[$row['password']];
                                    $update = "UPDATE staff SET sid = '$sid', fname= '$fname', lname= '$lname', email= '$email', password= '$password', sadmin = '$sadmin'";
    */
                                ?>					
                            </td>


                            <td>

                            <?php 
                                        echo '<input type="submit" value = "Delete" name = "deleteBtn'.$index.'"/>';
                                        if(isset($_POST['updateBtn'.$index.'']))
                                            $sid = $_POST['inSID'.$index.''];
                                            //$fname = $_POST[$row['fname']];
                                            //$sid =$row['sid'];
                                        echo $sid;
                                            //$update = "UPDATE staff SET sid = '$sid'";
                                            /*
                                            $fname = $_POST[$row['fname']];
                                            $lname = $_POST[$row['lname']];
                                            $email = $_POST[$row['email']];
                                            $password = $_POST[$row['password']];
                                            $sadmin = $_POST[$row['password']];
                                    $update = "UPDATE staff SET sid = '$sid', fname= '$fname', lname= '$lname', email= '$email', password= '$password', sadmin = '$sadmin'";
    */
                                ?>								
							</td>                           
						</tr>


						<?php
                          $index++;
					}                   
				?>
                 <td></td><td></td><td></td><td> </td><td> </td> <td></td> 
                           <td> 
                           
                                <!--<a href="delete.php?id=<?php echo $row['sid']; ?>">Delete</a> !-->
                                <button type="button">Add!</button>
                                
							</td>                 
			</tbody>
		</table>
	</div> 


 </body>
</html>