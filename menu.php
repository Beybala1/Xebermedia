<style>
    #a{
        font-family: Tahoma, sans-serif;
        font-weight:bold;
    }
</style>
<nav class="navbar-menu navbar navbar-expand-lg">
<div class="container navbar-container">
    <!-- Logo -->
    <a class="navbar-brand background-logo" href="index.php"><img src="assets/images/logo-01.png" alt="Zola"></a>
    <!-- /.Logo -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <?php

                $sec = mysqli_query($con,"select * from xeber");
                $info = mysqli_fetch_array($sec);
                echo'
                <a id="a" class="nav-link" href="cat.php?cat=Avto">Avto</a>
                <a id="a" class="nav-link" href="cat.php?cat=Hadisə">Hadisə</a>
                <a id="a" class="nav-link" href="cat.php?cat=Kriminal">Kriminal</a>
                <a id="a" class="nav-link" href="cat.php?cat=Maraqlı">Maraqlı</a>
                <a id="a" class="nav-link" href="cat.php?cat=Mədəniyyət">Mədəniyyət</a>
                <a id="a" class="nav-link" href="cat.php?cat=Sağlamlıq">Sağlamlıq</a>
                <a id="a" class="nav-link" href="cat.php?cat=Siyasət">Siyasət</a>
                <a id="a" class="nav-link" href="cat.php?cat=Texnologiya">Texnologiya</a>';
                ?>
            </li>
          <li class="nav-item dropdown-submenu dropdown">
                <a id="a" class="dropdown-item dropdown-toggle nav-link" href="#" id="navbarSubDropdown" role="button" 
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kateqoriyalar
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarSubDropdown">
                     <?php
                    $sec1 = mysqli_query($con,"SELECT * FROM xeber where cat not in('Siyasət','Texnologiya','Avto','Hadisə','Kriminal','Maraqlı','Mədəniyyət','Sağlamlıq','ŞOU-BİZNES / Video','Ermənistan','Şou','HADİSƏ / Video',
                    '>HADİSƏ / Video / Foto','Rusiya','Ermənistan-Azərbaycan münaqişəsi','SİYASƏT','Siyasi','SOSİAL / QARABAĞ','Türkiyə','Xəbər','GÜNDƏM','GÜNDƏM / SİYASƏT',
                    'HADİSƏ','HADİSƏ / GÜNDƏM','HADİSƏ / KRİMİNAL','HADİSƏ / Video / Foto','SOSİAL','İDMAN / Foto','Dünya / SİYASƏT / GÜN',
                    'HADİSƏ / Foto','HADİSƏ / KRİMİNAL / V','HADİSƏ / SOSİAL','Hava','SİYASƏT / Dünya / GÜN','SİYASƏT / Video','SOSİAL / Foto',
                    'SOSİAL / Foto / Video','ŞOU-BİZNES / Foto','Dünya / Foto','Dünya / Video','Dünya / Video / Foto','Fotosessiya',
                    'GÜNDƏM / HADİSƏ','KRİMİNAL','MARAQLI','MƏDƏNİYYƏT','QARABAĞ / Foto / Video','QARABAĞ / SİYASƏT / G�',
                    'GÜNDƏM / Foto','HADİSƏ / Foto / Video','MƏDƏNİYYƏT / GÜNDƏM','QARABAĞ / GÜNDƏM / Fot','QARABAĞ / SİYASƏT / G�',
                    'SİYASƏT / GÜNDƏM','SOSİAL / GÜNDƏM','SOSİAL / HADİSƏ','QARABAĞ / SİYASƏT / G�','GÜNDƏM / QARABAĞ','GÜNDƏM / SOSİAL',
                    'QARABAĞ / SİYASƏT / G�','Dünya / GÜNDƏM','Dünya / SİYASƏT','QARABAĞ / SİYASƏT / G�','Dünya / HADİSƏ','ŞOU-BİZNES',
                    'İDMAN / Dünya','İQTİSADİYYAT','Dünya / SOSİAL','HADİSƏ / Dünya','QARABAĞ / SİYASƏT / G�','SİYASƏT / Foto',
                    'SİYASƏT / SOSİAL','---','Şou-biznes','İdman','İqtisadiyyat','Ölkə','Cəmiyyət','Dünya')GROUP BY cat ORDER BY cat asc ");
                    
                    while($info1 = mysqli_fetch_array($sec1)){ 
                        
                        echo'<li><a href="cat.php?cat='.$info1['cat'].'" class="dropdown-item">'.$info1['cat'].'</a></li>';
                    }
                    ?>
                
                </ul>
            </li>
        </ul>
    </div>
    <button type="button" id="sidebarCollapse" class="navbar-toggler active" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </button>
</div>
</nav>