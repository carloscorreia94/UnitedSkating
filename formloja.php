<?php
require("phpmailer/class.phpmailer.php");
include("php/v.inc");
 include("php/q.inc");
 $validator = new ValidateForm();
?>
<?php
include("topo.php");
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
<div align="center"> 
  <p><b class="red">Formul�rio de inscri��o como skateshop:</b></p>
  <p>Todas as informa��es s�o de preenchimento obrigat�rio. <br/> Os seus dados serao enviados para o nosso email e ter&aacute; uma resposta em menos de 48 horas.</p>
  <p>Os campos marcados por asteriscos (*) , (**) ou (***) tem informa&ccedil;&otilde;es suplementares para consulta no fim da pagina.</p>
<?php
if($_GET["msg"]=="enviado") {
	
	echo "<b class='red2'> Email enviado com sucesso! Por favor aguarde at� 48 horas para a resposta por parte da unitedskating para o seu email. fique atento. </b>";
	}

$nome = $_POST["nome"];
$email = $_POST["email"];
$idade = $_POST["idade"];
$localidade = $_POST["localidade"];
$canal = $_POST["canal"];
$musica = $_POST["musica"];
$skaters = $_POST["skaters"];
$manobra = $_POST["manobra"];
$melhorparte = $_POST["melhorparte"];
$melhorfilmer = $_POST["melhorfilmer"];
$sobremim = $_POST["sobremim"];





?>
  <form id="form1" method="post" action="formloja.php">
   <table width="459" border="1" bordercolor="#333333" bordercolordark="#000000" bordercolorlight="#CCCCCC">
    <tr>
      <td width="156">Nome da skateshop:</td>
      <td width="287"><label for="nome"></label>
        <input name="nome" type="text" id="nome" value="<?php echo $nome; ?>" /></td>
    </tr>
     <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if($nome=="") { echo "<b class='red2'> O nome da sk8shop n�o pode estar vazio! </b>";}
	 elseif(strlen($nome) < 8 or strlen($nome) > 30 ) { echo "<b class='red2'> Nome da sk8shop entre 8 e 30 caract�res.  </b>";}
