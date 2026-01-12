<?php
include_once "../control/endereco.php";
?>
<!DOCTYPE html>
<html lang="pt/BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UTEC OS| Cadastro</title>

  <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css"> 
  <!-- Theme style -->
 <link rel="stylesheet" href="dist/css/adminlte.min.css"> 
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>UTEC</b> OS</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Cadastro</p>

      <form action="#" id="formCadastro">
        <div class="input-group mb-3">
          <input type="text" class="form-control"name="nomedaempresa" id="nomedaempresa"  required placeholder="Nome da Empresa">
          <div class="input-group-append">
            <div class="input-group-text">
            
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="emaildaempresa"  id="emaildaempresa" placeholder="Email da empresa" required>
          <div class="input-group-append">
            <div class="input-group-text">
              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="senha1" name="senha1" placeholder="senha"  minlength="5" required>
          <div class="input-group-append">
            <div class="input-group-text">
            
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="senha2" name="senha2" placeholder="Repita a senha"  minlength="5" required>
          <div class="input-group-append">
            <div class="input-group-text">
            
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               Concordo com os <a href="#">termos</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" onclick="testar()" > Cadastro</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
<script>
var c;

var nome=document.getElementById("nomedaempresa");
var email=document.getElementById("emaildaempresa");
var senha1=document.getElementById("senha1");
var senha2=document.getElementById("senha2");
function testar()
{
 if(senha1.value===senha2.value){
 cadastrar();
 }else{
alert("é necessario as senhas serem iguais"); 
 }

}

function cadastrar() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../control/receber.php", true);
    xhr.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
    );

    xhr.onload = function () {
    	c=xhr.status;
        if (xhr.status === 200) {

            if (xhr.responseText.trim() === "OK") {
                alert("✅ Cadastro realizado com sucesso!");
                    document.location.href="login.php";
                // opcional
                document.getElementById("formCadastro").reset();

            } else {
                alert("❌ " + xhr.responseText);
            }

        } else {
            alert("❌ Erro no servidor: " + xhr.status);
        }
    };

    xhr.onerror = function () {
        alert("❌ Falha de conexão com o servidor");
    };

    var dados =
        "nome=" + encodeURIComponent(nome.value) +
        "&email=" + encodeURIComponent(email.value) +
        "&senha=" + encodeURIComponent(senha1.value);

    xhr.send(dados);
    //alert(c);
    

}
</script>
      

      <a href="login.php" class="text-center">Já tenho Cadastro</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->



 <script src="plugins/jquery/jquery.min.js"></script> 

 <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 

<script src="dist/js/adminlte.min.js"></script> 
</body>
</html>
