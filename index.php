	<?php require_once('view_header.php');

$bairro = [
				"AgamenonMagalhaes" 		=>	"Agamenon Magalhães",
                "aguaMineral" 				=>	"Água Mineral",
                "altodoCeu" 				=>	"Alto do Céu",
                "anadeAlbuquerque" 			=>	"Ana de ALbuquerque",
                "arcanjo" 					=>	"Arcanjo",
                "areiaBranca" 				=>	"Areia Branca",
                "barradoCeara" 				=>	"Barra do Ceára",
                "belaVista" 				=>	"Bela Vista",
                "belaVista" 				=>	"Boa Vista",
                "bomfim" 					=>	"Bomfim",
                "campinadeFeira" 			=>	"Campina de Feira",
                "centro" 					=>	"Centro",
                "cohab" 					=>	"Cohab",
                "cortegada" 				=>	"Cortegada",
                "cruzdeReboucas" 			=>	"Cruz de Rebouças",
                "duarteCoelho" 				=>	"Duarte Coelho",
                "encantodeIgarassu" 		=>	"Encanto de Igarassu",
                "inhama" 					=>	"Inhamã",
                "jabaco" 					=>	"Jabacó",
                "jardimBoaSorte" 			=>	"Jardim Boa Sorte",
                "jardimParaiso" 			=>	"Jardim Paraíso",
                "jardimSumare" 				=>	"Jardim Sumaré",
                "marcodePedra" 				=>	"Marco de Pedra",
                "meninoJesusdaPraga" 		=>	"Menino Jesus da Praga",
                "monjope" 					=>	"Monjope",
                "nossaSenhoradaConceicao" 	=>	"Senhora da Conceição",
                "panco" 					=>	"Panco",
                "postodeMonta" 				=>	"Posto de Monta",
                "rubina" 					=>	"Rubina",
                "santoAntonio" 				=>	"Santo Antônio",
                "sitiodosMarcos"			=>	"Sítio dos Marcos",
                "saoJose" 					=>	"São José",
                "santaMaria" 				=>	"Santa Maria",
                "santaRita" 				=>	"Santa Rita",
                "tabatinga" 				=>	"Tabatinga",
                "triunfo" 					=>	"Triunfo",
                "trupical" 					=>	"Trupical",
                "umbura" 					=>	"Umbura",
                "vilaRural" 				=>	"Vila Rural",
                "vilaSaramandaia" 			=>	"Vila Saramandaia",
];
 ?>

		<!--Carousel -->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicadores do Carousel -->
			<ol class="carousel-indicators">

				<?php   $ativo = 0;
				while ($ativo < 3):
					if ($ativo == 0) { ?>
						<li data-target="#myCarousel" data-slide-to="<?=$ativo?>" class="active"></li>
						<?php $ativo++;
					}else{
						if($ativo <= 2):?>
							<li data-target="#myCarousel" data-slide-to="<?=$ativo;?>"></li>
							<?php $ativo++; ?>	
						<?php endif; 		
					}
				endwhile ?>


			</ol>

			<!-- Slides do Carousel -->
			<div class="carousel-inner" role="listbox">

				<?php 	$ativoCarr = 0;
				while($linha = $consulta -> fetch(PDO::FETCH_ASSOC)):
					if ($ativoCarr == 0) {?>
						<div class="item active">
							<a href="view_visualizar_pontos.php?id=<?=$linha['id']?>">
								<img style="width: 100%;height: 31em;" src="upload/<?=$linha['imagem'];?>">
							</a>
						</div>
						<?php 	$ativoCarr++;
					}else{
						if ($ativoCarr <= 2): ?>	
							<div class="item">
								<a href="view_visualizar_pontos.php?id=<?=$linha['id']?>">
									<img style="width: 100%;height: 31em;" src="upload/<?=$linha['imagem'];?>">
								</a>
							</div>
							<?php 	$ativoCarr++;
						endif;
					};
				endwhile; ?>

				<!-- Controles de Direita e Esquerda -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Anterior</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Próximo</span>
				</a>
			</div>		
		</div>

		<!-- Melhores Pontos Turisticos -->

			<center>
				<h3 id="titulo_pontos">Melhores Pontos Turisticos da Região</h3>
			</center>
			<br>
				
		<!-- Praias -->
