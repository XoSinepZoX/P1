<?php
	include('dbconn.php');
	session_start();
	$compcount = 0;
	$id =0;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link type="text/css" rel="stylesheet" href="/stylesheets/styles.css" />
        <link type="text/css" rel="stylesheet" href="/stylesheets/style2.css" />
</head>
<body class="centera bgc-base-color" style = "margin-left:4em" >
	<div class = "flex-item">
		<!-- ITEM LOOP BEGIN -->
			<!-- QUARY PART START HERE -->
				<?php
				$q = 'SELECT listings.ItemID,Pic,Style,PIC2,PIC3,MemName,SetName FROM `hopeful-lexicon-236016.mydataset.listings` as Listings LEFT JOIN `hopeful-lexicon-236016.mydataset.piccomp` as PicComp on Listings.ItemID=PicComp.ItemID ORDER BY DateAdded DESC';
				$count=0;
				$queryJobConfig = $bigQuery->query($q);
				$job = $bigQuery->startQuery($queryJobConfig);
				$queryResults = $job->queryResults();
				if ($queryResults->isComplete()) {	
				foreach ($queryResults as $row) {
				?>
			<!-- END QUARY PART HERE -->
				<div class ="itemstyle">
					<table width="200" border=0>
					<!-- PIC PART START HERE -->
						<tr>
							<td>
								<a  href="item.php?itemid=<?php echo($row['ItemID']) ?>">
								<?php  
									if ($row['Style']!='Complete') { ?>
									<img src="img/member/<?php echo $row['Pic'];?>" width="100%" class ="shadowbox-hover" onmouseover="getElementById('id<?php echo $id ;?>');" onmouseout="getElementById('id<?php echo $id ;?>');">
									<?php $id = $id+1; }
									else{
										?>
											<img src="img/member/<?php echo $row['Pic'];?>" width="100%" class ="itemstyle-slides centera shadowbox-hover itemstyle-slides<?php echo $compcount?>"onmouseover="getElementById('id<?php echo $id ;?>');" onmouseout="getElementById('id<?php echo $id ;?>');">
											<img src="img/member/<?php echo $row['PIC2'];?>" width="100%" class ="itemstyle-slides centera shadowbox-hover itemstyle-slides<?php echo $compcount?>"onmouseover="getElementById('id<?php echo $id ;?>');" onmouseout="getElementById('id<?php echo $id ;?>');">
											<img src="img/member/<?php echo $row['PIC3'];?>" width="100%" class ="itemstyle-slides centera shadowbox-hover itemstyle-slides<?php echo $compcount?>"onmouseover="getElementById('id<?php echo $id ;?>');" onmouseout="getElementById('id<?php echo $id ;?>');">

								</a>
							</td>
						</tr>
						<!-- END PIC PART HERE -->
						<!-- BADGE PART START HERE -->
						<tr>
							<td>
										<div class="itemstyle-change-btt centera shadowbox">
											<div class="itemstyle-left-btt" <?php echo 'onclick="plusDivs'.$compcount.'(-1)"'?>>&#10094;</div>
											<span class="itemstyle-badge itemstyle-badge<?php echo $compcount?>" <?php echo 'onclick="currentDiv'.$compcount.'(1)"'?>>(1)</span>
											<span class="itemstyle-badge itemstyle-badge<?php echo $compcount?>" <?php echo 'onclick="currentDiv'.$compcount.'(2)"'?>>(2)</span>
											<span class="itemstyle-badge itemstyle-badge<?php echo $compcount?>" <?php echo 'onclick="currentDiv'.$compcount.'(3)"'?>>(3)</span>
											<div class="itemstyle-right-btt" <?php echo 'onclick="plusDivs'.$compcount.'(1)"'?>>&#10095;</div>
										</div>
								<?php
									$compcount = $compcount +1;
									$id = $id+1;
									}
								?>
							</td>
						</tr>
						<!-- END BADGE PART HERE -->
						<tr>
							<td> <?php echo $row['MemName']; ?> </td>
						</tr>
						<tr>
							<td> <?php echo $row['SetName']; ?> </td>
						</tr>
						<tr>
							<td> <?php echo "Style: ".$row['Style']; ?> </td>
						</tr>
						
					</table>
				</div>                     
				<?php
					$count++;
				}
				}
				if ($count%3==2) {
					echo '<table width=200 class ="itemstyle"></table>';
				}
			?>  
		<!-- ITEM LOOP END -->
	</div>

</body>
	<script>
		var compcount = "<?php echo $compcount ?>";
		<?php
			for ($i=0; $i < $compcount; $i++) { 
				echo 'var slideIndex'.$i.' = 1;
				var SIV'.$i.' = document.getElementById("itemstyle-badge'.$i.'");
				showDivs'.$i.'(slideIndex'.$i.');

				function plusDivs'.$i.'(n'.$i.') {
				showDivs'.$i.'(slideIndex'.$i.' += n'.$i.');
				}

				function currentDiv'.$i.'(n'.$i.') {
				showDivs'.$i.'(slideIndex'.$i.' = n'.$i.');
				}
				function showDivs'.$i.'(n'.$i.') {
					var i'.$i.';
					var x'.$i.' = document.getElementsByClassName("itemstyle-slides'.$i.'");
					var dots'.$i.' = document.getElementsByClassName("itemstyle-badge'.$i.'");
					if (n'.$i.' > x'.$i.'.length) {slideIndex'.$i.' = 1}    
					if (n'.$i.' < 1) {slideIndex'.$i.' = x'.$i.'.length}
					for (i = 0; i < x'.$i.'.length; i++) {
						x'.$i.'[i].style.display = "none";  
					}
					for (i = 0; i < dots'.$i.'.length; i++) {
						dots'.$i.'[i].style.color = "rgb(199, 33, 130)"; 
					}
					x'.$i.'[slideIndex'.$i.'-1].style.display = "block";  
					dots'.$i.'[slideIndex'.$i.' -1].style.color = "#ea709a";
				}
				'
				;
			}
			for ($i=0; $i < $id ; $i++) { 
				
			}
		?>
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
