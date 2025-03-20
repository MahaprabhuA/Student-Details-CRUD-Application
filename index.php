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
                <div class="card">
                    <div class="card-header">
                        <h1>Student Details Application</h1>
                    </div>
                        <div class="card-body">
                            <button class="btn btn-success"> <a href="add.php" class="text-light"> Add New </a></button>
                            <br/>
                            <br/>
                        <table class="table table-bordered table-responsive w-100">
                                <thead>
                                    <tr>
                                    <th scope="col">S.no<</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Skills</th>
                                    <th scope="col">Mobile No</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php
                                        include 'DBconn.php';
                                        $sql = "select * from Student_details";
                                        $run = mysqli_query($connection,$sql);
                                        $_id = 1;
                                        while($row = mysqli_fetch_array($run))
                                        {
                                            $uid = $row['ID']; 
                                            $ID = $row['ID'];  
                                            $Name = $row['Name'];
                                            $Department = $row['Department'];
                                            $Gender = $row['Gender'];
                                            $Skills = $row['Skills'];
                                            $Mobile_no = $row['Mobile_no'];
                                        ?>
                                        <tr>
                                            <td><?php echo $_id ?></td>
                                            <td><?php echo $ID ?></td>
                                            <td><?php echo $Name ?></td>
                                            <td><?php echo $Department ?></td>
                                            <td><?php echo $Gender ?></td>
                                            <td><?php echo $Skills ?></td>
                                            <td><?php echo $Mobile_no ?></td>
                                            <td>
                                            <a href='edit.php?edit=<?php echo $uid ?>' class="btn btn-success text-light">Edit</a>
                                            <a href='delete.php?dlt=<?php echo $uid ?>' class="btn btn-danger text-light">Delete</a>
                                            </td>
                                        </tr>
                                        
                                        <?php $_id++; } ?>

                                    </tbody>
                                </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>