<?php

//Recupérer l'EntityManager

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__.'/../config/bootstrap.php';

//Récupérer un PostRepositoriy généré automatiquement par Doctrine
$postRepository = $entityManager->getRepository(\App\Entity\Post::class);

//liste des posts
echo "liste des posts \n";
$posts = $postRepository->findAll();
foreach ($posts as $post) {
    echo $post->getTitre()."\n";
}

echo PHP_EOL;

//Liste un poste rechercher par son Id
echo "liste des posts id = 1 ?\n";
$post = $postRepository->find(1); //SELECT * FROM POST WHERE id_post = 1
if ($post){
    echo $post->getTitre()."\n";
}else{
    echo "le post n'a pas été trouvé";
}

echo PHP_EOL;

//Liste un poste rechercher par son Titre
echo "liste des posts titre = post 1 ?\n";
$post = $postRepository-> findOneBy(["titre"=>'post 1']); //SELECT * FROM POST WHERE titre_post LIKE 'post 1'
if ($post){
    echo $post->getTitre()."\n";
}else{
    echo "le post n'a pas été trouvé";
}





