const ctx = document.getElementById('graficoFluxo').getContext('2d');
    const graficoFluxo = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Alunos por Hora',
                data: [],
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

    // Função para carregar o gráfico
    function carregarGraficoFluxo() {
        const academiaId = 1; // Substitua pelo ID da academia apropriado
    
        fetch(`../php/funcionario/obter_historico_fluxo.php?academia_id=${academiaId}`)
            .then(response => response.json())
            .then(data => {
                if (data.erro) {
                    console.error(data.erro);
                    return;
                }
    
                // Atualizar as labels e os dados no gráfico
                graficoFluxo.data.labels = data.labels;
                graficoFluxo.data.datasets[0].data = data.values;
    
                // Atualizar o gráfico
                graficoFluxo.update();
            })
            .catch(error => console.error('Erro ao carregar gráfico de fluxo:', error));
    }
    
    // Chame a função ao carregar a página
    carregarGraficoFluxo();    

    // Atualizar o gráfico a cada segundos
    setInterval(carregarGraficoFluxo, 5000);