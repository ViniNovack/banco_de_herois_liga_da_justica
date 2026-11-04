const tabela_corpo = document.getElementById("corpo_tabela");

const botao_editar = document.getElementById("botao_editar");
const opcoes = document.getElementById("opcoes");

const botao_novo = document.getElementById("botao_novo");
const botao_deletar = document.getElementById("botao_deletar");

function select(){
    fetch("http://localhost:8000/select.php")
    .then(resposta => resposta.json())
    .then(dados => tabela(dados))
}

function tabela(dados){
    let dadosMap = dados.map(item => `
        <tr>
            <td>${item.nome}</td>
            <td>${item.ano}</td>
            <td>${item.identidade_secreta}</td>
            <td>${item.equipe}</td>
            <td>${item.classificacao}</td>
        </tr>
        `).join("")
    tabela_corpo.innerHTML = dadosMap
}

botao_editar.onclick = () => {
    if(opcoes.style.display === "none"){      /* muda a teg de deixar escondido none/block */
        opcoes.style.display = "block";
    } else{
        opcoes.style.display = "none";
    }
}

select()