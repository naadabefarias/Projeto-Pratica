<p 	id="news1"><b></b></p>
			<a href="#news1"></a>
			<div id="toninho">
				<img id="imagem" src="images/toninho.png"/>
					<div id="texto">
					Bem vindo  ao seu ponto turistico</br>eu me chamo Toninho e estou</br> aqui para ajuda-lo </div>
						<a class="fechar" title="Ok"  onclick="document.getElementById('toninho').style.display = 'none'; ">X</a> 
						

						<?php 
						if($_SESSION['toninho_home']!=true){

				echo "<script>var variavel = setTimeout(function() {
		
	 		window.location = '/#news1';
		document.getElementById('toninho').style.display = '';


	}, 100);</script>";

	$_SESSION['toninho_home']=1;


						}

						?>



</div>