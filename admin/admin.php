<html >
<head>
	<title>Page admin</title>
</head>
<body link="#3d2e54" style="background-image: url('images/bg3.jpg');">
<?php
session_start();
?>
<?php
try{
 $db= new PDO('mysql:host=localhost;dbname=site-e-commerce','root','');
  $db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
 echo "une erreur est survenue";    
 die(); }
 ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

<h1 align="center">🎓 BIENVENUE,<?php echo $_SESSION['username'];?></h1>
	<div class="col-lg-12">
				 <?php $count=$db->prepare("SELECT COUNT( DISTINCT nom) as conteur FROM message");
           $count->execute();
           $s=$count->fetch(PDO::FETCH_OBJ)?>
<pre align="center"><a href="?action=addh"><b>📥 Ajouter un produit </b></a>/<a href="?action=categorie"><b>Ajouter-supprimer Categorie</b></a>/<a href="?action=client"><b>Les Clients </b></a>/<a href="?action=modifyordeleteh"><b> 🛠 Modifier ou supprimer un produit</b></a> / Vous avez <b><?php echo $s->conteur;?></b> message(s) reçu(s)  <a href="?action=boite"><b>Ouvrir la Boite 📩</b></a>  /<br> <a href="?action=commande"><b>Les commandes </b></a>  <br>--------------------------<br><a href="?action=option"><b>Option</b></a><br><a href="disconnectadmin.php"><b>Déconnection</b></a></pre>
</div>

<?php

