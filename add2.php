<?php
	include('dbconn.php');
	session_start();
		if(isset($_POST['next'])){
			$uname = mysqli_real_escape_string($conn,$_POST['uname']);
			$descr = mysqli_real_escape_string($conn,$_POST['description']);
			$pic = $_POST['pic'];
			$pic2 = $_POST['pic2'];
			$pic3 = $_POST['pic3'];
			$memberadd = $_POST['memberadd'];
			$setadd = $_POST['setadd'];
			$styleadd = $_POST['styleadd'];
		}
		if(isset($_POST['confirm'])){
			$uname = $_POST['uname'];
			$descr = $_POST['descr'];
			$pic = $_POST['pic'];
			$pic2 = $_POST['pic2'];
			$pic3 = $_POST['pic3'];
			$memberadd = $_POST['memberadd'];
			$setadd = $_POST['setadd'];
			$styleadd = $_POST['styleadd'];
			$q="INSERT mydataset.listings (uname,Description,Pic,MemName,SetName,Style) 
			VALUES ('$uname','$descr','$pic','$memberadd','$setadd','$styleadd')";

			$queryJobConfig = $bigQuery->query($q);
			$job = $bigQuery->startQuery($queryJobConfig);
			$queryResults = $job->queryResults();
			if(!$$queryResults){
				echo "INSERT failed. Error: ";
			}
			else{
				if ($styleadd=='Complete') {
					//echo("HERE");
					$q4="INSERT mydataset.piccomp (ItemID,PIC2,PIC3) VALUES ((SELECT ItemID FROM `hopeful-lexicon-236016.mydataset.listings` as Listings WHERE uname='$uname' ORDER BY DateAdded DESC LIMIT 1),'$pic2','$pic3')";
					//echo($q4);
					$queryJobConfig2 = $bigQuery->query($q4);
					$job2 = $bigQuery->startQuery($queryJobConfig2);
					$queryResults2 = $job2->queryResults();
					if(!$queryResults2){
						echo "INSERT failed. Error: ";
					}
				}
				if (!$queryResults2) {
					echo "INSERT failed. Error: ";
				}
				else{
					header("Location: contentmain.php");
				}
			}
		}
		
				
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="styles.css">
</head>
<body class="centera bgc-base-color">
			<h2>Add listing</h2>
			<div class = "add2-row"><b>Added by :</b><?php echo $uname; ?> </div>
			<div class = "add2-row"><b >Description :</b><?php echo $descr; ?></div>
			<!-- FUCKING COMP -->
			<?php
				if ($styleadd=='Complete') {
					echo '<div> 
							<img class="add2-slides  add2-img centera" src="img/member/'.$pic.'">
							<img class="add2-slides  add2-img centera" src="img/member/'.$pic2.'">
							<img class="add2-slides  add2-img centera" src="img/member/'.$pic3.'">
							<div class="add2-change-btt centera shadowbox">
								<div class="add2-left-btt" onclick="plusDivs(-1)">&#10094;</div>
								<span class="add2-badge add2-color-tomato" onclick="currentDiv(1)">(1)</span>
								<span class="add2-badge add2-color-tomato" onclick="currentDiv(2)">(2)</span>
								<span class="add2-badge add2-color-tomato" onclick="currentDiv(3)">(3)</span>
								<div class="add2-left-btt" onclick="plusDivs(1)">&#10095;</div>
							</div>
						</div>';				
				}
				else{
					echo '<img src='.$pic.' width="200" class = "add2-img"><br>';
				}

			?>
			<!-- FUCKING COMP -->
			<div class = "add2-row"><b>BNK 48 member :</b><?php echo $memberadd; ?></div>
			<div class = "add2-row"><b>Set :</b><?php echo $setadd; ?>  </div>
			<div class = "add2-row"><b>Style :</b><?php echo $styleadd; ?></div>
				<br>
				<form method="POST" action="add2.php">
					<input type="hidden" name="uname" value="<?php echo $uname; ?>">
					<input type="hidden" name="descr" value="<?php echo $descr; ?>">
					<input type="hidden" name="pic" value="<?php echo $pic; ?>">
					<input type="hidden" name="pic2" value="<?php echo $pic2; ?>">
					<input type="hidden" name="pic3" value="<?php echo $pic3; ?>">
					<input type="hidden" name="price" value="<?php echo $price; ?>">
					<input type="hidden" name="memberadd" value="<?php echo $memberadd; ?>">
					<input type="hidden" name="setadd" value="<?php echo $setadd; ?>">
					<input type="hidden" name="styleadd" value="<?php echo $styleadd; ?>">
					<input type='submit' name='confirm' value='confirm' class = 'add2-button'>
				</form>
				<a href="add.php?uid=<?php echo $uid; ?>"><input type='button' name='back' value='back' class = 'add2-button shadowbox-hover-small' style = 'background-color:white;color:black'></a>

</body>
<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
	<script src="app.js"></script>
	
<!-- FUCKING TEST -->
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("add2-slides");
  var dots = document.getElementsByClassName("add2-badge");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" add2-color-tomato", " add2-color-blue");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " add2-color-tomato";
}
</script>
<!-- FUCKING TEST -->
<!-- DISABLE RIGHT CLICK SCRIPT START HERE -->
<script>
		window.addEventListener("contextmenu", e => {
 		 e.preventDefault();
		});
	</script>
	<!-- END DISABLE RIGHT CLICK SCRIPT HERE -->
</html>