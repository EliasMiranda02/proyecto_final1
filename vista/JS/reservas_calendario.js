const today = new Date();
today.setDate(today.getDate()); 
const formattedToday = today.toISOString().split('T')[0]; 

document.getElementById('fecha').value = formattedToday;

const prevMonthButton = document.getElementById("prevMonth");
const nextMonthButton = document.getElementById("nextMonth");
const monthYearDisplay = document.getElementById("monthYear");
const calendarBody = document.getElementById("calendarBody");
const fechaSalidaInput = document.getElementById("fecha_salida");

let currentDate = new Date(); 

function generateCalendar(date) {
    const year = date.getFullYear();
    const month = date.getMonth();
    monthYearDisplay.textContent = `${date.toLocaleString('default', { month: 'long' })} ${year}`;

    const firstDayOfMonth = new Date(year, month, 1);
    const lastDayOfMonth = new Date(year, month + 1, 0);
    const daysInMonth = lastDayOfMonth.getDate();

    const firstDayOfWeek = (firstDayOfMonth.getDay() + 6) % 7; 
    calendarBody.innerHTML = '';

    let row = document.createElement("tr");

    for (let i = 0; i < firstDayOfWeek; i++) {
        const emptyCell = document.createElement("td");
        row.appendChild(emptyCell);
    }

    for (let day = 1; day <= daysInMonth; day++) {
        const cell = document.createElement("td");
        cell.textContent = day;

        const dayOfWeek = new Date(year, month, day).getDay();
        if (dayOfWeek === 2) { 
            cell.classList.add("tuesday");
            const subtext = document.createElement("span");
            subtext.classList.add("subtext");
            subtext.textContent = "SALIDA";
            cell.appendChild(subtext);

            cell.addEventListener("click", () => selectDate(day, month, year));
        } else {
            cell.classList.add("disabled");
            cell.style.pointerEvents = "none";
        }

        row.appendChild(cell);

        if (row.children.length === 7) {
            calendarBody.appendChild(row);
            row = document.createElement("tr");
        }
    }

    while (row.children.length < 7) {
        const emptyCell = document.createElement("td");
        row.appendChild(emptyCell);
    }

    calendarBody.appendChild(row);
}

function selectDate(day, month, year) {
    const selectedDate = new Date(year, month, day);
    const formattedDate = selectedDate.toISOString().split('T')[0];

    const allCells = calendarBody.querySelectorAll("td");
    allCells.forEach(cell => {
        cell.classList.remove("selected");
    });

    const selectedCell = Array.from(calendarBody.querySelectorAll("td")).find(
        cell => cell.textContent == day && cell.classList.contains("tuesday")
    );
    if (selectedCell) {
        selectedCell.classList.add("selected");
    }

    fechaSalidaInput.value = formattedDate;
}

function goToPreviousMonth() {
    currentDate.setMonth(currentDate.getMonth() - 1);
    generateCalendar(currentDate);
}

function goToNextMonth() {
    currentDate.setMonth(currentDate.getMonth() + 1);
    generateCalendar(currentDate);
}

prevMonthButton.addEventListener("click", goToPreviousMonth);
nextMonthButton.addEventListener("click", goToNextMonth);

generateCalendar(currentDate);