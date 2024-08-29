<?php
$pageTitle = "Feed";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
 
?>

<!DOCTYPE html>
<html>
<body>
    <div class="container mt-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <img src="images/fr.png" alt="Perfil" class="profile-pic">
                <h2>Frikiland</h2>
            </div>
            <p class="description">Consola de Videojuegos retro</p>
            <img src="images/rtp.webp" alt="Imagen 1" class="card-img single-img">
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/online-store-logo%2C-e-commerce-logo-design-template-eadc5a2a91c0b4a5ec10ae34d8d4346b_screen.jpg?ts=1665557322" alt="Perfil" class="profile-pic">
                <h2>ShineMoonlight</h2>
            </div>
            <p class="description">Joyas y accesorios en nuestra tienda</p>
            <div class="card-images grid-3">
                <img src="https://www.nicolajoyeria.com/cdn/shop/articles/aretes-huggies-647168.jpg?v=1635898713" alt="Imagen 1" class="card-img">
                <img src="https://centroniks.com/cdn/shop/products/CZG-ARE-01-01.jpg?v=1640114691" alt="Imagen 2" class="card-img">
                <img src="https://imagedelivery.net/4fYuQyy-r8_rpBpcY7lH_A/falabellaPE/125321965_01/w=800,h=800,fit=pad" alt="Imagen 3" class="card-img">
            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <img src="https://marketplace.canva.com/EAFg-uOorvQ/1/0/1600w/canva-logotipo-boutique-de-ropa-moderno-negro-y-rosa-uoDu8e-9ixg.jpg" alt="Perfil" class="profile-pic">
                <h2>BeYourSelf</h2>
            </div>
            <p class="description">Todo tipo de ropa para chica </p>
            <div class="card-images grid-2x2">
                <img src="https://media.gotrendier.mx/media/p/2022/02/15/n_5a1ff66e-8ec7-11ec-aab0-124e5cf2f0e9.jpeg" alt="Imagen 1" class="card-img">
                <img src="https://i5.walmartimages.com.mx/mg/gm/3pp/asr/f9155832-162c-40dc-909f-f4489352a519.fc4afd5cbb235e9e0637c943b54c47c7.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF" alt="Imagen 2" class="card-img">
                <img src="https://arturocalle.vteximg.com.br/arquivos/ids/592573/MUJER-PANTALON-10134032-ROJO-450_1.jpg?v=638342969922800000?1724112000063" alt="Imagen 3" class="card-img">
                <img src="https://ae-pic-a1.aliexpress-media.com/kf/Sa74eac6488394bedab23f5c99c0ddfb4o.jpg_640x640Q90.jpg_.webp" alt="Imagen 4" class="card-img">
            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <img src="https://www.zarla.com/images/zarla-caballeros-1x1-2400x2400-20220322-gjrbdwfwymycd8wtkg63.png?crop=1:1,smart&width=250&dpr=2" alt="Perfil" class="profile-pic">
                <h2>MenStore</h2>
            </div>
            <p class="description">Todo tipo de ropa para Hombres</p>
            <div class="card-images grid-2x2">
                <img src="https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/d32f089d-9ac8-4529-91b6-4480cdbf13be/M+NK+SWOOSH+2+GOLF+PO+HOODIE.png" alt="Imagen 1" class="card-img">
                <img src="https://cf.shopee.cl/file/5e7bb5c362f739101c7cfc0ca986ed78" alt="Imagen 2" class="card-img">
                <img src="https://www.camiseriaeuropea.com/cdn/shop/files/1187-1.jpg?v=1715367821" alt="Imagen 3" class="card-img">
                <div class="more">
                    <img src="https://m.media-amazon.com/images/I/61ZojVNpgQL._AC_UF894,1000_QL80_.jpg" alt="Imagen 4" class="card-img">
                    <div class="overlay">+1</div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include './plantillas/footer.php';
    ?>

    <script src="./js/script.js"></script>
</body>
</html>