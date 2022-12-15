function adcElemento(){ 
    let a = document.getElementById("cursos");
    let c = document.createElement("div");
    c.setAttribute("class", "cursoTela");
    a.appendChild(c);
    document.getElementById("oi").style.display = "block";
    c.appendChild(document.getElementById("oi"));
    document.getElementById("cursoCont").style.display = "none";
}
function muda(){
  document.getElementById("muda").style.display = "block";
}
function muda2(){
  document.getElementById("muda").style.display = "none";
}
function muda3(){
  document.getElementById("muda").style.display = "none";
  document.getElementById("muda2").style.display = "block";
}
function muda4(){
  document.getElementById("muda2").style.display = "none";
  document.getElementById("muda").style.display = "block";

}   
function mostrarSenha() {
  var senha = document.getElementById("senha");
  if (senha.type === "password") {
    senha.type = "text";
  } else {
    senha.type = "password";
  }
}   
 function altera(){
   document.getElementById("modal").style.display = "flex";
 }
 function fecha(){
    document.getElementById("modal").style.display = "none";
 }
 var numero = 0; 
 function adcCurso(){
    let a2 = document.getElementById("cursos")
    let c2 = document.createElement("div");
    c2.setAttribute("class", "cursoConteudo");
    c2.setAttribute("name", numero);
    numero++;
    a2.appendChild(c2);
    document.getElementById("oi2").style.display = "block";
    c2.appendChild(document.getElementById("oi2"));
    document.getElementById("cursoCont").style.display = "none";
    let e = document.getElementsByClassName("cursoConteudo");
    for (let i = 0; i < e.length; i++) {
      e[i].style.display = "none";
    }
 }
 function volta(){
    let e = document.getElementsByClassName("cursoConteudo");
    for (let i = 0; i < e.length; i++) {
    e[i].style.display = "none";
    }
    let d = document.getElementsByClassName("cursoTela");
    for (let i = 0; i < d.length; i++) {
      d[i].style.display = "block";
    }
    document.getElementById("cursoCont").style.display = "none";
 }
 function mostraCurso(){
    let d = document.getElementsByClassName("cursoConteudo");
    for (let i = 0; i < d.length; i++) {
      /*if(document.getElementById("oi").name == 60){
         d[i].style.display = "block";
      }*/
      d[i].style.display = "block";
    }
    let e = document.getElementsByClassName("cursoTela");
    for (let i = 0; i < e.length; i++) {
      e[i].style.display = "none";
    }
    document.getElementById("cursoCont").style.display = "block";
 }
 /*$(".col-xs-3.col-md-3 .entre").on("mouseenter", function(){
  $("#barras").show();
});

$("div.conteudo_dropdow").on("mouseleave", function(){
  $("#barras").hide();
});*/
function mostraAlunos(){
  let e = document.getElementsByClassName("funcA");;
    for (let i = 0; i < e.length; i++) {
      e[i].style.display = "none";
    }
}