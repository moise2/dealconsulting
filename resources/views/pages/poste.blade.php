@extends('pages.parametre.parpartern')
@section('stylcss')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../asset/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../asset/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../asset/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../asset/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../asset/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../../asset/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../asset/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../asset/dist/css/adminlte.min.css">
@endsection
@section('title')
    poste
@endsection
{{-- @include('pages.parametre.nav.nav') --}}
@section('contentheader')
<section class="content-header">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a class="btn btn-app bg-success" style="margin: 1%"role="menuitem" href="#" data-toggle="modal" data-target="#addposte">
            <span class="badge bg-purple">{{$postes->count()}}</span>
            <i class="fas fa-users"></i> Postes
        </a>
          {{-- <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1> --}}
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Layout</a></li>
            <li class="breadcrumb-item active">Top Navigation</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
</section>
@endsection
@section('content')
    <section class="content">
     <div class="container-fluid">
          <div class="modal fade" id="addposte" role="dialog">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content" style="background-color: rgb(241, 242, 243)" >
                    <div class="modal-header" style="background-color: rgb(2, 43, 104)">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="{{route('poste.store')}}" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                              {{ csrf_field() }}
                          <h2>Ajouter un poste</h2>
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <div class="form-group">
                                <label> Libelle:</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" inputmode="Libelle" required style="text-transform: lowercase" name="Libelle">
                                </div>
                                <!-- /.input group -->
                            </div>
                            </div>
                        </div>
                          <div class="form-row">
                              <div class="form-group col-md-12">
                                <div class="form-group">
                                   <label>Adresse:</label>
                                  <div class="input-group">
                                    <textarea required name="Description"  class="form-control" id="Adresse" cols="30" rows="4" inputmode="text"></textarea>
                                  </div>
                                  <!-- /.input group -->
                              </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-block bg-gradient-primary btn-flat">ENREGISTRER</button>
                          <button type="reset" class="btn btn-block bg-gradient-warning btn-flat">ANNULER</button>
                      </div>
                  </form>        
                </div>
            </div>
          </div>
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Postes</h3>
          
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>N°</th>
                    <th>Libelle</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i = 1;
                @endphp
                @foreach ($postes as $pe)
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$pe->Libelle}}</td>
                    <td>{{$pe->Description}}</td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" data-toggle="modal" data-target="#posteModif{{$pe->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                  <div class="modal fade" id="posteModif{{$pe->id}}" role="dialog">
                    <div class="modal-dialog modal-lg" >
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: rgb(43, 43, 44)">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="{{route('poste.store',$pe->id)}}" method="post" enctype="multipart/form-data">
                              <div class="modal-body">
                                      {{ csrf_field() }}
                                      @method('PUT')
                                  <h2>Modifier un poste</h2>
                                  <div class="form-row">
                                    <div class="form-group col-md-12">
                                      <div class="form-group">
                                        <label> Libelle:</label>
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" inputmode="Libelle" required style="text-transform: lowercase" name="Libelle"  value="{{$pe->Libelle}}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    </div>
                                </div>
                                  <div class="form-row">
                                      <div class="form-group col-md-12">
                                        <div class="form-group">
                                           <label>Adresse:</label>
                                          <div class="input-group">
                                            <textarea required name="Description"  class="form-control" id="Adresse" cols="30" rows="4" inputmode="text">{{$pe->Adresse}}</textarea>
                                          </div>
                                          <!-- /.input group -->
                                      </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-block bg-gradient-primary btn-flat">ENREGISTRER</button>
                                  <button type="reset" class="btn btn-block bg-gradient-warning btn-flat">ANNULER</button>
                              </div>
                          </form>
                        </div>
                    </div>
                </div>
                  @php
                  $i +=1;
                @endphp
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
     </div>
      <!-- /.container-fluid -->
    </section>
@endsection
@section('styljs')
<script src="../../asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../asset/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../asset/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../asset/plugins/moment/moment.min.js"></script>
<script src="../../asset/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../../asset/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../asset/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../asset/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../../asset/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../../asset/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../../asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../asset/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }



</script>

@endsection
