<h2 align=center>
<?php
// mod_rewrite Test Page
if($_GET['link']==1){echo"You are not using mod_rewrite";}
elseif($_GET['link']==2){echo"Congratulations!! You are using Apache mod_rewrite";}
else{echo"Linux Apache mod_rewrte Test Tutorial";}
?>
</h2>

<hr>

<head>
<title>Testing mod_rewrite in your Apache Linux Server</title>
</head>

<body>
<p><a href="rewrite.php?link=1">LINK1</a> = rewrite.php?link=1</p>
<p><a href="link2.html">LINK2</a> = link2.html</p>
<p>How this works: both links actually direct you to the same page, but do so in different ways. Link 1 does not use the mod_rewrite engine and Link 2 d$
</body>
</html>
