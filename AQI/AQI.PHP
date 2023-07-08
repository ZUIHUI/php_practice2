<HTML>
    <HEAD>
        <TITLE>AQI</TITLE>
    </HEAD>
    <BODY>
    <?PHP
      $URL="https://data.epa.gov.tw/api/v1/aqx_p_432?limit=1000&api_key=9be7b239-557b-4c10-9775-78cadfc555e9&sort=ImportDate%20desc&format=json";
      $json= file_get_contents($URL); 
      $DATA= json_decode($json,TRUE);
      echo"<table align='center' border='1' style=' border-collapse:collapse;'>";
      echo"<tr><td>縣市</td><td>測站</td><td>AQI</td><td>狀態</td><td>PM2.5</td><tr>";
      for($i=0;$i<84;$i++){
        $SiteName = $DATA['records'][$i]["SiteName"];
        $County = $DATA['records'][$i]["County"];
        $AQI = $DATA['records'][$i]["AQI"];
        $Status = $DATA['records'][$i]["Status"];
        $PM25 = $DATA['records'][$i]["PM2.5"];
        $Longitude = $DATA['records'][$i]["Longitude"];
        $Latitude = $DATA['records'][$i]["Latitude"];

        echo"<tr><td>$County</td><td><a href='https://www.google.com.tw/maps/place/$Latitude,$Longitude'>$SiteName</a></td><td>$AQI</td><td>$Status</td><td>$PM25</td><tr>";
      }
      echo"</table>"; 
    ?>
    </BODY>
</HTML>