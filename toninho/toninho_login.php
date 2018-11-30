



<?php if(isset($_SESSION['user'])){ ?>


<p 	id="news1"><b></b></p>
			<a href="#news1"></a>
			<div id="toninho">
				<img id="imagem" src="images/toninho.png"/>
					<div id="texto">
					Bem vindo<b> <?php echo $_SESSION['user'];?></b></br> Para onde vamos hoje ?</br> </div>
						<a class="fechar" title="Ok" href="/" onclick="document.getElementById('toninho').style.display ='none'; ">X</a> 
						

						<?php 
						if(isset($_SESSION['user'])){

							if($_SESSION['loguei'] == null){
				
				echo "<script> var variavel = setTimeout(function() {
		
	 		window.location = '/#news1';
		document.getElementById('toninho').style.display = '';


	}, 100);</script>";
$_SESSION['loguei']=true;
}
	
						}
}
						?>



</div>