<footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="https://brs.ma">BRS</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{ asset('dashboard_files/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('dashboard_files/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dashboard_files/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('dashboard_files/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('dashboard_files/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('dashboard_files/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('dashboard_files/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('dashboard_files/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('dashboard_files/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('dashboard_files/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('dashboard_files/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('dashboard_files/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('dashboard_files/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->

@if (app()->getLocale() == 'ar')
<script src="{{ asset('dashboard_files/rtl/js/adminlte.js') }}"></script>
@else
<script src="{{ asset('dashboard_files/js/adminlte.js') }}"></script>
@endif
<!-- AdminLTE for demo purposes -->


<script src="{{ asset('dashboard_files/js/datatable/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('dashboard_files/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/datatable/dataTables.rowReorder.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/datatable/dataTables.responsive.min.js') }}"></script>

<script>
$(document).ready(function() {
    var table = $('#datatable_responsive').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
        @if (app()->getLocale() == 'ar')
        "language": {
                        "emptyTable":			"<i>لا توجد بيانات متاحة في الجدول</i>",
                        "info":		   		"عرض من _START_ إلى _END_ في _TOTAL_ إدخالات",
                        "infoEmpty":			"عرض من 0 إلى 0 على 0 إدخالات",
                        "infoFiltered":			"(تمت تصفيته من إجمالي _MAX_ عرض)",
                        "infoPostFix":			"(محدث)",
                        "lengthMenu":			"إظهار _MENU_ إدخالات",
                        "loadingRecords":		"تحميل...",
                        "processing":			"معالجة...",
                        "search":			"<span style='font-size:15px;'>يبحث</span>",
                        "searchPlaceholder":		"بحث...",
                        "zeroRecords":			"لا نتيجة.",
                        "paginate": {
                            "first":			"سابق",
                            "last":				"ألاخير",
                            "next":				"التالي",
                            "previous":			"سابق"
                        },
                        "aria": {
                            "sortAscending":	"تفعيل لفرز العمود بترتيب تصاعدي",
                            "sortDescending":	"تمكن من فرز العمود بترتيب تنازلي"
                        }
                        },
                "lengthMenu":		[[3,5,7, 10, 20, 25, 50, -1], [3,5,7, 10, 20, 25, 50, "كافة"]],
                "iDisplayLength":	50,
        @elseif (app()->getLocale() == 'fr')
                "language": {
                                "emptyTable":			"<i>Aucune donnée disponible dans le tableau</i>",
                                "info":		   		"Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                                "infoEmpty":			"Affichage de 0 à 0 sur 0 entrées",
                                "infoFiltered":			"(filtrées depuis un total de _MAX_ entrées)",
                                "infoPostFix":			"(actualisé)",
                                "lengthMenu":			"Afficher _MENU_ entrées",
                                "loadingRecords":		"Chargement...",
                                "processing":			"Traitement...",
                                "search":			"<span style='font-size:15px;'>Chercher:</span>",
                                "searchPlaceholder":		"Rechercher...",
                                "zeroRecords":			"Aucun résultat.",
                                "paginate": {
                                    "first":			"Précédent",
                                    "last":				"Dernière",
                                    "next":				"Suivante",
                                    "previous":			"Précédente"
                                },
                                "aria": {
                                    "sortAscending":	"activer pour trier la colonne par ordre croissant",
                                    "sortDescending":	"activer pour trier la colonne par ordre décroissant"
                                }
                                },     
                  "lengthMenu":		[[3,5,7, 10, 20, 25, 50, -1], [3,5,7, 10, 20, 25, 50, "Tout"]],
                "iDisplayLength":	50,            
       @else

           "language": {
                            "emptyTable":     "No data available in table",
                        "info":           "Showing _START_ to _END_ of _TOTAL_ entries",
                        "infoEmpty":      "Showing 0 to 0 of 0 entries",
                        "infoFiltered":   "(filtered from _MAX_ total entries)",
                        "infoPostFix":    "",
                        "thousands":      ",",
                        "lengthMenu":     "Show _MENU_ entries",
                        "loadingRecords": "Loading...",
                        "processing":     "",
                        "search":         "Search:",
                        "zeroRecords":    "No matching records found",
                        "paginate": {
                            "first":      "First",
                            "last":       "Last",
                            "next":       "Next",
                            "previous":   "Previous"
                        },
                        "aria": {
                            "sortAscending":  ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        }
                        },
                 "lengthMenu":		[[3,5,7, 10, 20, 25, 50, -1], [3,5,7, 10, 20, 25, 50, "All"]],
                "iDisplayLength":	50,
       @endif

    

        

    } );
} );

</script>

</body>
</html>
