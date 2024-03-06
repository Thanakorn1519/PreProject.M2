<?php
session_start();

include "./condb.php";
$erros = array();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);

    $sql = "SELECT * FROM user WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $stmt->execute();
    $data = $stmt->fetch();

    if ($data) {
        if (count($erros) == 0) {
            $_SESSION['username_id'] = $data['user_id'];
            $_SESSION['username'] = $username;
            header('Location: ../index.php');
        }
    } else {
        $_SESSION['error'] = "Username & Password is wrong.";
        header('Location: ../login.php');
    }
}
