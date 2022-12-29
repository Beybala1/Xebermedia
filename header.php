    <?php
    if(empty($taminfo['title']))
    {$title='Xəbərmedia';}
    else
    {$title=$taminfo['title'];}
    ?>
    <title><?=$taminfo['title']?></title>
    <meta property="og:image" content="http://xebermedia.tk/assets/images/logo-01.png"/>
    <!--<meta property="og:image:secure_url" content="" /> -->
    <meta property="og:image:width" content="640" /> 
    <meta property="og:image:height" content="442" />
    <meta property="og:url" content="http://xebermedia.tk/"/>
    <?php
    if(empty($taminfo['title']))
    {$title='Azerbaycan gündelik xeberler- xebermedia.tk';}
    else
    {$title=$taminfo['title'];}
    ?>
    <meta property="og:title" content='<?=$title?>'/>
     <?php
    if(empty($taminfo['metn']))
    {$metn='Xebermedia.tk - Azerbaycanda baş veren günlük hadisələr';}
    else
    {$metn=mb_substr($taminfo['metn'],0,150).'...';}
    ?>
    <meta property="og:description" content='<?=$metn?>'/>
    <?php
    if(empty($taminfo['title']))
    {$title='Azəbaycan, Azerbaycan, Azerbaijan, xeber, gunden, siyaset';}
    else{
        $t = explode(' ',$taminfo['title']);
        
        for($i = 0; $i<count($t); $i++){
            $title = $t[$i].','.$title;
        }
    }
    ?>
    <meta name="keywords" content="<?=$title?>">
    <meta property="og:site_name" content="xebermedia"/>
    <meta property="og:type" content="article"/>
    <meta itemprop="name" content='Azerbaycan gündelik xeberler- xebermedia.tk'/>
    <meta itemprop="description" content="xebermedia.tk - Azerbaycanda baş veren günlük hadisələr"/>
    <meta itemprop="image" content="http://xebermedia.tk/assets/images/logo-01.png"/>
    <meta name="twitter:url" content="http://xebermedia.tk/" />
    <meta name="twitter:creator" content="@xebermedia" />
    <meta name="twitter:title" content=" Azerbaycan gündelik xeberler- xebermedia.tk" />
    <meta name="twitter:image" content="http://xebermedia.tk/assets/images/logo-01.png">       
    <meta property="article:section" content="xebermedia.tk - Azərbaycanda və dünyada baş verən ən son xəbərlər" />
