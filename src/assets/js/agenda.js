const events = {
  '2025-06-25': { tipo: 'Apresentação final' },
  '2025-06-30': { tipo: 'Avaliação/atividade' }
};

function toggleForm() {
  const form = document.getElementById('event-form');
  form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
}

function addEvent() {
  const dateInput = document.getElementById('event-date').value;
  const descInput = document.getElementById('event-desc').value;

  if (!dateInput || !descInput) {
    alert("Preencha a data e a descrição.");
    return;
  }

  events[dateInput] = { tipo: descInput };

  const date = new Date(dateInput);
  const year = date.getFullYear();
  const month = date.getMonth();

  generateCalendar('calendar-summary', year, month, 'summary', 'summary-title');
  generateCalendar('calendar-detailed', year, month, 'detailed', 'detailed-title');

  document.getElementById('event-date').value = '';
  document.getElementById('event-desc').value = '';
  document.getElementById('event-form').style.display = 'none';
}

function formatDateKey(year, month, day) {
  return `${year}-${(month + 1).toString().padStart(2,'0')}-${day.toString().padStart(2,'0')}`;
}

function generateCalendar(containerId, year, month, type, titleId=null) {
  const monthNames = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
    'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

  const firstDay = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month +1, 0).getDate();
  let dayCounter = firstDay === 0 ? 0 : firstDay;

  let html = '<table><thead><tr>'+
    '<th>Dom</th><th>Seg</th><th>Ter</th><th>Qua</th><th>Qui</th><th>Sex</th><th>Sáb</th>'+
    '</tr></thead><tbody><tr>';

  for(let i=0; i < dayCounter; i++) html += '<td></td>';

  for(let day=1; day <= daysInMonth; day++) {
    const dateKey = formatDateKey(year, month, day);
    const hasEvent = events[dateKey];

    if(type === 'detailed') {
      html += `<td ${hasEvent ? `onclick="showEvent('${dateKey}')"` : ''}><span class="${hasEvent ? 'has-event' : ''}">${day}</span></td>`;
    } else if(type === 'summary') {
      html += `<td><span class="${hasEvent ? 'event-dot' : ''}">${day}</span></td>`;
    }

    dayCounter++;
    if(dayCounter % 7 === 0) html += '</tr><tr>';
  }

  html += '</tr></tbody></table>';

  document.getElementById(containerId).innerHTML = html;

  if(titleId) {
    document.getElementById(titleId).innerText = `${monthNames[month]} ${year}`;
  }
}

function showEvent(dateKey) {
  const event = events[dateKey];
  const container = document.getElementById('event-info');

  if (!event) {
    container.innerHTML = `<strong>Nenhum evento para essa data.</strong>`;
  } else {
    const hoje = new Date();
    const dataEvento = new Date(dateKey);
    
    const diffTime = dataEvento - hoje;
    const diffDias = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    let proximidade = '';
    if (diffDias === 0) {
      proximidade = '⚠️ É hoje!';
    } else if (diffDias === 1) {
      proximidade = '⏳ Faltam 1 dia';
    } else if (diffDias > 1 && diffDias <= 7) {
      proximidade = `⏳ Faltam ${diffDias} dias`;
    } else if (diffDias > 7) {
      proximidade = `📅 Ainda faltam ${diffDias} dias`;
    } else {
      proximidade = '✅ Evento já passou';
    }

    container.innerHTML = `
      <h3>Detalhes do Evento</h3>
      <p><strong>Tipo:</strong> ${event.tipo}</p>
      <p><strong>Data:</strong> ${new Date(dateKey).toLocaleDateString()}</p>
      <p><strong>Status:</strong> ${proximidade}</p>
    `;
  }

  container.style.display = 'block';
}

// Inicializa o calendário com o mês atual
const today = new Date();
generateCalendar('calendar-summary', today.getFullYear(), today.getMonth(), 'summary', 'summary-title');
generateCalendar('calendar-detailed', today.getFullYear(), today.getMonth(), 'detailed', 'detailed-title');


//atualiza os outros calendários
let currentYear = today.getFullYear();
let currentMonth = today.getMonth();

function changeMonth(delta) {
  currentMonth += delta;

  // Corrige quando passar de Dezembro ou Janeiro
  if (currentMonth < 0) {
    currentMonth = 11;
    currentYear--;
  } else if (currentMonth > 11) {
    currentMonth = 0;
    currentYear++;
  }

  generateCalendar('calendar-summary', currentYear, currentMonth, 'summary', 'summary-title');
  generateCalendar('calendar-detailed', currentYear, currentMonth, 'detailed', 'detailed-title');
}


// Estiliza <select> dinamicamente
const select = document.getElementById('tipo-evento');
select.addEventListener('change', function () {
  select.classList.remove('calendar', 'avaliacao', 'evento');

  if (this.value === 'calendario-letivo') {
    select.classList.add('calendar');
  } else if (this.value === 'avaliacao') {
    select.classList.add('avaliacao');
  } else if (this.value === 'evento') {
    select.classList.add('evento');
  }
});
