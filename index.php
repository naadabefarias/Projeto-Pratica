<?php require_once('view_header.php') ?>

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
		<div class="container text-center" id="listagem_pontos">    
			<h3 id="titulo_pontos">Melhores Pontos Turisticos da Região</h3><br>
			<div class="page-header">
				<h2>Praias</h2>
			</div>	
			<?php $v = 0;
			$praia = 'praia';
			$consultei = $conn -> query("SELECT id, nome_ponto, imagem,categoria, descricao FROM pontos_turisticos WHERE categoria= '$praia' ORDER BY categoria ASC;");
			while($linha1 = $consultei -> fetch(PDO::FETCH_ASSOC)):
				if ($v <= 2 ):?>
					<div class="grande">
						<div class="col-sm-4">
							<a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">  
								<img src="upload/<?=$linha1['imagem'];?>" class="img-responsive" style="width: 25em;  height: 15em;" alt="Image">
								<h4><?=$linha1['nome_ponto'];?></h4>
								<p><?=$linha1['descricao'];?></p>
							</a>
						</div>
					</div>    
					<?php  $v++;
				endif; 
			endwhile
			?>   

		</div><br>
		<div class="container text-center" id="listagem_pontos">    
			<div class="page-header">
				<h2>Igrejas</h2>
			</div>	
			<?php $v = 0;
			$igreja = 'igreja';
			$consultei = $conn -> query("SELECT id, nome_ponto, imagem,categoria, descricao FROM pontos_turisticos WHERE categoria= '$igreja' ORDER BY categoria ASC;");
			while($linha1 = $consultei -> fetch(PDO::FETCH_ASSOC)):
				if ($v <= 2 ):?>
					<div class="grande">
						<div class="col-sm-4">
							<a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">  
								<img src="upload/<?=$linha1['imagem'];?>" class="img-responsive" style="width: 25em;  height: 15em;" alt="Image">
								<h5><?=$linha1['nome_ponto'];?></h5>
								<p><?=$linha1['descricao'];?></p>
							</a>
						</div>
					</div>    
					<?php  $v++;
				endif; 
			endwhile
			?>   

		</div><br>

		<div class="container text-center" id="listagem_pontos">    
			<div class="page-header">
				<h2>Praças</h2>
			</div>
			<?php $v = 0;
			$igreja = 'praca';
			$consultei = $conn -> query("SELECT id, nome_ponto, imagem,categoria, descricao FROM pontos_turisticos WHERE categoria= '$igreja' ORDER BY categoria ASC;");
			while($linha1 = $consultei -> fetch(PDO::FETCH_ASSOC)):
				if ($v <= 2 ):?>
					<div class="grande">
						<div class="col-sm-4">
							<a href="view_visualizar_pontos.php?id=<?=$linha1['id']?>">  
								<img src="upload/<?=$linha1['imagem'];?>" class="img-responsive" style="width: 25em;  height: 15em;" alt="Image">
								<h5><?=$linha1['nome_ponto'];?></h5>
								<p><?=$linha1['descricao'];?></p>
							</a>
						</div>
					</div>    
					<?php  $v++;
				endif; 
			endwhile
			?>   

		</div><br>



		<!-- Footer -->
		<?php require_once('view_footer.html');

		?>	