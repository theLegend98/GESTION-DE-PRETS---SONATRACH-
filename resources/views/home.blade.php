<!DOCTYPE HTML>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Projection by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="{{ asset('assets/assetsHome/css/main.css') }}" />
        <style>
            #banner{
                background-image:  url({{ asset('dist/img/banner.jpg') }});
            }
        </style>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo"><strong>SONATRACH </strong>Gestion de prets </a>
					<nav id="nav">
						<a href="index.html">Accueil</a>
						<a href="generic.html">Contacts</a>
						<a href="elements.html">Connexion</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<h1>Bienvenue</h1>
						<h2 style="color: beige;">Application gestion de prets - <strong style="color: beige;">SONATRACH</strong></h2>
					</header>

					<div class="flex ">

						<div>
							<span class="icon fa-plus-square"></span>
							<h3>Demande de prets</h3>
							<p>Faite votre propre demande de pret</p>
						</div>

						<div>
							<span class="icon fa-eye"></span>
							<h3>Suivi de la demande</h3>
							<p>Suivre votre demande de pret en temps réel</p>
						</div>

						<div>
							<span class="icon fa-list-alt"></span>
							<h3>Suivi des prets</h3>
							<p>Consulter vos prets en cours</p>
						</div>

					</div>


				</div>
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center">
				<div class="inner">
					<div class="flex flex-2">
						<article>
							<div class="image round">
								<img src="{{ asset('dist/img/pic01.jpg') }}" alt="Pic 01" style="height: 150px; width: 150px;"/>
							</div>
							<header>
								<h3>LE GROUPE <br/>SONATRACH
								</h3>
							</header>
							<p>SONATRACH, acteur majeur dans l’industrie pétrolière,<br/>première entreprise du continent Africain, à travers ses partenaires <br/>SONATRACH est présente dans de nombreux pays.</p>
							<footer>
								<a href="https://sonatrach.com/notre-groupe" target="_blank" class="button">Voir plus</a>
							</footer>
						</article>
						<article>
							<div class="image round">
								<img src="{{ asset('dist/img/pic02.jpg') }}" alt="Pic 02" style="height: 150px; width: 150px;" />
							</div>
							<header>
								<h3>ACTIVITE<br /> SONATRACH</h3>
							</header>
							<p>Le Groupe intègre 5 activités : l’Exploration-Production ;<br/> le Transport par canalisations ; la Liquéfaction et Séparation ;<br/> le Raffinage et la Pétrochimie ; la Commercialisation.</p>
							<footer>
								<a href="https://sonatrach.com/nos-activites" target="_blank" class="button">Voir plus</a>
							</footer>
						</article>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer" style="background-color: #DCDCDC;">


					<div class="logo">
						<a href="/"><img src="{{ asset('dist/img/sonatrach.png') }}" alt="Sonatrach" style="height: 59px; width:39px;margin-right: 7px;"></a>
						<div class="signature" style="display: inline;">
							<img src="{{ asset('dist/img/signature.svg') }}" alt="" style="height: 58px; width:210px">
						</div>
					</div>
					<div class="social">
						<span style="color: #555;">Suivez-nous sur : </span>
						<a href="https://www.facebook.com/SONATRACH/" target="_blank" class="icon" rel="noopener" title="Facebook">
						<img src="https://sonatrach.com/wp-content/uploads/2020/03/facebook.png" alt="Facebook"  style="height: 32px; width:32px;margin-left: 5px; margin-right: 5px;"></a>
						<a href="https://www.youtube.com/channel/UCNZPL_sNE1nQ2azMKyZX3xQ" target="_blank" class="icon" rel="noopener" title="Youtube">
						<img src="https://sonatrach.com/wp-content/uploads/2020/03/youtube.svg" alt="Youtube" style="height: 46.22px; width:32px;  "></a>
					</div>

					<!--<h3>Get in touch</h3>

					<form action="#" method="post">

						<div class="field half first">
							<label for="name">Name</label>
							<input name="name" id="name" type="text" placeholder="Name">
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input name="email" id="email" type="email" placeholder="Email">
						</div>
						<div class="field">
							<label for="message">Message</label>
							<textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
						</div>
						<ul class="actions">
							<li><input value="Send Message" class="button alt" type="submit"></li>
						</ul>
					</form>
					-->



				</div>
			</footer>

		<!-- Scripts -->
			<script src="{{ asset('assets/assetsHome/js/jquery.min.js') }}"></script>
			<script src="{{ asset('assets/assetsHome/js/skel.min.js') }}"></script>
			<script src="{{ asset('assets/assetsHome/js/util.js') }}"></script>
			<script src="{{ asset('assets/assetsHome/js/main.js') }}"></script>

	</body>
</html>
