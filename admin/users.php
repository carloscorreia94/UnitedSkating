<?php include('../config.php');
if(isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {

$array2 = mysql_query("SELECT * FROM utilizadores ORDER BY id DESC");
?>


		<?php include ("barra.php"); ?>
  
                <h2> Utilizadores </h2>
             
                <?php
			
			   $a = $_GET["a"];
			   $id = $_GET["id"];
			    if($a=="coapagado") {
			   echo '<div align="center" class="red">Coment�rio apagado com sucesso, n�o restaram coment�rios!</div>';
			   }
			    if($a=="apagado")
			  {
				   echo '<div align="center" class="red">Utilizador apagado.</div>';
				  }
				    if($a=="nexistec")
			  {
				   echo '<div align="center" class="red">N�o existem coment�rios para esse utilizador.</div>';
				  }
				  
			    if($a=="apagar") {
				    $resultado = mysql_query ( "SELECT count(*) from utilizadores WHERE id='".$id."'" );
 list ( $numcom88 ) = mysql_fetch_row ( $resultado );
				   if($numcom88==1) {
					   mysql_query("DELETE FROM utilizadores WHERE id='".$id."'" );
					   
					   echo '<script type="text/javascript">

<!--
window.location = "users.php?a=apagado"
//-->
</script>';
					   }
				   }
				  
			  
			     if($a=="nexiste") {
			   echo '<div align="center" class="red">Utilizador que requiriu n�o existe!</div>';
			   }
			  
			    if($a=="editado") {
			   echo '<div align="center" class="red">Utilizador editado com suceso!</div>';
			   }
				?>
               <?php 
			   $numcom23 = mysql_query ( "SELECT count(*) from utilizadores" );
 list ( $numcom5 ) = mysql_fetch_row ( $numcom23 );
			   if($numcom5==0) { echo '<div align="center" class="red">Sem utilizadores.</div>'; }
			   
			   else {
				   
				   ?>
                   
                   <table width="860" border="1" align="center" bordercolor="#999999">
  <tr>
    <td width="80">User:</td>
    <td width="84">Email:</td>
    <td width="150">Nome:</td>
    <td width="150">Idade:</td>
     <td width="110">Localidade:</td>
     <td width="110">Site:</td>
      <td width="110">Sobre Mim:</td>
     <td width="110">DataReg:</td>
      <td width="110">Activo:</td>
    <td width="99">Op&ccedil;oes:</td>
  </tr>
                   <?php
				   
			   }
			   while($lconfig = mysql_fetch_array($array2)) {
				   ?>
				    <script type="text/javascript">

                function confirmar<?php echo $lconfig["id"]; ?>() {
               var answer = confirm("Deseja mesmo apagar o Utilizador '<?php echo $lconfig["user"]; ?>'?")
			   if (answer){
		window.location = "users.php?a=apagar&id=<?php echo $lconfig["id"]; ?>";
	}
	else{
		
	}

               }
			   </script>
               <?php
		
	
				   echo '  <tr>
    <td>'.$lconfig["user"].'</td>
    <td>'.$lconfig["email"].'</td>
    <td>'.$lconfig["pnome"].'</td>
    <td>'.$lconfig["morada"].' </td>
	 <td>'.$lconfig["codigo"].'</td>
	  <td>'.$lconfig["telefone"].'</td>
	   <td>'.$lconfig["site"].'</td>
	   <td>'.$lconfig["dataregi"].' '.$lconfig["horareg"].'</td>
	    <td>'.$lconfig["activo"].'</td>
    <td><a href="user.php?user='.$lconfig["id"].'">Editar</a>&nbsp;&nbsp; <a onclick="confirmar'.$lconfig["id"].'()"><u>Apagar</u></a> &nbsp; <a href="commentsuser.php?utilizador='.$lconfig["id"].'">Comments</a></td>
  </tr>
';
				   }
			   ?>
</table>
           
<?php
}
else {
	echo '<script type="text/javascript">

<!--
window.location = "../index.php"
//-->
</script>';
}
?>