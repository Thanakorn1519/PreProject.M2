<?php
$editData_id = $_GET["target_id"];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../customCSS/custom_index_page.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- opacity image -->
    <!-- Content -->
    <div class="container ">
        <section class="vh-100 gradient-custom-2">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-12 col-xl-10">

                        <div class="card mask-custom">
                            <div class="card-body p-4 text-white">

                                <div class="text-center pt-3 pb-2 text-danger">
                                    <span class="my-4 h1">Information</span>
                                </div>
                                <?php
                                include '../page/condb.php';
                                $sql = "SELECT * FROM ledgerid WHERE ID = $editData_id";
                                $result = $conn->query($sql);
                                $count = 1;
                                $Balance = 0;
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $Balance = $row["Income"] - $row["Expenses"];
                                        echo '
                                        <form action="./check.php" method="post">
                                        <div class="row g-3">
                                            <div class="col-sm-3">
                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="date" value = "'.$row["Date"].'" name="Date" id="form10Example1" class="form-control" placeholder="Date" />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="text" value = "'.$row["Destrition"].'" name="Destrition" id="form10Example1" class="form-control" placeholder="Description" />
    
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="number" value = "'.$row["Income"].'" name="Income" id="form10Example2" class="form-control" placeholder="Income" />
                                                </div>
                                            </div>
                                            <input type="number" value = "'.$editData_id.'" name="id" id="form10Example2" class="form-control" placeholder="Income" hidden />
                                            <div class="col-sm-3">
                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="number" value = "'.$row["Expenses"].'" name="Expenses" id="form10Example3" class="form-control" placeholder="Expenses" />
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="text-end d-flex justify-content-between">
                                            <a href="../index.php">
                                                <button type="button" name="action" value="" class="btn btn-primary">Back</button>
                                            </a>
                                            <button type="submit" name="action" value="updatedata" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                        ';
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $conn->close();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>