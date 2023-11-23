document.getElementById("search-form").addEventListener("submit", function (event) {
    event.preventDefault()

    const selectElement = document.querySelector("select[name='escolha_busca']")
    const selectValue = selectElement.value;
    const searchValue = document.querySelector("input[name='busca']").value.toLowerCase()
    const rows = document.querySelectorAll("#data-table tbody tr")

    rows.forEach(row => {
        const cells = row.querySelectorAll("td")
        const cellContent = cells[selectValue].textContent.toLowerCase()

        if (cellContent.includes(searchValue)) {
            row.style.display = "table-row"
        } else {
            row.style.display = "none"
        }
    })
})
