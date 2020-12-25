<!DOCTYPE html>
<html>
<head>
	<title>Conferences | R&D Department | Government College of Engineering, Amravati.</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.1/css/mdb.min.css" rel="stylesheet">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>		
			<form action=">" method="post" class="form-control z-depth-4" onsubmit="return validation()">
				<div style="padding-top: 30px;"></div>
				<center><h4 class="font-weight-bold"> Conference</h4></center>


				<div class="form-group col-lg-10 col-md-10 col-xs-10">
					<label for="sub" class="font-weight-bold">Topic: </label>
					<input type="text" name="subject_of_conference" class="form-control" id="con_sub" autocomplete="off">
					<span id="conference_subject" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-10 col-md-10 col-xs-10">
					<label for="sub" class="font-weight-bold">Role: </label>
					<input type="text" name="subject_of_conference" class="form-control" id="con_sub" autocomplete="off">
					<span id="conference_subject" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-10 col-md-10 col-xs-10">
					<label class="font-weight-bold"> Date from : </label><br>
					<input type="date" name="date_from" id="date1">
					<br><label class="text-primary text-center"> If exact date is unknown, enter the date 1 of that month with corresponding year.</label><br>
					<span id="dates1" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-10 col-md-10 col-xs-10">
					<label class="font-weight-bold"> Date to   : </label><br>
					<input type="date" name="date_to" id="date2">
					<br><label class="text-primary text-center"> If exact date is unknown, enter the date 1 of that month with corresponding year.</label><br>
					<span id="dates2" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-10 col-md-10 col-xs-10">
					<label class="font-weight-bold"> Conference Type: </label>
					<div class="radio">
                    <label><input type="radio" name="paper_type" value="National" >National</label>
                     </div>
                   <div class="radio">
                        <label><input type="radio" name="paper_type" value="International">International</label>
                     </div>
				</div>

				<div class="form-group col-lg-10 col-md-10 col-xs-10">
					<label for="part_num" class="font-weight-bold">Number of Participants from Institute: </label>
					<input type="text" name="broad_area" class="form-control col-lg-2 col-md-2 col-xs-2" id="broadarea" autocomplete="off">
					<span id="broadarea_span" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-10 col-md-10 col-xs-10">
					<label for="part_num" class="font-weight-bold">Number of Participants from other institutes: </label>
					<input type="text" name="broad_area" class="form-control col-lg-2 col-md-2 col-xs-2" id="broadarea" autocomplete="off">
					<span id="broadarea_span" class="text-danger"> </span>
				</div>

				<div class="form-group col-lg-10 col-md-10 col-xs-10">
					<label class="font-weight-bold"> Conference Description in short : </label>
					<textarea class="form-control" id="address" rows="3" autocomplete="off" name="con_description" placeholder="Not more than 2500 characters"></textarea>
					<span id="res_add" class="text-danger"> </span>
				</div>

				<center><input type="submit" name="submit" value="Save" class="btn btn-info" autocomplete="off"></center>
				<div style="padding-top: 100px;"></div>

				</form>
		</div>







<!--JAVASCRIPT-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>