<pre>
<?php
$con = mysqli_connect('localhost','u1596040_beybala1','beybala1','u1596040_xeberler');

$data=file_get_contents('https://www.milli.az/');

$created=date('Y-m-d H:i:s');

$menbe='milli.az';

preg_match('/<div class="mask">(.*)<\/div>/siU',$data,$list);

unset($list[0]);

//print_r($list[1]);exit;

preg_match_all('/<a href="(.*)">/siU',$list[1],$links);

unset($links[0]);

//print_r($links[1]);exit;

for($i=0; $i<count($links[1]); $i++){
    
    $link=$links[1][$i];
    
    echo $link.'<br>';
    
    $tamdata=file_get_contents($link);
    
    preg_match('/<span class="category">(.*)<\/span>.*<h1>(.*)<\/h1>.*<div class="date-info">(.*)<\/div>.*<img class="content-img" src="(.*)".*>.*<div class="article_text" itemprop="articleBody">(.*)<\/div>/siU',$tamdata,$info);
    
    echo'Kat:'.$info[1].'<br>';
    echo'Basliq:'.$info[2].'<br>';
    echo'Tarix:'.$info[3].'<br>';
    echo'Sekil:'.$info[4].'<br>';
    echo'Metn:'.$info[5].'<br>';
    
    $kat=trim($info[1]);
    $kat=strip_tags($kat);
    $kat=mysqli_real_escape_string($con,$kat);
    
    $basliq=trim($info[2]);
    $basliq=strip_tags($basliq);
    $basliq=mysqli_real_escape_string($con,$basliq);

    $tarix=trim($info[3]);
    $tarix=strip_tags($tarix);
    $t = explode(' ',$tarix);
    $tarix = date('Y-m-d').' '.$t[3].':00';
    $tarix=mysqli_real_escape_string($con,$tarix);

    $sekil=trim($info[4]);
    $sekil=strip_tags($sekil);
    $sekil=mysqli_real_escape_string($con,$sekil);
    
    $metn=trim($info[5]);
    $metn=strip_tags($metn);
    $metn=mysqli_real_escape_string($con,$metn);
    
    $sec=mysqli_query($con,"select link from xeber where link='".$link."'");
    
    if(mysqli_num_rows($sec)==0){
    
        if(!empty($kat) && !empty($basliq) && !empty($tarix) && !empty($sekil) && !empty($metn)){
            
            $daxil_et = mysqli_query($con,"INSERT INTO xeber(kat,basliq,tarix,sekil,metn,link,menbe,created)
            VALUES('".$kat."','".$basliq."','".$tarix."','".$sekil."','".$metn."','".$link."','".$menbe."','".$created."')");
            
            if($daxil_et==true){echo'Ugurla elave edildi';}
            else{echo'Olmadi';}
        }
    }
}

?>
</pre>