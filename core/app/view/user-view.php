hola

<?php

if (!isset($_SESSION['user_id'])) Core::redir("./");

if(isset($_GET["opt"]) && $_GET["opt"] == "all"){

    $listaUsuarios = UserData::getUsersbyKind();

    var_dump($listaUsuarios);
}

?>
<div class = "content-inner contrainer-fluid pb-0" id="page_layaout">
    <div class= "d-flex justify-content-between align-items-center">
        <div class="d-flex flex-column">
            <h3>Usuarios</h3>
        </div>
    </div>
</div>

<div class="row">
    <?php
    }elseif(isse)
?>