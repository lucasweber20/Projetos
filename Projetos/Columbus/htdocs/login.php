<?php
    $login = isset($_POST["login"]) ? $_POST["login"] : '';
    $entrar = isset($_POST["entrar"]) ? $_POST["entrar"] : '';
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : '';
    $connect = mysqli_connect("localhost", "root", "", "credenciais");

    if (isset($entrar)) {
        $stmt = $connect->prepare("SELECT * FROM usuarios WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
            if (password_verify($senha, $usuario['senha'])) { // Verifica com o hash, se for igual, acessa a conta
                setcookie("login", $login); 
                header("Location: criativo.php"); // Cabeçalho para redirecionar
            } else {
                echo "<script>alert('Credenciais incorretas'); window.location.href = 'index.html';</script>";
                die();
            }
        } else {
            echo "<script>alert('Credenciais incorretas'); window.location.href = 'index.html';</script>";
            die();
        }
    }
?>
