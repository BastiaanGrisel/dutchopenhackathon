html, body {
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%;
	font-family: Frutiger, "Frutiger Linotype", Univers, Calibri, "Gill Sans", "Gill Sans MT", "Myriad Pro", Myriad, "DejaVu Sans Condensed", "Liberation Sans", "Nimbus Sans L", Tahoma, Geneva, "Helvetica Neue", Helvetica, Arial, sans-serif;
}

body {
	background: url('<?php echo $_GET['url'] ?>') no-repeat center center;
	background-size: cover;
}

.container {
	background: white;
	padding: 30px 0 30px 40px;
}

.recipe-title span {
	font-size: 90px;
	font-weight: bold;
}

.prefix-title span {
	font-size: 45px;
}

.cooking-time {	
	position: absolute;
	right: 40px;
	top: 30px;
	width: auto;
	height: 100px;
	font-size: 50px;
}