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
                        <button id="btn_add" name="btn_add" class="btn btn-default pull-right">Add New offre</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Passing BASE URL to AJAX -->
        <input id="url" type="hidden" value="{{ \Request::url() }}"> 

        <!-- MODAL SECTION -->
        <div  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Offre Form</h4>
              </div>
              <div class="modal-body">
                <form method="post"  enctype="multipart/form-data" action="{{ route('offre.store') }}" id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                  @csrf
                  <div class="form-group error">
                    <label for="inputName" class="col-sm-3 control-label">Adrese</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control has-error" id="adrese" name="adrese" placeholder="adresse" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputDetail" class="col-sm-3 control-label">Price</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="prix" name="prix" placeholder="Price" value="">
                    </div>
                  </div>
			        		<div class="form-group">
                    <label for="inputDetail" class="col-sm-3 control-label">capacité</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="capacite" name="capacite" placeholder="capacité" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputDetail" class="col-sm-3 control-label">image</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control" id="capacite" name="image" placeholder="capacité" value="">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form>
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
