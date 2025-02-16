
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-NMDN3GT9MR"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-NMDN3GT9MR');
	</script>
	
    <title>Davide Valeriani, PhD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/font.css" type='text/css'>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <div id="wrap">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" role="navigation">
                        <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
                        <li><a href="research.html"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Research</a></li>
                        <li><a href="publications.html"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Publications</a></li>
                        <li><a href="honors.html"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Honors</a></li>
                        <li><a href="teaching.html"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span> Teaching</a></li>
                        <li><a href="outreach.html"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Outreach</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <h2>Unipr Notes</h2>
            <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-info" role="alert">
                    This page could now be reached from a link at the bottom of the <strong><a href="outreach.html">Outreach</a></strong> page.
                  </div>
                <p>In this page I share a bunch of notes that I have produced while I was a BEng and a MEng student at University of Parma. It includes lecture notes, coursework reports, solutions to lab assignments, etc. Most of the documents are written in Italian.</p>
                <p>The underlying documents are protected by a <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">Creative Commons</a> license:
                you can share and use them for free, but you cannot sell them and you always have to acknowledge me as the original author.</p>
<?
$path = 'universita/';
if (isset($_GET["cartella"])) {
	$path .= $_GET["cartella"].'/';
	$cartella = $_GET["cartella"];
}
$folders = explode('/', $cartella);
echo "<ol class=\"breadcrumb\">";
$num_folders = count($folders);
for ($i=0; $i<$num_folders; $i++) {
    if ($i == 0) {
        $folder_name = "Home";
    }
    else {
        $folder_name = $folders[$i];
    }
    if ($i == ($num_folders-1)) {
        echo "<li class=\"active\">".$folder_name."</li>";
    }
    else {
        echo "<li><a href=\"notes.php?cartella=/".implode("/", array_slice($folders, 1, $i))."\">".$folder_name."</a></li>";
    }
}
echo "</ol>";

echo "<table align=\"center\" class=\"table table-hover table-condensed\" style=\"max-width: 800px\">
<tr><td align=\"center\"><h3 id=\"normal\">Type</h3></td><td align=\"center\"><h3 id=\"normal\">Document</h3></td><td align=\"center\"><h3 id=\"normal\">Size</h3></td></tr>";
$dir_handle = @opendir($path);
$c=0;
while($file = readdir($dir_handle))
{
    if(is_dir($file) && $file != '.' && $file != '..')
    {
        $narray[$c]=$file;
    }
    else if($file != '.' && $file != '..')
    {
        $narray[$c]=$file;
        $c++;
    }
}
sort($narray);
if ($narray[0]!=NULL) {
for($i=0;$i<sizeof($narray);$i++)
{
    $file = $descrizione = $narray[$i];
	if (strpos($descrizione,"pdf")) $tipo="pdf.gif";
	elseif (strpos($descrizione,"rar")) $tipo="rar.gif";
	elseif (strpos($descrizione,"jpg")) $tipo="foto.png";
  elseif (strpos($descrizione,"89y")) $tipo="rar.gif";
  elseif (strpos($descrizione,"zip")) $tipo="rar.gif";
	else $tipo="cartella.png";
	$descrizione = str_replace(".pdf","",$descrizione);
	$descrizione = str_replace(".jpg","",$descrizione);
	$descrizione = str_replace(".rar","",$descrizione);
	$descrizione = str_replace(".zip","",$descrizione);
	$descrizione = str_replace(".89y","",$descrizione);
	$dim=filesize($path.$file)/1024;
	$dim=round($dim,0);
	if ($dim>1024) {
		$flag=1;
		$dim/=1024;
		$dim=round($dim,2);
		$dim.=" MB";
	}
	else {
		$dim.=" KB";
	}
	if ($tipo=="cartella.png") echo "<tr><td align=center><img src=\"img/$tipo\" height=\"20px\"></td><td align=center><a href=\"".$_SERVER["PHP_SELF"]."?cartella=$cartella/$descrizione\">$descrizione</a><br></td><td align=center>&nbsp;</td></tr>";
    else echo "<tr><td align=center><img src=\"img/$tipo\" height=\"20px\"></td><td align=center><a target=\"_blank\" href=\"$path$file\">$descrizione</a><br></td><td align=center>$dim</td></tr>";
}
}
closedir($dir_handle);
?>
</table>
</div>
            </div>
        </div>
        <div id="push"></div>
    </div>
    <div id="footer">
        <div class="container">
            <p class="muted credit">Copyright &copy; 2024 Davide Valeriani. All rights reserved.</p>
        </div>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
