<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>1109_boo</title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<?php
		$rand = rand(0, 100);
		$total = $rand;
		if($rand-60<0){
			$red = $rand;
		}
		else{
			$red=60;
			$rand=$rand-60;
				if($rand-30<0){
					$yel = $rand;
				}
				else{
					$yel=30;
					$rand=$rand-30;
					$gre=$rand;
				}
		}
		
		
	?>
	<button type="button" class="btn btn-primary">
	  a <span class="badge badge-light">1</span>
	</button>
	<button type="button" class="btn btn-primary">
	  b <span class="badge badge-light">2</span>
	</button>
	<button type="button" class="btn btn-primary">
	  yahoo <a href="https://tw.yahoo.com" class="badge badge-light"><?php echo $total;?></a>
	</button>
	<button type="button" class="btn btn-primary">
	  d <span class="badge badge-light">3</span>
	</button>
	<button type="button" class="btn btn-primary">
	  e <span class="badge badge-light">4</span>
	</button>
	<br /><br />
	<div class="progress" width="800px">
	  <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $red?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
	  <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $yel?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
	  <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $gre?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
</body>
</html>