<?php
 include("valida.php");
 if(isset($_FILES['imagem'])){
    $arquivopng = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
    if(!isset($_SESSION)){session_start();}
    $query_arquivo = "UPDATE alunos SET imagem = '{$arquivopng}' WHERE ID_Aluno = '{$_SESSION['ID_Aluno']}'";
    $resultado = $mysqli->query($query_arquivo) or die($mysqli->error);
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topo Treinamentos - Página Usuário</title>
    <link rel="sortcut icon" href="img/iconetopo.jpg" type="image/jpg" />
    <!-- Required meta tags -->
        <meta name="_token" content="0rst8mWDOBYtdlO3S9n1q798kxr7p0XycsoPLd6h">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/aluno/layout-aluno.css" type="text/css">
        <link rel="stylesheet" href="css/loginNovo.css" type="text/css">
        <script src="js/constroi.js"> </script>
</head>
<header class="topo">
            <div class="background">
                <img src="https://topotreinamentos.com.br/ead/Sistema/public/storage/img/propagandas/4.png" class="img-fluid">
            </div>
            <div class="container relativo">
                <div class="menu">
                    <button class="btn btn-primary" type="button" onclick="altera();">Alterar Avatar</button>
                    <button href="certificado.php" class="btn btn-primary">Baixar</button>
                    <button href="index.html" class="btn btn-danger btn-sm loaderBtn"> Sair </button>

                </div>

                <?php 
                    if(!isset($_SESSION)){session_start();}
                    $arquiv = "SELECT imagem FROM alunos WHERE ID_ALUNO = '{$_SESSION['ID_Aluno']}'";
                    $result = $mysqli->query($arquiv) or die($mysqli->error);
                    $row = mysqli_fetch_array($result);
                    echo '<img class="perfil" src="data:image/jpeg;base64,' . base64_encode( $row['imagem'] ) . '" />';
                ?>>
                
                <div class="nome">
                    <?php if(!isset($_SESSION)){session_start();}
                    echo $_SESSION['nome'];
                    ?>
                </div>
            </div>
</header>
<!-- CORPO DA PAGINA USUARIO -->
<body class="usuario">
    <!-- CABEÇALHO DA PAGINA -->

    <div style="display:flex;">
        <div id="modal">   
            <button type="button" onclick="fecha()">X</button>
                <h3>Selecione um avatar</h3>
                    <form  method="POST" enctype="multipart/form-data">
		                <label for="imagem">Imagem:</label>
		                <input type="file" name="imagem"/>
		                <input type="submit" value="Enviar"/>
	                </form>
        </div>
    </div>
    <!-- TROCA AVATAR DO USUARIO E VOLTA NA PAGINA INICIAL -->
    
    <hr>
    <!--CURSOS DO ALUNO -->
        
    <section id="aulas">
        <div class="container">
            <p class="section-titulo">Seus cursos</p>
            <div class="row">
                    
    <?php 
       
        $oi = $_SESSION['ID_Aluno']; $i = 0;
        $consulta = "SELECT cursos.Nome_curso, cursos.ID_Curso from alunos join aluno_curso_progressos ON aluno_curso_progressos.ID_Aluno = alunos.ID_Aluno join cursos ON cursos.ID_Curso = aluno_curso_progressos.ID_Curso WHERE alunos.ID_Aluno = $oi";
        $con = $mysqli->query($consulta) or die($mysqli->error);
        $i3 = 0;
        while($c = mysqli_fetch_array($con)){
            $oi2 = $c['ID_Curso'];
            $consulta2 = "SELECT cursos.aulas_totais from cursos join aluno_curso_progressos ON aluno_curso_progressos.ID_Curso = cursos.ID_Curso join alunos ON aluno_curso_progressos.ID_Aluno = alunos.ID_Aluno WHERE alunos.ID_Aluno = $oi and cursos.ID_Curso = $oi2";
            $con2 = $mysqli->query($consulta2) or die($mysqli->error);
            $aulas = mysqli_fetch_array($con2)[0];
            echo "<div class='col-12 col-md-4 col-lg-3 p-2'><div class='col-12 curso p-3'><img class='imagem-curso' src='cursos/".$c['ID_Curso']."/".$c['ID_Curso'].".png'><div class = 'nome-curso'>".$c['Nome_curso']."<button class='acessar loaderBtn' onclick='mostraCurso".$c['ID_Curso']."();'>Acessar Curso</button></div></div></div><script>
                            function mostraCurso".$c['ID_Curso']."(){
                            let d = document.getElementsByClassName('cursoConteudo');
                            let u = document.querySelectorAll('#oi2');;
                            let e = document.getElementsByClassName('cursoTela');
                            for (let i = 0; i < e.length; i++) {
                              e[i].style.display = 'none';
                            }
                            document.getElementById('cursoCont').style.display = 'block';
                            let i2 = 0;            
                            for(let i3 = 0; i3 < d.length; i3++){
                               if(i2<u.length && u[i3].getAttribute('name') ==".$c['ID_Curso']."){
                                     d[i3].style.display = 'block';
                                     i2++;
                                }
                            }
                         }
                        </script>";
            for($i2 = 1; $aulas >= $i2;$i2++){
                echo "<div style='text-align:center;display:none' id = 'oi2' name='".$c['ID_Curso']."'>Aula:".$i2."<img  src='cursos/".$c['ID_Curso']."/".$c['ID_Curso'].".png'>"
                ."<a onclick='mostraFase".$c['ID_Curso']."aula".$i2."()'>Fase ".$i2."</a></div>";
                echo "<div id='modal2' name='Curso".$c['ID_Curso']."Aula".$i2."'>
                <a onclick='fechaFase".$c['ID_Curso']."aula".$i2."()'>xx</a>
                <div id='modal2Cont'>Curso:".$c['ID_Curso']." Aula:".$i2." 
                </div>
                <div><a href='cursos/".$c['ID_Curso']."/".$i2."/img/0.jpg'>AULA</a><a href=''>APOSTILA</a><a href='cursos/".$c['ID_Curso']."/".$i2."/fixacao.pdf'>FIXAÇÃO</a><a href='cursos/".$c['ID_Curso']."/".$i2."/teste.txt'>TESTE</a></div>
                </div>
                <script>
                    function mostraFase".$c['ID_Curso']."aula".$i2."(){
                        let contFase = document.getElementsByName('Curso".$c['ID_Curso']."Aula".$i2."');
                        contFase[0].style.display = 'block';
                    }
                    function fechaFase".$c['ID_Curso']."aula".$i2."(){
                        let contFase = document.getElementsByName('Curso".$c['ID_Curso']."Aula".$i2."');
                        contFase[0].style.display = 'none';
                    }
                </script>";
                $i3++;
            }     
            $i++;
        }
        while($i>0){
            echo "<script>adcElemento()</script>";
            $i--;
        }
        while($i3>0){
            echo "<script>adcCurso();</script>";
            $i3--;
        }
    ?>  
              
            </div>
        </div>
    </section>
    </hr>
</body>
</html>