@extends('layouts.patern')
@section('title')
 Details
@endsection
@section('css')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../asset/dist/css/adminlte.min.css">
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Details</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="callout callout-info">
          <h5><i class="fas fa-info"></i> Titre:</h5>
          {{$tdr->Titre}}.
        </div>

        <!-- Main content -->
        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <div class="row">
            <div class="col-12">
              <h4>
                @foreach ($postuler as $po)
                @if($po->id_tdr==$tdr->id)
                @foreach ($provenir as $pr)
                 @if($pr->id_postuler==$po->id)
                 @foreach($cabinets as $cabinet)
                 @if($cabinet->id==$pr->id_cabinet)
                 <i class="fas fa-globe"></i> {{$cabinet->Libelle}}.
                 <small class="float-right">{{$po->created_at}}</small>     
                 @endif
                 @endforeach
       
                @endif                
                @endforeach  
                @endif                
                @endforeach
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              Du bailleur
              <address>
                <strong>{{$tdr->bailleur->Libelle}}.</strong><br>
                {{$tdr->bailleur->Pays}} <br>
                {{$tdr->bailleur->Adresse}}<br>
                Phone: {{$tdr->bailleur->Telephone}}<br>
                Email: {{$tdr->bailleur->Email}}
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              au Client
              <address>
                <strong>{{$tdr->client->Libelle}}</strong><br>
                {{$tdr->client->Pays}} <br>
                {{$tdr->client->Adresse}}<br>
                Phone: {{$tdr->client->Telephone}}<br>
                Email: {{$tdr->client->Email}}
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>N° reference: {{$tdr->N_reception}}</b><br>
              <br>
              <b>Montant:</b>                    
              @foreach($postuler as $po)
              @if($po->id_tdr==$tdr->id)
              @foreach ($montant as $m)
              @if($m->id_postuler==$po->id)
               {{$m->montant}}  
              @endif
              @endforeach             
              @endif
              @endforeach
              <br>
              <b>Nombre d'expert:</b> {{$tdr->Nbr_expert}}<br>
              <b>Date limite:</b> {{$tdr->Date_limite}}
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <div class="" style="height: 20%; font-size: 30PX;background-color: rgb(1, 33, 80); "> <h3 style="color: white; margin-left: 40%; padding-top: 1%">Liste des experts </h3> </div>
                <thead>
                <tr>
                  <th>Nom & Prenoms</th>
                  <th>Sexe</th>
                  <th>Profil</th>
                  <th>Adresse</th>
                  <th>email</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($postuler as $po)
                  @if($po->id_tdr==$tdr->id)
                  @foreach ($realiser as $r)
                    @if ($r->id_postuler==$po->id)
                    @foreach ($experts as $exp)
                    @if($exp->id==$r->id_expert)
                    <tr>
                      <td>{{"$exp->Nom $exp->Prenoms"}}</td>
                      <td>{{$exp->Sexe}}</td>
                      <td>{{$exp->Profile}}</td>
                      <td>{{$exp->Adresse}}</td>
                      <td>{{$exp->Email}}</td>
                    </tr> 
                    @endif
                    @endforeach
                        
                    @endif
                  @endforeach
                      
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
              <strong>Description:</strong>
              <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
               {{$tdr->Description}}
              </p>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <p class="lead">Montant et Tranches</p>
              <div class="table-responsive">
                <table class="table">
                  <tbody><tr>
                    <th style="width:50%">Montant total:</th>
                    @foreach($postuler as $po)
                    @if($po->id_tdr==$tdr->id)
                    @foreach ($montant as $m)
                    @if($m->id_postuler==$po->id)
                    <th>Montant total</th>
                    <td>{{$m->montant}}</td>  
                    @endif
                    @endforeach             
                    @endif
                    @endforeach
                  </tr>
                 
                  @foreach($postuler as $po)
                  @if($po->id_tdr==$tdr->id)
                  @foreach ($montant as $m)
                  @if($m->id_postuler==$po->id)
                  @foreach ($tranche as $tr)
                  @if($tr->id_montant==$m->id)
                  <tr>
                    <th>{{$tr->Libelle}}</th>
                    <td>{{$tr->Tranche}}</td>
                    {{-- <td>{{$tr->Tranche}}</td> --}}
                  </tr>
                  @endif                   
                  @endforeach  
                  @endif
                  @endforeach             
                  @endif
                  @endforeach
                </tbody></table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-12">
              <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
              <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                Payment
              </button>
              <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
              </button>
            </div>
          </div>
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div>
  <!-- /.content -->
</div>
@endsection
@section('js')
<script src="../../asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../asset/dist/js/demo.js"></script>
@endsection
