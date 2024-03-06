<?php
isset($_POST["action"]) ? $action = $_POST["action"] : $action = "";
if ($action == "adddata") {
    if ($_POST["Income"] < 0 || $_POST["Expenses"] < 0) {
        echo '<script>alert("ป้อนต้องมากกว่า 0")</script>';
        echo '<script>
        window.location.href = "../page/page_add.php"
        </script>';
    } else {
        $date = $_POST["Date"];
        $destrition = $_POST["Destrition"];
        $income = $_POST["Income"];
        $expenses = $_POST["Expenses"];


        include 'condb.php';
        $sql = "INSERT INTO  ledgerid (Date, Destrition , Income, Expenses)
                VALUES ('$date', '$destrition', '$income', '$expenses')";

        if ($conn->multi_query($sql) === TRUE) {
            echo '<script>
        window.location.href = "../index.php"
        </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
} else if ($action == "updatedata") {
    $date = $_POST["Date"];
    $destrition = $_POST["Destrition"];
    $income = $_POST["Income"];
    $expenses = $_POST["Expenses"];
    $id = $_POST["id"];

    include 'condb.php';
    $sql = "UPDATE ledgerid SET 
                                Date='$date',
                                Destrition='$destrition',
                                Income='$income',
                                Expenses='$expenses'  WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        echo '<script>
        window.location.href = "../index.php"
        </script>';
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}



isset($_GET["value"]) ? $deleteData = $_GET["value"] : $deleteData = "";
isset($_GET["target_id"]) ? $deleteData_id = $_GET["target_id"] : $deleteData_id = "";
if ($deleteData == "delete") {
    include 'condb.php';
    $sql = "DELETE FROM ledgerid WHERE id=$deleteData_id";
    if ($conn->query($sql) === TRUE) {
        echo '<script>
        window.location.href = "../index.php"
        </script>';
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
