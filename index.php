
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="mystyle.css" rel="stylesheet">
		<style type="text/css">
			.col-md-8, .col-sm-10 { line-height: 200px; }
			.col-md-12 { line-height: 80px; }
			body { padding-top: 65px; }
		</style> -->
		<title>Mon site avec JavaScript</title>
	</head>
	<body>
		<script type="text/javascript">

			var test = prompt("Entrez un nombre entier en chiffre :");

			//function to discompose a number
			function decoupeNbre(nbre1){

				var nom;
				nbre = parseInt(nbre1, 10);
				var decomposition = [];

				if(isNaN(nbre)){
					return null;
				}else if (nbre < 10){
						decomposition.push(nbre);
						//alert("Le nombre est inferieur a 10");
				}else{
					var y = 0;
					//alert("Le nombre est SUPERIEUR a 10");
					while( (nbre/10) >= 1 ){
						y = nbre%10;
						decomposition.push(y);
						nbre = (nbre - y)/10;
						if(nbre < 10){
							decomposition.push(nbre);
						}
					}		
				}
				return decomposition;
			}

			//function to display discomposed number (like a array)
			function afficheNbre(ar_nbre){

				for(var i=0; i<ar_nbre.length; i++){
					alert(ar_nbre[i]);
				}
			}

			//affiche l'equivalent en lettre d'un nombre
			function nomComplet(nom){

				if(null != nom)
					alert(nom);
				else
					alert("Oops! sorry, but the value you entered is not a number.");
			}

			//function qui renvoie un prefixe des unites
			function dtl_unite(nbre){

				var pre;
				switch (nbre){
					case 0:
						pre = "";
					break;
					case 1:
						pre = "un";
					break;
					case 2:
						pre = "deux";
					break;
					case 3:
						pre = "trois";
					break;
					case 4:
						pre = "quatre";
					break;
					case 5:
						pre = "cinq";
					break;
					case 6:
						pre = "six";
					break;
					case 7:
						pre = "sept";
					break;
					case 8:
						pre = "huit";
					break;
					case 9:
						pre = "neuf";
					break;
				}
				return pre;
			}

			function dtl_unite_plus(nbre){

				var pre;
				switch (nbre){
					case 0:
						pre = "dix";
					break;
					case 1:
						pre = "onze";
					break;
					case 2:
						pre = "douze";
					break;
					case 3:
						pre = "treize";
					break;
					case 4:
						pre = "quatorze";
					break;
					case 5:
						pre = "quinze";
					break;
					case 6:
						pre = "seize";
					break;
					default:
						pre = "dix "+dtl_unite(nbre);
					break;
				}
				return pre;
			}

			//function qui renvoie un prefixe des dizaines
			function dtl_dizaine(nbre){

				var pre;
				switch (nbre){
					case 2:
						pre = "vingt";
					break;
					case 3:
						pre = "trente";
					break;
					case 4:
						pre = "quarante";
					break;
					case 5:
						pre = "cinquante";
					break;
					case 6:
						pre = "soixante";
					break;
					case 8:
						pre = "quatre-vingts";
					break;
				}
				return pre;
			}

			
			function all_prefix(nbre){

				var pre;
				switch (nbre){
					case 0:
						pre = "cent";
					break;
					case 1:
						pre = "mille";
					break;
					case 2:
						pre = "million";
					break;
					case 3:
						pre = "milliard";
					break;
				}
				return pre;
			}

			//build an 1 digit number
			function build_1d(ar_nbre){

				var nom;
				if (ar_nbre[0] === 0){
					nom = "";
				}else{
					nom = dtl_unite(ar_nbre[0]);
				}
				return nom;
			}

			//build a 2 digits number
			function build_2d(ar_nbre){

				var nom;
				if (ar_nbre[1] === 0){
					nom = build_1d(ar_nbre);
				}else if(ar_nbre[1] === 1){
					nom = dtl_unite_plus(ar_nbre[0]);
				}else if((ar_nbre[1] === 7) || (ar_nbre[1] === 9)){
						if(ar_nbre[0] === 0){
							nom = dtl_dizaine(ar_nbre[1]-1)
								+ "-dix";
						}else{
							nom = dtl_dizaine(ar_nbre[1]-1)
								+ "-"
								+ dtl_unite_plus(ar_nbre[0]);
						}
				}else{
					nom = dtl_dizaine(ar_nbre[1])
						+ " "
						+ dtl_unite(ar_nbre[0]);
				}
				return nom;
			}

			//build a 3 digits number
			function build_3d(ar_nbre){

				var nom = dtl_unite(ar_nbre[2])
					+ " "
					+ all_prefix(0)
					+ " "
					+ build_2d(ar_nbre);
				return nom;
			}

			//build a 4 digits number
			function build_4d(ar_nbre){

				var nom = "";
				if(ar_nbre[3] != 1){
					nom += dtl_unite(ar_nbre[3]);
				}
				nom += " " 
					+ all_prefix(1)
					+ " "
					+ build_3d(ar_nbre);
				return nom;
			}

			//build a 5 digits number
			function build_5d(ar_nbre){

				var sous_ar_nbre = [];
				sous_ar_nbre.push(ar_nbre[3]);
				sous_ar_nbre.push(ar_nbre[4]);
				var nom = build_2d(sous_ar_nbre)
					+ " "
					+ all_prefix(1)
					+ " "
					+ build_3d(ar_nbre);
				return nom;
			}

			//build a 6 digits number
			function build_6d(ar_nbre){

				var nom = "";
				if(ar_nbre[5] != 1){
					nom += dtl_unite(ar_nbre[5]) + "-";
				}
					nom += "cent "
						+ build_5d(ar_nbre);
				return nom;
			}

			//function to display the number in letter
			function construireNom(ar_nbre){

				var i = 0;
				var nom;
				if(null != ar_nbre){
					switch (ar_nbre.length){
						case 0:
							alert("Pas de nombre a lire !");
						break;
						case 1:
							alert("Ordre de 1");
							nom = build_1d(ar_nbre);
						break;
						case 2:
							alert("Ordre de 10");
							nom = build_2d(ar_nbre);
						break;
						case 3:
							alert("Ordre de 100");
							nom = build_3d(ar_nbre);
						break;
						case 4:
							alert("Ordre de 1000");
							nom = build_4d(ar_nbre);
						break;
						case 5:
							alert("Ordre de 10 000");
							nom = build_5d(ar_nbre);
						break;
						case 6:
							alert("Ordre de 100 000");
							nom = build_6d(ar_nbre);
						break;
						case 7:
							alert("Ordre de 1 000 000");
							nom = build_7d(ar_nbre);
						break;
						case 8:
							alert("Ordre de 10 000 000");
							nom = build_8d(ar_nbre);
						break;
						case 9:
							alert("Ordre de 100 000 000");
							nom = build_9d(ar_nbre);
						break;
						case 10:
							alert("Ordre de 1 000 000 000");
							nom = build_10d(ar_nbre);
						break;
						case 11:
							alert("Ordre de 10 000 000 000");
							nom = build_11d(ar_nbre);
						break;
						case 12:
							alert("Ordre de 100 000 000 000");
							nom = build_12d(ar_nbre);
						break;
						case 13:
							alert("Ordre de 1000 000 000 000");
							nom = build_13d(ar_nbre);
						break;
						default:
							alert("N'exagere pas quand meme !");
						break;
					}
					return nom;
				}
				return null;
			}

			//afficheNbre(decoupeNbre(test));
			nomComplet(construireNom(decoupeNbre(test)));

		</script>
	</body>
</html>