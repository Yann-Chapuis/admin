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
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
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

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>
        </div>
        <div class="card-body">
          <table id="table_data" class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th style="width: 1%" class="text-center">
                          #
                      </th>
                      <th style="width: 20%" class="text-center">
                          Enseigne
                      </th>
                      <th style="width: 24%" class="text-center">
                          Prochaine relance
                      </th>
                      <th style="width: 10%" class="text-center">
                          Ville
                      </th>
                      <th style="width: 10%" class="text-center">
                          Téléphone
                      </th>
                      <th style="width: 5%" class="text-center">
                          Email
                      </th>
                      <th style="width: 5%" class="text-center">
                          Etat
                      </th>
                      <th style="width: 25%" class="text-center">
                      </th>
                  </tr>
              </thead>
              <tbody>
              	@foreach ($clients as $client)
                  <tr>
                      <td class="text-center">
                          {{ $client->id }}
                      </td>
                      <td class="text-center">
                          <dt>
                              {{ $client->enseigne }}
                          </dt>
                          <small>
                              Créé {{ $client->created_at }} <br>
                              Modifié le {{ $client->updated_at }}
                          </small>
                      </td>
                      <td class="text-center">
                          A FAIRE
                      </td>
                      <td class="text-center">
                          {{ $client->ville }} ({{ $client->cp }})
                      </td>
                      <td class="text-center">
                          {{ $client->telephone }}
                      </td>
                      <td class="text-center">
                          {{ $client->email }}
                      </td>
                      <td class="project-state text-center">
                      	@if($client->etat == 0)
                        	<span class="badge badge-primary">Prospect</span>
            						@else
            							<span class="badge badge-success">Client</span>
            						@endif
                      </td>
                      <td class="project-actions text-center">
                          <a class="btn btn-primary btn-sm" href="{{ route('clients.show', $client->id) }}">
                              <i class="fas fa-folder">
                              </i>
                              Consulter
                          </a>
                          <a class="btn btn-info btn-sm" href="{{ route('clients.edit', $client->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Modifier
                          </a>
                          <form action="{{ route('clients.destroy', $client->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm btn-delete" type="submit"><i class="fas fa-trash">
                              </i>Supprimer</button>
                          </form>

                      </td>
                  </tr>
                @endforeach
                  
              </tfoot>
          </table>

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

<script>
    $("#table_data").dataTable({
      "responsive": true,
      "autoWidth": true,
      "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        },
      "order": [[ 1, "asc" ]],
      "columnDefs": [
          { "orderable": false, "targets": 7 },
        ]
    });
</script>
@endsection