<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Toastr Demo</title>
  
     <link rel="stylesheet" href="css/toastr.css" />
  </head>
  <body>
    <button id="error">Error</button>
	<input type="button" value="Info" id="info" />
	<input type="button" value="Warning" id="warning" />
	<input type="button" value="Success" id="success" />
	
	
	<script src="js/jquery.min.js"></script>
	<script src="js/toastr.js"></script>
	<script>
	 $(document).ready(function(){
			$('#error').click(function () {
				// make it not dissappear
				//alert();
				toastr.error("Noooo oo oo ooooo!!!", "Title", {
					"timeOut": "5000",
					"showEasing": "swing",
				    "hideEasing": "linear",
				    "showMethod": "fadeIn",
					"closeButton": true,
					"extendedTImeout": "0"
				});
			});
			$('#info').click(function () {
				// title is optional
				toastr.info("Info Message", "Title");
			});
			$('#warning').click(function () {
				toastr.warning("Warning");
			});
			$('#success').click(function () {
				toastr.success("YYEESSSSSSS");
			});
		});
	</script>
	
 </body>
</html>