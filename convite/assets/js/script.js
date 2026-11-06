const form = document.getElementById('rsvpForm');
const tabelaCorpo = document.querySelector('#guestsTabela tbody');

// 1. FUNÇÃO PARA LER OS DADOS DO "DB" JSON
function lerDados() {
    // Busca a string do localStorage
    const dadosNoBanco = localStorage.getItem('guestsDB');

    // Se existir, transforma de JSON (string) para Array (Objeto JS). Se não, cria array vazio.
    return dadosNoBanco ? JSON.parse(dadosNoBanco) : [];
}

// 2. FUNÇÃO PARA EXIBIR OS DADOS NA TABELA
function atualizarTabela() {
    const guests = lerDados();

    // Limpa a tabela antes de redesenhar
    tabelaCorpo.innerHTML = '';

    // Adiciona cada usuário na tabela HTML
    guests.forEach(guest => {
        const linha = document.createElement('tr');
        linha.innerHTML = `
                    <td>${guest.guestName}</td>
                    <td>${guest.guestCount}</td>
                `;
        tabelaCorpo.appendChild(linha);
    });
}

// 3. FUNÇÃO PARA SALVAR OS DADOS
form.addEventListener('submit', function (event) {
    event.preventDefault(); // Impede a página de recarregar

    // Captura os valores dos inputs
    const guestName = document.getElementById('guestName').value;
    const guestCount = document.getElementById('guestCount').value;

    // Cria o novo objeto de usuário
    const guest = { guestName, guestCount };

    // Obtém a lista atual de usuários do DB
    const listaGuest = lerDados();

    // Adiciona o novo usuário na lista
    listaGuest.push(guest);

    // Converte a lista atualizada para JSON (string) e salva no localStorage
    localStorage.setItem('guestsDB', JSON.stringify(listaGuest));

    // Limpa o formulário
    form.reset();

    // Atualiza a tabela na tela imediatamente
    atualizarTabela();
});

// Executa ao carregar a página para mostrar os dados que já estavam salvos
document.addEventListener('DOMContentLoaded', atualizarTabela);