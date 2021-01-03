<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="icon" type="image" href="/img/icon.jpg">
    <title>MusiCloud</title>
  </head>
  <style>
      .navbar-text{
          margin-right: 20px;
      }
  </style>

  <body>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" id= "foldername" href="/folders">{{$folder->folder_Name}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" type="button" data-toggle="modal" data-target="#Upload">Upload Music</a>
                </li>
                </ul>
                <span class="navbar-text">
                    {{Auth::user()->name}}
                </span>
            </div>
            </div>
        </nav>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <!-- Upload Music -->
        <div class="modal fade" id="Upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Music</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('music.store')}}" method="POST">
                        @csrf
                        <input type="text" name="folder_ID" value="{{ $folder->folder_ID }}" hidden>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title</label>
                            <input type="label" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Artists</label>
                            <input type="label" class="form-control" id="exampleFormControlInput1" name="artist" placeholder="Artists">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Genre</label>
                            <input type="label" class="form-control" id="exampleFormControlInput1" name="genre" placeholder="Genre">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Insert Music</label>
                        <br>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="music">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
            </div>
        </div>



        <div class="container">
            <div class = "row mt-3">
                <div class = "col-12">
                    <div class="col-sm-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-3">Title</th>
                                    <th scope="col" class="col-1">Artist</th>
                                    <th scope="col" class="col-1">Genre</th>
                                    <th scope="col" class="col-4">File</th>
                                    <th scope="col" class="col-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($musics as $music)
                                <tr>
                                    <td>{{$music->title}}</td>
                                    <td>{{$music->artists}}</td>
                                    <td>{{$music->genre}}</td>
                                    <td>{{$music->file}}</td>
                                    <td>
                                        <a href="{{env('AWS_S3_URL').$music->file}}" target="_blank" type="submit" class="btn btn-outline-primary">Get Link</a>
                                        <form action="{{route('music.destroy' , array('id' => $music->music_ID))}}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      </div>
  </body>

</html>
