<?php
include("topo.php");
$result = mysql_query("SELECT * FROM skateparks ORDER BY id DESC");
?>
<div id="menu">
				<ul>
					<li class="current_page_item"><a href="index.php">Portal</a></li>
 <li><a href="culturarodas.php">Cultura em Rodas</a></li>
					<li class="current_page_item2"><a href="shopsparks.php">Shops/Parks</a></li>
<li><a href="fotofilme.php">Foto/Filme</a></li>
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
<p>&nbsp;</p>
				<div id="contenttotal">
				  <h2>skateparks.</h2>
Esta p�gina pretende integrar todos os skateparks de Portugal Continental e ilhas. Para que isso seja possivel, � necess�rio a colabora��o dos skaters locais, visto que o unitedskating.com n�o tem possiblidade de se deslocar a todos os skateparks do pa�s num curto espa�o de tempo. <br /> Para ajudar basta enviar algumas fotografias para o nosso email <a href="#">geral@unitedskating.com</a> juntamente com a descri��o de alguns obst�culos do skatepark em quest�o. Obviamente, os utilizadores que colaborarem connosco, ter�o o seu nome destacado na p�gina do respectivo skatepark. Obrigado.
                <p>&nbsp;</p>
					<div id="poptrox2">
	<!-- start -->
	<ul id="gallery2">
     <?php
		  while($row = mysql_fetch_array($result)) {
			echo '<li><a href="skatepark.php?parkid='.$row["id"].'" target="_top"><img src="'.$row["imagem"].'" /></a></li>';  
		  }
	?>
	</ul>

                <p>&nbsp;</p>
<p>&nbsp;</p>
	<p>
     <br class="clear" />
	
</p>
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