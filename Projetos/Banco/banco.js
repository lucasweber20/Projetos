
var lista_usuarios = []
var lista_senhas = []

function criarConta() {

	var nomeUsuario = document.getElementById('nome_usuario').value;
	var senhaUsuario = document.getElementById('senha_usuario').value;
	var senhaUsuarioRepetir = document.getElementById('senha_usuario_repetir').value;

	if ( senhaUsuario != senhaUsuarioRepetir ) {

		alert('As senha não são compatíveis')

	} else if ( senhaUsuario == senhaUsuarioRepetir ) {

		alert('Nada acontece')

	}
}

function fazerLogin() {

	var usuarioValor = document.getElementById('usuario').value;
	var senhaValor = document.getElementById('senha').value;

	if ( usuarioValor == "Lucas" || senhaValor == "pass") {
		location.href = "painel-usuario.html";
	} else {
		location.href = "criar_conta.html";
	}


}

function sairConta() {
	location.href = "painel-login.html";
}