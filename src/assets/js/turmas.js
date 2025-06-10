function mudarMateria(select) {
    const materia = select.value;
    document.getElementById("titulo-turma").innerText = "Turma: " + materia;
    // Aqui você pode futuramente trocar conteúdo com base na matéria escolhida
}

window.onload = function () {
    const ctx = document.getElementById('graficoTurma').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Kauê Souza', 'Evelyn Cardoso', 'Ana Montana', 'Felixz'],
            datasets: [{
                label: 'Nota Média',
                data: [7.8, 6.5, 6.0, 4.6],
                backgroundColor: ['#f5c116', '#555cb3', '#888', '#f55'],
                borderRadius: 6
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 10
                }
            }
        }
    });
}