
<!DOCTYPE html>
<html>
<head>
	<title>teste</title>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
<center>
<label>locais</label>
<input type="text" name="txtBusca" id="txtBusca" placeholder="PESQUISE...">
<div id="locais"></div>	
</center>

</body>
</html>

<script >//Função de pesquisa, Auto complete Input
$(document).ready(function(){
$('#txtBusca').keyup(function() {
var query = $(this).val();
	if(query != ''){
	
$.ajax({
	url:"search.php",
	method:"POST",
	data:{query:query},
	success:function(data)
	{

$('#locais').html(data);
	
}
   });
	  }
    });
});
    $(document).on('click', 'li', function(){
    $('#txtBusca').val($(this) .text());
    $('#locais') .fadeOut();
	});
    </script>
