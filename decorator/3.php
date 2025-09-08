<?php

interface ICharacter{
    public function weapons();
}

class Guerrero implements ICharacter{
    public function  weapons(){
        return "El guerrero usa una espada";
    }
}

class Arquero implements ICharacter{
    public function  weapons(){
        return "El arquero usa un arco";
    }
}

class CharacterDecorator implements ICharacter{
    protected ICharacter $character;

    public function __construct(ICharacter $character){
        $this->character = $character;
    }

    public function weapons(){
        return $this->character->weapons();
    }
}

class Daga extends CharacterDecorator{
    public function weapons(){
        return $this->character->weapons() . " ...Y obtiene una daga para uso personal";
    }
}

class Escudo extends CharacterDecorator{
    public function weapons(){
        return $this->character->weapons() . " ...Y obtiene un escudo para su protección";
    }
}

echo "Guerrero:";
echo "<br>";
$miGuerrero = new Guerrero();

echo $miGuerrero->weapons();
echo "<br>";

echo "Agregándole una daga...";
echo "<br>";

$miGuerrero = new Daga($miGuerrero);
echo $miGuerrero->weapons();
echo "<br>";

echo "Agregándole un escudo...";
echo "<br>";

$miGuerrero = new Escudo($miGuerrero);
echo $miGuerrero->weapons();
echo "<br>";

echo "Creando un arquero con escudo";
echo "<br>";

$miArquero = new Arquero();

$miArquero = new Escudo($miArquero);
echo $miArquero->weapons();