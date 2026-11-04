const tabela_corpo = document.getElementById("corpo_tabela");

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

select()

export function saudar(){
    return
}