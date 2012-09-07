<h2 align=center>
<?php
if($_GET['link']==1)
{
	echo '<span style="color:red">You are not using mod_rewrite - Try LINK2</span>';
}
elseif($_GET['link']==2)
{
	echo'<span style="color:green">Congratulations!! You are using Apache mod_rewrite</span>';
}
else
{
	echo '<span style="color:blue">Linux Apache mod_rewrte Test Tutorial</span>';} 
?>
</h2>
<p>
	<a href="rewrite.php?link=1" style="color:red"><strong>LINK 1</strong></a> = LINK 1 Does NOT use Mod Rewrite. LINK 1 uses standard URL: <u>rewrite.php?link=1</u>
</p>
<p>
	<a href="link2.html" style="color:green"><strong>LINK 2</strong></a> = LINK 2 - Yes, Uses Apache's Mod Rewrite using this URL:: <u>link2.html</u>
</p>
