<?php
$auth = new App\Auth();
$form = new App\Form();

$errors = [];
$sucess = false;

if(isset($_POST) && !empty($_POST)) {
    if($form->validateRequire(array('name', 'author', 'url')) === true) {
        $screen = new App\Model\Screen();
        $screen->setName($_POST['name']);
        $screen->setAuthor($_POST['author']);
        $screen->setUrl($_POST['url']);
        $screen->setCreatedBy($auth->getUser()->getId());
        $dao = new App\DAO\ScreenDAO();
        $dao->insert($screen);
        $sucess = true;
    }else{
        $errors[] = 'Veuillez remplir tous les champs';
    }
}

?>

<?php foreach($errors as $error): ?>
    <div class="w-full text-center mt-4 text-white bg-red-600 py-1">
        <?= $error ?>
    </div>
<?php endforeach ?>

<?php if($sucess): ?>
    <div class="w-full text-center mt-4 text-white bg-green-600 py-1">
        Screen crée!
    </div>
<?php endif ?>

<div class="flex flex-col m-5 mt-10 items-center">
    <h1 class="text-lg">Ajouter un screen</h1>
    <form method="post" class="mt-4 ml-1 w-full lg:w-1/2">
        <?= $form->input('text', 'name', 'Nom', '') ?>
        <?= $form->input('text', 'author', 'Author', '') ?>
        <?= $form->textArea('url', 'Lien', '') ?>
        <?= $form->button('Ajouter') ?>
    </form>
</div>
