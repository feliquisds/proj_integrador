//abaixo botão add evento
function toggleForm() {
  const form = document.getElementById('event-form');
  form.style.display = form.style.display === 'none' ? 'block' : 'none';
} //deixar oculto inicialmente 

function addEvent() {
  const dateInput = document.getElementById('event-date').value;
  const descInput = document.getElementById('event-desc').value;

  if (!dateInput || !descInput) {
    alert('Preencha a data e a descrição do evento!');
    return;
  }

  events[dateInput] = descInput;

  const date = new Date(dateInput);
  const year = date.getFullYear();
  const month = date.getMonth();

  generateCalendar('calendar-sumary', year, month, 'summary', 'html');
  generateCalendar('calendar-detailed', year, month, 'detailed');

  document.getElementById('event-date').value = '';
  document.getElementById('event-desc').value = '';
}

//----------------------------------------------------------------------------------------

function formatDateKey(year, month, day) {
  return `${year}-${(month + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
}

function generateCalendar(containerId, year, month, type, titleId = null) {
  const monthNames = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
    'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

  const firstDay = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  let dayCounter = firstDay === 0 ? 0 : firstDay; // domingo = 0

  const events = {
    '2025-06-05': 'Reunião importante',
    '2025-06-12': 'Entrega de projeto',
    '2025-06-25': 'Apresentação final'
  };

  let html = '<table><thead><tr>' +
    '<th>Dom</th><th>Seg</th><th>Ter</th><th>Qua</th><th>Qui</th><th>Sex</th><th>Sáb</th>' +
    '</tr></thead><tbody><tr>';

  for (let i = 0; i < dayCounter; i++) {
    html += '<td></td>';
  }

  for (let day = 1; day <= daysInMonth; day++) {
    const dateKey = formatDateKey(year, month, day);
    const hasEvent = events[dateKey];

    if (type === 'detailed') {
      html += `<td onclick="showEvent('${dateKey}')" class="${hasEvent ? 'has-event' : ''}">${day}</td>`;
    } else if (type === 'summary') {
      html += `<td>
        ${hasEvent ? `<div class="event-dot" title="${events[dateKey]}"></div>` : '<div style="height: 8px;"></div>'}
        <div>${day}</div>
      </td>`;
    }

    dayCounter++;
    if (dayCounter % 7 === 0) html += '</tr><tr>';
  }

  html += '</tr></tbody></table>';
  document.getElementById(containerId).innerHTML = html;

  // Atualiza o título, se fornecido
  if (titleId) {
    document.getElementById(titleId).innerText = `${monthNames[month]} ${year}`;
  }
}

function showEvent(dateKey) {
  alert(`Evento em: ${dateKey}`);
}

window.onload = function () {
  generateCalendar('calendar-sumary', 2025, 5, 'summary', 'html');
  generateCalendar('calendar-detailed', 2025, 5, 'detailed');
};
