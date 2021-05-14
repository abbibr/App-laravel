<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<h3 style="text-align: center;">Add questions!</h3>
<br>
<br>

<br>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
@foreach($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>{{$error}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endforeach

<!-- Session -->
@if(Session::get('successMessage'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>{{Session::get('successMessage')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php Session::forget('successMessage'); ?>

@endif

</div>
<div class="col-md-4"></div>
</div>
</div>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-1"><h2>Question <b></b></h2></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="col-sm-7"><Button data-toggle="modal" data-target="#Modal_add" class="btn btn-primary">Add</Button>
                    <a href="/">Home</a>
                    </div>
                    <div class="col-sm-4">
                       <!-- <div class="search-box">

                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div> -->
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Savollar <i class="fa fa-sort"></i></th>
                       <th>Holatlar</th>
                       <th>Rasm</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($questions as $q)
                    <tr>
                        <td>{{$loop->index}}</td>
                        <td>{{$q->question}}</td>
                        <td>
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#Modal_update{{$q->id}}">Update</a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#Modal_delete{{$q->id}}">Delete</a>
                        </td>
                        <td><img src="{{asset('../public/images')}}/{{$q->profileimage}}" style="max-width:75px;"></td>
                    </tr>
<!-- modal update -->
<div class="modal fade" id="Modal_update{{$q->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="/update" method="post">
    @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
      <h5>Question</h5>
      </div>
      <input style="visibility:hidden" name="id" value="{{$q->id}}">
        <div class="row" style="padding:10px;">
        <input name="question" value="{{$q->question}}" class="form-control">
        </div>
        <div class="row">
        <div class="col-md-6"><label>A: </label></div>
        <div class="col-md-6"><label>B: </label></div>
        </div>
        <div class="row">
        <div class="col-md-6"><input value="{{$q->a}}" name="opa"></div>
        <div class="col-md-6"><input value="{{$q->b}}" name="opb"></div>
        </div>
        <div class="row">
        <div class="col-md-6"><label>C: </label></div>
        <div class="col-md-6"><label>D: </label></div>
        </div>
        <div class="row">
        <div class="col-md-6"><input value="{{$q->c}}" name="opc"></div>
        <div class="col-md-6"><input value="{{$q->d}}" name="opd"></div>
        </div>
        <div class="row">
          <div class="col-md-3"><label>Answer: </label>
            <select name="ans" class="form-control">
              <option value="{{$q->ans}}">{{$q->ans}}</option>
              <option value='a'>A</option>
              <option value='b'>B</option>
              <option value='c'>C</option>
              <option value='A'>D</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update question</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- modal delete -->
<div class="modal fade" id="Modal_delete{{$q->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="/delete" method="post">
    @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input style="visibility:hidden" name="id" value="{{$q->id}}">
        <h5>Ishonchingiz komilmi?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Delete question</button>
      </div>
      </form>
    </div>
  </div>
</div>
                
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
</body>
</html>


<!-- Modal-Add -->
<div class="modal fade" id="Modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="add" method="post" enctype="multipart/form-data">
    @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <label>Image</label>
          <input type="file" name="file" onchange="previewFile(this)" class="form-control">
          <img id="previewImg" alt="profile image" style="max-width:130px;margin-top:20px;">
      </div>
      <div class="row">
      <h5>Question</h5>
      </div>
        <div class="row" style="padding:10px;">
        <input name="question" class="form-control">
        </div>
        <div class="row">
        <div class="col-md-6"><label>A: </label></div>
        <div class="col-md-6"><label>B: </label></div>
        </div>
        <div class="row">
        <div class="col-md-6"><input name="opa"></div>
        <div class="col-md-6"><input name="opb"></div>
        </div>
        <div class="row">
        <div class="col-md-6"><label>C: </label></div>
        <div class="col-md-6"><label>D: </label></div>
        </div>
        <div class="row">
        <div class="col-md-6"><input name="opc"></div>
        <div class="col-md-6"><input name="opd"></div>
        </div>
        <div class="row">
          <div class="col-md-3"><label>Answer: </label>
            <select name="ans" class="form-control">
              <option value='a'>A</option>
              <option value='b'>B</option>
              <option value='c'>C</option>
              <option value='A'>D</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add question</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal-Update -->

<script src="files/jquery.min.js"></script>
<script src="files/popper.min.js"></script>
<script src="files/bootstrap.min.js"></script>

<script>
  function previewFile(input)
  {
      var file=$("input[type=file]").get(0).files[0];
      if(file)
      {
          var reader=new FileReader();
          reader.onload=function()
          {
              $('#previewImg').attr("src",reader.result);
          }
          reader.readAsDataURL(file);
      }
  } 
</script>