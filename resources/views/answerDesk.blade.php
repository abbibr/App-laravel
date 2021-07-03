<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="files/my.css">
<script src="files/jquery.min.js"></script>
<script src="files/popper.min.js"></script>
<script src="files/bootstrap.min.js"></script>
</head>

<body background="images/a.jpg">
<div class="back2">
<div class="container-fluid">
<form action="/submitans" method="post">
@csrf

<div class="row" style="padding-top:13vh;">
<div class="col-md-4"></div>
<div class="col-md-4">
<h4>#{{Session::get("nextq")}}:{{$question->question}}</h4>
<img src="{{asset('public/images')}}/{{$question->profileimage}}" style="max-width:70%;"><br>
<input value="a" checked="true" type="radio" name="ans">: (A) <small>{{$question->a}}</small><br>
<input value="b" type="radio" name="ans">: (B) <small>{{$question->b}}</small><br>
<input value="c" type="radio" name="ans">: (C) <small>{{$question->c}}</small><br>
<input value="d" type="radio" name="ans">: (D) <small>{{$question->d}}</small><br>
<input value="{{$question->ans}}" style="visibility:hidden;" name="dbans">
</div>
<div class="col-md-5"></div>
</div>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-4">
<button class="btn btn-primary" style="float:right;" type="submit">Next</button>
</div>
<div class="col-md-5"></div>
</div>

</form>

</div>
</div>

</body>
</html>