<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>offre crud </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Important to work AJAX CSRF -->
    <meta name="_token" content="{!! csrf_token() !!}" />

    <link rel="stylesheet" href="{{asset ('css/darkly-bootstrap.min.css')}}" media="screen">
    </head>

    <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="javascript:void(0);">Offres crud</a>
            </div>
          </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                      <a href="{{ route('offre.create') }}" class="btn btn-default pull-right">Add a new Offre</a>
                    </div>
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-hover ">
                        <thead>
                            <tr class="info">
                              <th>ID </th>
                              <th>offre adrese</th>
                              <th>prix</th>
							  <th>capacite</th>
							  <th>image</th>
                              <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="offres-list" name="offres-list">
						@foreach ($offres as $offre)
                              <tr id="offre{{$offre->id}}" class="active">
                                  <td>{{$offre->id}}</td>
                                  <td>{{$offre->adrese}}</td>
                                  <td>{{$offre->prix}}</td>
								  <td>{{$offre->capacite}}</td>
								  <td>
                    <img width="300px" height="200px" src="{{ asset('storage/' . $offre->image) }}" alt="">
                  </td>
                                  <td width="35%">
                                      <button class="btn btn-warning btn-detail open_modal" value="{{$offre->id}}">Edit</button>
                                     <form style="display: unset;" method="POST" action="{{ route('offre.destroy', ['id' => $offre->id]) }}">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger btn-delete delete-offre" type="submit"">Delete</button>
                                    </form>
                                  </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>

        <!-- Passing BASE URL to AJAX -->
        <input id="url" type="hidden" value="{{ \Request::url() }}">

        <!-- MODAL SECTION -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Offre Form</h4>
              </div>
              <div class="modal-body">
                <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                  <div class="form-group error">
                    <label for="inputName" class="col-sm-3 control-label">Adrese</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control has-error" id="adrese" name="name" placeholder="adresse" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputDetail" class="col-sm-3 control-label">Price</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="prix" name="prix" placeholder="Price" value="">
                    </div>

					<div class="form-group">
                    <label for="inputDetail" class="col-sm-3 control-label">capacité</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="capacite" name="capacite" placeholder="capacité" value="">
                    </div>


                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save Changes</button>
                <input type="hidden" id="offre_id" name="offre_id" value="0">
              </div>
            </div>
          </div>
        </div>
    </body>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/ajaxscript.js')}}"></script>
</html>
