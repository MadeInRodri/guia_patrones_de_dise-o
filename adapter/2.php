<?php


interface IArchivo{
        public function openDocument();
    }

interface Idocuments7{
        public function open();
    }

class Word7 implements Idocuments7{
        public function open(){
            echo "Abriendo documento de tipo: word 7";
        }
    }

class Excel7 implements Idocuments7{
        public function open(){
            echo "Abriendo documento de tipo: excel 7";
        }
    }

class Word10 implements IArchivo{
    public function openDocument()
    {
        echo "Abriendo un documento de tipo: word 10";
    }
}

class AdapterDoc implements IArchivo{
    private Idocuments7 $documento;

    public function __construct(Idocuments7 $documento){
        $this->documento = $documento;
    }

    public function openDocument(){
        echo "Adaptando el documento a Windows 10...";
        echo "<br>";
        $this->documento->open();
    }
}

class Windows10System{
    public function verDocuments(IArchivo $documento){
        return $documento->openDocument();
    }
}

$documentoWord7 = new Word7();
$documentoExcel7 = new Excel7();
$documentoWord10 = new Word10();

$mySystem = new Windows10System();

$mySystem->verDocuments(new AdapterDoc($documentoWord7));
echo '<br>';
$mySystem->verDocuments(new AdapterDoc($documentoExcel7));
echo '<br>';
$mySystem->verDocuments($documentoWord10);

?>