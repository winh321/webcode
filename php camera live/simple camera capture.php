
<?php
if(isset($_POST['image'])){
    $img = $_POST['image'];
    $folderPath = "upload/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    //$fileName = uniqid() . '.png';
    $fileName = 'image'. '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
  
    print_r($fileName);

    header('Location:index.php');
  
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Capture webcam image with php and jquery - ItSolutionStuff.com</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results,#return_image { padding:8px; border:1px solid red; background:yellow; text-align:center}
        #return_image{
            background:red;
        }
        #snapshot {
            display:none;
        }
    </style>
</head>
<body>
  
<div class="container">
    <h1 class="text-center">Simple Webcam Picture Save</h1>
   
    <form id="FORM" method="POST" action="#">
        <div class="row">
            <div class="col-md-4">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" id="snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-4">
                <div id="results">Your captured image will appear here...</div>
            </div>
            <div class="col-md-4">
                <div id="return_image">Return Image</div>
            </div>

            <div class="col-md-12 text-center">
                <br/>
                <button class="btn btn-success">Submit Photo</button>
            </div>
        </div>
    </form>
</div>
  
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 300,
        height: 200,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            document.getElementById('return_image').innerHTML = '<img width="300dp" src="upload/image.png">'
        } );
    }
setTimeout(() => {
    setInterval(take_snapshot, 50);
    

}, 2000);
   
</script>
 
</body>
</html>

