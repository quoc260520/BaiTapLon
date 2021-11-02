
const format = "image/png";
const minX = 102.107963562012;
const minY = 8.30629730224609;
const maxX = 109.505790710449;
const maxY = 23.4677505493164;
const cenX = (minX + maxX) / 2;
const cenY = (minY + maxY) / 2;
const mapLat = cenY;
const mapLng = cenX;
const mapDefaultZoom = 6;
    function initialize_map() {
        //*
        layerBG = new ol.layer.Tile({
            source: new ol.source.OSM({})
        });
        //*/

        var layerGadm36_vnm_2 = new ol.layer.Image({
            source: new ol.source.ImageWMS({
                ratio: 1,
                url: 'http://localhost:8082/geoserver/quoc2605/wms',
                params: {
                    'FORMAT': format,
                    'VERSION': '1.1.0',
                    STYLES: '',
                    LAYERS: 'gadm36_vnm_2',
                }
            })
        });

        var viewMap = new ol.View({
            center: ol.proj.fromLonLat([mapLng, mapLat]),
            zoom: mapDefaultZoom
            //projection: projection
        });

        map = new ol.Map({
            target: "map",
            layers: [layerBG, layerGadm36_vnm_2],
            view: viewMap,
        });
        
       
      
          var  styles = {
                'MultiPolygon': new ol.style.Style({
                    // fill: new ol.style.Fill({
                    //     color: '#ccc'
                    // }),
                    stroke: new ol.style.Stroke({
                        color: 'pink',
                        width: 2
                    })
                })
            };

        

        var styleFunction = function(feature) {
            return styles[feature.getGeometry().getType()];
        };
        var vectorLayer = new ol.layer.Vector({
            style: styleFunction
        });
        map.addLayer(vectorLayer);

        function createJsonObj(result) {
            var geojsonObject = '{' +
                '"type": "FeatureCollection",' +
                '"crs": {' +
                '"type": "name",' +
                '"properties": {' +
                '"name": "EPSG:4326"' +
                '}' +
                '},' +
                '"features": [{' +
                '"type": "Feature",' +
                '"geometry": ' + result +
                '}]' +
                '}';
            return geojsonObject;
        }

        function drawGeoJsonObj(paObjJson) {
            var vectorSource = new ol.source.Vector({
                features: (new ol.format.GeoJSON()).readFeatures(paObjJson, {
                    dataProjection: 'EPSG:4236',
                    featureProjection: 'EPSG:3857'
                })
            });
            var vectorLayer = new ol.layer.Vector({
                source: vectorSource
            });
            map.addLayer(vectorLayer);
        }

        function highLightGeoJsonObj(paObjJson) {
            var vectorSource = new ol.source.Vector({
                features: (new ol.format.GeoJSON()).readFeatures(paObjJson, {
                    dataProjection: 'EPSG:4326',
                    featureProjection: 'EPSG:3857'
                })
            });
            vectorLayer.setSource(vectorSource);

        }

        function highLightObj(result) {
            // console.log("result: " + result);
            
            var strObjJson = createJsonObj(result);
            // alert(strObjJson);
            var objJson = JSON.parse(strObjJson);
            // alert(JSON.stringify(objJson));
            drawGeoJsonObj(objJson);
            highLightGeoJsonObj(objJson);
        }

        function displayObjInfo(result, coordinate)
        {
           // alert("result: " + result);
            //alert("coordinate des: " + coordinate);
            $("#info").html(result);
           
        }

        function add(result, coordinate)
        {
            //alert("result: " + result);
            //alert("coordinate des: " + coordinate);
            $('#huyen').val(result)
           
        }

        //Tạo ajax cập nhật
      
        $("#submit").click(function(){
            $.ajax({
                type: "POST",
                url: "API.php",
                data: {
                    functionname: 'update',
                    huyen: $('#huyen').val(),
                    soluong:$('#soluong').val()
                   
                },
                success: function(result, status, erro) {
                    console.log(result)
                },
                error: function(req, status, error) {
                    alert("lỗI:" + req + " " + status + " " + error);
                }
            });
            
        });
         
        //Tạo ajax highlight vùng

        map.on('singleclick', function(evt) {
        
            var lonlat = ol.proj.transform(evt.coordinate, 'EPSG:3857', 'EPSG:4326');
            var lon = lonlat[0];
            var lat = lonlat[1];
            var myPoint = 'POINT(' + lon + ' ' + lat + ')';
            $.ajax({
                type: "POST",
                url: "API.php",
                data: {
                    functionname: 'getGeoCMRToAjax',
                    paPoint: myPoint
                },
                success: function(result, status, erro) {
                    highLightObj(result)
                },
                error: function(req, status, error) {
                    alert("lỗI:" + req + " " + status + " " + error);
                }
            });
        });

       
       
       // Tạo ajax popup
        map.on('singleclick', function (evt) {
            var lonlat = ol.proj.transform(evt.coordinate, 'EPSG:3857', 'EPSG:4326');
            var lon = lonlat[0];
            var lat = lonlat[1];
            var myPoint = 'POINT(' + lon + ' ' + lat + ')';
            //alert("myPoint: " + myPoint);

            $.ajax({
                type: "POST",
                url: "API.php",
                data: {functionname: 'getInfoCMRToAjax', paPoint: myPoint},
                success : function (result, status, erro) {
                    displayObjInfo(result, evt.coordinate );
                },
                error: function (req, status, error) {
                    alert(req + " " + status + " " + error);
                }
            });
            //*/
        });
         
      //Tạo ajax trả về huyện
        map.on('singleclick', function (evt) {
            var lonlat = ol.proj.transform(evt.coordinate, 'EPSG:3857', 'EPSG:4326');
            var lon = lonlat[0];
            var lat = lonlat[1];
            var myPoint = 'POINT(' + lon + ' ' + lat + ')';
            //alert("myPoint: " + myPoint);

            $.ajax({
                type: "POST",
                url: "API.php",
                data: {functionname: 'getHuyen', paPoint: myPoint},
                success : function (result, status, erro) {
                    add(result, evt.coordinate );
                },
                error: function (req, status, error) {
                    alert(req + " " + status + " " + error);
                }
            });
            //*/
        });


        
    }
