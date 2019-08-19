<?php

// Modifiez Loevan-Gaming-124360354848342 par le nom de votre page Facebook
$idPageFacebook = 'Loevan-Gaming-124360354848342';


// permet d'inclure la classe
require_once __DIR__.'/FansPageFacebookWithoutApi.php';

// retourne le résultat en json avec la clef 'count_fan'
echo json_encode(['count_fan' => Cyrhades\FansPageFacebookWithoutApi::get($idPageFacebook)]);