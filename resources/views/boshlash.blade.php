<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<section style="padding-top:45px;">
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card">
        <div class="card-header">
          Registration
          @if(Session::has('ok'))
          <div class="alert alert-success" role="alert">{{session('ok')}}</div>
          @endif
        </div>
        <div class="card-body">
        <form action="true" method="post">
          @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder='Name'>
                @error('name')
                <p style="color:red;">{{$message}}</p>
                @enderror
            </div><br>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder='Email'>
                @error('email')
                <p style="color:red;">{{$message}}</p>
                @enderror
            </div><br>
            <div class="form-group">
                <label for="post">Password</label>
                <input type="password" id="post" name="password" class="form-control" placeholder='Password'>
                @error('password')
                <p style="color:red;">{{$message}}</p>
                @enderror
            </div><br>
            <input type="submit" value="Register" class="btn btn-primary" style="margin-left:37%;">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
