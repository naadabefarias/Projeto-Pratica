<?php require_once('view_header.php');

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
			                <a href="#"><img src="upload/<?=$linha1['imagem'];?>"></a>
			              </div>
			              <div class='post-content'>
			                <div class='category'><?=$linha1['bairro']?></div>
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
		  <?php endif;
			endwhile ?>
			</div>	
		</div>

	 	<div class="container" id="listagem_pontos" >    			
			<div class="page-header">
				<h2>Igrejas</h2>
			</div>
			<div class="row">
		<?php $v = 0;
			$igreja = 'igreja';
			$consultei = $conn -> query("SELECT * FROM pontos_turisticos WHERE categoria= '$igreja' ORDER BY categoria ASC;");
			while($linha1 = $consultei -> fetch(PDO::FETCH_ASSOC)):
				if ($v <= 2 ):?>
				<a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">
					<div class="col-md-4 col-sm-6">
			            <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
			              <div class='thumbnail'>
			                <a href="#"><img src="upload/<?=$linha1['imagem'];?>"></a>
			              </div>
			              <div class='post-content'>
			                <div class='category'><?=$linha1['bairro']?></div>
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
		  <?php endif;
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
			                <a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>"><img src="upload/<?=$linha1['imagem'];?>"></a>
			              </div>
			              <div class='post-content'>
			                <div class='category'><?=$linha1['bairro']?></div>
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
		  <?php endif;
			endwhile ?>
			</div>	
		</div>	<br>

		
			


		<!-- Footer -->
		<?php require_once('view_footer.html');
		
		?>	