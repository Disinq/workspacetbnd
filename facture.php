<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FACTURE</title>
	<link rel="stylesheet" type="text/css" href="fac.css">
	<style type="text/css">
		body {
	padding-right: 10%;
	padding-left: 10%;
}

img {
	width: auto;
	height: 125px;
}

#red {
	background-color: red;
}
.produits {
	margin-left: auto;
	margin-right: auto;
	width: 100%;
	border: 2px solid black;
}
.totaux {
	border: 2px solid black;
	margin-right: auto;
	margin-left: auto;
	width: 100%;
}
.haut_de_page {
	width: 100%;
}
.bas_page {
	font-size: 10px;
	text-align: center;
	bottom: 0;
}
	</style>
</head>
<body>
	<?php

		$info_societe = array(array("nom" => "Intérmarché", "adresse" => "20 allée du boubli", "cp" => "91370", "tel" => "06 12 62 29 67", "ref_internet" => "https://www.intermarche.com"));

		$info_client = array(array("nom" => "BONALDI", "prenom" => "Thomas", "adresse" => "14 allée du buisson", "cp" => "91370"));

		$info_produit = array(array("nom" => "Pomme", "quantite" => mt_rand(1,150), "prix_unitaire" => 1, "designation" => "Pink Lady d'origine France"),
							array("nom" => "Pastèque", "quantite" => mt_rand(1,150), "prix_unitaire" => 1,25 , "designation" => "Pastèque d'espagne"),
							array("nom" => "grenade", "quantite" => mt_rand(1,150), "prix_unitaire" => 1, "designation" => "Grenade produite en France"),
							array("nom" => "peche", "quantite" => mt_rand(1,150), "prix_unitaire" => 2, "designation" => "Pèche d'italie"),
							array("nom" => "poire", "quantite" => mt_rand(1,150), "prix_unitaire" => 1, "designation" => "Poire de France"));

	?>
	<header>
		<table class="haut_de_page">
		<tr>
			<th><img src="images/intermarche.png" alt="logo intermarché"></th>
			<th id="red"><h1>FACTURE</h1></th>
		</tr>
		<tr id="red">
			<td><p><?php echo ($info_societe[0]["adresse"]); ?></p>
			<p><?php echo ($info_societe[0]["cp"]) ?></p>
			<p><?php echo ($info_societe[0]["tel"]) ?></p>
			<p><?php echo ($info_societe[0]["ref_internet"]) ?></p></td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td>
							<p>Référence</p>
						</td>
						<td>
							<p>:</p>
						</td>
					</tr>
					<tr>
						<td>
							<p>Date</p>
						</td>
						<td>
							<p>: <?php echo(date('d/y/m'));?></p>
						</td>
					</tr>
					<tr>
						<td>
							<p>N°client</p>
						</td>
						<td>
							<p>: <?php echo(mt_rand(1,2931389331));?></p>
						</td>
					</tr>
				</table>
			</td>
			<td>
				<table class="client">
					<tr>
						<td>
							<td><strong><?php echo ($info_client[0]["nom"]." ".$info_client[0]["prenom"]); ?></strong></td>
						</td>
					</tr>
					<tr>
						<td>
							<p><?php echo($info_client[0]["adresse"]); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<p><?php echo ($info_client[0]["cp"]); ?></p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		</tr>
	</table>
	</header>
	<main>
		<p>Récapitulatif de la commande :</p>
	<table class="produits">
		<tr id="red">
			<th>Quantité</th>
			<th>Désignation</th>
			<th>Prix unitaire HT</th>
			<th>Prix total HT</th>
		</tr>
		<?php
			$PT = 0;
			foreach ($info_produit as $key => $value) 
			{
				$PTHT = $info_produit[$key]["quantite"] * $info_produit[$key]["prix_unitaire"];
				$PT = $PT + $PTHT;
				echo("<tr>
					<td>".$info_produit[$key]["quantite"]."
					</td>
					<td>".$info_produit[$key]["designation"]."
					</td>
					<td>".$info_produit[$key]["prix_unitaire"]."
					</td>
					<td>".$PTHT."
					</tr>");
			}
			$TAX20 = ($PT * 20) / 100;
		?>
	</table>
	<table class="totaux">
		<tr>
			<td><p>Total Hors Taxe</p></td>
		<td><?php echo ($PT) ?></td>
		</tr>
		<tr>
			<td><p>TVA à 20%</p></td>
			<td><?php echo ($TAX20) ?></td>
		</tr>
		<tr>
			<td><p>Total TTC en euros</p></td>
			<td><?php echo ($PT + $TAX20) ?></td>
		</tr>
	</table>
	</main>
	<footer>
		<p>En votre aimable règlement,<br>Cordialement.</p>
		<br>
		<br>
		<p class="bas_page">Conditions de paiement : paiement à réception de facture, à 30 jours...
		<br>Aucun escompte consenti pour règlement anticipé
		<br>Tout incident de paiement est passible d'intérêt de retard. Le montant des pénalités résulte de l'application
		<br>aux somme restant dues d'un taux d'intérêt légal en vigueur au moment de l'incident.
		<br>Indemnité forfaitaire pour frais de recouvrement due au créancier en cas de retard de paiement : 40€</p>
	</footer>
	<button>
		<a href="http://localhost/genpdf.php"> Telecharger en pdf
	</button>
</body>
</html>