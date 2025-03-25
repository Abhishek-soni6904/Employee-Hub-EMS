const sidebarToggle = document.getElementById("toggle-btn");
const sidebar = document.querySelector(".sidebar");

sidebarToggle.addEventListener("click", () => {
  sidebar.classList.toggle("collapsed");
});

class CustomTable {
  constructor(tableId) {
    this.table = document.getElementById(tableId);
    this.tbody = this.table.querySelector("tbody");
    this.originalRows = Array.from(this.tbody.querySelectorAll("tr"));
    this.currentPage = 1;
    this.entriesPerPage =
      parseInt(document.getElementById("entriesSelect").value) || 10;
    this.sortColumn = null;
    this.sortDirection = "asc";
    this.searchTerm = "";

    this.setupEventListeners();
    this.updateTable();
  }

  setupEventListeners() {
    this.table.querySelectorAll("th[data-sort]").forEach((th) => {
      th.addEventListener("click", () => this.handleSort(th.dataset.sort));
    });

    const searchInput = document.getElementById("searchInput");
    let debounceTimeout;
    searchInput.addEventListener("input", (e) => {
      clearTimeout(debounceTimeout);
      debounceTimeout = setTimeout(() => {
        this.searchTerm = e.target.value.toLowerCase().trim();
        this.currentPage = 1;
        this.updateTable();
      }, 300);
    });

    document.getElementById("entriesSelect").addEventListener("change", (e) => {
      this.entriesPerPage = Number(e.target.value) || 10;
      this.currentPage = 1;
      setTimeout(() => this.updateTable(), 10); // Small delay to ensure UI updates properly
    });

    document.getElementById("prevPage").addEventListener("click", () => {
      if (this.currentPage > 1) {
        this.currentPage--;
        this.updateTable();
      }
    });

    document.getElementById("nextPage").addEventListener("click", () => {
      const totalFilteredRows = this.getFilteredRows().length;
      const maxPage = Math.ceil(totalFilteredRows / this.entriesPerPage);

      if (this.currentPage < maxPage) {
        this.currentPage++;
        this.updateTable();
      }
    });
  }

  handleSort(column) {
    this.sortDirection =
      this.sortColumn === column && this.sortDirection === "asc"
        ? "desc"
        : "asc";
    this.sortColumn = column;

    // Remove previous icons and reset others
    this.table.querySelectorAll("th .sort-icon").forEach((icon) => {
      icon.textContent = "";
    });

    const activeHeader = this.table.querySelector(`th[data-sort="${column}"]`);
    if (activeHeader) {
      const icon = activeHeader.querySelector(".sort-icon");
      if (icon) {
        icon.textContent = this.sortDirection === "asc" ? "▲" : "▼";
      }
    }

    this.updateTable();
  }

  getFilteredRows() {
    return this.searchTerm
      ? this.originalRows.filter((row) =>
          [...row.cells].some((cell) =>
            cell.textContent?.toLowerCase().includes(this.searchTerm)
          )
        )
      : this.originalRows.slice();
  }

  sortRows(rows) {
    if (!this.sortColumn) return rows;

    return rows.sort((a, b) => {
      let aVal = a.querySelector(
        `td[data-label="${
          this.sortColumn.charAt(0).toUpperCase() + this.sortColumn.slice(1)
        }"]`
      );
      let bVal = b.querySelector(
        `td[data-label="${
          this.sortColumn.charAt(0).toUpperCase() + this.sortColumn.slice(1)
        }"]`
      );

      if (!aVal || !bVal) return 0;

      if (this.sortColumn === "salary") {
        aVal = parseFloat(a.querySelector(`td[data-label="Salary"]`)?.getAttribute("data-value") || "0");
        bVal = parseFloat(b.querySelector(`td[data-label="Salary"]`)?.getAttribute("data-value") || "0");
        return this.sortDirection === "asc" ? aVal - bVal : bVal - aVal;
      } else {
        aVal = aVal.textContent.trim();
        bVal = bVal.textContent.trim();
      }
      

      return this.sortDirection === "asc"
        ? aVal.localeCompare(bVal, undefined, { numeric: true })
        : bVal.localeCompare(aVal, undefined, { numeric: true });
    });
  }

  updateTable() {
    const filteredRows = this.getFilteredRows();

    const sortedRows = this.sortRows(filteredRows);
    const start = (this.currentPage - 1) * this.entriesPerPage;
    const end = Math.min(start + this.entriesPerPage, sortedRows.length);
    const total = sortedRows.length;

    document.getElementById("startEntry").textContent = total ? start + 1 : 0;
    document.getElementById("endEntry").textContent = end;
    document.getElementById("totalEntries").textContent = total;

    document.getElementById("prevPage").disabled = this.currentPage === 1;
    document.getElementById("nextPage").disabled =
      this.currentPage >= Math.ceil(total / this.entriesPerPage);

    this.tbody.innerHTML = "";
    sortedRows.slice(start, end).forEach((row) => {
      this.tbody.appendChild(row.cloneNode(true));
    });
  }
}

document.addEventListener("DOMContentLoaded", () => {
  new CustomTable("employeesTable");
});

function confirmDelete(employeeId) {
  if (confirm("Are you sure you want to delete this employee?")) {
    window.location.href = `delete_employee.php?id=${employeeId}`;
  }
}
