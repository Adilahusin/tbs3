// Sorting function for tables
function sortTable(tableId, columnIndex) {
    console.log('sortTable called:', tableId, columnIndex);
    const table = document.getElementById(tableId);
    const rows = Array.from(table.querySelectorAll("tbody tr"));
    const header = table.querySelectorAll("thead th")[columnIndex];
    const asc = header.classList.contains("asc");

    rows.sort((rowA, rowB) => {
        const cellA = rowA.querySelectorAll("td")[columnIndex].textContent.trim();
        const cellB = rowB.querySelectorAll("td")[columnIndex].textContent.trim();

        return asc ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
    });

    table.querySelector("tbody").innerHTML = '';
    rows.forEach(row => table.querySelector("tbody").appendChild(row));

    const allHeaders = table.querySelectorAll("thead th");
    allHeaders.forEach(header => header.classList.remove("asc", "desc"));
    header.classList.toggle(asc ? "desc" : "asc");
    updateSortIcons(allHeaders, tableId);
}

// Function to update sorting icons
function updateSortIcons(headers, tableId) {
    console.log('updateSortIcons called:', tableId);
    headers.forEach(header => {
        const table = document.getElementById(tableId);
        const sortIcon = header.querySelector(".sort-icon");
        const primaryColor = "#9932CC";

        if (sortIcon) {
            sortIcon.classList.remove("asc", "desc");

            if (header.classList.contains("asc")) {
                sortIcon.classList.add("asc");
                sortIcon.innerHTML = `<span style="color: ${primaryColor}">&#x25BC;</span>`;
            } else if (header.classList.contains("desc")) {
                sortIcon.classList.add("desc");
                sortIcon.innerHTML = `<span style="color: ${primaryColor}">&#x25B2;</span>`;
            } else {
                sortIcon.innerHTML = '&#x25B2;&#x25BC;';
            }
        }
    });
}
