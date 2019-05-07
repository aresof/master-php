<?php

class Producto {

    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
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
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    /**
     * @param mixed $categoria_id
     */
    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
    }

    /**
     * @return mixed
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * @param mixed $oferta
     */
    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);
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
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $this->db->real_escape_string($imagen);
    }


    public function getAll(){
        $result = $this->db->query("SELECT productos.*, DATE_FORMAT(productos.`fecha`, '%d/%m/%Y') as Fec, categorias.`Nombre` as CatNombre FROM productos JOIN categorias ON (productos.`categoria_id` = categorias.`id`)");
        return $result;
    }

    public function getAllCategory(){
        $result = $this->db->query("
          SELECT productos.*, DATE_FORMAT(productos.`fecha`, '%d/%m/%Y') as Fec, categorias.`Nombre` as CatNombre 
          FROM productos 
          JOIN categorias ON (productos.`categoria_id` = categorias.`id`) 
          WHERE productos.`categoria_id` = {$this->categoria_id}");
        return $result;
    }

    public function getRandom($limit){
        $sql = "SELECT productos.*, DATE_FORMAT(productos.`fecha`, '%d/%m/%Y') as Fec, categorias.`Nombre` as CatNombre FROM productos JOIN categorias ON (productos.`categoria_id` = categorias.`id`) ORDER BY RAND() LIMIT $limit";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getOne(){
        $result = $this->db->query("SELECT productos.*, DATE_FORMAT(productos.`fecha`, '%d/%m/%Y') as Fec, categorias.`Nombre` as CatNombre FROM productos JOIN categorias ON (productos.`categoria_id` = categorias.`id`) WHERE productos.`id`= {$this->id}");
        return $result->fetch_object();
    }

    public function save(){
        $sql = "INSERT INTO productos VALUES (NULL,{$this->categoria_id},'{$this->nombre}','{$this->descripcion}','{$this->precio}','{$this->stock}','{$this->oferta}','{$this->fecha}','{$this->imagen}')";
        $save = $this->db->query($sql) or die("Error: ".$this->db->error);
        return $save;
    }

    public function delete(){
        $sql = "DELETE FROM productos WHERE id={$this->id}";
        return $this->db->query($sql);
    }

    public function update(){
        $sql = "UPDATE productos SET 
          categoria_id = {$this->categoria_id},
          nombre = '{$this->nombre}',
          descripcion = '{$this->descripcion}',
          precio = '{$this->precio}',
          stock = '{$this->stock}',
          oferta = '{$this->oferta}',
          fecha = '{$this->fecha}' ";

        if ($this->imagen != null)
            $sql .= ", imagen = '{$this->imagen}' ";

        $sql.=" WHERE id = {$this->id}";
        $update = $this->db->query($sql) or die("Error: ".$this->db->error);
        return $update;
    }

}