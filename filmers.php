<?php
$mysql_host = "localhost";
$mysql_database = "united";
$mysql_user = "root";
$mysql_password = "";
$con = mysql_connect("$mysql_host","$mysql_user","$mysql_password");
if (!$con)
  {
  die('Erro de conneccao, fale com o administrador.' . mysql_error());
  }
$bdc = mysql_select_db("$mysql_database", $con);

if(!$bdc) {echo "erro de connect a db";}
$manobra = $_GET["filmerid"];
if($manobra=="") { $manobranull="true"; }
elseif(!is_numeric($manobra)) { header("Location: filmers.php");}
$manobra = mysql_real_escape_string($manobra);
$contarids = mysql_query ( "SELECT * FROM filmers WHERE id='".$manobra."'" );
$idsnumero=mysql_num_rows($contarids);
if($idsnumero=="0" and $manobra!="") { header("Location: filmers.php");}
include("topo.php");
?>
<div id="menu">

				<ul>
					<li class="current_page_item"><a href="index.php">Portal</a></li>
 <li><a href="culturarodas.php">Cultura em Rodas</a></li>
					<li><a href="shopsparks.php">Shops/Parks</a></li>
<li class="current_page_item2"><a href="fotofilme.php">Foto/Filme</a></li>
					<li><a href="blog.php?mode=pt">Nacional</a></li>
					<li><a href="blog.php?mode=global">l� fora</a></li>
					
                                       
				</ul>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page">
<p></p>
				<div id="contenttotal">
				  <h2>filmers. <a href="todosfilmers.php"> ver todos </a></h2>


					<div id="poptrox2">
	<!-- start -->
	<ul id="gallery2">
     <?php
	$result2 = mysql_query("SELECT * FROM filmers WHERE destaque='sim' ORDER BY id DESC");
		  while($row2 = mysql_fetch_array($result2)) {
			echo '<li><a href="filmers.php?filmerid='.$row2["id"].'" target="_top"><img src="'.$row2["imagem"].'" /></a></li>';  
		  }
	?>		
	</ul>
    <span class="small2">(filmers em destaque. <a href="todosfilmers.php">ver todos aqui!</a>)</span>
	<p>
     <br class="clear" />
	<script type="text/javascript">
		$('#gallery').poptrox();
		</script>
	<!-- end -->
</p>
</div>
  <div id="bg1a">
		<div id="bg2a">
			<div id="bg3a">
<?php

if($manobranull=="true") {
$result = mysql_query("SELECT * FROM filmers WHERE principal='sim'");
}
 else { 	 $result = mysql_query("SELECT * FROM filmers WHERE id='".$manobra."'");
 }
$row = mysql_fetch_array($result);
$idfilmer = $row["id"];					


?>

  <div id="quadrado">

				<div id="contento">
					<h2>v�deos/trabalhos.</h2>
					<p>
<iframe
src="frames/galeriaperfis.php?id=<?php echo $row["id"]; ?>&tipo=filmer" height="240" width="370" frameborder="0" scrolling="no">You need an iframes capable browser to view this content.</iframe>
</p>
<?php  $procurarvideo = mysql_query ( "SELECT count(*) from dadosperfis WHERE perfilid='". $idfilmer . "' and tipo='filmer' and limitar='video'" );
 list ( $ifvideo ) = mysql_fetch_row (  $procurarvideo );
 if($ifvideo=="0") { 
 ?>
 <h2>fotografia.</h2>
<script type="text/javascript" src="scripts/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="scripts/jquery.poptrox-0.1.js"></script>
	<div id="poptrox4">
	<!-- start -->
    
	<ul id="gallery3">
    <?php
  $gofotos = mysql_query("SELECT * FROM galeriaperfis WHERE perfilid='".$idfilmer."' and tipo='filmerfoto'");
while($fotosrow = mysql_fetch_array($gofotos)) {
	echo '<li><a href="'.$fotosrow["link"].'"><img src="'.$fotosrow["foto"].'" title="'.$fotosrow["titulo"].'" /></a></li>';
}
?>
</ul>
    <span class="small2">(clique sobre as fotografias para ver em tamanho grande.)</span>
	<p>
     <br class="clear" />
	<script type="text/javascript">
		$('#gallery3').poptrox();
		</script>
	<!-- end -->
</p>
</div>
<?php
 }
 else {
	 
	 $govideos = mysql_query("SELECT * from dadosperfis WHERE perfilid='". $idfilmer . "' and tipo='filmer' and limitar='video'");
$videosrow = mysql_fetch_array($govideos);
		?>
					<h2> <?php echo $videosrow["campo"]; ?></h2>
<?php echo $videosrow["dados"]; ?>
<?php
 }
 ?>
</div>
				<div id="sidebaro">
					<div id="sidebaro2"> 
                    <h2><?php echo $row["nome"]; ?></h2>
           <?php $golinkfoto = mysql_query("SELECT * from dadosperfis WHERE perfilid='". $idfilmer . "' and tipo='filmer' and campo='linkfoto'");
$linkfotorow = mysql_fetch_array($golinkfoto); ?>                           
<table width="410" border="0">
  <tr>
    <td> <img src="<?php echo $linkfotorow["dados"]; ?>" /></td>
            <td> &nbsp;&nbsp;</td>
         <?php $gosobre = mysql_query("SELECT * from dadosperfis WHERE perfilid='". $idfilmer . "' and tipo='filmer' and campo='info'");
$linksobre = mysql_fetch_array($gosobre); ?>        
    <td><?php echo $linksobre["dados"]; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
                   <h2>mais sobre mim.</h2>
					<ul>
                     <?php $gomais = mysql_query("SELECT * from dadosperfis WHERE perfilid='". $idfilmer . "' and tipo='filmer' and limitar='maisinfo'");
while($maiswhile = mysql_fetch_array($gomais)) 
{ echo '<li><b>'.$maiswhile["campo"].'</b> '.$maiswhile["dados"].'</li>';  } ?>    
                        
                      </ul>
         	</div>
				</div>
                
                </div>
                </div>
                </div>
			
</div>

					<div style="clear: both;">&nbsp;</div>
				</div>
				<!-- end #content -->

				<!-- end #sidebar -->

				
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
<?php
include("rodape.php");
?>