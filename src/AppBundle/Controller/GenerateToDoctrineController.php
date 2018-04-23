<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Yaml\Yaml;

class GenerateToDoctrineController extends Controller
{
    private function recursive_read_dir($path)
    {
        $files = array();
        if ($handle = opendir($path)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") { //Just removed . and ..
                    if (is_dir($path . DIRECTORY_SEPARATOR . $entry)) {
                        $files[$entry] = $this->recursive_read_dir($path . DIRECTORY_SEPARATOR . $entry);
                    } else {
                        $files[] = $entry;
                    }
                }
            }
            closedir($handle);
        }
        return $files;
    }

    private function replaceSeparator($data)
    {
        $data = str_replace('/', '\\', $data);
        return $data;
    }

    private function getArrayRoute($array)
    {
        reset($array);
        $key = key($array);
        if (count($array) > 1) {
            $ruta = $array[$key];
            unset($array[$key]);
            $ruta .= DIRECTORY_SEPARATOR . $this->getArrayRoute($array);
        } else {
            $ruta = $array[$key];
        }
        return $ruta;
    }

    public function indexAction($bundle)
    {
//        echo 'AppBundle_generate_orm_to_doctrine';
//        exit();
        if ($this->container->getParameter('kernel.environment') == 'dev') {
            try {
                /**Retorno de archivos y folder de un directorio*/
                $rutasDoctrine = ['Resources', 'config', 'doctrine'];
                $rutasRepo = ['Repository'];
                $extDoctrine = '.orm.yml';
                $extRepo = 'Repository.php';
                $extDoctrineToChange = '.php';
                $carpetaDoctrine = $this->getArrayRoute($rutasDoctrine);
                $carpetaRepo = $this->getArrayRoute($rutasRepo);
                $rutaBundle = $this->container->get('kernel')->locateResource('@' . $bundle);
                $directoryDoctrine = $rutaBundle . $carpetaDoctrine;
                $directoryRepo = $rutaBundle . $carpetaRepo;
                $filesDoctrine = $this->recursive_read_dir($directoryDoctrine);
                $filesRepo = $this->recursive_read_dir($directoryRepo);
                $archivosEditados = array();
                foreach ($filesDoctrine as $k => $v) {
                    $txtSearch = str_replace($extDoctrine, $extRepo, $v);
                    /**Continua si el archivo actual contiene el texto(extension) indicado en $extDoctrine */
                    if (strpos($v, $extDoctrine) !== false) {
                        /**Continua si existe un Repositorio para este archivo en $filesRepo*/
                        if (in_array($txtSearch, $filesRepo)) {
                            /**Editar el archivo yml agregando repositoryClass*/
                            $filename = $rutaBundle . $carpetaDoctrine . DIRECTORY_SEPARATOR . $v;
                            $yaml = Yaml::parse(file_get_contents($filename));
                            reset($yaml);
                            $key = key($yaml);
                            $filenameDoctrine = str_replace($extDoctrineToChange, '', str_replace($extDoctrine, $extRepo, $v));
                            $getRootDir = str_replace('app', 'src' . DIRECTORY_SEPARATOR, $this->container->get('kernel')->getRootDir());
                            $getRootDir = $this->replaceSeparator($getRootDir);
                            $RutaSinTratar = $this->replaceSeparator($rutaBundle . $carpetaRepo . DIRECTORY_SEPARATOR . $filenameDoctrine);
                            $rutaTratada = str_replace($getRootDir, '', $RutaSinTratar);
                            $yaml[$key]["repositoryClass"] = $rutaTratada;
                            $archivosEditados[] = array('rutaTratada' => $rutaTratada, 'archivo' => $filename);
//                    $yaml[$key]["repositoryClassTest"] = $data;
                            $new_yaml = Yaml::dump($yaml, 5);
                            file_put_contents($filename, $new_yaml);
                        }
                    }
                }
                echo 'Archivos Editados';
                dump($archivosEditados);
            } catch (\Exception $e) {
                echo 'Ocurriò un error';
                error_log($e->getMessage());
                dump($e->getMessage());
            }
        } else {
            echo 'error environment error';
        }
        exit();
    }
}