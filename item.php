<?php
	include('dbconn.php');
	session_start();


    if(isset($_GET['itemid'])) {
		$itemid=$_GET['itemid'];
	}
	$q = 'SELECT DateAdded,uname,Description,Pic,MemName,SetName,Style,PIC2,PIC3 FROM `hopeful-lexicon-236016.mydataset.listings` as Listings LEFT JOIN `hopeful-lexicon-236016.mydataset.piccomp` as PicComp on Listings.ItemID=PicComp.ItemID ORDER BY DateAdded DESC';
	$queryJobConfig = $bigQuery->query($query);
	$queryResults = $bigQuery->runQuery($queryJobConfig);
	$rows = $queryResults->rows();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link type="text/css" rel="stylesheet" href="/stylesheets/styles.css" />
        <link type="text/css" rel="stylesheet" href="/stylesheets/style2.css" />
</head>
<body>
	<div class="bgc-base-color citem-column">
		<div>
			<?php
				if ($row['Style']!='Complete') {
			?>	
					<img src="img/member/<?php echo $row['Pic'] ?>" width="300" class = "shadowbox"><br><br>
			<?php
				}
				else{
			?>
					<img class = "add2-slides centera shadowbox-hover" src="img/member/<?php echo $row['Pic'] ?>" width="300">
					<img class = "add2-slides centera shadowbox-hover" src="img/member/<?php echo $row['PIC2'] ?>" width="300">
					<img class = "add2-slides centera shadowbox-hover" src="img/member/<?php echo $row['PIC3'] ?>" width="300">
					<div class="citem-change-btt centera shadowbox">
						<div class="add2-left-btt" onclick="plusDivs(-1)">&#10094;</div>
						<span class="add2-badge add2-color-tomato" onclick="currentDiv(1)">(1)</span>
						<span class="add2-badge add2-color-tomato" onclick="currentDiv(2)">(2)</span>
						<span class="add2-badge add2-color-tomato" onclick="currentDiv(3)">(3)</span>
						<div class="add2-left-btt" onclick="plusDivs(1)">&#10095;</div>
					</div>
					<br>
			<?php
				}
			?>
		</div>
		<div class = "citem-info">
			<div class = "flexwrap citem-row"><div class = "bold">Date Added:</div><div> <?php echo $row['DateAdded'] ?></div></div><br>
			<div class = "flexwrap citem-row"><div class = "bold">Added by:</div><div><?php echo $row['uname'] ?></div></div><br>
			<div class = "flexwrap citem-row"><div class = "bold">Description: </div><div><?php echo $row['Description'] ?></div></div><br>
			<div class = "flexwrap citem-row"><div class = "bold">Member name: </div><div><?php echo $row['MemName'] ?></div></div><br>
			<div class = "flexwrap citem-row"><div class = "bold">Set: </div><div><?php echo $row['SetName'] ?></div></div><br>
			<div class = "flexwrap citem-row"><div class = "bold">Style: </div><div><?php echo $row['Style'] ?></div></div><br>

		</div>
	</div>
</body>
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
	<!-- DISABLE RIGHT CLICK SCRIPT START HERE -->
	<script>
		window.addEventListener("contextmenu", e => {
 		 e.preventDefault();
		});
	</script>
	<!-- END DISABLE RIGHT CLICK SCRIPT HERE -->
	<script>
		function alert_atc() {
			alert("Item added to cart")
		}
	</script>
</html>
