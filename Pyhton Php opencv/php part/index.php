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

h1{
    color:blue
}


/* I can't show the webcam  */



.floor{
    width:80%;
    margin:30px;
    border: 10px solid blue;
    padding: 20px;
}


</style>
</head>
<body>

	<center><h1>Live Video with your Camera</h1>
	<form id="image-upload-form"  method="post">
        <div class="floor">
        <div id="my_camera"></div>
		<input type="hidden" name="image" class="image-tag">
		<div id="targetLayer">Image Preview</div>
        </div>
		
	</form><center>
	
	

	<script type="text/javascript">
		


//check the browser load
    $(document).ready(function (e) {



//set webcam object 
		Webcam.set({
        width: 400,
        height: 320,
        image_format: 'jpeg',
        jpeg_quality: 60
    });
  
    Webcam.attach( '#my_camera' );
//declare function to show webcam imag to change as the sever input data
	function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
          
        } );
    }
var RequestNumber = 0;
//custom form to be added submit function and posted data from the form to the sever
$("#image-upload-form").on('submit',(function(e) {
	
		e.preventDefault();
    		$.ajax({
            	url: "sever.php",
    			type: "POST",
    			data:  new FormData(this),
    			contentType: false,
        	    cache: false,
    			processData: false,
				success: function(data)
    		    {
                    // this data is responsed from the sever and placed the img tag in the div tag
    				$("#targetLayer").html(data);
					RequestNumber++;
					console.log(RequestNumber)
    		    },
    		  	error: function(data)
    	    	{
    		  	  console.log("error");
                  console.log(data);
    	    	}
    	   });

    	}));

//set one second delay to wait the webcam reload and to get take_snapshot function every 50 seconds        
		setTimeout(() => {
		setInterval(take_snapshot,50);
		setInterval(() => {

			$("#image-upload-form").submit()
			
		}, 50);	
	}, 3000);


});

</script>



</body>
</html>