if (isset($_SESSION['username'])) {

if (isset($_GET['action'])) {

	if ($_GET['action']=='addh') {
echo "<marquee bgcolor=''  direction='left' loop=''><h4>🖐 Vous êtes dans la page d'Ajout. </h4></marquee>";
echo "<hr align=center><br>";
			if (isset($_POST['submit'])) {

                $stock=$_POST['stock'];
				$titre=$_POST['titre'];
				$description=$_POST['description'];
				$categorie=$_POST['categorie'];
				$prix=$_POST['prix'];
				$genre=$_POST['genre'];
				$id=$_POST['id'];
				$image=$_FILES['image']['name'];
				$image_tmp=$_FILES['image']['tmp_name'];

				if (!empty($image_tmp)) {
					$img=explode(".",$image);
					$image_ext=end($img);


                if (in_array(strtolower($image_ext),array('png','jpg','jpeg'))===false){

     echo "<center><font color=#d11010'>Veuillez rentrez une image ayant pour extention: PNG,JPG ou JPEG.</font></center>";
					}else{
						$image_size=getimagesize($image_tmp);

		       if ($image_size['mime']=='image/jpeg') {
	                  $image_src=imagecreatefromjpeg($image_tmp);

				}else if ($image_size['mime']=='image/png') {
					
	            $image_src=imagecreatefrompng($image_tmp);
						
						}else{
							$image_src=false;
            echo"<center><font color=#d11010'>Veuillez rentrez une image valide!!</font></center>";
							
						}
						if ($image_src!==false) {
							$image_width=500;
						if ($image_size[0]==$image_width) {
								$image_finale=$image_src;
							}else{
								$new_width[0]=$image_width;
								$new_height[1]=400;
					$image_finale=imagecreatetruecolor($new_width[0],$new_height[1]); 
  imagecopyresampled($image_finale,$image_src,0,0,0,0,$new_width[0],$new_height[1],$image_size[0],$image_size[1]);
							}
							imagejpeg($image_finale,'images/'.$titre.'.jpg');	
						}
					}

				}else{
					echo "Veuillez rentrez une image!!";
				}

			if ($id&&$titre&&$description&&$categorie&&$prix&&$genre&&$stock) {
				$weights=$_POST['weights'];

	  $select=$db->query("SELECT shipping  FROM weights WHERE weight='$weights'");
	  $s=$select->fetch(PDO::FETCH_OBJ);
	  $shipping=$s->shipping;
	  $old_price=$prix;
	  $prix_final= $old_price+ $shipping;
	   $select=$db->query("SELECT tva  FROM productsh ");
	   $s1=$select->fetch(PDO::FETCH_OBJ);
	   $tva=$s1->tva;
	  $Prix_final_1=$prix_final+($prix_final*$tva/100);
	   				 	
 $insert=$db->prepare("INSERT INTO productsh  VALUES(?,?,?,?,?,?,?,?,?,?,?)");
 $insert->execute(array("$id","$titre","$description","$categorie","$prix","$tva","$genre","$weights","$shipping","$Prix_final_1","$stock"));
         }else{
	             echo "Veuillez remplir tous les champs!! ";
                }
	}
	?>
	<form action="" method="POST" enctype="multipart/form-data" align=left>
		<pre>
		<b>* TITRE</b>       :<input type="text" name="titre"><br>
		<b>* DESCRIPTION</b> :<textarea name="description" cols="50" rows="15"></textarea><br>
                <b>* CATEGORIE</b>   :<select name="categorie">
                	<?php
                     
            $select=$db->query("SELECT * FROM categorie");
			while ($s=$select->fetch(PDO::FETCH_OBJ) ){?>
			<option><?php echo $s->categorie ;?></option>
			<?php
			}
                	?>
       </select><br>
		<b>* PRIX</b>        :<input type="text" name="prix"><br>
		<b>* ID</b>          :<input type="text" name="id"><br>
		<b>* IMAGE</b>       :<input type="file" name="image"><br>
		<b>* Genre</b>       :<input type="text" name="genre"><br>
		<b>* poids</b>       :moins de :<select name="weights">
			<?php
			$select=$db->query("SELECT * FROM weights");
			while ($s=$select->fetch(PDO::FETCH_OBJ) ){
			echo "<option>".$s->weight."</option>";
			}
			?>	
		</select><br><br>
		<b>* Stock</b>       :<input type="text" name="stock"><br>
		<input type="submit" name="submit">
		</pre>
	</form>
	 <?php 
     }else if ($_GET['action']=='modifyordeleteh') {
echo "<marquee bgcolor=''  direction='left' loop=''><h4>🖐 Vous êtes dans la page de Modification</h4></marquee>";
echo "<hr align=center><br>";
     	$select=$db->prepare("SELECT * FROM productsh ");
        $select->execute();
 echo "<table border=4 align=center><tr><td>ID</td><td>Titre</td><td>Categorie</td><td>Genre</td><td>Stock</td><td>Modifier</td><td>Supprimer</td></tr>";
 while ($s=$select->fetch(PDO::FETCH_OBJ) ){
 	
 	$stockk=$s->stock;
 	if($stockk<=0){
 		$stockk=0;
 	}
 	echo"<tr><td>".$s->id."</td><td>".$s->titre."</td><td>".$s->categorie."</td><td>".$s->genre."</td><td>".$stockk."</td>";
 	?>
 	<td><a href="?action=modifyh&amp;id=<?php echo  $s->id;?>">modifier</a></td>
 	<td><a href="?action=deleteh&amp; id=<?php echo $s->id;?>">supprimer</a></td></tr><br>
    <?php
             }
    		
	}else if ($_GET['action']=='modifyh') {
		echo "<marquee bgcolor=''  direction='left' loop=''><h4>🖐 Vous pouvez modifier votre produit ici </h4></marquee>";
		echo "<hr align=center><br>";

		 $id=$_GET['id'];
		$select=$db->prepare("SELECT * FROM productsh WHERE id=$id ");
       $select->execute();
       $mod=$select->fetch(PDO::FETCH_OBJ);
		?>
		<p align="center"><i><u>FORMULAIRE DE MODIFICATION</u></i></p>
	<form action="" method="POST" align=left>
		<pre>
		<b>TITRE</b>       :<input type="text" value="<?php echo $mod->titre;?>" name="titre"><br>
		<b>DESCRIPTION</b> :<textarea name="description" cols="50" rows="15"><?php echo $mod->description;?></textarea><br>
		<b>CATEGORIE</b>   :<select name="categoriel">
                	<?php
                     
            $select=$db->prepare("SELECT * FROM categorie");
            $select->execute(array());
			while ($s=$select->fetch(PDO::FETCH_OBJ) ){?>
			<option value='<?php echo $s->idm;?>'><?php echo $s->categorie; ?></option>
			<?php
			}
                	?>
       </select><br>
		<b>PRIX</b>        :<input type="text" value="<?php echo $mod->prix?>" name="prix"><br>
		<b>ID</b>          :<input type="text" value="<?php echo $mod->id?>" name="id"><br>
		<b>GENRE</b>       :<input type="text" value="<?php echo $mod->genre?>" name="genre"><br>
		<b>Stock</b>       :<input type="text" name="stock" value="<?php echo $mod->stock?>"><br>
		<input type="submit" name="submit2" value="Modifier">
		</pre>
	</form>
	<?php
	if (isset($_POST['submit2'])) {

				$titre=$_POST['titre'];
				$description=$_POST['description'];
				$categorie=$_POST['categoriel'];
				$prix=$_POST['prix'];
				$genre=$_POST['genre'];
				$id=$_POST['id'];
				$stock=$_POST['stock'];

 $update=$db->prepare("UPDATE productsh SET titre='$titre',description='$description',categorie='$categorie',prix='$prix',id='$id',genre='$genre',stock='$stock' WHERE id='$id'");
 $update->execute(array());
 header("location:admin.php?action=modifyordeleteh");
     }
     }else if ($_GET['action']=='deleteh') {
		 $id=$_GET['id'];
		 $delete=$db->prepare("DELETE FROM productsh WHERE id=?");
           $delete->execute(array($id));
	
	

		} else if ($_GET['action']=='option') {
			// option --------------------
		echo "<h4 align=center>Frais de port </h4>";
		echo "<h5 align=center>Option de poits</h5>(moins de):";

			$select=$db->query("SELECT * FROM weights");
			while ($s=$select->fetch(PDO::FETCH_OBJ) ){
				?>
	<form action="" method="POST" >
		
		<input type="text" name="weights" value="<?php echo $s->weight;?>">
		  <a href="?action=modify_poids&amp;name=<?php echo $s->weight;?>">Modifier</a>
		
	</form>
	<?php
     }
       $select=$db->query("SELECT tva FROM productsh");
       $s=$select->fetch(PDO::FETCH_OBJ);
       if (isset($_POST['submit2'])) {
       	$tva=$_POST['tva'];
       	if ($tva) {
       $update=$db->query("UPDATE productsh SET tva=$tva ");
       	}
       }
?>
	<form action="" method="POST" >
<h5>tva   :</h5><input type="text" name="tva" value="<?php echo $s->tva;?>"><input type="submit" name="submit2" value="modifier">
</form>
<?php
	  
			}else if ($_GET['action']=='modify_poids') {

				$old_weights=$_GET['name'];
				$select=$db->query("SELECT * FROM weights WHERE weight=$old_weights");
	    			$s=$select->fetch(PDO::FETCH_OBJ);

				if (isset($_POST['submit'])) {
 
					$weights=$_POST['weights'];
					$price=$_POST['price'];

					if ($weights&&$price) {	
					
	    $update=$db->query("UPDATE weights SET weight='$weights',shipping='$price' WHERE weight=$old_weights");

					}
					
				}
				echo "<h4 align=center>Frais de port </h4>";
		echo "<h5 align=center>Option de poits</h5>(moins de):";

				?>
	<form action="" method="POST" >
		<pre>
		<h4>poids  :</h4><input type="text" name="weights" value="<?php echo $_GET['name'];?>">
		<h4>correspond a:</h4><input type="text" name="price" value="<?php echo $s->shipping;?>">DH<br>
<input type="submit" name="submit" value="Modifier">
		</pre>
	</form>
	 <?php

	}else if ($_GET['action']=='boite') {
	// --------boite des messages-----------------
echo "<marquee width='100%' direction='left' loop=''><h4>🖐 Vous êtes dans la boite des messages 📬</h4></marquee>";			
				echo "<hr align=center><br>";
   $select=$db->prepare("SELECT * FROM message ");
        $select->execute();

     
 while ($s=$select->fetch(PDO::FETCH_OBJ) ){
 	 $message=$s->message;
     $message_finale=wordwrap($message,50,'<br>',true);
 	echo "<div ><h3 align=center><u><i>👇 Message de :</i></u></h3>";
 	echo "📌";
 	echo "<table border=0>";
 	echo"<tr><td><h5>•NOM :</h5> </td><td>* ".$s->nom."</td></tr>";
    echo"<tr><td><h5>•E-MAIL :<h5> </td><td><a href=MAILTO:http://'$s->email'>* ".$s->email."<a></td></tr>";
    echo"<tr><td><h5>•NUMERO de TEL:<h5> </td><td>* ".$s->phone."</td></tr>";
    echo"<tr height=100px><td ><h5>•MESSAGE      :<h5> </td><td><i>* ".$message_finale."<i></td></tr></table></div>";
    

    ?>
    <br><div  align=center><a  href='?action=supMessage&amp;idm=<?php echo $s->idm;?>'><b>SUPPRIMER 🗑</b></a></div><br><hr align=center><br>
    <?php

     }

	}else if ($_GET['action']=='supMessage') {
		$idm=$_GET['idm'];
	$supprimer=$db->prepare("DELETE FROM message where idm=? ");
    $supprimer->execute(array($idm));

	}else if ($_GET['action']=='commande') {


		echo "<marquee width='100%' direction='left' loop=''><h4>🖐 Vous êtes dans la boite des commandes </h4></marquee>";			
		echo "<hr align=center><br>";
   $select=$db->prepare("SELECT DISTINCT  produit,pseudo,quantite,nom,adresse,frais_de_port,total_tva,datec  FROM commande ORDER BY datec ");
        $select->execute();
     
 while ($s=$select->fetch(PDO::FETCH_OBJ)){

	echo "<h3 align=center><u><i>👇 Commande de :</i></u></h3>";
 	echo "📌";
 	echo "<table border=0>";
 	echo"<tr><td><h5>PSEUDO     :</h5> </td><td>*  ".$s->pseudo."</td></tr>";
 	echo"<tr><td><h5>•NOM     :</h5> </td><td>*  ".$s->nom."</td></tr>";
    echo"<tr><td><h5>•Adresse      :<h5> </td><td>*  ".$s->adresse."<a></td></tr>";
    echo"<tr><td><h5>•frais_de_port:<h5> </td><td>*  ".$s->frais_de_port."</td></tr>"; 
    echo"<tr><td><h5>•total:<h5> </td><td>*  ".$s->total_tva."</td></tr>";
    echo"<tr><td><h5>•produits:<h5> </td><td>*  ".$s->produit."</td></tr>";
    echo"<tr><td><h5>•quantite:<h5> </td><td>*  ".$s->quantite."</td></tr>";
    echo"<tr><td><h5>•date de commande:<h5> </td><td>*  ".$s->datec."</td></tr></table>";  
}

?>
    <br><div  align=center><a  href='?action=supcommande'><b>SUPPRIMER </b></a></div><br><hr align=center><br>
<?php

}else if ($_GET['action']=='client') {

echo "<marquee bgcolor=''  direction='left' loop=''><h4>🖐 les clients</h4></marquee>";
echo "<hr align=center><br>";
     	$select=$db->prepare("SELECT * FROM users ");
        $select->execute();
 echo "<table border=4 align=center><tr><td>Pseudo</td><td>Nom et Prenom</td><td>Email</td><td>Adresse</td><td>Supprimer</td></tr>";
 while ($s=$select->fetch(PDO::FETCH_OBJ) ){
 	
 	echo"<tr><td>".$s->pseudo."</td><td>".$s->nom."</td><td>".$s->email."</td><td>".$s->adresse."</td>";
 	?>
 	
 	<td><a href="?action=supclient&amp;pseudo=<?php echo $s->pseudo;?>">supprimer</a></td></tr>
<?php
	}
	?>
</table>
	<?php

	}else if ($_GET['action']=='supcommande') {

$supprimer=$db->prepare("DELETE FROM commande ");
$supprimer->execute();


	}else if ($_GET['action']=='supclient') {
		if ($_GET['pseudo']) {

		$supprimer=$db->prepare("DELETE FROM users where pseudo=? ");
        $supprimer->execute(array($_GET['pseudo']));
        $supprimer=$db->prepare("DELETE FROM commande where pseudo=? ");
        $supprimer->execute(array($_GET['pseudo']));

		}
	}
	else if ($_GET['action']=='categorie') {
     
	?>	
	<form method="POST" action="">
 Ajouter Categorie :    <input type="text" name="categorie">      <input type="submit" name="submitA" value="Ajouter">
	</form><br><br>
	
	<form method="POST" action="">
Supprimer Categorie :    <select name="categorieM">
                	<?php
                     
            $select=$db->prepare("SELECT * FROM categorie");
            $select->execute(array());
			while ($s=$select->fetch(PDO::FETCH_OBJ) ){?>
			<option value='<?php echo $s->categorie;?>'><?php echo $s->categorie; ?></option>
			<?php
			}
            ?>
        </select>
            Pour :    <select name="genreC">
         	<option value='homme'>HOMME</option>
         	<option value='femme'>FEMME</option>
         	<option value='homme'>HOMME</option>
         </select>        <input type="submit" name="submitM" value="SUPPRIMER">
	</form><br><br>
	<form method="POST" action="">
Supprimer Categorie :    <select name="categorieT">
                	<?php
                     
            $select=$db->prepare("SELECT * FROM categorie");
            $select->execute(array());
			while ($s=$select->fetch(PDO::FETCH_OBJ) ){?>
			<option value='<?php echo $s->categorie;?>'><?php echo $s->categorie; ?></option>
			<?php
			}
            ?>
                <input type="submit" name="submitT" value="SUPPRIMER">
	</form>
	<?php
	if (isset($_POST['submitA'])) {
		$categorieN=$_POST['categorie'];
		if ($categorieN) {
			$insert=$db->prepare("INSERT into categorie  VALUES(?,?) ");
       $insert->execute(array("","$categorieN"));
		}else{
			echo "Remplir le champs de categorie";
		}			
	}

	if (isset($_POST['submitM'])) {

		$categorieM=$_POST['categorieM'];
		$genre=$_POST['genreC'];

		if ($categorieM&&$genre) {
        $delete=$db->prepare("DELETE from categorie where categorie=?");
        $delete->execute(array("$categorieM"));
  $delete=$db->prepare("DELETE from productsh where genre=? AND categorie=?");
       $delete->execute(array("$genre","$categorieM"));

		}
	}	


	if (isset($_POST['submitT'])) {

		$categorieT=$_POST['categorieT'];

		if ($categorieT) {
        $delete=$db->prepare("DELETE from categorie where categorie=?");
        $delete->execute(array("$categorieT"));
  $delete=$db->prepare("DELETE from productsh where categorie=?");
       $delete->execute(array("$categorieT"));

		}
	}	
}else{

		die('une erreur s\'est produite');
	}

 	}else{
 	
   }	
   }else{ 

    header('location:../indexSite.php'); 

    }   
 ?>

</body>
</html>



