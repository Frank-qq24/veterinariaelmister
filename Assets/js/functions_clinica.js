let TableUltimasHistorias;
let rowTable = ""; 
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

    swal("Atención!", "Esta Pagina esta en proceso de Desarrollo" , "error");
    opciones = $('#myCollapsible').collapse({
        toggle: false
      })
      TableUltimasHistorias =   $(document).ready(function() {
        $('#table_Ultimas_Historias').DataTable({
          "paging": true,
          "ordering": true,
          "order": [[ 0, "asc" ]]
        });
      });
    // TableUltimasHistorias = $('#table_Ultimas_Historias').dataTable( {
    //     "aProcessing":true,
    //     "aServerSide":true,
    //     "language": {
    //         "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    //     }
    //     ,
    //     "ajax":{
    //         "url": " "+ base_url +"/Clinica/getUltimasHistorias",
    //         "dataSrc":""
    //     },
    //     "columns":[
    //         {"data":"ID"},
    //         {"data":"Cliente"},
    //         {"data":"Mascota"},
    //         {"data":"Especie"},
    //         {"data":"Motivo de Consulta"},
    //         {"data":"Estado"},
    //         {"data":"Acciones"}
    //     ],
    //     'dom': 'lBfrtip',
    //     'buttons': [
    //         {
    //             "extend": "copyHtml5",
    //             "text": "<i class='far fa-copy'></i> Copiar",
    //             "titleAttr":"Copiar",
    //             "className": "btn btn-secondary"
    //         },{
    //             "extend": "excelHtml5",
    //             "text": "<i class='fas fa-file-excel'></i> Excel",
    //             "titleAttr":"Esportar a Excel",
    //             "className": "btn btn-success"
    //         },{
    //             "extend": "pdfHtml5",
    //             "text": "<i class='fas fa-file-pdf'></i> PDF",
    //             "titleAttr":"Esportar a PDF",
    //             "className": "btn btn-danger"
    //         },{
    //             "extend": "csvHtml5",
    //             "text": "<i class='fas fa-file-csv'></i> CSV",
    //             "titleAttr":"Esportar a CSV",
    //             "className": "btn btn-info"
    //         }
    //     ],
    //     "resonsieve":"true",
    //     "bDestroy": true,
    //     "iDisplayLength": 10,
    //     "order":[[0,"desc"]]  
    // });

}, false);

function openModal()
{
    $('#modalClinica').modal('show');
}
