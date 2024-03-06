<?php
session_start();
include './condb.php';
$errors = array();
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    $sql = "SELECT * FROM user WHERE username=? OR email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $email);
    $stmt->execute();
    $data = $stmt->fetch();

    if ($data) {
        if ($data['username'] == $username) {
            array_push($errors, "Username already exists");
        }
        if ($data['email'] == $email) {
            array_push($errors, "Email already exists");
        }
    }

    if ($password_1 != $password_2) {
        array_push($errors, "Password is Match.");
    }
    // echo count($errors);
    if (count($errors) == 0) {
        $password = md5($password_1);
        $sql = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $password);
        $stmt->execute();
        $_SESSION['username'] = $username;
        header("Location: ../login.php");
    } else {
        header("Location: ../register.php");
    }
}
