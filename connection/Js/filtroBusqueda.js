function buscar() {
    var input, filter, table, tr, td, i, j, txtValue, found;
    input = document.getElementById("busqueda");
    filter = input.value.toUpperCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
        tds = tr[i].getElementsByTagName("td");
        found = false;
        for (j = 0; j < tds.length; j++) {
            td = tds[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
        }
        if (found) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}
