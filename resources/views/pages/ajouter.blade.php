@extends('pages.template')
@section('css')
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
<link rel="stylesheet" href="../../asset/plugins/summernote/summernote-bs4.min.css">
@endsection
@section('titre')
    TDR-add
@endsection
@section('contenu')

<div class="modal fade" id="modal-bailleur">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Bailleurs</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('bailleur.store')}}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
                {{ csrf_field() }}
            <h2>Ajouter un bailleur</h2>
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="form-group">
                  <label> Libelle:</label>
                  <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control form-control-sm" inputmode="Libelle" required style="text-transform: lowercase" name="Libelle">
                  </div>
                  <!-- /.input group -->
              </div>
              </div>
              <div class="form-group col-md-6">
                
                  <div class="form-group">
                    <label>Telephone:</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input required type="text" class="form-control form-control-sm" data-inputmask="'mask': ['999-999-9999-999', '+099 99 99 9999[9]-9999']" data-mask="" inputmode="text" name="Telephone">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
          </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label>E-mail:</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                    </div>
                    <input type="email" class="form-control form-control-sm" inputmode="email" required style="text-transform: lowercase" name="Email">
                    </div>
                    <!-- /.input group -->
                </div>
                </div>
                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label>Pays:</label>
                    <select required class="form-control form-control-sm select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="Pays">
                      <option selected="selected">Togo</option>
                      @foreach ($countries as $p)
                      <option value="{{$p->countryname}}">{{$p->countryname}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                  <div class="form-group">
                     <label>Adresse:</label>
                    <div class="input-group">
                      <textarea required name="Adresse"  class="form-control form-control-sm" id="Adresse" cols="30" rows="4" inputmode="text"></textarea>
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
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-client">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Clients</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('client.store')}}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
                {{ csrf_field() }}
            <h2>Ajouter un client</h2>
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="form-group">
                  <label> Libelle:</label>
                  <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control form-control-sm" inputmode="Libelle" required style="text-transform: lowercase" name="Libelle">
                  </div>
                  <!-- /.input group -->
              </div>
              </div>
              <div class="form-group col-md-6">
                
                  <div class="form-group">
                    <label>Telephone:</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input required type="text" class="form-control form-control-sm" data-inputmask="'mask': ['999-999-9999-999', '+099 99 99 9999[9]-9999']" data-mask="" inputmode="text" name="Telephone">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
          </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label>E-mail:</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                    </div>
                    <input type="email" class="form-control form-control-sm inputmode="email" required style="text-transform: lowercase" name="Email">
                    </div>
                    <!-- /.input group -->
                </div>
                </div>
                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label>Pays:</label>
                    <select required class="form-control form-control-sm select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="Pays">
                      <option selected="selected">Togo</option>
                      @foreach ($countries as $p)
                      <option value="{{$p->countryname}}">{{$p->countryname}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                  <div class="form-group">
                     <label>Adresse:</label>
                    <div class="input-group">
                      <textarea required name="Adresse"  class="form-control form-control-sm" id="Adresse" cols="30" rows="4" inputmode="text"></textarea>
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
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-responsable">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Responsables</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('responsable.store')}}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
                {{ csrf_field() }}
            <h2>Ajouter un responsable</h2>
            <div class="form-row">
              <div class="form-group col-md-4">
                <div class="form-group">
                  <label> Nom:</label>
                  <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control form-control-sm" inputmode="Nom" required style="text-transform: lowercase" name="Nom">
                  </div>
                  <!-- /.input group -->
              </div>
              </div>
              <div class="form-group col-md-4">
                  <div class="form-group">
                    <label> Prénoms:</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control form-control-sm" inputmode="Prénoms" required style="text-transform: lowercase" name="Prenoms">
                    </div>
                    <!-- /.input group -->
                </div>
                </div>
              <div class="form-group col-md-4">
                <div class="form-group">
                  <label>Sexe</label>
                  <select required class="form-control select2 select2-danger form-control-sm" data-dropdown-css-class="select2-danger" style="width: 100%;" name="Sexe">
                    <option selected="selected">Sexe</option>
                    <option value="Masculin">Masculin</option>
                    <option value="Masculin">Féminin</option>
                  </select>
                </div>
              </div>

          </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label>E-mail:</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                    </div>
                    <input type="email" class="form-control form-control-sm" inputmode="email" required style="text-transform: lowercase" name="Email">
                    </div>
                    <!-- /.input group -->
                </div>
                </div>
                <div class="form-group col-md-6">
                      <div class="form-group">
                        <label>Telephone:</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input required type="text" class="form-control form-control-sm" data-inputmask="'mask': ['999-999-9999-999', '+099 99 99 9999[9]-9999']" data-mask="" inputmode="text" name="Telephone">
                        </div>
                        <!-- /.input group -->
                      </div>
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <div class="form-group">
                      <label>Poste</label>
                      <select required class="form-control form-control-sm select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="id_poste">
                        <option selected="selected">Poste</option>
                        @foreach ($postes as $p)
                           <option value="{{$p->Libelle}}">{{$p->Libelle}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>
              <div class="form-group col-md-6">
                  <div class="form-group">
                      <label>Sexe</label>
                      <select required class="form-control form-control-sm select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="id_cabinet">
                        <option selected="selected">Cabinet</option>
                        @foreach ($cabinets as $p)
                           <option value="{{$p->Libelle}}">{{$p->Libelle}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>
          </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                  <div class="form-group">
                     <label>Adresse:</label>
                    <div class="input-group">
                      <textarea required name="Adresse"  class="form-control form-control-sm" id="Adresse" cols="30" rows="3" inputmode="text"></textarea>
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
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-type">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Types de TDR</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('type.store')}}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
                {{ csrf_field() }}
            <h2>Ajouter un type</h2>
            <div class="form-row">
              <div class="form-group col-md-12">
                <div class="form-group">
                  <label> Libelle:</label>
                  <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control form-control-sm" inputmode="Libelle" required style="text-transform: lowercase" name="Libelle">
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
                      <textarea required name="Description"  class="form-control form-control-sm" id="Description" cols="30" rows="4" inputmode="text"></textarea>
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
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="col-md-9">
    <div class="card card-primary card-outline">
        <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Enregistrer un TDR</h3>
                <div class="card-tools" style="margin-right: 50px">
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">Actions</button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu" style="">
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-client">Nouveau client</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#modal-bailleur">Nouveau Bailleur</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-type">Nouveau Type de TDR</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-responsable">Nouveau Responsable</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Titre</label>
                      <input class="form-control form-control-sm" type="text" placeholder="Titre" name="Titre" required>
                    </div>
                    <!-- /.form-group -->
                  </div>
                </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Type de TDR</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="id_type" required>
                          <option selected="selected">Type de TDR</option>
                            @foreach ($types as $t)
                              <option value="{{$t->id}}">{{$t->Libelle}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Bailleur</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="id_bailleur" required>
                          <option selected="selected">Bailleur</option>
                          @foreach ($bailleurs as $b)
                            <option value="{{$b->id}}">{{$b->Libelle}}</option>
                          @endforeach
                        </select>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Client</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="id_client" required>
                          <option selected="selected">Client</option>
                          @foreach ($clients as $c)
                            <option value="{{$c->id}}">{{$c->Libelle}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Responsable</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="id_responsable" required>
                          <option selected="selected">Responsable</option>
                            @foreach ($responsables as $r)
                              <option value="{{$r->id}}">{{$r->Nom}} {{$r->Prenoms}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Numéro de féférance</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Numéro de référance" name="N_reception" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Nombre d'expert</label>
                        <input class="form-control form-control-sm" type="number" placeholder="Nombre d'expert" name="Nbr_expert" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Date limite</label>
                        <input class="form-control form-control-sm" type="date" placeholder="Date_limite" name="Date_limite" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Heure limite</label>
                        <input class="form-control form-control-sm" type="time" placeholder="Heure" name="Heure" required>
                      </div>
                    </div>
                  </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
              {{-- <div class="card-footer">
                Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                the plugin.
              </div> --}}
            </div>
            <div class="card card-primary card-outline">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px" rows="4" name="Description" required>
                      {{-- <h1><u></u></h1>
                      <h4></h4>
                      <p></p> --}}
                      {{-- <ul>
                        <li>List item one</li>
                        <li>List item two</li>
                        <li>List item three</li>
                        <li>List item four</li>
                      </ul>
                      <p>Thank you,</p>
                      <p>John Doe</p> --}}
                    </textarea>
                </div>
                {{-- <div class="form-group">
                  <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                  <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
                    <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input type="file" name="attachment">
                  </div>
                </div> --}}
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn bg-gradient-primary">Enregistrer</button>
              <button type="reset" class="btn bg-gradient-warning">Annuler</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
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
  // DropzoneJS Demo Code End
</script>
<script src="../../asset/plugins/summernote/summernote-bs4.min.js"></script>>
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>
@endsection