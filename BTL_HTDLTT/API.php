<?php
    if(isset($_POST['functionname']))
    {
        $paPDO = initDB();
        $paSRID = '4326';
        $paPoint = $_POST['paPoint'];
        $functionname = $_POST['functionname'];
        
        
        $aResult = "null";
        if ($functionname == 'getGeoCMRToAjax')
            $aResult = getGeoCMRToAjax($paPDO, $paSRID, $paPoint);
        else if ($functionname == 'getInfoCMRToAjax')
            $aResult = getInfoCMRToAjax($paPDO, $paSRID, $paPoint);
        else if ($functionname == 'getHuyen')
            $aResult = getHuyen($paPDO, $paSRID, $paPoint);
         else if ($functionname == 'update'){
            $huyen=$_POST['huyen'];
            $soluong = $_POST['soluong'];
            $aResult = update($paPDO,$huyen,$soluong);
         }
            
        echo $aResult;
    
        closeDB($paPDO);
    }

    function initDB()
    {
        // Kết nối CSDL
        $paPDO = new PDO('pgsql:host=localhost;dbname=btl;port=5432', 'postgres', '2605');
        return $paPDO;
    }
    function query($paPDO, $paSQLStr)
    {
        try
        {
            // Khai báo exception
            $paPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Sử đụng Prepare 
            $stmt = $paPDO->prepare($paSQLStr);
            // Thực thi câu truy vấn
            $stmt->execute();
            
            // Khai báo fetch kiểu mảng kết hợp
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            // Lấy danh sách kết quả
            $paResult = $stmt->fetchAll();   
            return $paResult;                 
        }
        catch(PDOException $e) {
            echo "Thất bại, Lỗi: " . $e->getMessage();
            return null;
        }       
    }
    function closeDB($paPDO)
    {
        // Ngắt kết nối
        $paPDO = null;
    }
    function example1($paPDO)
    {
        $mySQLStr = "SELECT * FROM gadm36_vnm_2";
        $result = query($paPDO, $mySQLStr);

        if ($result != null)
        {
            // Lặp kết quả
            foreach ($result as $item){
                echo $item['name_0'] . ' - '. $item['name_1'];
                echo "<br>";
            }
        }
        else
        {
            echo "example1 - null";
            echo "<br>";
        }
    }
    function example2($paPDO)
    {
        $mySQLStr = "SELECT ST_AsGeoJson(geom) as geo from gadm36_vnm_2";
        $result = query($paPDO, $mySQLStr);
        
        if ($result != null)
        {
            // Lặp kết quả
            foreach ($result as $item){
                echo $item['geo'];
                echo "<br><br>";
            }
        }
        else
        {
            echo "example2 - null";
            echo "<br>";
        }
    }
    function example3($paPDO,$paSRID,$paPoint)
    {
        echo $paPoint;
        echo "<br>";
        $paPoint = str_replace(',', ' ', $paPoint);
        echo $paPoint;
        echo "<br>";
        //$mySQLStr = "SELECT ST_AsGeoJson(geom) as geo from \"CMR_adm1\" where ST_Within('SRID=4326;POINT(12 5)'::geometry,geom)";
        $mySQLStr = "SELECT ST_AsGeoJson(geom) as geo from gadm36_vnm_2 where ST_Within('SRID=".$paSRID.";".$paPoint."'::geometry,geom)";
        echo $mySQLStr;
        echo "<br><br>";
        $result = query($paPDO, $mySQLStr);
        
        if ($result != null)
        {
            // Lặp kết quả
            foreach ($result as $item){
                echo $item['geo'];
                echo "<br><br>";
            }
        }
        else
        {
            echo "example2 - null";
            echo "<br>";
        }
    }
    function getResult($paPDO,$paSRID,$paPoint)
    {

        $paPoint = str_replace(',', ' ', $paPoint);
        $mySQLStr = "SELECT ST_AsGeoJson(geom) as geo from gadm36_vnm_2 where ST_Within('SRID=".$paSRID.";".$paPoint."'::geometry,geom)";
    
        $result = query($paPDO, $mySQLStr);
        
        if ($result != null)
        {
            // Lặp kết quả
            foreach ($result as $item){
                return $item['geo'];
            }
        }
        else
            return "null";
    }
    function getGeoCMRToAjax($paPDO,$paSRID,$paPoint)
    {
        
        $paPoint = str_replace(',', ' ', $paPoint);
       
        $mySQLStr = "SELECT ST_AsGeoJson(geom) as geo, slbenhnhan as sl from gadm36_vnm_2 where  ST_Within('SRID=".$paSRID.";".$paPoint."'::geometry,geom)";
     
        $result = query($paPDO, $mySQLStr);
        
        if ($result != null)
        {
            // Lặp kết quả
            foreach ($result as $item){
                return $item['geo'];
            //   return $result[] = array(
            //     'geo' => $item['geo'],
            //     'soluong' => $item['sl']
            // );
            }
        }
        else
            return "null";
    }
    
    function getHuyen($paPDO,$paSRID,$paPoint)
    {
        
        $paPoint = str_replace(',', ' ', $paPoint);
       
        $mySQLStr = "SELECT ST_AsGeoJson(geom) as geo, name_2  as huyen from gadm36_vnm_2 where  ST_Within('SRID=".$paSRID.";".$paPoint."'::geometry,geom)";
     
        $result = query($paPDO, $mySQLStr);
        
        if ($result != null)
        {
            // Lặp kết quả
            foreach ($result as $item){
                return $item['huyen'];
            }
        }
        else
            return "null";
    }
     
    function update($paPDO,$huyen,$soluong)
    {
        
       
        $mySQLStr = " UPDATE gadm36_vnm_2 SET slbenhnhan = '$soluong' WHERE name_2 like '$huyen'";
     
        $result = query($paPDO, $mySQLStr);
        
        if ($result != null)
        {
           
                return 'Update successful ';
        }
        else
            return "Update fail!";
    }


    function getInfoCMRToAjax($paPDO,$paSRID,$paPoint)
    {
        
        $paPoint = str_replace(',', ' ', $paPoint);
        
        $mySQLStr = "SELECT name_1 as tinh,name_2 as huyen, ST_Area(geom) as dientich,slbenhnhan as sl  from gadm36_vnm_2 where ST_Within('SRID=".$paSRID.";".$paPoint."'::geometry,geom)";
       
        $result = query($paPDO, $mySQLStr);
        
        if ($result != null)
        {

            
            $resFin = '<div>';
            // Lặp kết quả
            foreach ($result as $item){
               if ($item['sl'] < 10) {
                $resFin = $resFin.'<div style="background-color:green;padding:5px 20px;border-top-left-radius:10px;border-top-right-radius:10px;"><div>Huyện: '.$item['huyen'].'</div></div>';
                $resFin = $resFin.'<div style="background-color:green;padding:5px 20px;"><div>Tỉnh: '.$item['tinh'].'</div></div>';
                $resFin = $resFin.'<div style="background-color:green;padding:5px 20px;"><div>Diện tích: '.$item['dientich'].'</div></div>';
                $resFin = $resFin.'<div style="background-color:green;padding:5px 20px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;"><div>Số lượng bệnh nhân: '.$item['sl'].'</div></div>';
               }
               else if ( $item['sl'] < 50 &&  $item['sl'] > 10) {
                $resFin = $resFin.'<div style="background-color:orange;padding:5px 20px;color:#000;border-top-left-radius:10px;border-top-right-radius:10px;"><div>Huyện: '.$item['huyen'].'</div></div>';
                $resFin = $resFin.'<div style="background-color:orange;padding:5px 20px;color:#000;"><div>Tỉnh: '.$item['tinh'].'</div></div>';
                $resFin = $resFin.'<div style="background-color:orange;padding:5px 20px;color:#000;"><div>Diện tích: '.$item['dientich'].'</div></div>';
                $resFin = $resFin.'<div style="background-color:orange;padding:5px 20px;color:#000;border-bottom-left-radius:10px;border-bottom-right-radius:10px;"><div>Số lượng bệnh nhân: '.$item['sl'].'</div></div>';
               }
               else if ($item['sl'] > 50) {
                $resFin = $resFin.'<div style="background-color:red;padding:5px 20px;border-top-left-radius:10px;border-top-right-radius:10px;"><div>Huyện: '.$item['huyen'].'</div></div>';
                $resFin = $resFin.'<div style="background-color:red;padding:5px 20px;"><div>Tỉnh: '.$item['tinh'].'</div></div>';
                $resFin = $resFin.'<div style="background-color:red;padding:5px 20px;"><div>Diện tích: '.$item['dientich'].'</div></div>';
                $resFin = $resFin.'<div style="background-color:red;padding:5px 20px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;"><div>Số lượng bệnh nhân: '.$item['sl'].'</div></div>';
               
               }
               break;
            }
            $resFin = $resFin.'</div>';
            return $resFin;
        }
        else
            return "null";
    }

   
?>