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
            <h1>Ajouter un client</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Ajouter un client</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    @if(session('info'))
        <div class="alert alert-success" role="alert">
            {{ session('info') }}
        </div>
    @endif
    <section class="content">
      <form method="post" action="{{ route('clients.update', $client->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Informations</h3>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="enseigne">Enseigne</label>
                      <input type="text" name="enseigne" class="form-control" value="{{ $client->enseigne }}">
                    </div>
                    @error('enseigne')
                    <p class="alert alert-danger" style="margin-top:1em;">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="etat">Type</label>
                      <select class="form-control custom-select" name="etat">
                        <option value="0" {{ $client->etat == 0 ? 'selected' : '' }}>Prospect</option>
                        <option value="1" {{ $client->etat == 1 ? 'selected' : '' }}>Client</option>
                        <option value="2" {{ $client->etat == 2 ? 'selected' : '' }}>Ancien client</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label for="ville">Ville</label>
                      <input type="search" id="address" name="ville" class="form-control"  value="{{ $client->ville }}">
                    </div>
                    @error('ville')
                    <p class="alert alert-danger" style="margin-top:1em;">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="cp">Code Postal</label>
                      <input type="text" id="cp" name="cp" class="form-control"  value="{{ $client->cp }}">
                    </div>
                  </div>
                    @error('cp')
                    <p class="alert alert-danger" style="margin-top:1em;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="telephone">Téléphone</label>
                      <input type="number" id="telephone" class="form-control" name="telephone"  value="{{ $client->telephone }}">
                    </div>
                  </div>
                    @error('telephone')
                    <p class="alert alert-danger" style="margin-top:1em;">{{ $message }}</p>
                    @enderror
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-control" value="{{ $client->email }}">
                    </div>
                    @error('email')
                    <p class="alert alert-danger" style="margin-top:1em;">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="picture">
                        <label class="custom-file-label" for="exampleInputFile">Choisir le fichier</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Télécharger</span>
                      </div>
                    </div>
                    @error('picture')
                    <p class="alert alert-danger" style="margin-top:1em;">{{ $message }}</p>
                    @enderror
                  </div>
                  <img class="text-center" src="{{ url('/img/clients/'.$client->picture) }}" alt="{{ $client->enseigne }}_logo">
              </div>
              <!-- /.card-body -->
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Notes</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="note">Notes</label>
                  <textarea id="note" class="form-control" rows="20" name="note">{{ $client->note }}</textarea>
                </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <input id="id" name="id" type="hidden" value="{{ $client->id }}">
      <div class="row">
        <div class="col-12">
          <a href="{{ route('clients.index') }}" class="btn btn-secondary">Retour</a>
          <input type="submit" value="Sauvegarder" class="btn btn-success float-right">
        </div>
      </div></br>
    </form>
          <!-- /.card -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Contacts</h3>
              <div class="card-tools">
              <div class="btn-group btn-group-sm text-right">
                <a href="#" class="btn btn-success btn-addcontact" data-toggle="modal" data-target="#modal-create"><i class="fas fa-plus"></i></a>
              </div>
              </div>
            </div>

            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Poste</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                  <tr>
                    <td>{{ $contact->fullname }}</td>
                    <td>{{ $contact->poste }}</td>
                    <td>{{ $contact->telephone }}</td>
                    <td>{{ $contact->email }}</td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-update{{ $contact->id }}"><i class="fas fa-pen"></i></a>
                      </div>
                    </td>


                    <!-- /.Modifier un contact -->
                    <div class="modal fade" id="modal-update{{ $contact->id }}">
                      <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                              <h4 class="modal-title">Modifier un contact</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <form method="post" action="{{ route('contacts.update', $contact->id) }}">
                               @csrf
                               @method('put')
                                <div class="form-group">
                                  <label for="fullname">Nom*</label>
                                  <input type="text" name="fullname" class="form-control" value="{{ $contact->fullname }}">
                                </div>
                                <div class="form-group">
                                  <label for="poste">Poste</label>
                                  <input type="text" name="poste" class="form-control" value="{{ $contact->poste }}">
                                </div>
                                <div class="form-group">
                                  <label for="telephone">Téléphone</label>
                                  <input type="text" name="telephone" class="form-control" value="{{ $contact->telephone }}">
                                </div>
                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="text" name="email" class="form-control" value="{{ $contact->email }}">
                                </div>
                                <input id="clients_id" name="clients_id" type="hidden" value="{{ $client->id }}">
                                <div class="modal-footer justify-content-between">
                                  <input type="submit" value="Modifier le contact" class="btn btn-primary">
                              </form>
                              <form action="{{ route('contacts.destroy', $contact->id) }}" method="post" style="float:left;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Supprimer" class="btn btn-danger">
                              </form>
                              </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->


                @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- /.Ajouter un contact -->
  <div class="modal fade" id="modal-create">
    <div class="modal-dialog">
      <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Ajouter un contact</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{ route('contacts.store') }}">
             @csrf
              <div class="form-group">
                <label for="fullname">Nom*</label>
                <input type="text" name="fullname" class="form-control" placeholder="François Delahaye">
              </div>
              <div class="form-group">
                <label for="poste">Poste</label>
                <input type="text" name="poste" class="form-control" placeholder="Directeur">
              </div>
              <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" class="form-control" placeholder="0608090705">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="françois.delahaye@gmail.com">
              </div>
              <input id="clients_id" name="clients_id" type="hidden" value="{{ $client->id }}">
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            <input type="submit" value="Créer le contact" class="btn btn-primary">
          </div>
            </form>
          </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
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