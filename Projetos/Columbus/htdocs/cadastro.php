<?php
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $hashSenha = password_hash($senha, PASSWORD_DEFAULT); // Usa bcrypt em vez de md5

    $connect = mysqli_connect("localhost", "root", "", "credenciais"); // Conectar ao banco de dados

    $stmt_select = $connect->prepare("SELECT login FROM usuarios WHERE login = ?");
    $stmt_select->bind_param("s", $login);
    $stmt_select->execute();
    $result_select = $stmt_select->get_result();
    $array = $result_select->fetch_array();
    $array_log = isset($array["login"]) ? $array["login"] : '';

    if ($login == "" || $login == null) {
        echo "<script>alert('O campo de login deve ser preenchido'); window.location.href = 'registrar.html';</script>";
    } else if ($array_log == $login) {
        echo "<script>alert('Usuário já existe'); window.location.href = 'registrar.html';</script>";
    } else {
        $stmt_insert = $connect->prepare("INSERT INTO usuarios (login, senha) VALUES (?, ?)");
        $stmt_insert->bind_param("ss", $login, $hashSenha);
        $insert = $stmt_insert->execute();

        if ($insert) {
            echo "<script>alert('Usuário cadastrado com sucesso'); window.location.href = 'index.html';</script>";
            mysqli_close($connect);
        } else {
            echo "<script>alert('Não foi possível cadastrar esse usuário'); window.location.href = 'registrar.html';</script>";
        }
    }
    mysqli_close($connect);
?>
