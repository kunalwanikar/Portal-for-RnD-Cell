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
        <a class="nav-link active " id="pills-insttrain-tab" data-toggle="pill" href="#pills-insttrain" role="tab" aria-controls="pills-insttrain" aria-selected="true">Training</a>
        </li>
        <li class="nav-item">
        <a class="nav-link " id="pills-instconf-tab" data-toggle="pill" href="#pills-instconf" role="tab" aria-controls="pills-instconf" aria-selected="false">Conference</a>
        </li>
         <li class="nav-item">
        <a class="nav-link" id="pills-instwork-tab" data-toggle="pill" href="#pills-instwork" role="tab" aria-controls="pills-instwork" aria-selected="false">Workshop</a>
        </li>
    </ul>
    <div class="container">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-insttrain" role="tabpanel" aria-labelledby="pills-insttrain-tab"><?php include('instratbl.php');?>  </div>
            <div class="tab-pane fade " id="pills-instconf" role="tabpanel" aria-labelledby="pills-instconf-tab" ><?php include('insconftbl.php'); ?></div>
            <div class="tab-pane fade" id="pills-instwork" role="tabpanel" aria-labelledby="pills-instwork-tab" ><?php include('inswork.php'); ?></div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	
</body>
</html>