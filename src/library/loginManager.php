<?php
session_start();
function authUser()
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $data = json_decode(file_get_contents("../../resources/users.json"));
    $users = $data->users;
    $userpassword = $users[0]->password;
    $useremail = $users[0]->email;

    if ($email == $useremail && password_verify($pass, $userpassword)) {
        $_SESSION['startTime'] = time();
        unset($_POST['login']);
        header("Location: ../dashboard.php");
        exit();
    } else {
        header("Location: ../../index.php");
        exit();
    }
}

function logout(): void{
    unset($_SESSION);
    destroySessionCookie();
    session_destroy();
}

function destroySessionCookie(){
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
}