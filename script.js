// Abrir modal
function abrirDetalhes(nome, descricao, imagem) {
    document.getElementById("modal").style.display = "flex";

    document.getElementById("detalhesNome").innerText = nome;
    document.getElementById("detalhesDescricao").innerText = descricao;
    document.getElementById("detalhesImagem").src = imagem;

    gerarHorarios();
}

// Fechar modal clicando fora
window.onclick = function(e){
    if(e.target.id === "modal"){
        document.getElementById("modal").style.display = "none";
    }
};

// Gerar horários de 30 em 30 min
function gerarHorarios(){
    let hora = document.getElementById("hora");
    hora.innerHTML = "";

    for(let h = 8; h <= 17; h++){
        hora.innerHTML += `<option>${h}:00</option>`;
        hora.innerHTML += `<option>${h}:30</option>`;
    }
}

// Validação completa
function validarFormulario(){
    let nome = document.getElementById("nome");
    let gmail = document.getElementById("gmail");
    let data = document.getElementById("data");
    let servico = document.getElementById("servico");

    let valido = true;

    // resetar erros
    [nome, gmail, data, servico].forEach(campo => campo.classList.remove("erro"));

    // Nome
    if(nome.value.trim() === ""){
        nome.classList.add("erro");
        alert("Nome obrigatório!");
        valido = false;
    }

    // Email
    if(!gmail.value.includes("@") || !gmail.value.includes(".com")){
        gmail.classList.add("erro");
        alert("Email inválido!");
        valido = false;
    }

    // Data inválida (passado ou sábado/domingo)
    let d = new Date(data.value);
    let hoje = new Date();

    if(d <= hoje){
        data.classList.add("erro");
        alert("Escolha uma data futura!");
        valido = false;
    }

    if(d.getDay() === 6 || d.getDay() === 0){
        data.classList.add("erro");
        alert("A barbearia não funciona sábado e domingo!");
        valido = false;
    }

    // Serviço
    if(servico.value === ""){
        servico.classList.add("erro");
        alert("Selecione um serviço!");
        valido = false;
    }

    return valido;
}
