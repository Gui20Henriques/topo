<?php
 include("valida.php");
 $consulta = "SELECT * FROM alunos";
 $con = $mysqli->query($consulta) or die($mysqli->error);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/loginNovo.css" type="text/css">
</head>
<body class="usuario">
    <nav>
        <img style="width:100vw; height: 20vh;" src="img/logonav.png">
    </nav>
    <div class="usuarioDiv">
        <img src="img/apertomao.jpg">
        <?php
            $dado = $con->fetch_array();
            echo $dado[1];
        ?>
        <input type="submit" onclick="cadastro();" value="Alterar Senha">
        <a>SAIR</a>
        <a href="certificado.php">BAIXAR</a>
        <h1>Seus Cursos</h1>
        <script>
            function cadastro(){
            alert('login.html');
        }
        </script>
    </div>
    
</body>
</html>