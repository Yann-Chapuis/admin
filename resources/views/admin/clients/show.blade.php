@extends('admin/template')

@section('css')
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fiche client : {{ $client->enseigne }} (n°{{ $client->id }})</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects Detail</h3>

        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total factures</span>
                      <span class="info-box-number text-center text-muted mb-0">A FAIRE</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Temps passé</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $temps_total }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Dernière mission</span>
                      <span class="info-box-number text-center text-muted mb-0">A FAIRE<span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Recent Activity</h4>
                  @if(count($missions)==0)
                    Aucune Mission
                  @else
                    @foreach($missions as $mission)
                      <div class="post">
                        <div class="row">
                          <div class="col-md-9">
                            <div class="user-block">
                              @if($mission->etat == 1)  <!-- 0 = En attente - 1 = en cours - 2 = terminé - 3 = annulé -->
                              <img class="validate" src="../../img/roading.svg" alt="user image">
                              @elseif($mission->etat == 2)
                              <img class="validate" src="../../img/validate.svg" alt="user image">
                              @elseif($mission->etat == 3)
                              <img class="validate" src="../../img/cancel.svg" alt="user image">
                              @else
                              <img class="validate" src="../../img/time.svg" alt="user image">
                              @endif
                              <span class="username">
                                <a href="">{{ $mission->titre }}</a>  
                              </span>
                              <span class="description">{{ $mission->ct_days }} jours ({{ $mission->start_date }} - {{ $mission->end_date }})</span>
                            </div>
                          </div>
                          <div class="col-md-3 text-center">
                            <span class="price mission_total">{{ number_format($mission->total_amount, 0, '.', ' ') }} €</span>
                            <span class="small">(TMJ : {{ $mission->adr }})</span>
                          </div>
                        </div>
                        <!-- /.user-block -->
                        <p>
                          {{ $mission->descriptif }}
                        </p>

                        <p>
                          <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Voir facture</a>   
                        </p>
                      </div>
                    @endforeach
                  @endif
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-user-tie"></i> {{ $client->enseigne }}</h3>
              <br>
              <div class="text-muted">
                <p class="text-sm">Ville/Code Postal :
                  <b class="d-block">{{ $client->ville }} ({{ $client->cp }})</b>
                </p>
                <p class="text-sm">Principaux contacts :
                  <b class="d-block">{{ $client->email }} ({{ $client->telephone }})</b>
                </p>
                <p class="text-sm">Contacts :
                  @foreach($contacts as $contact)
                    <b class="d-block">{{ $contact->fullname }} ({{ $contact->poste }}) :</b> {{ $contact->email }} - {{ $contact->telephone }}
                  @endforeach
                </p>
              </div>
              <hr>
              <p class="text-muted">Notes :</p>
              <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
<script>
(function() {
$(document).ready(function () {
  bsCustomFileInput.init();
});
  
  var placesAutocomplete = places({
    appId: 'plEI2RQM6E2H',
    apiKey: 'fca9edda418cb2c602527602a5641ccd',
    container: document.querySelector('#address')
  }).configure({
    type: 'city'
  });

  placesAutocomplete.on('change', function resultSelected(e) {
    document.querySelector('#cp').value = e.suggestion.postcode || '';
  });
})();
</script>
@endsection