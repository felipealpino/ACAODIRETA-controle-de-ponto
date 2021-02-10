/**
 * Função que faz sorting or reverse em uma table de HTML 
 * 
 * @param {HTMLtableElement} table table to sorte
 * @param {number} columnId o index da coluna da tabela para sort
 * @param {boolean} asc determina se o sorting será ascending ou descending
 */
function sortTableByColumn(table, columnId, asc = true){
    const dirModifier = asc ? 1 : -1;
    const tBody = table.querySelector('#myTable');
    const rows = Array.from(tBody.querySelectorAll('tr'));

    //sorting each row
    const sortedRows = rows.sort((a, b) => {
        const aColText = a.querySelector(`td:nth-child(${columnId +1})`).textContent.trim();
        const bColText = b.querySelector(`td:nth-child(${columnId +1})`).textContent.trim();

        return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
    });


    // removendo todos os tr's da table 
    while(tBody.firstChild){
        tBody.removeChild(tBody.firstChild); 
    }

    // adicionando nova sorted row
    tBody.append(...sortedRows);

    // Lembrar como as colunas foram sorted
    table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
    table.querySelector(`th:nth-child(${columnId + 1})`).classList.toggle("th-sort-asc", asc);
    table.querySelector(`th:nth-child(${columnId + 1})`).classList.toggle("th-sort-desc", !asc);
}

function ascendingAndDescending(){
    document.querySelectorAll(".table thead th").forEach(function(item,id){
        item.addEventListener('click', () => {
            var isDesc = item.classList.contains("th-sort-desc");
            sortTableByColumn(document.querySelector('table'), id, isDesc);
        });
    });
}