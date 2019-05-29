<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 3.0.3 (doctrine2-annotationsf3) on 2019-05-29 20:43:54.
 * Goto
 * https://github.com/mysql-workbench-schema-exporter/mysql-workbench-schema-exporter
 * for more information.
 */

namespace Ast\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Ast\WebBundle\Entity\Media
 *
 * @ORM\Entity()
 * @ORM\Table(name="WB_Medias", indexes={@ORM\Index(name="fk_GaleriaImagen_Galeria1_idx", columns={"idgaleria"})})
 * @ORM\HasLifecycleCallbacks()
 */
class Media
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $idgaleria;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $referencia;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $titulo;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $descripcion;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $url;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $thumb;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":0})
     */
    protected $isimage= false;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $imagen;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $video;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $linkvideo;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $orden;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":0})
     */
    protected $activo= false;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $creado;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $actualizado;

    /**
     * @ORM\ManyToOne(targetEntity="Galeria", inversedBy="media")
     * @ORM\JoinColumn(name="idgaleria", referencedColumnName="id")
     */
    protected $galeria;

    public function __construct()
    {
    }

    public function __toString()
    {
        return (string) $this->id;
    }

    /**
    * Gets triggered only on insert
    * @ORM\PrePersist
    */
    public function onPrePersist(){
        $this->creado = new \DateTime("now"); 
    }

    /**
    * Gets triggered only on update
    * @ORM\PreUpdate
    */
    public function onPreUpdate(){
        $this->actualizado = new \DateTime("now"); 
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Ast\WebBundle\Entity\Media
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
     * Set the value of idgaleria.
     *
     * @param integer $idgaleria
     * @return \Ast\WebBundle\Entity\Media
     */
    public function setIdgaleria($idgaleria)
    {
        $this->idgaleria = $idgaleria;

        return $this;
    }

    /**
     * Get the value of idgaleria.
     *
     * @return integer
     */
    public function getIdgaleria()
    {
        return $this->idgaleria;
    }

    /**
     * Set the value of referencia.
     *
     * @param string $referencia
     * @return \Ast\WebBundle\Entity\Media
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;

        return $this;
    }

    /**
     * Get the value of referencia.
     *
     * @return string
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set the value of titulo.
     *
     * @param string $titulo
     * @return \Ast\WebBundle\Entity\Media
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of titulo.
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of descripcion.
     *
     * @param string $descripcion
     * @return \Ast\WebBundle\Entity\Media
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of descripcion.
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of url.
     *
     * @param string $url
     * @return \Ast\WebBundle\Entity\Media
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of thumb.
     *
     * @param string $thumb
     * @return \Ast\WebBundle\Entity\Media
     */
    public function setThumb($thumb)
    {
        $this->thumb = $thumb;

        return $this;
    }

    /**
     * Get the value of thumb.
     *
     * @return string
     */
    public function getThumb()
    {
        return $this->thumb;
    }

    /**
     * Set the value of isimage.
     *
     * @param boolean $isimage
     * @return \Ast\WebBundle\Entity\Media
     */
    public function setIsimage($isimage)
    {
        $this->isimage = $isimage;

        return $this;
    }

    /**
     * Get the value of isimage.
     *
     * @return boolean
     */
    public function getIsimage()
    {
        return $this->isimage;
    }

    /**
     * Set the value of imagen.
     *
     * @param string $imagen
     * @return \Ast\WebBundle\Entity\Media
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of imagen.
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of video.
     *
     * @param string $video
     * @return \Ast\WebBundle\Entity\Media
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get the value of video.
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set the value of linkvideo.
     *
     * @param string $linkvideo
     * @return \Ast\WebBundle\Entity\Media
     */
    public function setLinkvideo($linkvideo)
    {
        $this->linkvideo = $linkvideo;

        return $this;
    }

    /**
     * Get the value of linkvideo.
     *
     * @return string
     */
    public function getLinkvideo()
    {
        return $this->linkvideo;
    }

    /**
     * Set the value of orden.
     *
     * @param integer $orden
     * @return \Ast\WebBundle\Entity\Media
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get the value of orden.
     *
     * @return integer
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set the value of activo.
     *
     * @param boolean $activo
     * @return \Ast\WebBundle\Entity\Media
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get the value of activo.
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set the value of creado.
     *
     * @param \DateTime $creado
     * @return \Ast\WebBundle\Entity\Media
     */
    public function setCreado($creado)
    {
        $this->creado = $creado;

        return $this;
    }

    /**
     * Get the value of creado.
     *
     * @return \DateTime
     */
    public function getCreado()
    {
        return $this->creado;
    }

    /**
     * Set the value of actualizado.
     *
     * @param \DateTime $actualizado
     * @return \Ast\WebBundle\Entity\Media
     */
    public function setActualizado($actualizado)
    {
        $this->actualizado = $actualizado;

        return $this;
    }

    /**
     * Get the value of actualizado.
     *
     * @return \DateTime
     */
    public function getActualizado()
    {
        return $this->actualizado;
    }

    /**
     * Set Galeria entity (many to one).
     *
     * @param \Ast\WebBundle\Entity\Galeria $galeria
     * @return \Ast\WebBundle\Entity\Media
     */
    public function setGaleria(Galeria $galeria = null)
    {
        $this->galeria = $galeria;

        return $this;
    }

    /**
     * Get Galeria entity (many to one).
     *
     * @return \Ast\WebBundle\Entity\Galeria
     */
    public function getGaleria()
    {
        return $this->galeria;
    }

    public function __sleep()
    {
        return array('id', 'idgaleria', 'referencia', 'titulo', 'descripcion', 'url', 'thumb', 'isimage', 'imagen', 'video', 'linkvideo', 'orden', 'activo', 'creado', 'actualizado');
    }
}