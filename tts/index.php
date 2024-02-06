<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
.mtop15p { margin-top:15px; }
</style>
<script type="text/javascript">
function generate(){
 let tts = document.getElementById("tts").value;
 let lang = document.getElementById("lang").value;
 $("#output").html('');
 $.ajax({url: "generate.php", data:{ tts: tts, lang:lang }, success: function(result){
	 console.log(result);
	let content='<audio controls>';
		content+='<source src="http://localhost/projects/rwm/tts/out/output.mp3" type="audio/mpeg">';
		content+='</audio>';
    $("#output").html(content);
  }});
}
function reset(){
 $("#output").html('');
}
</script>
</head>
<body>
  
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h3>Text to Speech</h3>
      <textarea id="tts" style="height:320px;" class="form-control mtop15p" placeholder="Enter your Text">absent absolute</textarea>
	  <select id="lang" class="form-control mtop15p" placeholder="Select Language">
		<option value="en">English</option>
		<option value="te">Telugu</option>
	  </select>
	  <button class="btn btn-primary mtop15p" onClick="javascript:generate()">Generate</button>
	  <button class="btn btn-danger mtop15p" onClick="javascript:reset()">Reset</button>
	  <div id="output" class="mtop15p"></div>
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>

</body>
</html>
