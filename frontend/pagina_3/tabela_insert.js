// Importando a função
import {saudar} from './tabela_select_1';

const botao_editar = document.getElementById("botao_editar");
const opcoes = document.getElementById("opcoes");

const botao_novo = document.getElementById("botao_novo");
const botao_deletar = document.getElementById("botao_deletar");

const form_novo = document.getElementById("forms_novo");
const forms_heroi = document.getElementById("forms_heroi");
const cancelar_novo = document.getElementById("cancelar_novo");

// Abre e fecha o menu
botao_editar.onclick = () => {
    if(opcoes.style.display === "none"){  /* muda a teg de deixar escondido none/block */
        opcoes.style.display = "block";
    } else{
        opcoes.style.display = "none";
    }
}

// Abrir formulário de cadastro
botao_novo.onclick = () => {
    form_novo.style.display = "block";
    opcoes.style.display = "none";
}

// Cancelar cadastro
cancelar_novo.onclick = () => {
    form_novo.style.display = "none";
    forms_heroi.reset();
}

// Enviar cadastro
forms_heroi.onsubmit = (evento) => {
    evento.preventDefault();  // Essa parte cancela o comportamento padrão do navegador, assim se tem o controle sobre o que acontece em seguida

    const dados = {
        nome: document.getElementById("nome").value,
        ano: document.getElementById("ano").value,
        identidade_secreta: document.getElementById("identidade_secreta").value,
        equipe: document.getElementById("equipe").value,
        classificacao: document.getElementById("classificacao").value,
        url_link: document.getElementById("url_link").value,
        origem: document.getElementById("origem").value
    }

    fetch("http://localhost:8000/insert.php", {
        method: "POST",
        headers: {"Content-Type" : "application/json"},
        body: JSON.stringify(dados)
    }).then(r => r.json())
    .then(r => {
        if(r.success){
            forms_heroi.reset();
            form_novo.style.display = "none";

            select();
        } else{
            alert("Erro ao cadastrar herói!")
        }
    });
}