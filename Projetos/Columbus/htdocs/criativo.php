<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome para o ícone de lupa -->

    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            height: 100%;
            background-color: #f0f0f0;
        }

        .search-container {
            position: fixed;
            top: 20px;
            right: 110px;
            display: flex;
            align-items: center;
        }

        .search-input {
            padding: 5px 15px 5px 35px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
            width: 200px;
        }

        .search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%) rotate(0deg);
            color: #000;
        }

        .add-button {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 3px 25px;
            background-color: #28a745;
            color: white;
            font-size: 20px;
            border: none;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .add-button:hover {
            background-color: #218838;
        }

        .center-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #dcdcdc;
            width: 1500px;
            height: 620px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-top: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .alert-button {
            background-color: red;
            color: white;
            font-size: 18px;
            padding: 20px 40px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .alert-button:hover {
            background-color: darkred;
        }

        /* Estilo do botão de Logout */
        .logout-button {
            position: fixed;
            bottom: 40px;
            right: 40px;
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .logout-button:hover {
            background-color: #c82333;
        }

        .welcome-message {
            font-size: 24px;
            color: #28a745;
            margin: 20px 0;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <?php

        $login_cookie = isset($_COOKIE['login']) ? $_COOKIE['login'] : null;

        if ( isset($login_cookie)) {
            echo "<div class='welcome-message'>Bem-vindo, $login_cookie!</div>";
        } else {
            echo "<script> alert('Você deve se cadastrar para acessar'); window.location.href = 'registrar.html'; </script>";
            exit();
        }

    ?>

    <div class="search-container">
        <div class="search-icon">
            <i class="fas fa-search"></i>
        </div>
        <input type="text" class="search-input" placeholder="Pesquisar">
    </div>

    <!-- Botão de adicionar -->
    <button class="add-button">
        +
    </button>

    <div class="logout-button">
        <a href="logout.php" style="color:white; text-decoration:none;">Logout</a>
    </div>

    <div class="center-box">
        <button class="alert-button" onclick="location.href='Game/index.html'">LANÇAR</button>
    </div>

</body>
</html>
