<?php

namespace AppBundle\Twig;

///@brief Esta clase contiene las funciones agragadas para las plantillas twig
class AppExtension extends \Twig_Extension
{

    var $items = 0;

    ///@brief Por este medio se agregar nuevas funciones
    ///@note Las funciones agregadas por este medio solo estaran disponibles para las plantillas twig
    ///@return Devuelve un array con todas las funciones
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('print_r', array($this, 'print_rFilter')),
            new \Twig_SimpleFilter('InputId', array($this, 'incrementFilter')),
            new \Twig_SimpleFilter('to_md5', array($this, 'to_md5')),
            new \Twig_SimpleFilter('unserialize', array($this, 'unserializeF')),
            new \Twig_SimpleFilter('serialize', array($this, 'serializeF')),
        );
    }

    ///@brief Esta funcion recibe un array
    ///@note Una alternativa a esta función es "dump(tu_array)" donde tu_array es el array que se desea imprimir
    ///@return Retorna el array listo para ser mostrado en la plantilla twig
    public function print_rFilter($array)
    {
        //$text = substr($text,0,$tamaño);
        $var = print_r($array, true);
        return '<pre>' . $var . '</pre>';
//        return $var;
    }

    ///@brief Esta funcion recibe un text
    ///@return Retorna el texto concatenado el numero de item
    public function incrementFilter($text)
    {
        $this->items++;
        return $text . $this->items;
    }

    ///@brief Esta funcion recibe un text
    ///@return Retorna el texto convertido en md5
    public function to_md5($text)
    {
        return md5($text);
    }

    public function serializeF($array)
    {
//        return 'unserialize';
        return serialize($array);
    }

    public function unserializeF($string)
    {
        if (is_array($string)) {
            return $string;
        } else {
            return unserialize($string);
        }
    }

}
