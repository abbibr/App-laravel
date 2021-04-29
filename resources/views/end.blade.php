<head>
<style>
.a
{
    color:white;
}
</style>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<body background="images/b.jpg">

<div class="container-fluid">
<br><br><br><br><br><br><br><br>
<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-4">
<div class="a">
<label>Correct:<small> {{Session::get('correctans')}} </small></label>
<label>Incorrect:<small> {{Session::get('wrongans')}} </small></label>
<label>Result:<small> {{Session::get('correctans')}}/{{Session::get('correctans') + Session::get('wrongans')}} </small></label>
</div>
<br>
<a href="/"><button class="btn btn-primary" style="margin-left:21%;">Finish</button></a>
<div class="text-center"><a href="/">Home</a></div>
</div>
<div class="col-md-3">
</div>
</div>
</div>

</body>

<script src="files/jquery.min.js"></script>
<script src="files/popper.min.js"></script>
<script src="files/bootstrap.min.js"></script>