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