<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 3.0.3 (doctrine2-annotationsf3) on 2019-05-29 20:43:53.
 * Goto
 * https://github.com/mysql-workbench-schema-exporter/mysql-workbench-schema-exporter
 * for more information.
 */

namespace Ast\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Ast\WebBundle\Entity\Contacto
 *
 * @ORM\Entity()
 * @ORM\Table(name="WB_Contactos")
 * @ORM\HasLifecycleCallbacks()
 */
class Contacto
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $asunto;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $correo;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $estado;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    protected $mensaje;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $fecharecibido;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":0})
     */
    protected $respondido= false;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $respuesta;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $fecharespuesta;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    protected $extra;

    public function __construct()
    {
    }

    public function __toString()
    {
        return $this->nombre;
    }

    /**
    * Gets triggered only on insert
    * @ORM\PrePersist
    */
    public function onPrePersist(){
        //Cambiar por el campo creado si es que existe en la tabla
        //$this->created = new \DateTime("now"); 
    }

    /**
    * Gets triggered only on update
    * @ORM\PreUpdate
    */
    public function onPreUpdate(){
        //Cambiar por el campo modificado si es que existe en la tabla
        //$this->updated = new \DateTime("now"); 
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Ast\WebBundle\Entity\Contacto
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of nombre.
     *
     * @param string $nombre
     * @return \Ast\WebBundle\Entity\Contacto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of asunto.
     *
     * @param string $asunto
     * @return \Ast\WebBundle\Entity\Contacto
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;

        return $this;
    }

    /**
     * Get the value of asunto.
     *
     * @return string
     */
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * Set the value of correo.
     *
     * @param string $correo
     * @return \Ast\WebBundle\Entity\Contacto
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of correo.
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of estado.
     *
     * @param string $estado
     * @return \Ast\WebBundle\Entity\Contacto
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of estado.
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of mensaje.
     *
     * @param string $mensaje
     * @return \Ast\WebBundle\Entity\Contacto
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    /**
     * Get the value of mensaje.
     *
     * @return string
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set the value of fecharecibido.
     *
     * @param \DateTime $fecharecibido
     * @return \Ast\WebBundle\Entity\Contacto
     */
    public function setFecharecibido($fecharecibido)
    {
        $this->fecharecibido = $fecharecibido;

        return $this;
    }

    /**
     * Get the value of fecharecibido.
     *
     * @return \DateTime
     */
    public function getFecharecibido()
    {
        return $this->fecharecibido;
    }

    /**
     * Set the value of respondido.
     *
     * @param boolean $respondido
     * @return \Ast\WebBundle\Entity\Contacto
     */
    public function setRespondido($respondido)
    {
        $this->respondido = $respondido;

        return $this;
    }

    /**
     * Get the value of respondido.
     *
     * @return boolean
     */
    public function getRespondido()
    {
        return $this->respondido;
    }

    /**
     * Set the value of respuesta.
     *
     * @param string $respuesta
     * @return \Ast\WebBundle\Entity\Contacto
     */
    public function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    /**
     * Get the value of respuesta.
     *
     * @return string
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }

    /**
     * Set the value of fecharespuesta.
     *
     * @param \DateTime $fecharespuesta
     * @return \Ast\WebBundle\Entity\Contacto
     */
    public function setFecharespuesta($fecharespuesta)
    {
        $this->fecharespuesta = $fecharespuesta;

        return $this;
    }

    /**
     * Get the value of fecharespuesta.
     *
     * @return \DateTime
     */
    public function getFecharespuesta()
    {
        return $this->fecharespuesta;
    }

    /**
     * Set the value of extra.
     *
     * @param string $extra
     * @return \Ast\WebBundle\Entity\Contacto
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * Get the value of extra.
     *
     * @return string
     */
    public function getExtra()
    {
        return $this->extra;
    }

    public function __sleep()
    {
        return array('id', 'nombre', 'asunto', 'correo', 'estado', 'mensaje', 'fecharecibido', 'respondido', 'respuesta', 'fecharespuesta', 'extra');
    }
}