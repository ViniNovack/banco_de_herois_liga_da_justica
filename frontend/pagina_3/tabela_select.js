const tabela_corpo = document.getElementById("corpo_tabela");

let dados_atuais = [];  // Armazena os herois recebidos do banco de dados

export function select(){
    fetch("http://localhost:8000/select.php")
    .then(resposta => resposta.json())
    .then(dados => {
        dados_atuais = dados;
        tabela(dados);
    })
}

export function buscar_heroi(id){
    return dados_atuais.find(item => item.id == id)
}

function tabela(dados){
    let dadosMap = dados.map(item => `
        <tr data-id="${item.id}">
            <td>${item.nome}</td>
            <td>${item.ano}</td>
            <td>${item.identidade_secreta}</td>
            <td>${item.equipe}</td>
            <td>${item.classificacao}</td>
        </tr>
        `).join("")
    tabela_corpo.innerHTML = dadosMap
}

select();