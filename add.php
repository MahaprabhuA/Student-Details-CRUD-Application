<?php
include 'DBconn.php';
$ID = $Name = $Department = $Gender = $DOB = $Skills = $Mobile_no = "";
if(isset($_POST['submit'])) 
{
        $ID = $_POST['ID'];
        $Name = $_POST['Name'];
        $Department = $_POST['Department'];
        $Gender = isset($_POST['Gender']) ? $_POST['Gender'] : "";
        $DOB = $_POST['Date'];
        $Skills = isset($_POST['Skills']) ? implode(",", $_POST['Skills']) : ""; 
        $Mobile_no = $_POST['Mobile_no'];

        $sql = "INSERT INTO Student_details(ID, Name, Department, Gender, DOB, Skills, Mobile_no) VALUES ('$ID', '$Name', '$Department', '$Gender', '$DOB', '$Skills', '$Mobile_no')";
        
        if(mysqli_query($connection, $sql)) 
        {
            header("Location: index.php");
            exit();
        } 
        else 
        {
            echo "Error: " . $connection->error;
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
            <div class="card" style="width: 40rem;">
                    <div class="card-header">
                        <h1>Student Details Application</h1>
                    </div>
                        <class="card-body">
                        <form action ="add.php" method="post">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="ID" class="form-control" placeholder="Enter ID" value="<?php echo $ID; ?>">
                                </div>
                                <div class="form-group">
                                    <label >Name</label>
                                    <input type="text" name="Name" class="form-control" placeholder="Enter Name" value="<?php echo $Name; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Department" >Department</label>
                                    <select class="form-control" name="Department" id="Department">
                                        <option value="Automobile" <?php if($Department == "Automobile") echo "selected"; ?>>Automobile</option>
                                        <option value="Civil" <?php if($Department == "Civil") echo "selected"; ?>>Civil</option>
                                        <option value="Computer" <?php if($Department == "Computer") echo "selected"; ?>>Computer</option>
                                        <option value="ECE" <?php if($Department == "ECE") echo "selected"; ?>>ECE</option>
                                        <option value="EEE" <?php if($Department == "EEE") echo "selected"; ?>>EEE</option>
                                        <option value="Mechanical" <?php if($Department == "Mechanical") echo "selected"; ?>>Mechanical</option>
                                        <option value="IT" <?php if($Department == "IT") echo "selected"; ?>>IT</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label> <br>
                                    <input type="radio" name="Gender" value="Male" <?php if($Gender == "Male") echo "checked"; ?>> Male
                                    <input type="radio" name="Gender" value="Female" <?php if($Gender == "Female") echo "checked"; ?>> Female
                                    <input type="radio" name="Gender" value="Other" <?php if($Gender == "Other") echo "checked"; ?>> Other
                                    <br><br>
                                </div>
                                <div class = "form-group">
                                        <label>DOB</label>
                                        <input type="Date" name="Date" required>
                                        <br><br>
                                </div>
                                <div class="form-group">
                                    <label><input type="checkbox" name="Skills" value="Java"> Java</label><br>
                                    <label><input type="checkbox" name="Skills" value="Python"> Python</label><br>
                                    <label><input type="checkbox" name="Skills" value="PHP"> PHP</label><br>
                                    <label><input type="checkbox" name="Skills" value="C"> C</label><br>
                                    <label><input type="checkbox" name="Skills" value="C++"> C++</label><br>
                                </div>
                                </form>
                                <div>
                                    <label>Mobile Number</label>
                                    <input type="text" name="Mobile_no" maxlength="10" required placeholder="Enter Mobile No">
                                </div> 
                                <input type="submit" class="btn btn-primary" name="submit" value="Add">
                                </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>