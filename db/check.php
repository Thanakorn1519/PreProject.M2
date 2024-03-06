<?php

include "./condb.php";
if (isset($_POST['insert'])) {
    $description = $_POST['description'];
    $income = $_POST['income'];
    $expenses = $_POST['expenses'];
    $date = $_POST['date'];
    $user_id = $_POST['user_id'];
    $sql = "INSERT into ledgerid (Date, Description, Income, Expenses, user_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $date);
    $stmt->bindParam(2, $description);
    $stmt->bindParam(3, $income);
    $stmt->bindParam(4, $expenses);
    $stmt->bindParam(5, $user_id);
    $stmt->execute();
    header("Location: ../index.php");
}


if (isset($_POST['update'])) {
    $description = $_POST['description'];
    $income = $_POST['income'];
    $expenses = $_POST['expenses'];
    $date = $_POST['date'];
    $ledgerid_id = $_POST['ledgerid_id'];

    $sql = "UPDATE ledgerid SET Date = ?, Income = ?, Expenses = ?, Description = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $date);
    $stmt->bindParam(2, $income);
    $stmt->bindParam(3, $expenses);
    $stmt->bindParam(4, $description);
    $stmt->bindParam(5, $ledgerid_id);
    $stmt->execute();
    header("Location: ../index.php");
}


if (isset($_POST['delete'])) {
    $id = $_POST['ledgerid_id'];

    $sql = "DELETE FROM ledgerid WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    header("Location: ../index.php");
}
