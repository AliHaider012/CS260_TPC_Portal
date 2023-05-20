const oTableFilter = (function () {

    var input;
    var tables = document.getElementsByTagName('table');
    var table = [];

    for (let i = 0; i < tables.length; i++) {
        table[i] = document.getElementById(tables[i].id);
        table[i].tr = table[i].getElementsByTagName('tr');

        if (table[i].tr.length > 1) {
            table[i].td = table[i].tr[1].getElementsByTagName('td');
        }

        for (let j = 0; j < table[i].td.length; j++) {
            input = document.getElementById(table[i].id + j.toString());
            table[i].input = [];
            if (input != null) {
                table[i].input[j] = document.getElementById(table[i].id + j.toString());
                table[i].input[j].addEventListener("keyup", function () {
                    runFilter(table[i].id);
                });
            }
        }
        table[i].addEventListener('click', function (e) {
            if (e.target.tagName.toLowerCase() === 'th') {
                const thIndex = Array.prototype.indexOf.call(e.target.parentNode.children, e.target);
                sortTable(table[i].id, thIndex);
            }
        });
    }

    function sortTable(tableId, column) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById(tableId);
        switching = true;
        dir = "asc";
        while (switching) {
            switching = false;
            rows = table.getElementsByTagName("tr");
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("td")[column];
                y = rows[i + 1].getElementsByTagName("td")[column];
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
            } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }

    function runFilter(parTableName) {
        var table, tr, i, td, nMaxCol, nResult, prefixInputId;
        var td = [], input = [], filter = [], txtValue = [];
        var isDisplay = true;

        table = document.getElementById(parTableName);
        prefixInputId = parTableName;
        tr = table.getElementsByTagName("tr");

        if (tr.length > 1) {
            td = tr[1].getElementsByTagName("td")
            nMaxCol = td.length;
        }

        for (i = 0; i < nMaxCol; i++) {

            if (document.getElementById(prefixInputId + i.toString()) != null) {
                input[i] = document.getElementById(prefixInputId + i.toString());
                filter[i] = input[i].value.toUpperCase();

            } else {
                nMaxCol = i;
            }
        }

        for (i = 1; i < tr.length; i++) {
            isDisplay = true;
            for (j = 0; j < nMaxCol; j++) {
                td = tr[i].getElementsByTagName("td")[j];
                txtValue = td.textContent || td.innerText;

                if (filter[j] != "") {
                    nResult = txtValue.toUpperCase().indexOf(filter[j]);
                    if (nResult <= -1) {
                        isDisplay = false;
                    }
                }
            }

            if (isDisplay) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
})();
