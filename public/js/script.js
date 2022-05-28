const date = new Date();

function To2(val) {
    return (val<10 ? "0"+val : val);
}

const renderCalendar = () => {

    date.setDate(1);

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

    for (let x = firstDayIndex; x > 0; x--) {
        days =
        days += `<div id="`+ date.getFullYear() + `-`+ To2(date.getMonth()) + `-`+ To2(x) + `" name="day" class="calendar__date calendar__date--grey"><span class="span">${prevLastDay - x + 1}</span></div>`;
    }

    for (let i = 1; i <= lastDay; i++) {
        if (
            i === new Date().getDate() &&
            date.getMonth() === new Date().getMonth()
        ) {
            days += `<div id="`+ date.getFullYear() + `-`+ To2(date.getMonth() + 1) + `-`+ To2(i) + `"name="day" class="calendar__date calendar__date--selected calendar__date--range-end"><span class="span">${i}</span></div>`;
        } else {
            days += `<div id="`+ date.getFullYear() + `-`+ To2(date.getMonth() + 1) + `-`+ To2(i) + `"name="day" class="calendar__date"><span class="span">${i}</span></div>`;
        }
    }

    for (let j = 1; j <= nextDays; j++) {
        days += `<div id="`+ date.getFullYear() + `-`+ To2(date.getMonth() + 2) + `-`+ To2(j) + `"name="day" class="calendar__date calendar__date--grey"><span class="span">${j}</span></div>`;
        monthDays.innerHTML = days;
    }

    return date;
};

const month = document.getElementById('calendar__month');

month.addEventListener('change', (event) => {
    date.setMonth(month.value);
    renderCalendar();
})

