<?php

class Categoria{

    private $id;
    private $nombre;
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

    public function getAll(){
        $result = $this->db->query("SELECT * FROM categorias ORDER BY nombre");
        return $result;

    }

    public function save(){
        $sql = "INSERT INTO categorias VALUES (NULL, '{$this->getNombre()}')";
        $save = $this->db->query($sql) or die("Error: ".$this->db->error);
        return $save;
    }

}