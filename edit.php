<?php
include 'DBconn.php';

// Initialize variables to avoid "undefined variable" warnings
$ID = $Name = $Department = $Gender = $DOB = $Skills = $Mobile_no = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Retrieve form data safely
    $ID = mysqli_real_escape_string($connection, $_POST['ID']);
    $Name = mysqli_real_escape_string($connection, $_POST['Name']);
    $Department = mysqli_real_escape_string($connection, $_POST['Department']);
    $Gender = mysqli_real_escape_string($connection, $_POST['Gender']);
    $DOB = mysqli_real_escape_string($connection, $_POST['Date']);
    $Mobile_no = mysqli_real_escape_string($connection, $_POST['Mobile_no']);

    // Handle multiple checkbox values for skills
    if (isset($_POST['Skills']) && is_array($_POST['Skills'])) {
        $Skills = implode(", ", $_POST['Skills']); // Convert array to comma-separated string
    } else {
        $Skills = ""; // No skills selected
    }

    // Insert into the database
    $sql = "INSERT INTO Student_details (ID, Name, Department, Gender, `Date`, Skills, Mobile_no) 
            VALUES ('$ID', '$Name', '$Department', '$Gender', '$DOB', '$Skills', '$Mobile_no')";

    if (mysqli_query($connection, $sql)) {
        header("Location: index.php"); // Redirect to index.php after successful insertion
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        <h1>Student Details Application</h1>
                    </div>
                    <div class="card-body">
                        <form action="add.php" method="post">
                            <div class="form-group">
                                <label>ID</label>
                                <input type="text" name="ID" class="form-control" placeholder="Enter ID" required>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="Name" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Department</label>
                                <select class="form-control" name="Department" >
                                    <option value="">Select Department</option>
                                    <option value="Automobile">Automobile</option>
                                    <option value="Civil">Civil</option>
                                    <option value="Computer">Computer</option>
                                    <option value="ECE">ECE</option>
                                    <option value="EEE">EEE</option>
                                    <option value="Mechanical">Mechanical</option>
                                    <option value="IT">IT</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Gender</label><br>
                                <input type="radio" name="Gender" value="Male" required> Male
                                <input type="radio" name="Gender" value="Female" required> Female
                                <input type="radio" name="Gender" value="Other" required> Other
                            </div>
                            <div class="form-group">
                                <label>DOB</label>
                                <input type="date" name="Date" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Skills</label><br>
                                <label><input type="checkbox" name="Skills[]" value="Java"> Java</label><br>
                                <label><input type="checkbox" name="Skills[]" value="Python"> Python</label><br>
                                <label><input type="checkbox" name="Skills[]" value="PHP"> PHP</label><br>
                                <label><input type="checkbox" name="Skills[]" value="C"> C</label><br>
                                <label><input type="checkbox" name="Skills[]" value="C++"> C++</label><br>
                            </div>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" name="Mobile_no" class="form-control" maxlength="10" placeholder="Enter Mobile No">
                            </div>
                            <input type="submit" class="btn btn-primary" name="submit" value="Add Student">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
