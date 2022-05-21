const date = new Date();

const renderCalendar = () => {

    date.setDate(1);
    console.log(date)
    console.log(date.getDay());

    const monthDays = document.querySelector(".calendar__dates");

    const lastDay = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDate();

    const prevLastDay = new Date(
        date.getFullYear(),
        date.getMonth(),
        0
    ).getDate();

    const firstDayIndex = (date.getDay() + 6) % 7;

    const lastDayIndex = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDay();

    const nextDays = 7 - lastDayIndex - 1;

    document.getElementById("calendar__month").value = date.getMonth();

    let days = "";

    console.log(date.getDay())

    for (let x = firstDayIndex; x > 0; x--) {
        days += `<div class="calendar__date calendar__date--grey"><span>${prevLastDay - x + 1}</span></div>`;
    }

    for (let i = 1; i <= lastDay; i++) {
        if (
            i === new Date().getDate() &&
            date.getMonth() === new Date().getMonth()
        ) {
            days += `<div class="calendar__date calendar__date--selected calendar__date--range-end"><span>${i}</span></div>`;
        } else {
            days += `<div class="calendar__date"><span>${i}</span></div>`;
        }
    }

    for (let j = 1; j <= nextDays; j++) {
        days += `<div class="calendar__date calendar__date--grey"><span>${j}</span></div>`;
        monthDays.innerHTML = days;
    }
};

const month = document.getElementById('calendar__month');

month.addEventListener('change', (event) => {
    date.setMonth(month.value);
    renderCalendar();
})

renderCalendar();

