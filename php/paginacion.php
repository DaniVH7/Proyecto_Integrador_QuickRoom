<?php 
$result = $connexion->query("SELECT id_cuarto,precio,amueblado,agua,luz,internet,vigilancia,cocina,baño_compartido,
cuarto_compartido,tiempo_renta,fotografias FROM cuartos");
$row = $result->fetch_assoc();
$num_total_rows = $row['total_products'];
?>
<?php
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'your_data_base_username');
define('DB_SERVER_PASSWORD', 'your_data_base_password');
define('DB_DATABASE', 'your_data_base_name');
define('NUM_ITEMS_BY_PAGE', 6);
 
$connexion = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);
?>
<?php
if ($num_total_rows > 0) {
    $page = false;
 
    //examino la pagina a mostrar y el inicio del registro a mostrar
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
 
    if (!$page) {
        $start = 0;
        $page = 1;
    } else {
        $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
    }
    //calculo el total de paginas
    $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);
 
    //pongo el numero de registros total, el tamano de pagina y la pagina que se muestra
    echo '<h3>Numero de articulos: '.$num_total_rows.'</h3>';
    echo '<h3>En cada pagina se muestra '.NUM_ITEMS_BY_PAGE.' articulos ordenados por fecha en formato descendente.</h3>';
    echo '<h3>Mostrando la pagina '.$page.' de ' .$total_pages.' paginas.</h3>';
 
    $result = $connexion->query(
        'SELECT * FROM product p 
        LEFT JOIN product_lang pl ON (pl.id_product = p.id_product AND pl.id_lang = 1) 
        LEFT JOIN `image` i ON (i.id_product = p.id_product AND cover = 1) 
        WHERE active = 1 
        ORDER BY date_upd DESC LIMIT '.$start.', '.NUM_ITEMS_BY_PAGE
    );
    if ($result->num_rows > 0) {
        echo '<ul class="row items">';
        while ($row = $result->fetch_assoc()) {
            echo '<li class="col-lg-4">';
            echo '<div class="item">';
            echo '<h3>'.$row['name'].'</h3>';
            ...
            echo '</div>';
            echo '</li>';
        }
        echo '</ul>';
    }
 
    echo '<nav>';
    echo '<ul class="pagination">';
 
    if ($total_pages > 1) {
        if ($page != 1) {
            echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
        }
 
        for ($i=1;$i<=$total_pages;$i++) {
            if ($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
            }
        }
 
        if ($page != $total_pages) {
            echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
        }
    }
    echo '</ul>';
    echo '</nav>';
}
?>