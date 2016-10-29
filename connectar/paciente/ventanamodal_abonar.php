<html>
<head>
	<title> Ventana modal</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css" />
</head>
<body>

<DIV class="container">
	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  abonar
</button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</DIV>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>