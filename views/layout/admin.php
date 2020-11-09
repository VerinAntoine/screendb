<?php
$auth = new App\Auth();

if($auth->getUser()->hasPermission(array("admin")) === false) {
    http_response_code(403);
    header('Location: ' . $router->url('screens'));
    exit();
}

?>

<?= $content ?>