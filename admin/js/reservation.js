// Script for Tab navigation 
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.classList.add("active");

    // Trigger sorting on the table in the active tab
    var activeTable = document.getElementById(tabName).querySelector('.dataTable');
    if (activeTable) {
        $(activeTable).DataTable().order([2, 'asc']).draw(); // Sort by the third column (change as needed)
    }
}

// Open the default tab on page load
document.getElementById("defaultOpen").click();

