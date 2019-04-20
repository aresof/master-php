<?php

interface Ordenador{

    public function encender();
    public function apagar();
    public function reiniciar();

}


class iMac implements Ordenador {
    private $modelo;

    public function encender()
    {
        // TODO: Implement encender() method.
    }

    public function apagar()
    {
        // TODO: Implement apagar() method.
    }

    public function reiniciar()
    {
        // TODO: Implement reiniciar() method.
    }


    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }


}

$ordenador = new iMac();
$ordenador->setModelo('MacBookPro');

echo $ordenador->getModelo();