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
                      <input type="search" id="address" name="ville" class="form-control"  value="{{ $client->ville }}">
                    </div>
                    @error('address')
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
                  <img src="{{ url('/img/'.$client->picture) }}" alt="{{ $client->enseigne }}_logo">
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
                <label for="inputEstimatedBudget">Estimated budget</label>
                <input type="number" id="inputEstimatedBudget" class="form-control" value="2300" step="1">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Total amount spent</label>
                <input type="number" id="inputSpentBudget" class="form-control" value="2000" step="1">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Estimated project duration</label>
                <input type="number" id="inputEstimatedDuration" class="form-control" value="20" step="0.1">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Contacts</h3>
            </div>
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>File Name</th>
                    <th>File Size</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td>Functional-requirements.docx</td>
                    <td>49.8005 kb</td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  <tr>
                    <td>UAT.pdf</td>
                    <td>28.4883 kb</td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  <tr>
                    <td>Email-from-flatbal.mln</td>
                    <td>57.9003 kb</td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  <tr>
                    <td>Logo.png</td>
                    <td>50.5190 kb</td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  <tr>
                    <td>Contract-10_12_2014.docx</td>
                    <td>44.9715 kb</td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save Changes" class="btn btn-success float-right">
        </div>
      </div>
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