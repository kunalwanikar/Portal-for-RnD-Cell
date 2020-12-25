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
        <a class="nav-link active" id="pills-book-tab" data-toggle="pill" href="#pills-books" role="tab" aria-controls="pills-books" aria-selected="true">Books</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="pills-paper-tab" data-toggle="pill" href="#pills-journal" role="tab" aria-controls="pills-journal" aria-selected="false">Journals</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="pills-patent-tab" data-toggle="pill" href="#pills-patents" role="tab" aria-controls="pills-patents" aria-selected="false">Patents</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="pills-innovate-tab" data-toggle="pill" href="#pills-inno" role="tab" aria-controls="pills-inno" aria-selected="false">Innovations</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="pills-conference-tab-tab" data-toggle="pill" href="#pills-conf" role="tab" aria-controls="pills-inno" aria-selected="false">Conferences</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="pills-workshop-tab" data-toggle="pill" href="#pills-work" role="tab" aria-controls="pills-inno" aria-selected="false">Workshops</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="pills-training-tab" data-toggle="pill" href="#pills-tra" role="tab" aria-controls="pills-tra" aria-selected="false">Training</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-books" role="tabpanel" aria-labelledby="pills-book-tab" style="zoom: 40%;"><?php include('bookstbl.php');?></div>
        <div class="tab-pane fade" id="pills-journal" role="tabpanel" aria-labelledby="pills-paper-tab" style="zoom: 70%;"><?php include('paperstbl.php'); ?></div>
        <div class="tab-pane fade" id="pills-patents" role="tabpanel" aria-labelledby="pills-patent-tab" style="zoom: 70%;"><?php include('patentstbl.php'); ?></div>
        <div class="tab-pane fade" id="pills-inno" role="tabpanel" aria-labelledby="pills-innovate-tab" style="zoom: 35%;"><?php include('innotbl.php'); ?></div>
        <div class="tab-pane fade" id="pills-conf" role="tabpanel" aria-labelledby="pills-conference-tab" style="zoom: 35%;"><?php include('Conferencesdisp.php'); ?></div>
        <div class="tab-pane fade" id="pills-work" role="tabpanel" aria-labelledby="pills-innovate-tab" style="zoom: 35%;"><?php include('Workshopsdisp.php'); ?></div>
        <div class="tab-pane fade" id="pills-tra" role="tabpanel" aria-labelledby="pills-training-tab" style="zoom: 35%;"><?php include('trainingdisp.php'); ?></div>
    </div>
</div>

 

</body>
</html>