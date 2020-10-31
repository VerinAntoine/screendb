<?php

use App\DAO\UserDAO;

$layout = 'auth.php';
$errors = [];

if(!empty($_POST)) {
    if(empty($_POST['username']) && empty($_POST['password'])) {
        $errors[] = "Préciser un nom d'utilisateur et un mot de passe";
    }else{
        $dao = new UserDAO();
        $user = $dao->findByUsername($_POST['username']);
        if(password_verify($_POST['password'], $user->getPassword()) === true) {
            session_start();
            $_SESSION['auth'] = $user->getId();
            header('Location: ' . $router->url('screens'));
            exit();
        }else{
            $errors[] = "Mot de passe ou utlisateur incorrect";
        }
    }
}
?>

<?php foreach($errors as $error): ?>
<div class="absolute w-full text-center mt-4 text-white bg-red-500 py-1">
    <?= $error ?>
</div>
<?php endforeach ?>

<div class="h-screen flex justify-center items-center">
    <form class="w-1/4 bg-white rounded p-6" method="post">
        <h1 class="mb-5 text-gray-700 text-xl">Connectez-Vous</h1>
        <div class="flex bg-gray-300 items-center divide-x divide-gray-500 px-3 py-3 mb-2">
            <i class="fas fa-user mr-3"></i>
            <input type="text" name="username" placeholder="Nom d'utilisateur" class="w-full bg-gray-300 pl-3 focus:outline-none">
        </div>
        <div class="flex bg-gray-300 items-center divide-x divide-gray-500 px-3 py-3 mb-2">
            <i class="fas fa-lock mr-3"></i>
            <input type="password" name="password" placeholder="Mot de passe" class="w-full bg-gray-300 pl-3 focus:outline-none">
        </div>
        <div class="mt-4 text-center">
            <button class="bg-purple-500 hover:bg-purple-400 text-white border-b-4 border-purple-600 hover:border-purple-500 py-2 px-4 rounded">Se connecter</button>
        </div>
    </form>
</div>