<?php 
			//if($consultei != 1):
				?>

	 	<div class="container" id="listagem_pontos" >    			
			<div class="page-header">
				<h2>Praias</h2>
			</div>
			<div class="row">
		<?php $v = 0;
			$praia = 'praia';
			$consultei = $conn -> query("SELECT * FROM pontos_turisticos WHERE categoria= '$praia' ORDER BY categoria ASC;");
			while($linha1 = $consultei -> fetch(PDO::FETCH_ASSOC)):
				if ($v <= 2 ):?>				<a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
					<div class="col-md-4 col-sm-6">
			            <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
			              <div class='thumbnail'>
			                <a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>"><img src="upload/<?=$linha1['imagem'];?>"></a>
			              </div>
			              <div class='post-content'>
			            	<?php foreach ($bairro as $key => $value):
			              			if ($key == $linha1['bairro']):?>

			                <div class='category'><?=$value;?></div>	
				           
				            <?php 	endif;
				        		endforeach ?>
				        	<h1 class='title'><?=$linha1['nome_ponto']?></h1>
			                <p class='description'><?=$linha1['descricao']?></p>
			                <div class='post-meta'>
			                  <span class='comments'>
			                    <a class="btn btn-primary  btn-block" id="but" style="border:1px solid black;" href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">Visualizar ponto</a>
			                  </span>
			                </div>
			              </div>
			            </div>
			        </div>
				</a>
		  <?php $v++;
				endif;
			endwhile ?>
			</div>	
		</div>

	 	<div class="container" id="listagem_pontos" >    			
			<div class="page-header">
				<h2>Igrejas</h2>
			</div>
			<div class="row" style="width: 100%;">
		<?php $v = 0;
			$igreja = 'igreja';
			$consultei = $conn -> query("SELECT * FROM pontos_turisticos WHERE categoria= '$igreja' ORDER BY id DESC;");
			while($linha1 = $consultei -> fetch(PDO::FETCH_ASSOC)):
				if ($v <= 2 ):?>
				<a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
					<div class="col-md-4 col-sm-6">
			            <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
			              <div class='thumbnail' >
			                <a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
			                	<img class="card-img-top" src="upload/<?=$linha1['imagem'];?>">
			                </a>
			              </div>
			              <div class='post-content'>
			               <?php foreach ($bairro as $key => $value):
			              			if ($key == $linha1['bairro']):?>

			                <div class='category'><?=$value;?></div>	

					            <?php 	endif;
				        		endforeach ?>
			                <h1 class='title' style="height: 3em;"><?=$linha1['nome_ponto']?></h1>
			                <p class='description' style="height: 5em;"><?= substr($linha1['descricao'],0 , 78); ?></p>
			                <div class='post-meta'>
			                  <span class='comments'>
			                    <a class="btn btn-primary  btn-block" id="but" style="border:1px solid black;" href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">Visualizar ponto</a>
			                  </span>
			                </div>
			              </div>
			            </div>
			        </div>
				</a>
		  <?php $v++;
				endif;
			endwhile ?>
			</div>	
		</div>

		<div class="container" id="listagem_pontos" >    			
			<div class="page-header">
				<h2>Praças</h2>
			</div>
			<div class="row">
			<?php $v = 0;
			$igreja = 'praca';
			$consultei = $conn -> query("SELECT * FROM pontos_turisticos WHERE categoria= '$igreja' ORDER BY categoria ASC;");
			while($linha1 = $consultei -> fetch(PDO::FETCH_ASSOC)):
				if ($v <= 2 ):?>
				<a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
					<div class="col-md-4 col-sm-6">
			            <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
			             	<div class='thumbnail'>
			                	<a  href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
			                		<img class="rounded mx-auto d-block" src="upload/<?=$linha1['imagem'];?>">
			                	</a>
			             	</div>
			            	<div class='post-content'>
			            	<?php foreach ($bairro as $key => $value):
			              			if ($key == $linha1['bairro']):?>

			                <div class='category'><?=$value;?></div>	

				            <?php 	endif;
				        		endforeach ?>
			                
			                <h1 class='title'><?=$linha1['nome_ponto']?></h1>
			                <p class='description'><?=$linha1['descricao']?></p>
				                <div class='post-meta'>
				                  <span class='comments'>
				                    <a class="btn btn-primary  btn-block" id="but" style="border:1px solid black;" href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">Visualizar ponto</a>
				                  </span>
				                </div>
			            	</div>
			            </div>
			        </div>
				</a>
		  <?php $v++;
				endif;
			endwhile ?>
			</div>	
		</div>	<br>

		
			


		<!-- Footer -->
		<?php require_once('view_footer.html');
		
		?>	