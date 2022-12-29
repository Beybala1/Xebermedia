<pre>
<?php
$con = mysqli_connect('localhost','u1596040_beybala1','beybala1','u1596040_xeberler');

$data=file_get_contents('https://yenixeber.az/');

$created=date('Y-m-d H:i:s');
$t=date('Y-m-d');

$menbe='yenixeber.az';

preg_match('/<div class="newslister clearfix" id="prodwrap">(.*)<div class="pagination">/siU',$data,$list);

unset($list[0]);

//print_r($list[1]);exit;

preg_match_all('/<a class="thumb_zoom" href="(.*)".*>/siU',$list[1],$links);

unset($links[0]);

//print_r($links[1]);exit;

for($i=0; $i<count($links[1]); $i++){
    
    $link='https://yenixeber.az/'.$links[1][$i];
    
    echo $link.'<br>';
    
    $tamdata=file_get_contents($link);
    
    preg_match('/<meta property="og:title" content="(.*)" \/>.*<meta property="og:image" content="(.*)" \/>.*<p><img.*>(.*)<\/p>.*<a href=".*">(.*)<\/a>/siU',$tamdata,$info);
    
    echo'Basliq:'.$info[1].'<br>';
    echo'Sekil:'.$info[2].'<br>';
    echo'Metn:'.$info[3].'<br>';
    echo'Kat:'.$info[4].'<br>';
    echo'Tarix:'.$tarix.'<br>';
 
    $kat=trim($info[4]);
    $kat=strip_tags($kat);
    $kat=mysqli_real_escape_string($con,$kat);
    
    $basliq=trim($info[1]);
    $basliq=strip_tags($basliq);
    $basliq=mysqli_real_escape_string($con,$basliq);

    $tarix=trim($t);
    $tarix=strip_tags($tarix);
    $tarix=mysqli_real_escape_string($con,$tarix);

    $sekil=trim($info[2]);
    $sekil=strip_tags($sekil);
    $sekil=mysqli_real_escape_string($con,$sekil);
    
    $metn=trim($info[3]);
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