else {
	$nomeverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td>Email: (para clientes e onde vai receber emails do unitedskating.com</td>
      <td><input name="email" type="text" id="email" value="<?php echo $email; ?>" /></td>
    </tr>
     <tr>
      <td height="2" colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if($email=="") { echo "<b class='red2'> O email n�o pode estar vazio! </b>";}
	 elseif(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) { echo "<b class='red2'> Email incorrecto.  </b>";}
else {
	$emailverif="true";
	}
	 }
 ?>
 </td>
    </tr>
     <tr>
       <td>Contacto telef�nico:</td>
       <td><input name="idade" type="text" id="idade" value="<?php echo $idade; ?>" /></td>
     </tr>
     <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if(strlen($_POST["idade"]) < 9 or strlen($_POST["idade"]) > 9 ) { echo "<b class='red2'> Contacto s� pode ter 9 caract�res.  </b>";}
else {
	$idadeverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td>Localiza��o: (numa linha descrever como chegar � loja e pontos de referencia.</td>
      <td><input name="localidade" type="text" id="localidade" value="<?php echo $localidade; ?>" /></td>
    </tr>
      <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if(strlen($_POST["localidade"]) < 12 or strlen($_POST["localidade"]) > 150 ) { echo "<b class='red2'> Localiza��o entre 12 e 150 caract�res.  </b>";}
else {
	$localidadeverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td>Canal de fotos*</td>
      <td><input name="canal" type="text" id="canal" value="<?php echo $canal; ?>" /></td>
    </tr>
     <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if(strlen($_POST["canal"]) < 10 or strlen($_POST["canal"]) > 200 ) { echo "<b class='red2'> Link do canal entre 10 e 200 caract�res.  </b>";}
else {
	$canalverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td>teamriders/apoiados**:</td>
      <td><input name="musica" type="text" id="musica" value="<?php echo $musica; ?>" /></td>
    </tr>
    <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if(strlen($_POST["musica"]) < 8 or strlen($_POST["musica"]) > 100 ) { echo "<b class='red2'> teamriders/apoiados entre 8 e 100 caract�res.  </b>";}
else {
	$musicaverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td colspan="2">
        <?php
    if ($HTTP_SERVER_VARS['REQUEST_METHOD'] == 'POST'){
      print $validator->getError();
  }
  if ($HTTP_SERVER_VARS['REQUEST_METHOD'] == 'POST' && !checkAnswer()){
      print "<b class='red2'>A quest�o anti-spam n�o foi respondida correctamente!</b>";
  }
else {
	if($_POST["verif"]!="") {
		
		$spamverif="true";
		}
	
	}
  
  ?>
        </td>
    </tr>
     <tr>
      <td><?php print AskQuestion();?> <br/>
      (anti spam)***</td>
      <td><input name="Spamtrap" type="text" id="melhorfilmer" value="<?php print $validator->get("Spamtrap");?>" /></td>
    </tr>
     <tr>
      <td>Sobre/Observa&ccedil;&otilde;es: (num par�grafo: descri��o das raizes da loja,do tipo de p�blico que abrange e algo mais) (insira aqui o website da loja caso exista)</td>
      <td><label for="sobremim"></label>
        <textarea name="sobremim" id="sobremim" cols="45" rows="5"><?php echo $sobremim; ?></textarea></td>
    </tr>
    <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if(strlen($_POST["sobremim"]) < 50 or strlen($_POST["sobremim"]) > 600 ) { echo "<b class='red2'> Sobre/observa��es entre 50 e 600 caract�res.  </b>";}
else {
	$sobremimverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Enviar" />
        <input name="verif" type="hidden" id="verif" value="verif" /></td>
    </tr>
  </table>
  <?php
	  
  if($_POST["verif"]!="") {
  if($nomeverif=="true" and $emailverif=="true" and $localidadeverif=="true" and $idadeverif=="true" and $canalverif=="true" and $musicaverif=="true"  and $spamverif=="true") { 
  
  


 
  date_default_timezone_set('GMT');
					$todayDate = date("Y-m-d g:i a");// current date
$currentTime = time($todayDate); //Change date into time
$timeAfterOneHour = $currentTime+60*60;

$pass = md5($pass);
$data = date("Y-m-d",$timeAfterOneHour);
$hora = date("H:i:s",$timeAfterOneHour);


$mail = new PHPMailer();

	$mail->IsSMTP(); // Define que a mensagem ser� SMTP
	$mail->Host = "smtp.unitedskating.com"; // Endere�o do servidor SMTP
	$mail->SMTPAuth = true;
	$mail->Username = 'geral@unitedskating.com';
	$mail->Password = 'Bateaporta123@';
	$mail->From = "sem-resposta@unitedskating.com"; // Seu e-mailm
	$mail->FromName = "unitedskating"; // Seu nome
	$mail->AddAddress($emailadmin);
	$mail->IsHTML(true); // Define que o e-mail ser� enviado como HTML
	//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
	 	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->Subject  = "Pedido de aprova��o para loja - unitedskating"; // Assunto da mensagem
	$mail->Body = '<head><style>
h1 {
	font-size: 30px;
	font-family: Arial, Helvetica, sans-serif;
}
.cinza {
	color:#999;
}
</style></head><body>
<h1>&nbsp;</h1>
<table width="484" border="0">
  <tr>
    <td width="100"><b><img src="http://www.unitedskating.com/images/logomail.jpg"></b></td>
    <td width="374"><b><h1>United Skating |	sk8shops </h1></b></td>
  </tr>
</table>
<hr>
Caro administrador, foi enviado um pedido para a inscri��o de uma skateshop. <p>

 Dados do formul�rio:
<p><span class="cinza">****************************************************************<br />
Nome da sk8shop: '.$nome.'
<br />Email: '.$email.'
<br /> Contacto: '.$idade.'
<br /> Localiza��o '.$localidade.'
<br /> Canal: '.$canal.'
<br /> Teamriders/Apoiados: '.$musica.'
<br /> Sobre/Observa��es: <br />'.$sobremim.' <br />
****************************************************************</span><br>
</body>';
	$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
  	 echo '<script type="text/javascript">

<!--
window.location = "formloja.php?msg=enviado"
//-->
</script>';


  }
  
  else { echo "<b class='red2'> Existem erros por corrigir.  </b>";} 
  }
  
	  
   ?>
  </form>
<p>*Para termos acesso a fotografias da sua loja para exposi&ccedil;&atilde;o no nosso site indique nos um canal onde as tenha dispon&iacute;veis para que as possamos transferir para o site mais tarde. (ex: flickr, olhares) Pode tamb&eacute;m optar por nos enviar as fotografias para o email geral@unitedskating.com com o seu nome e o nome da loja na descri&ccedil;&atilde;o. Se optar por enviar pelo email escreva no campo do canal &quot;enviado para o email&quot; .  </p>
<p>Se preferir enviar por email escreva no campo do canal de videos/fotos &quot;optei por enviar por email&quot;</p>
<p>**Para anexar links de v&iacute;deos ou das fotos dos teamriders da loja utilize o campo sobre/observa��es juntamente com o nome da cada teamrider. No caso de querer enviar fotos dos team riders, utilize o nosso email juntamente com o nome da skateshop e o nome dos teamriders. Se n�o tiver teamriders escreva simplesmente "a skateshop n�o possui teamriders".</p>
  <p>***Na verifica��o anti-spam, na pergunta dos dias da semana escreva apenas a primeira parte do dia (ex:ter�a) e tudo em letra pequena.
</div>
</p>
<!-- end #content --><!-- end #sidebar -->

				
			  <div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
<?php include("rodape.php"); ?>