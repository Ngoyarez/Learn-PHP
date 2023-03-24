<?php
require_once "config.php";

//Define variables and initialize with empty values
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";

//Processing Form data when the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Validate name
    $input_name = trim($_POST['name']);
    if(empty($input_name)){
        $name_err = "Please Enter Your Name";
     }else if(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" =>array("regexp"=>"/^[a-zA-Z\s]=$/")))){
        $name_err = "Please Enter A Valid Name";
        }
    else{
        $name = $input_name;
    }

    //Validate Address
    $input_address = trim($_POST['address']);
    if(empty($input_address)){
        $name_err = "Please Enter Your Address";
    }else{
        $address = $input_address;
    }

     //Validate Salary
     $input_salary = trim($_POST['salary']);
     if(empty($input_salary)){
         $name_err = "Please Enter Your Salary Amount";
     }else if(!ctype_digit($input_salary)){
        $salary_err = "Please Enter A Positive Integer Value...";
     }else{
         $salary = $input_salary;
     }

     //Check input errors before inserting into the database
     if(empty($name_err) && empty($address_err) && empty($salary_err)){
        //Prepare to insert
        $query = "INSERT INTO employees(name, address, salary)VALUES(?, ?, ?)";

        IF($stmt = mysqli_prepare($conn, $query)){
            //Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);
        
            //Set Parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;

            //Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                //Records created successfully. Redirect to the landing page
                header("Location: index.php");
                exit();
            }else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        //close statement
        mysqli_stmt_close($stmt);
     }

     //close connection
     mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee records to the database</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>">
                            <span class="invalid-feedback"><?php echo $address_err; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="">Salary</label>
                        <input type="text" name="salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                            <span class="invalid-feedback"><?php echo $salary_err; ?></span>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>

                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

