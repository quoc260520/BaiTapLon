<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>OpenStreetMap &amp; OpenLayers - Marker Example</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        
        <link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css" />
        <script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./Style.css">
        <script src="./Script.js" type="text/javascript"></script>
    
    </head>
    <body onload="initialize_map();">
       <div class="content">
        
        <div id="map" class="map" onclick="popup();"></div>
                
        <div id="info"> </div>
                  
        <div class="main">
           <div>
           <input type="radio" name="add" id="rd">
           <label>Cập nhật</label>
           </div>
           <button id="sbm">Submit</button>

        <div class="item">
               <div class="items-green"> <div class="color-green"></div>Vùng xanh (< 10 ca)</div>
               <div class="items-orange"><div class="color-orange"></div>Vùng cam (10-50 ca)</div> 
               <div class="items-red"><div class="color-red"></div>Vùng đỏ (> 50 ca)</div> 
           </div>
       </div>
       <div id="cursor">

       </div>
    </div>
        <div class="modal ">
        <div class="add-user">
            <i class="fa fa-times btn-close" aria-hidden="true"></i>
            <label for="">Huyện</label>
            <input type="text" name="" id="huyen">
            <label for="">Số lượng</label>
            <input type="number" name="" id="soluong">
            <button type="submit" class="btn btn-" id="submit">Cập nhật</button>
        </div>
        </div>
       
   <?php include "API.php" ?>
    </body>
    <script src="./Open.js"></script>
</html>