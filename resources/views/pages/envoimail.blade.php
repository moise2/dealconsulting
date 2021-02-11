@component('mail::message')


<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"># Deal&amp;Consulting<small>recuperer votre mot de passe</small></h3>
            </div>
            <h3> votre mot de passe est:</h3>
            <h5>{{$request->Nom}}</h5><br>
            <p>{{$request->Prenom}}</p>
            Merci, {{$user->Prenoms}}<br>
            {{ config('app.name') }}
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endcomponent