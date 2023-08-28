<?php


function uploadeImage($folder,$image){
    $image ->store('/',$folder);
    $fileName = $image -> hashName();
    return $fileName;
}
