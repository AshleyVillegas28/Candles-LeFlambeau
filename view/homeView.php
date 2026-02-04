<?php
    $pageId = 'home';
    require_once HEADER;
?>

<div class="container p-5 mt-3 home-content">

    <!-- Encabezado -->
    <div class="jumbotron text-center bg-light p-5 rounded shadow home-hero">
        <h1 class="display-4">Le Flambeau</h1>
        <p class="lead">Velas artesanales con aromas únicos y naturales</p>
    </div>

    <!-- Sobre Nosotros -->
    <div class="mt-5">
        <h3 class="text-center">Nuestra Historia</h3>
        <p class="text-center mt-3">
            Somos una marca dedicada a crear velas artesanales con aromas únicos y naturales,
            pensadas para acompañarte en cada momento especial.
        </p>
    </div>

    <!-- Formas de Comprar -->
    <div class="row text-center mt-5">
        <div class="col-md-4">
            <i class="fas fa-store fa-3x mb-3 text-primary"></i>
            <h4>Tienda Física</h4>
            <p>Puedes visitarnos en nuestra tienda en el centro de la ciudad con aromas de prueba.</p>
        </div>
        <div class="col-md-4">
            <i class="fab fa-whatsapp fa-3x mb-3 text-success"></i>
            <h4>Pedidos por WhatsApp</h4>
            <p>Realiza tu pedido enviando un mensaje a nuestro número oficial.</p>
        </div>
        <div class="col-md-4">
            <i class="fas fa-share-alt fa-3x mb-3 text-danger"></i>
            <h4>Redes Sociales</h4>
            <p>Encuéntranos en Instagram y Facebook con promociones y lanzamientos semanales.</p>
        </div>
    </div>

</div>

<?php require_once FOOTER; ?>