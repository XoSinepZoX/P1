<?php
	include('dbconn.php');
    if ($conn->connect_errno) {
        echo $sqlconn->connect_errno ." : ". $sqlconn->connect_error;
    }

	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to BNK 48 Market</title>
	<link rel="stylesheet" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"></head>
<body class = "bgc-bob-color">
	<table class ="tablestyle main-table" width="85%" border = "0">
		<tr>
			<td colspan="4">
				<div class = "shadowbox">
					<a href="contentmain.php" target="contentblock">
						<img class="banner" src="img/banner1.gif" width="100%">
						<img class="banner" src="img/banner2.png" width="100%">
						<img class="banner" src="img/banner3.png" width="100%">
					</a>
				</div>
			</td>	
		</tr>
		<tr >
			<td colspan="4" height="25"  >
			<div class ="flex-searchbar">
				<div width="146.7" height="40" >
				</div>
				
			    <div>
			    <form method="POST" action="search.php" target="contentblock" autocomplete="off">
				<table class = "searchstyle" border ="0">
					<tr  >
						<!-- SEARCH BAR -->					
							<?php
								$style=array("---All---","Complete","Close-up","Full","Half","SSR");
							?>
								<td>BNK 48 Member: 
									<div class="autocomplete" style="width:150px;">
									    <input id="myMember" type="text" name="members" placeholder="Member name">
									</div>
								</td>
								<td>Set: 
									<div class="autocomplete" style="width:150px;">
									    <input id="mySet" type="text" name="sets" placeholder="Set name">
									</div>
								</td>
							<td>Style: 
							
								<select name="style" class = "searchbar-style">
							<?php
								for ($k=0; $k <sizeof($style) ; $k++) { 
									echo '<option value='.$style[$k].'>'.$style[$k].'</option>';
								}
							?>
								</select>
							</td>
							<td>
								<input type="submit" name="search" value="GO!" class = "searchbar-go-btt">
							</td>
							<!-- ADD AND CART -->
							<td width="106.7">
								<a href="add.php" target="contentblock"> <img src='img/button/add1.png' onmouseover="this.src='img/button/add2.png';" onmouseout="this.src='img/button/add1.png';" width="100%" class = "main-add-btt"/> </a>
							</td>
					<!--END ADD AND CART HERE-->
					</tr>	
				</table>
				</form>	
				</div>
				<div width="146.7" height="40" >
				</div>
				<!-- END SEARCH BAR	 -->
		</tr>
		
		<tr>
			<td colspan="4" rowspan="5"> 
			<!-- CONTENT BLOCK -->
			<iframe name="contentblock" src="contentmain.php" class="contentblock" frameBorder="0"></iframe>
			<!-- END CONTENT BLOCK -->	
			</td>
		</tr>
	</table>
</body>
<footer>
	<div class="footer">
		<p>BNK48 Sharing</p>
		<p>All rights reseverved</p>
  		<p>Contact us: bnk48sharing@gmail.com</p>	
	</div>
</footer>
<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script src="app.js"></script>
<script src="app2.js"></script>
<script>
	var slideIndex = 0;
	carousel();

	function carousel() {
	    var i;
	    var x = document.getElementsByClassName("banner");
	    for (i = 0; i < x.length; i++) {
	      x[i].style.display = "none"; 
	    }
	    slideIndex++;
	    if (slideIndex > x.length) {slideIndex = 1} 
	    x[slideIndex-1].style.display = "block"; 
	    setTimeout(carousel, 2000); // Change image every 2 seconds
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
		$("#mode").change(function(){
			if (document.getElementById("mode").value!="Trading") {
				$("#myMember2").val("");
				$("#mySet2").val("");
				$("#styletrade").val("---All---");
			}
		});
	</script>
</html>