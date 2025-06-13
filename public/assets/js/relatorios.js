function generateCalendar() {
    const now = new Date();
    const month = now.getMonth();
    const year = now.getFullYear();
    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    let calendarHTML = '<table><thead><tr><th>Dom</th><th>Seg</th><th>Ter</th><th>Qua</th><th>Qui</th><th>Sex</th><th>Sáb</th></thead></tr><tr>';


    let adjustedFirstDay = firstDay === 0 ? 7 : firstDay;

    for (let i = 1; i < adjustedFirstDay; i++) {
        calendarHTML += '<td></td>';
    }

    for (let day = 1; day <= daysInMonth; day++) {
        calendarHTML += `<td>${day}</td>`;
        if ((day + adjustedFirstDay - 1) % 7 === 0) {
            calendarHTML += '</tr><tr>';
        }
    }

    calendarHTML += '</tr></table>';
    document.getElementById('calendar-date').innerHTML = calendarHTML;
}

function generateCharts() {
    new Chart(document.getElementById('chartNotas'), {
        type: 'bar',
        data: {
            labels: ['Turma A', 'Turma B'],
            datasets: [{
                label: 'Notas',
                data: [4, 10],
                backgroundColor: ['#c2f2c2', '#8cd98c']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 10
                }
            }
        }
    });

    new Chart(document.getElementById('chartFrequencia'), {
        type: 'bar',
        data: {
            labels: ['Turma A', 'Turma B'],
            datasets: [{
                label: 'Frequência',
                data: [8, 14],
                backgroundColor: ['#c2f2c2', '#8cd98c']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 20
                }
            }
        }
    });
}

window.onload = function () {
    generateCalendar();
    generateCharts();
};