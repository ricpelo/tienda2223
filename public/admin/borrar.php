<?php
session_start();

require '../../src/admin-auxiliar.php';
require '../../src/auxiliar.php';


$_SESSION['exito'] = 'El artículo se ha borrado correctamente.';
return volver_admin();
