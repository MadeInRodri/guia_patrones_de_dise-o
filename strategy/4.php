<?php

interface IStrategyMessage{
    public function showMessage($message);
}

class ConsoleMessage implements IStrategyMessage{
     public function showMessage($message){
        return "Mostrando un mensaje en la consola... " . $message;
     }
}

class JsonMessage implements IStrategyMessage{
     public function showMessage($message){
        return "Mostrando un mensaje en un archivo JSON... " . $message;
     }
}

class TxtMessage implements IStrategyMessage{
     public function showMessage($message){
        return "Mostrando un mensaje en un archivo TXT... " . $message;
     }
}

class ViewMessage{
    private IStrategyMessage $myTypeMessage;

    public function setMessage($typeMessage){
        $this->myTypeMessage = $typeMessage;
    }

    public function showMessage($message){
        return $this->myTypeMessage->showMessage($message);
    }
}

echo "Mostrando mi mensaje en distintas plataformas:";
echo "<br>";
$message = "Hola mundo!";
$viewMessage = new ViewMessage();

echo "Consola";
echo "<br>";
$viewMessage->setMessage(new ConsoleMessage);
echo $viewMessage->showMessage($message);
echo "<br>";

echo "JSON";
echo "<br>";

$viewMessage->setMessage(new JsonMessage);
echo $viewMessage->showMessage($message);
echo "<br>";

echo "TXT";
echo "<br>";
$viewMessage->setMessage(new TxtMessage);
echo $viewMessage->showMessage($message);