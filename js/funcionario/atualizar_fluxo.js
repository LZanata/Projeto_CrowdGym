// Declara a variável global para o gráfico
let quantiaAluno = null;

// Função para criar o gráfico
function criarGrafico() {
    const ctx = document.getElementById('graficoFluxo').getContext('2d');
    quantiaAluno = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [], // Etiquetas (horas)
            datasets: [{
                label: 'Alunos',
                data: [], // Quantidade de pessoas
                backgroundColor: '#FFF9F3',
                borderColor: '#f57419',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
}

// Função para carregar os dados do gráfico
function carregarDadosGrafico() {
    fetch('../php/funcionario/dados_grafico.php')
        .then(response => response.json())
        .then(data => {
            if (data.labels && data.data) {
                // Atualiza os dados do gráfico
                quantiaAluno.data.labels = data.labels;
                quantiaAluno.data.datasets[0].data = data.data;
                quantiaAluno.update();
            } else {
                console.error("Erro ao carregar dados do gráfico:", data.error);
            }
        })
        .catch(error => console.error("Erro na requisição do gráfico:", error));
}

// Função para atualizar o contador de fluxo
function atualizarFluxo() {
    fetch('../php/funcionario/fluxo_ao_vivo.php')
        .then(response => response.json())
        .then(data => {
            if (data.alunos_treinando !== undefined) {
                document.getElementById('contadorFluxo').innerText = data.alunos_treinando;
            } else {
                console.error("Erro ao buscar dados:", data.error);
            }
        })
        .catch(error => console.error("Erro ao atualizar fluxo:", error));
}

// Carrega os dados ao inicializar a página
criarGrafico();
carregarDadosGrafico();

// Atualiza o contador de fluxo a cada 5 segundos
setInterval(atualizarFluxo, 5000);

// Atualiza o gráfico a cada 1 minuto
setInterval(carregarDadosGrafico, 60000);
