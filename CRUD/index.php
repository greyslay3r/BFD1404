<!DOCTYPE HTML>
<html>

    <head>
        <title>PDO Read Records</title>
         
    </head>
<body bgcolor="#cceocc">
<h1 align='center'>Hero Contact List</h1>
 
<?php
//include database connection
include 'db_connect.php';
 
$action = isset($_GET['action']) ? $_GET['action'] : "";
 
// if it was redirected from delete.php
if($action=='deleted'){
    echo "<div>Record was deleted.</div>";
}
 
//select all data
$query = "SELECT id, firstname, lastname, username FROM my_users";
$stmt = $con->prepare( $query );
$stmt->execute();
 
//this is how to get number of rows returned
$num = $stmt->rowCount();
 
// echo "<a href='add.php'>Create New Record</a>";
 
if($num>0){ //check if more than 0 record found
 
    echo "<table border='1' align='center'>";//start table
     
        //creating our table heading
        echo "<tr>";
            echo "<th bgcolor='#99ff33'>Firstname</th>";
            echo "<th bgcolor='#99ff33'>Lastname</th>";
            echo "<th bgcolor='#99ff33'>Username</th>";
            echo "<th bgcolor='#99ff33'>Action</th>";
        echo "</tr>";
       
      
      
        //retrieve our table contents
        //fetch() is faster than fetchAll()
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            //extract row
            //this will convert $row['firstname'] to
            //just $firstname only
            extract($row);
             
            //creating new table row per record
            echo "<tr>";
                echo "<td>{$firstname}</td>";
                echo "<td>{$lastname}</td>";
                echo "<td>{$username}</td>";
                echo "<td>";
                    //we will use this links on next part of this post
                    echo "<a href='edit.php?id={$id}'>Edit</a>";
                    echo " / ";
                    //we will use this links on next part of this post
                    echo "<a href='#' onclick='delete_user( {$id} );'>Delete</a>";
                echo "</td>";
            echo "</tr>";
        }
     
    //end table
    echo "</table>";
     
}
 
//if no records found
else{
    echo "No records found.";
}
 
?>
 
<script type='text/javascript'>
function delete_user( id ){
     
    var answer = confirm('Are you sure?');  // pop up box to confirm the delete action
    if ( answer ){
     
        //if user clicked ok, pass the id to delete.php and execute the delete query
        window.location = 'delete.php?id=' + id;
    }
}
</script>
 
    <a href='index.php'>
       <input type="button" style="background-color:#dac8a3;margin-left:auto;margin-right:auto;display:block;" 
       value="Back to Index" title="Back to Index" />
    </a>

    <a href='add.php'>
        <input type="button" style="background-color:#33add6;margin-left:auto;margin-right:auto;display:block;" 
        value="Create New Record" title="Create New Record" />
    </a>

</body>
</html>