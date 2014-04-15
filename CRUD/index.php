<!DOCTYPE HTML>
<html>
    <head>
        <title>PDO Read Records</title>
         
    </head>
<body>
<h1>Hero Contact List</h1>
<h1>PDO: Read Records</h1>
 
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
 
echo "<a href='add.php'>Create New Record</a>";
 
if($num>0){ //check if more than 0 record found
 
    echo "<table border='1'>";//start table
     
        //creating our table heading
        echo "<tr>";
            echo "<th>Firstname</th>";
            echo "<th>Lastname</th>";
            echo "<th>Username</th>";
            echo "<th>Action</th>";
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
     
    var answer = confirm('Are you sure?');
    if ( answer ){
     
        //if user clicked ok, pass the id to delete.php and execute the delete query
        window.location = 'delete.php?id=' + id;
    }
}
</script>
 
 <a href='index.php'>Back to index</a>
</body>
</html>