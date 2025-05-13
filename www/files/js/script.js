document.addEventListener("DOMContentLoaded", function () {
    const tbody = document.querySelector("#deals-table tbody");
    const totalSum = document.getElementById("total-sum");

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
});