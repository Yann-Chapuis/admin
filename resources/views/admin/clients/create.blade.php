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
      <form method="post" action="{{ route('clients.store') }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">General</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="enseigne">Enseigne</label>
                      <input type="text" name="enseigne" class="form-control" placeholder="Microsoft">
                    </div>
                    @error('enseigne')
                    <p class="alert alert-danger" style="margin-top:1em;">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="etat">Type</label>
                      <select class="form-control custom-select" name="etat">
                        <option value="0"selected>Prospect</option>
                        <option value="1">Client</option>
                        <option value="2">Ancien client</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label for="ville">Ville</label>
                      <input type="search" id="address" name="ville" class="form-control" placeholder="Ville">
                    </div>
                    @error('ville')
                    <p class="alert alert-danger" style="margin-top:1em;">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="cp">Code Postal</label>
                      <input type="text" id="cp" name="cp" class="form-control" placeholder="Code Postal">
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
                      <input type="number" id="telephone" class="form-control" name="telephone" placeholder="0102030405">
                    </div>
                  </div>
                    @error('telephone')
                    <p class="alert alert-danger" style="margin-top:1em;">{{ $message }}</p>
                    @enderror
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-control" placeholder="jeanneymar@gmail.com">
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
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Notes</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="note">Notes</label>
                  <textarea id="note" class="form-control" rows="20" name="note"></textarea>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Retour</a>
            <input type="submit" value="Créer le client" class="btn btn-success float-right">
          </div>
        </div>
      </form>
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