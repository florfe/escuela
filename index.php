<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Sistema de Gestión </title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" href="css/estilos.css">
		<link rel="stylesheet" href="css/font.css">
	</head>

	<body>
		<header class="header">
			<div class="contenedor">
				<h1 class="logo">I.P.E.M. N° 123 - Blanca Etchemendy</h1>
				<span class="icon-menu" id="btn-menu"></span>
				<nav class="nav" id="nav">
					<ul class="menu">
						<li class="menu__item"><a class="menu__link select" href="">Inicio</a></li>
						<li class="menu__item"><a class="menu__link" href="login.php">Sistema</a></li>
						<li class="menu__item"><a class="menu__link" href="nos.html">Nosotros</a></li>
						<li class="menu__item"><a class="menu__link" href="contacto.html">Contacto</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<div class="banner">
			<img src="img/escue.webp" alt="" class="banner__img">
			<div class="contenedor">
				<h2 class="banner__titulo">La mejor educación a tu alcance</h2>
				<p class="banner__txt">Estudia con nosotros y alcanza tus sueños</p>
			</div>
		</div>

		<main class="main">
			<div class="contenedor">
				<section class="info" >
					<article class="info__columna" >
						<img  src="img/blanca.jpg" alt="" class="info__img">
						<h2 class="info__titulo" href="">Reseña Histórica</h2>
						<p class="info__txt">Las historias consiguen involucrarnos, dotando a los datos de un contexto relacionado con nuestros intereses y preocupaciones. De esta forma los datos adquieren un mayor significado, y es más fácil que lleguen a impulsar la puesta en marcha de acciones relacionadas.</p>
						<p class="info__txt">¿Cuándo? ¿Dónde? ¿Cómo? ¿Por qué? ¿Para qué?</p>
						<p class="info__txt">"I.P.E.M. N° 123 - Blanca Etchemendy", la primer escuela secundaria de la zona.</p>
						<p class="info__txt">Una reseña desde sus inicios, su evolución y su actualidad, una escuela con mucha historia.</p>
						<a href="historia.html">
						<button name="leerMas" class="button">Leer Más</button></a>
					</article>
					
					<article class="info__columna">
						<img src="img/nra2.jpg" alt="" class="info__img">
						<h2 class="info__titulo">Nuevo Régimen Académico</h2>
						<p class="info__txt">“Hemos comenzado a construir un nuevo modo de habitar la escuela secundaria con un régimen académico que promueve el ordenamiento y las responsabilidades colectivas e individuales y las formas de institucionalización del trabajo pedagógico de directivos, docentes y estudiantes, que posibiliten trayectorias continuas y completas para todos los/las estudiantes”.</p>
						<p class="info__txt">Delia Provinciali.</p>
						<p class="info__txt">"https://prensa.cba.gov.ar/educacion-3/reforma-de-la-secundaria-directivos-analizaron-su-implementacion/"</p>
						<a href="nra.html">
						<button name="leerMas" class="button">Leer Más</button></a>
					</article>
					<article class="info__columna">
						<img src="img/aec3.jpg" alt="" class="info__img">
						<h2 class="info__titulo">Estatuto Docente y A.E.C.</h2>
						<p class="info__txt">Estatuto Docente: ley que regula los derechos y obligaciones de docentes, y se diferencia de los convenios colectivos de trabajo ya que este no es producto de una negociación con el empleador sino que es fijado por la legislatura y solo este organismo puede modificarlo.</p>
						<p class="info__txt">Acuerdo Escolares de Convivencia: la comunicad educativa, define un marco de acuerdos y normas que para regular y orientar las prácticas sociales y pedagógicas promoviendo el aprendizaje de la convivencia, del vínculo pedagógico y de las relaciones interpersonales.</p>
						<a href="aec.html">
						<button name="leerMas" class="button">Leer Más</button></a>
					</article>
				</section>

				<section class="cursos">
					<h2 class="section__titulo">Oferta Académica</h2>
					<div class="cursos__columna">
						<img src="img/naranja.jpg" alt="" class="cursos__img">
						<div class="cursos__descripcion"><a href="cb.html">
						<button name="leerMas" class="button">Leer Más</button></a>
							<h3 class="cursos__titulo">Ciclo Básico</h3>
							<p class="cursos__txt">Cursos, Divisiones, Turnos, Horarios, Espacios Curriculares y Docentes.</p>
							
						</div>
	
					</div>

					<div class="cursos__columna">
						<img src="img/naranja2.jpg" alt="" class="cursos__img">
						<div class="cursos__descripcion"><a href="co.html">
						<button name="leerMas" class="button">Leer Más</button></a>
							<h3 class="cursos__titulo">Ciclo Orientado</h3>
							<p class="cursos__txt">Cursos, Divisiones, Turnos, Horarios, Espacios Curriculares y Docentes.</p>
							
						</div>
					</div>
					<div class="cursos__columna">
						<img src="img/naranja3.jpg" alt="" class="cursos__img">
						<div class="cursos__descripcion"><a href="pit.html">
						<button name="leerMas" class="button">Leer Más</button></a>
							<h3 class="cursos__titulo">P.I.T.</h3>
							<p class="cursos__txt">Programa de inclusión y terminalidad de la educación secundaria para jóvenes de 14 a 17 años.</p>
							
						</div>
					</div>
					<div class="cursos__columna">
						<img src="img/naranja4.jpg" alt="" class="cursos__img">

						<div class="cursos__descripcion"><a href="fin.html">
							<button name="leerMas" class="button">Leer Más</button></a>
							<h3 class="cursos__titulo">Finalizá tus Estudios</h3>

							<p class="cursos__txt">Plan FinEs - Plan Egresar: Si tenés más de 18 años y querés rendir materias adeudadas del secundario.</p>
							
						</div>
					</div>
				</section>
			</div>
		</main>

		<footer class="footer">
			<div class="social">
				<a href="" class="icon-facebook"></a>
				<a href="" class="icon-twitter"></a>
				<a href="" class="icon-mail-negro"></a>
				<a href="" class="icon-instagram"></a>
			</div>
			<p class="copy">&copy; Blanca Etchemendy 1989 - Reservados todos sus derechos</p>
		</footer>

		<script src="js/menu.js"></script>
		<script src="js/main.js"></script>
	</body>
	</html>