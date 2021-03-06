<?php
    include('dbconn.php');
    if ($conn->connect_errno) {
        echo $sqlconn->connect_errno ." : ". $sqlconn->connect_error;
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="styles.css">
</head>
<body class="centera bgc-base-color">
<form action="add2.php" method="POST" autocomplete="off">
	<?php  
		$members=array("---All---","--First Generation--","Cherprang","Izuriina","Jaa","Jane","Jennis","Jib","Kaew","Kaimook","Kate","Korn","Maysa","Mind","Miori","Mobile","Music","Namneung","Namsai","Nink","Noey","Orn","Piam","Pun","Pupe","Satchan","Tarwaan","--Second Generation--","Aom","Bamboo","Cake","Deenee","Faii","Fifa","Fond","Gygee","June","Khamin","Keng","Maira","Mewnich","Minmin","Myyu","Natherine","New","Niky","Nine","Oom","Pakwan","Panda","Phukkhom","Ratah","Stang","View","Wee","--Graduated--","Can","Cincin","Jan","Kidcat");
		$sets=array("---All---","First Generation Debut","Thai Costume","BNK Roadshow","Aitakatta","Halloween 2017","Loi Krathong","Merry Christmas","Koisuru Fortune Cookie","Memorial of Handshake","Changsuek","Shonichi","River","Second Generation Debut","Kimi Wa Melody" );
		$style=array("---All---","Close-up","Full","Half","Complete","SSR");
	?>
		<h2>Add Picture</h2>
					<table class="tablestyle" width="400" border="0">
						<tr class = "add-row">
				    		<td>
				    			<b>Added by:</b>
				    		</td>
				    		<td>
				    			<input type="text" name="uname" placeholder = "Your name">
				    		</td>
				    	</tr>
				    	<tr class = "add-row">
				    		<td>
				    			<b>Description:</b>
				    		</td>
				    		<td>
				    			<input type="text" name="description" placeholder = "Description">
				    		</td>
				    	</tr>
				    	<tr class = "add-row">
				    		<td>
				    			<b>Picture:</b>
				    		</td>
				    		<td>
				    			<input type="url" name="pic">
				    		</td>
				    	</tr>
				    	<tr class = "add-row">
				    		<td>
				    			<b>BNK 48 member:</b>
				    		</td>
				    		<td>
								<div class="autocomplete" style="width:355px;">
									<input id="myMember" type="text" name="memberadd" placeholder="Member name">
								</div>
				    		</td>
				    	</tr>
				    	<tr class = "add-row">
				    		<td>
				    			<b>Set:</b>
				    		</td>
				    		<td>
								<div class="autocomplete" style="width:355px;">
									<input id="mySet" type="text" name="setadd" placeholder="Set name">
								</div>
				    		</td>
				    	</tr>
				    	<tr class = "add-row">
				    		<td>
				    			<b>Style:</b>
				    		</td>
				    		<td>
				    			<select name="styleadd" class = "add-input-style" id = "add2-input-style">
							<?php
								for ($k=0; $k <sizeof($style) ; $k++) { 
									if($k!=0){
										echo '<option value="'.$style[$k].'"">'.$style[$k].'</option>';
									}
								}
							?>
								</select>
				    		</td>
						</tr>
						<!-- HIDE THIS -->
						<tr class = "add-row add-extra-comp-pic" id = "add-extra-comp-pic1">
				    		<td>
				    			<b>Picture 2:</b>
				    		</td>
				    		<td>
				    			<input type="url" name="pic2">
				    		</td>
				    	</tr>
				    	<tr class = "add-row add-extra-comp-pic" id = "add-extra-comp-pic2">
				    		<td>
				    			<b>Picture 3:</b>
				    		</td>
				    		<td>
				    			<input type="url" name="pic3">
				    		</td>
				    	</tr>
				    	<!-- END HIDE THIS -->
			
				    		<td colspan="2">
				    			<input type="submit" name="next" value="Next" class = "add-next-button">
				    		</td>
						</tr>
				    	</table>
				</form>
</body>
	<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
	<script src="app.js"></script>
	<script src="app2.js"></script>
	<!-- COMP SCRIPT START HERE -->
	<script>
		var el = document.getElementById("add2-input-style");
		el.addEventListener("change", function() {
			var elems = document.querySelectorAll('#add-extra-comp-pic1,#add-extra-comp-pic2')
			for (var i = 0; i < elems.length; i++) {
				elems[i].style.display = 'none'
			}
			if (this.selectedIndex === 0) {
				document.querySelector('#add-extra-comp-pic1').style.display = 'none';
				document.querySelector('#add-extra-comp-pic2').style.display = 'none';
			} 
			else if (this.selectedIndex === 1) {
				document.querySelector('#add-extra-comp-pic1').style.display = 'none';
				document.querySelector('#add-extra-comp-pic2').style.display = 'none';
			}
			else if (this.selectedIndex === 2) {
				document.querySelector('#add-extra-comp-pic1').style.display = 'none';
				document.querySelector('#add-extra-comp-pic2').style.display = 'none';
			}
			else if (this.selectedIndex === 3) {
				document.querySelector('#add-extra-comp-pic1').style.display = 'table-row';
				document.querySelector('#add-extra-comp-pic2').style.display = 'table-row';
			}
			else if (this.selectedIndex === 4) {
				document.querySelector('#add-extra-comp-pic1').style.display = 'none';
				document.querySelector('#add-extra-comp-pic2').style.display = 'none';
			}
		}	, false);
	</script>
	<!--END COMP INFO SCRIPT HERE -->

	<!-- TRADING INFO SCRIPT START HERE -->
	<script>
		var el = document.getElementById("mode");
		el.addEventListener("change", function() {
			var elems = document.querySelectorAll('#add-price-buying,#add-price-selling,#add-trading-info')
			for (var i = 0; i < elems.length; i++) {
				elems[i].style.display = 'none'
			}
			if (this.selectedIndex === 0) {
				document.querySelector('#add-price-buying').style.display = 'table-row';
			} 
			else if (this.selectedIndex === 1) {
				document.querySelector('#add-price-selling').style.display = 'table-row';
			}
			else if (this.selectedIndex === 2) {
				document.querySelector('#add-trading-info').style.display = 'table';
			}
		}	, false);
	</script>
	<!--END TRADING INFO SCRIPT HERE -->
	<!-- DISABLE RIGHT CLICK SCRIPT START HERE -->
	<script>
		window.addEventListener("contextmenu", e => {
 		 e.preventDefault();
		});
	</script>
	<!-- END DISABLE RIGHT CLICK SCRIPT HERE -->
</html>