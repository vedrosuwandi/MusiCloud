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

    @if (session('add'))
    <div class="alert alert-success">
        {{ session('add') }}
    </div>
    @endif

    <body>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="/home">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" type="button" data-toggle="modal" data-target="#NewFolder">New Folder</a>
                </li>
                </ul>
                <span class="navbar-text">
                    {{Auth::user()->name}}
                </span>
            </div>
            </div>
        </nav>

        <!-- Create Folder -->
        <div class="modal fade" id="NewFolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('addFolder')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1" >Folder Name</label>
                            <input type="label" class="form-control" id="exampleFormControlInput1" placeholder="Folder Name" name="folder_Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Folder</button>
                    </div>
                </form>
            </div>
            </div>
        </div>

        <div class="container">
            <div class = "row mt-5">
                <div class = "col-12">
                    <div class="col-sm-12">
                    <table class="table table-borderless">
                        <thead>
                            <tr style="background-color: #A28BE7; color: white">
                                <th scope="col">Folder</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($folders as $folder)
                                <td class="col-sm-9">
                                <a href="" class="list-group-item list-group-item-action">{{$folder->folder_Name}}</a>
                                </td>
                                <td  class="col-sm-1">
                                    <form action="{{route('deleteFolder' , array('id' => $folder->music_ID))}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger ml-1">Delete</button>
                                    </form>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

  </body>
</html>
