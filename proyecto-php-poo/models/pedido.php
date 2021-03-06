<?php

class Pedido{

    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $this->db->real_escape_string($id);
    }

    /**
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * @param mixed $usuario_id
     */
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $this->db->real_escape_string($usuario_id);
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    /**
     * @return mixed
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * @param mixed $localidad
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    /**
     * @return mixed
     */
    public function getCoste()
    {
        return $this->coste;
    }

    /**
     * @param mixed $coste
     */
    public function setCoste($coste)
    {
        $this->coste = $this->db->real_escape_string($coste);
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $this->db->real_escape_string($estado);
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $this->db->real_escape_string($fecha);
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora)
    {
        $this->hora = $this->db->real_escape_string($hora);
    }

    public function getOnebyUser(){
        $sql = "SELECT pedidos.*, lineas_pedidos.*, productos.*, pedidos.`id` as id_pedido FROM pedidos 
                JOIN lineas_pedidos ON (pedidos.`id` = lineas_pedidos.`pedido_id`)
                JOIN productos ON (lineas_pedidos.`producto_id` = productos.`id`)
                WHERE pedidos.`usuario_id`= {$this->usuario_id} AND pedidos.`id` = {$this->id}";

        $result = $this->db->query($sql) or die("Error en getOnebyUser".$this->db->error);

        return $result;
    }

    public function getAllbyUser(){
        $sql = "SELECT pedidos.* FROM pedidos 
                WHERE pedidos.`usuario_id`= {$this->usuario_id} ORDER BY pedidos.id DESC";

        $result = $this->db->query($sql) or die("Error en getOnebyUser".$this->db->error);

        return $result;
    }

    public function getAll(){
        $sql = "SELECT pedidos.* FROM pedidos ORDER BY pedidos.id DESC";

        $result = $this->db->query($sql) or die("Error en getAll".$this->db->error);

        return $result;
    }

    public function save(){
        $sql = "INSERT INTO pedidos VALUES (
            NULL,
            {$this->usuario_id},
            '{$this->provincia}',
            '{$this->localidad}',
            '{$this->direccion}',
            '{$this->coste}',
            '{$this->estado}',
            '{$this->fecha}',
            '{$this->hora}'
        )";
        $save = $this->db->query($sql) or die("Error: ".$this->db->error);
        return $save;
    }

    public function save_lineas(){
        //Obtener el id del último pedido insertado
        //$sql = "SELECT LAST_INSERT_ID()";
        //$pedido_id = $this->db->query($sql) or die("Error: ".$this->db->error);
        $pedido_id = $this->db->insert_id;
        $save = false;
        //Recorrer el array de sesion de Pedido e ir insertando las lineas_pedido
        foreach ($_SESSION['carrito'] as $item) {
            $sql = "INSERT INTO lineas_pedidos VALUES (
                     NULL,
                     {$pedido_id},
                     {$item['id_prod']},
                     {$item['unidades']}
            )";

            $save = $this->db->query($sql) or die("Error: ".$this->db->error);
        }
        if($save)
            return $pedido_id;
        else return false;

    }

    public function update(){
        $sql ="UPDATE pedidos SET estado = '{$this->estado}' WHERE id = {$this->id}";
        $save = $this->db->query($sql) or die("Error: ".$this->db->error);
        return $save;
    }

}