document.addEventListener("DOMContentLoaded", function () {
    const tbody = document.querySelector("#deals-table tbody");
    const totalSum = document.getElementById("total-sum");

    if(tbody) {
        fetch(`/ajax/getDeals.php`)
        .then(response => response.json())
        .then(data => {
            tbody.innerHTML = '';

            data.results.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                        <td>${row.id}</td>
                        <td>${row.name}</td>
                        <td>${parseFloat(row.prices).toLocaleString('ru-RU', {minimumFractionDigits: 2})}</td>
                    `;
                    tbody.appendChild(tr);
                });
                totalSum.textContent = parseFloat(data.total).toLocaleString('ru-RU', {minimumFractionDigits: 2});
        })
        .catch(error => {

        });
    }

    const maxBrones = 5;
    let loadCalendar = true;

    $('#mydate').click(function(){
        if(loadCalendar) {
            loadCalendar = false;
            let placeholder = $('#mydate').attr('placeholder');
            $('#mydate').attr('placeholder', 'Ищем доступные даты...');

            fetch(`/ajax/getDeals.php?type=booking`)
            .then(response => response.json())
            .then(data => {
                let selectableDates = [];
                for(let [dateStr, count] of Object.entries(data)) {
                    if(count < maxBrones) {
                        const [year, month, day] = dateStr.split('-');
                        selectableDates.push({
                            date: new Date(year, month - 1, day)
                        });
                    }
                }
                $('#mydate').glDatePicker({
                    selectableDates: selectableDates
                });
                $('#mydate').attr('placeholder', placeholder);
                $('#mydate').focus();
            })
            .catch(error => {
        
            });
        }
    });
});