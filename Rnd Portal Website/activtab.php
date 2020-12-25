<!DOCTYPE HTML>
<html>

<head>
<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="pills-teach-tab" data-toggle="pill" href="#pills-tea" role="tab" aria-controls="pills-tea" aria-selected="true">Administrative Works</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="pills-industry-tab" data-toggle="pill" href="#pills-ind" role="tab" aria-controls="pills-ind" aria-selected="false">Extra curricular activities</a>
        </li>
        
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-tea" role="tabpanel" aria-labelledby="pills-teach-tab" style="zoom: 50%;" ><?php include('admin_workshoptbl.php');?>  </div>
        <div class="tab-pane fade" id="pills-ind" role="tabpanel" aria-labelledby="pills-industry-tab" style="zoom: 50%;"><?php include('extracurrculartbl.php'); ?></div>
       
    </div>
</div>


<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	
</body>
</html>
