<?php


function uploadeImage($folder,$image){
    $image ->store('/',$folder);
    $fileName = $image -> hashName();
    return $fileName;
}

function isActive($requesta){
   return (request()->is($requesta)) ? 'active' : '';
}


