let tableMascotas;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener(
  "DOMContentLoaded",
  function () {
    swal("Atención!", "Esta Pagina esta en proceso de Desarrollo", "error");
    tableMascotas = $(document).ready(function () {
      $("#tableMascotas").DataTable({
        paging: true,
        ordering: true,
        order: [[0, "asc"]],
      });
    });
  },
  false
);

function openModal() {
  rowTable = "";
  $("#modalFormMascotas").modal("show");
}
