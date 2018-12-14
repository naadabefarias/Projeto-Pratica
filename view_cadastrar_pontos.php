<?php
require_once('view_header.php');
if (!isset($_SESSION['user'])) {
	header('location: login.php');
	exit();
}

?>
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Mali');
body {

	margin-top: 25px;
}
  
/*.pesq{
	margin-top: 7px;
	margin-left: 7px;
*/

.form{
    margin-top: 3em;
}

#titulo_cadastro {
	font-family: 'Mali', cursive;
}

.cad{
    margin-top: 5em;
    margin-bottom: 7em;
}
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */


</style>
<div class="container cad">
	<h1 id="titulo_cadastro"> Cadastro de Pontos Turísticos </h1>
    <div class="form">
	<form method="POST" action="Controller/action_cadastrar_pontoMarkers.php" class="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="text">Nome do Ponto:</label>
            <input type="text" class="form-control" name="nome_ponto">
        </div>

        <div class="form-group">
            <label for="text">Logradouro:</label>
            <input type="text" class="form-control" name="logradouro">
        </div>
       
<!--         <div class="form-group">
            <label for="text">Bairro:</label>
            <input type="text" class="form-control" name="bairro">
        </div> -->
        <div class="form-group">    
            <label for="sel1">Selecione o bairro:</label>
            <select class="form-control" name="bairro">
                <option value="AgamenonMagalhaes">      Agamenon Magalhães</option>
                <option value="aguaMineral">            Água Mineral</option>
                <option value="altodoCeu">              Alto do Céu</option>
                <option value="anadeAlbuquerque">       Ana de ALbuquerque</option>
                <option value="arcanjo">                Arcanjo</option>
                <option value="areiaBranca">            Areia Branca</option>
                <option value="barradoCeara">           Barra do Ceára</option>
                <option value="belaVista">              Bela Vista</option>
                <option value="belaVista">              Boa Vista</option>
                <option value="bomfim">                 Bomfim</option>
                <option value="campinadeFeira">         Campina de Feira</option>
                <option value="centro">                 Centro</option>
                <option value="cohab">                  Cohab</option>
                <option value="cortegada">              Cortegada</option>
                <option value="cruzdeReboucas">         Cruz de Rebouças</option>
                <option value="duarteCoelho">           Duarte Coelho</option>
                <option value="encantodeIgarassu">      Encanto de Igarassu</option>
                <option value="inhama">                 Inhamã</option>
                <option value="jabaco">                 Jabacó</option>
                <option value="jardimBoaSorte">         Jardim Boa Sorte</option>
                <option value="jardimParaiso">          Jardim Paraíso</option>
                <option value="jardimSumare">           Jardim Sumaré</option>
                <option value="marcodePedra">           Marco de Pedra</option>
                <option value="meninoJesusdaPraga">     Menino Jesus da Praga</option>
                <option value="monjope">                Monjope</option>
                <option value="nossaSenhoradaConceicao">Nossa Senhora da Conceição</option>
                <option value="panco">                  Panco</option>
                <option value="postodeMonta">           Posto de Monta</option>
                <option value="rubina">                 Rubina</option>
                <option value="santoAntonio">           Santo Antônio</option>
                <option value="sitiodosMarcos">         Sítio dos Marcos</option>
                <option value="saoJose">                São José</option>
                <option value="santaMaria">             Santa Maria</option>
                <option value="santaRita">              Santa Rita</option>
                <option value="tabatinga">              Tabatinga</option>
                <option value="triunfo">                Triunfo</option>
                <option value="trupical">               Trupical</option>
                <option value="umbura">                 Umbura</option>
                <option value="vilaRural">              Vila Rural</option>
                <option value="vilaSaramandaia">        Vila Saramandaia</option>
            </select>
        </div>

        <div class="form-group">
            <label for="text">Número:</label>
            <input type="text" class="form-control" name="numero">
        </div>
        
        <div class="form-group">
            <label for="comment">Descrição:</label>
            <textarea type="text" class="form-control" name="descricao"></textarea>
        </div>

        <div class="form-group">
            <label for="file">Imagem:</label>
            <input type="file" class="form-control file" name="imagem">
        </div>
    	
        <div class="form-group">	
        <label for="sel1">Selecione o tipo de ponto:</label>
          <select class="form-control" name="categoria">
            <option value="igreja">Igrejas Históricas</option>
            <option value="monumento">Monumentos Antigos</option>
            <option value="museu">Museus Históricos</option>
            <option value="naturezaparques">Natureza e Parques</option>
            <option value="praia">Praia</option>
            <option value="praca">Praça</option>
            <option value="rio">Rio</option>
          </select>
        </div>
          <div class="form-group">    
    	     	<input type="submit" value="Cadastrar" class="btn btn-primary">
    	   </div>


	</form>
    </div>
</div>

<?php 
	
	require_once('view_footer.html');
 ?>