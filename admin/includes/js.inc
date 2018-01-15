<!-- BEGIN SKILLS TEMPLATES -->
<script type="text/html" id="skillTmpl">
    <li class="clearfix">
        <div class="row">
            <div class="col-xs-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="skill-<%=index%>"  name="field_name1[]">
                    <label for="skill-<%=index%>">Event</label>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="skill-<%=index%>"  name="field_name2[]">
                    <label for="skill-<%=index%>">Min</label>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="skill-<%=index%>" name="field_name3[]">
                    <label for="skill-<%=index%>">Max</label>
                </div>
            </div>

        </div>
    </li>
</script>
<!-- END SKILLS TEMPLATES -->

<!-- BEGIN JAVASCRIPT -->

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<script src="assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/imageuploadify.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('input[type="file"]').imageuploadify();
    })
</script>

<script src="assets/js/libs/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/js/libs/bootstrap/bootstrap.min.js"></script>


<script src="assets/js/libs/spin.js/spin.min.js"></script>
<script src="assets/js/libs/inputmask/jquery.inputmask.bundle.min.js"></script>
<script src="assets/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script src="assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
<script src="assets/js/libs/DataTables/dataTables.buttons.min.js"></script>
<script src="assets/js/libs/DataTables/jszip.min.js"></script>
<script src="assets/js/libs/DataTables/pdfmake.min.js"></script>
<script src="assets/js/libs/DataTables/vfs_fonts.js"></script>
<script src="assets/js/libs/DataTables/buttons.html5.min.js"></script>

<script src="assets/js/libs/select2/select2.min.js"></script>
<script src="assets/js/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="assets/js/libs/multi-select/jquery.multi-select.js"></script>
<script src="assets/js/libs/moment/moment.min.js"></script>
<script src="assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="assets/js/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="assets/js/libs/typeahead/typeahead.bundle.min.js"></script>
<script src="assets/js/libs/dropzone/dropzone.min.js"></script>
<script src="assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="assets/js/libs/microtemplating/microtemplating.min.js"></script>
<script src="assets/js/libs/summernote/summernote.min.js"></script>

<script src="assets/js/core/source/App.js"></script>
<script src="assets/js/core/source/AppNavigation.js"></script>
<script src="assets/js/core/source/AppOffcanvas.js"></script>
<script src="assets/js/core/source/AppCard.js"></script>
<script src="assets/js/core/source/AppForm.js"></script>
<script src="assets/js/core/source/AppNavSearch.js"></script>
<script src="assets/js/core/source/AppVendor.js"></script>

<script src="assets/js/core/demo/DemoTableDynamic.js"></script>
<script src="assets/js/core/demo/Demo.js"></script>

<script src="assets/js/core/demo/DemoPageContacts.js"></script>
<script src="assets/js/core/demo/DemoFormComponents.js"></script>

<script src="assets/js/core/demo/DemoFormEditors.js"></script>


<script src="assets/js/libs/flot/jquery.flot.min.js"></script>
<script src="assets/js/libs/flot/jquery.flot.time.min.js"></script>
<script src="assets/js/libs/flot/jquery.flot.resize.min.js"></script>
<script src="assets/js/libs/flot/jquery.flot.orderBars.js"></script>
<script src="assets/js/libs/flot/jquery.flot.pie.js"></script>
<script src="assets/js/libs/flot/curvedLines.js"></script>
<script src="assets/js/libs/jquery-knob/jquery.knob.min.js"></script>
<script src="assets/js/libs/sparkline/jquery.sparkline.min.js"></script>
<script src="assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="assets/js/libs/d3/d3.min.js"></script>
<script src="assets/js/libs/d3/d3.v3.js"></script>
<script src="assets/js/libs/rickshaw/rickshaw.min.js"></script>
<script src="assets/js/core/source/AppVendor.js"></script>
<script src="assets/js/core/demo/Demo.js"></script>
<script src="assets/js/core/demo/DemoDashboard.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: ':contains("Office")'
                    }
                },
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );
</script>

<!-- END JAVASCRIPT -->
