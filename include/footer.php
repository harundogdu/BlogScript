<?php 
$lastSettings = $database->getData("settings");
$mostPopular = $database->getData("post",1," INNER JOIN category ON post.post_cat_id = category.category_id ORDER BY post_see DESC LIMIT 4");
$lastAdd = $database->getData("post",1," INNER JOIN category ON post.post_cat_id = category.category_id ORDER BY post_id DESC LIMIT 4");
$lastSponsor = $database->getData("partner",1);
?>
<!-- Footer -->

<footer>
    <div class="container" id="footer-top">
        <div class="footer-nav">
            <h4>Sponsorlar</h4>
            <?php foreach($lastSponsor as $data): ?>
            <div class="footer-sponsor">
                <a href="<?=$data['partner_link']?>" target="_blank">
                <img src="img/<?=$data['partner_img']?>" width="125px" height="125px" alt="Sponsor Resim" />
                </a>
            </div>
            <?php endforeach; ?>
         
        
        </div>
        <div class="footer-nav" id="pop">
            <h4>En Popüler Yazılar</h4>
            <ul class="footer">
                
            <?php foreach($mostPopular as $data): ?>
                <li>
                    <a href="<?=$data['category_link']?>/post/<?=$data['post_seolink']?>" class="left"><img src="img/<?=$data['post_img']?>" alt="<?=$data['post_title']?>"></a>
                    <div class="footer-nav-item">
                        <a href="<?=$data['category_link']?>/post/<?=$data['post_seolink']?>"><?=$data['post_title']?></a>
                        <p><?=$data['post_time']?></p>
                    </div>
                    <div style="clear:both;"></div>
                </li>
            <?php endforeach; ?>     

            </ul>
        </div>
        <div class="footer-nav">
            <h4>Son Eklenen Yazılar</h4>
            <ul class="footer">
               
            <?php foreach($lastAdd as $data): ?>
                <li>
                    <a href="<?=$data['category_link']?>/post/<?=$data['post_seolink']?>" class="left"><img src="img/<?=$data['post_img']?>" alt="<?=$data['post_title']?>"></a>
                    <div class="footer-nav-item">
                        <a href="<?=$data['category_link']?>/post/<?=$data['post_seolink']?>"><?=$data['post_title']?></a>
                        <p><?=$data['post_time']?></p>
                    </div>
                    <div style="clear:both;"></div>
                </li>
            <?php endforeach; ?>
               
              
            </ul>
        </div>
    </div>
</footer>
<!-- Footer  END -->
<!-- Copyright -->
<div id="copyright">
    <div class="container">
        <div id="design">
            Tasarım & Kodlama : <a target="_blank" href="https://harundogdu.com.tr/"><?= $lastSettings['settings_owner'] ?></a> | Tüm hakları saklıdır.
        </div>
        <nav>
            <ul>
                <li>
                    <h5><a href="homepage.html">Home</a></h5>
                </li>
                <li>
                    <h5><a href="about.html">About</a></h5>
                </li>
                <li>
                    <h5><a href="contact.html">Contact</a></h5>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Copyright End -->
</body>

</html>