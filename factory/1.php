<?php

interface Character{
    public function speed();
    public function attack();
}

#clases concretas
class Skull implements Character{
    public function speed()
    {
        echo "El esqueleto corre con gran velocidad";
    }

    public function attack()
    {
        echo "El esqueleto ataca con un hueso";
    }
}

class Zombie implements Character{
    public function speed()
    {
        echo "El zombie corre lento";
    }

    public function attack()
    {
        echo "El zombi ataca con su mordida";
    }
}

class PersonajeFactory {

    public static function crearPersonaje($level) : Character{
        if($level == "easy"){
            return new Skull();
        }else if($level == "hard"){
            return new Zombie();
        }else{
            throw new Exception("Escoge un grado de dificultad");
        }
    }
}

$esqueleto = PersonajeFactory::crearPersonaje('easy');
$esqueleto->speed();