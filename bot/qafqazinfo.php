<pre>
<?php
$con = mysqli_connect('localhost','u1596040_beybala1','beybala1','u1596040_xeberler');

$data=file_get_contents('https://qafqazinfo.az/');

$created=date('Y-m-d H:i:s');

$menbe='qafqazinfo.az';

preg_match('/<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">(.*)<div class="col-lg-9 col-md-9 col-sm-9 index hidden-xs">/siU',$data,$list);

unset($list[0]);

//print_r($list[1]);exit;

preg_match_all('/<a target="_blank" href="(.*)".*>/siU',$list[1],$links);

unset($links[0]);

//print_r($links[1]);exit;

for($i=0; $i<count($links[1]); $i++){
    
    $link=$links[1][$i];
    
    $tamdata=file_get_contents($link);
  
    preg_match('/<h2>(.*)<\/h2>.*<img class="img-responsive" src="(.*)".*>.*<a.*>(.*)<\/a>.*<time datetime="(.*)">.*<\/time>.*<div class="panel-body news_text">(.*)<\/div>/siU',$tamdata,$info);
    
    echo'Basliq:'.$info[1].'<br>';
    echo'Sekil:'.$info[2].'<br>';
    echo'Kat:'.$info[3].'<br>';
    echo'Tarix:'.$info[4].'<br>';
    echo'Metn:'.$info[5].'<br>';
    
    $basliq=trim($info[1]);
    $basliq=strip_tags($basliq);
    $basliq=mysqli_real_escape_string($con,$basliq);
    
    $sekil=trim($info[2]);
    $sekil=strip_tags($sekil);
    $sekil=mysqli_real_escape_string($con,$sekil);
    
    $kat=trim($info[3]);
    $kat=strip_tags($kat);
    $kat=mysqli_real_escape_string($con,$kat);
    
    $tarix=trim($info[4]);
    $tarix=strip_tags($tarix);
    $t = explode('|',$tarix);
    $tarix = date('Y-m-d').$t[1].':00';
    $tarix=mysqli_real_escape_string($con,$tarix);

    $metn=trim($info[5]);
    $metn=strip_tags($metn);
    $metn=mysqli_real_escape_string($con,$metn);
    break;
    
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