<?php
/**
 * Created by  marcosamano
 * Date: 29/05/19
 */
namespace Ast\WebBundle\Lib;

use Doctrine\ORM\EntityManager;

class DynamicLayout
{
    static $TIPOLAYOUT = [
        1 => 'Texto',
        2 => 'Imagen',
        3 => 'Icono Social',
        4 => 'Telefonos',
        5 => 'Correos'
    ];
    const TIPOLAYOUT_TEXTO = 1;
    const TIPOLAYOUT_IMAGEN = 2;
    const TIPOLAYOUT_ICONOSOCIAL = 3;
    const TIPOLAYOUT_TELEFONO = 4;
    const TIPOLAYOUT_CORRREO = 5;


    private $em;
    private $fetched = false;
    private $img = [];
    private $telefono = [];
    private $correo = [];
    private $socialmedia = [];

    private $entity;

    function __construct(EntityManager $em, $entity = null)
    {
        $this->em = $em;
        $this->entity = is_null($entity) ? \Ast\WebBundle\Entity\Layout::class: $entity;
    }

    /**
     * @param mixed $entity
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    }



    public function fetch(){
        $this->fetched = true;
        $data = $this->em->getRepository($this->entity)->findAll();
        $ar = [];
        foreach ($data as $layout){
            $ar[$layout->getReferencia()] = $layout;
            if($layout->getTipo() == self::TIPOLAYOUT_IMAGEN) {
                $this->img[$layout->getReferencia()] = $layout->getImagen();
            }else if($layout->getTipo() == self::TIPOLAYOUT_ICONOSOCIAL){
                $this->socialmedia[strtolower($layout->getVisual())] = $layout->getValor();
            }else if($layout->getTipo() == self::TIPOLAYOUT_TELEFONO){
                $this->telefono[$layout->getReferencia()] = ['valor'=>$layout->getValor(),'visual'=>$layout->getVisual()];
            }else if($layout->getTipo() == self::TIPOLAYOUT_CORRREO){
                $this->correo[$layout->getReferencia()] = ['valor'=>$layout->getValor(),'visual'=>$layout->getVisual()];
            }
        }
        return $ar;
    }

    /**
     * @param $referencia
     * @return string
     */
    public function findImagen($referencia){
        if(!$this->fetched){
            $this->fetch();
        }
        return isset($this->img[$referencia])?$this->img[$referencia]:'';
    }

    /**
     * @param $referencia
     * @return bool
     */
    public function hasSocialMedia($referencia){
        if(!$this->fetched){
            $this->fetch();
        }
        return isset($this->socialmedia[strtolower($referencia)]);
    }

    /**
     * @param $referencia
     * @return string
     */
    public function getSocialMedia($referencia){
        if(!$this->fetched){
            $this->fetch();
        }
        return $this->socialmedia[strtolower($referencia)];
    }

    /**
     * @param $referencia
     * @return string
     */
    public function findTelefonoValor($referencia){
        if(!$this->fetched){
            $this->fetch();
        }
        return isset($this->telefono[$referencia])?$this->telefono[$referencia]['valor']:'';
    }

    /**
     * @param $referencia
     * @return string
     */
    public function findTelefono($referencia){
        if(!$this->fetched){
            $this->fetch();
        }
        return isset($this->telefono[$referencia])?$this->telefono[$referencia]['visual']:'';
    }

    /**
     * @param $referencia
     * @return string
     */
    public function findCorreoValor($referencia){
        if(!$this->fetched){
            $this->fetch();
        }
        return isset($this->correo[$referencia])?$this->correo[$referencia]['valor']:'';
    }

    /**
     * @param $referencia
     * @return string
     */
    public function findCorreo($referencia){
        if(!$this->fetched){
            $this->fetch();
        }
        return isset($this->correo[$referencia])?$this->correo[$referencia]['visual']:'';
    }

    /**
     * @param $referencia
     * @return string
     */
    public function findSocialMedia($referencia){
        if(!$this->fetched){
            $this->fetch();
        }
        return isset($this->correo[$referencia])?$this->correo[$referencia]['visual']:'';
    }
}