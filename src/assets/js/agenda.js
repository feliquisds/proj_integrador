// Cole aqui todo o seu código JavaScript já corrigido
    const events = {
      '2025-06-05': 'Reunião importante',
      '2025-06-12': 'Entrega de projeto',
      '2025-06-25': 'Apresentação final'
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

      events[dateInput] = descInput;

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
          html += `<td onclick="showEvent('${dateKey}')" class="${hasEvent ? 'has-event' : ''}">${day}"</td>`;
        } else if(type === 'summary') {
          html += `<td>
            ${hasEvent ? `<div class="event-dot" title="${events[dateKey]}"></div>` : '<div style="height: 8px;"></div>'}
            <div>${day}</div>
          </td>`;
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
      alert(`Evento em: ${dateKey}`);
    }

    // Inicializa o calendário com o mês atual ao carregar
    const today = new Date();
    generateCalendar('calendar-summary', today.getFullYear(), today.getMonth(), 'summary', 'summary-title');
    generateCalendar('calendar-detailed', today.getFullYear(), today.getMonth(),  'detailed', 'detailed-title');