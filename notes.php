
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Davide Valeriani - BCI Researcher</title>
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
                    <ul class="nav navbar-nav">
                        <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
                        <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Research <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="research.html#phd">Group Decision Making</a></li>
                                <li><a href="research.html#cybathlon">Cybathlon 2016</a></li>
                                <li><a href="research.html#eyewink">EyeWink</a></li>
                            </ul>
                        </li>
                        <li><a href="publications.html"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Publications</a></li>
                        <li><a href="teaching.html"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span> Teaching</a></li>
                        <li><a href="notes.php" class="active"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Unipr</a></li>
                        <li><a href="more.html"><span class="glyphicon glyphicon-forward" aria-hidden="true"></span> More</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <h2>Unipr Notes</h2>
            <div class="row">
                <div class="col-md-12">
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
            <p class="muted credit">Copyright &copy; 2018 Davide Valeriani. All rights reserved.</p>
        </div>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-55902637-1', 'auto');
      ga('send', 'pageview');
  </script>
</body>
</html>
