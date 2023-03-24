<?php
//Attempt MySQL Server connection
$conn = mysqli_connect("localhost", "root", "", "Ajax");

//Check connection
if($conn == false){
    die("ERROR: Could not connect ". mysqli_connect_error());
}

if(isset($_REQUEST["term"])){
    //Prepare a select statement
    $query = "SELECT * FROM countries WHERE name LIKE ?";

    if($stmt = mysqli_prepare($conn, $query)){
        //Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);

        //set parameters
        $param_term = $_REQUEST["term"] . "%";

        //Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            //Check the number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                //Fetch the result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p>" . $row["name"] . "</p>";
                }
            }else{
                echo "<p>No matches found</p>";
            }
        }else{
            echo "ERROR: Could not execute the query" . mysqli_error($conn);
        }
    }

    //Close statement
    mysqli_stmt_close($stmt);
}

//Close connection
mysqli_close($conn);

?>