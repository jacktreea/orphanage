/**
 * Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Datatables Js
 */

 
$(document).ready(function() {
  $("#datatable").DataTable();

  $(document).ready(function () {
    $("#datatable2").DataTable();
  });

  //Buttons examples
  var table = $("#datatable-buttons").DataTable({
    lengthChange: false,
    buttons: ["copy", "excel", "pdf", "colvis"],
  });

  //Buttons examples
  var table = $("#datatable-heuristic").DataTable({
    lengthChange: false,
    buttons: ["copy", "excel", "pdf", "colvis"],
  });

  //Buttons examples
  var table = $("#datatable-volunter").DataTable({
    lengthChange: false,
    buttons: ["copy", "excel", "pdf", "colvis"],
  });
      var table = $("#datatable-donor").DataTable({
        lengthChange: false,
        buttons: ["copy", "excel", "pdf", "colvis"],
      });

  table
    .buttons()
    .container()
    .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");
} );