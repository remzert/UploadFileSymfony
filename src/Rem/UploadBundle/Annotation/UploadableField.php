<?php

namespace Rem\UploadBundle\Annotation;

use Doctrine\Common\Annotations\Annotation\Target;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
Class UploadableField 
{
   
    /**
     *
     * @var string
     */
    private $filename;
    /**
     *
     * @var string
     */
    private $path;
    
    public function __construct(array $options) {
        if(empty ($options['filename']))
        {
            throw new \InvalidArgumentException("L'annotation UploadableField doit avoir un attribut 'filename'");
        }
         if(empty ($options['path']))
        {
            throw new \InvalidArgumentException("L'annotation UploadableField doit avoir un attribut 'path'");
        }
        $this->filename = $options['filename'];
        $this->path = $options['path'];
    }
    
    function getFilename() {
        return $this->filename;
    }

    function getPath() {
        return $this->path;
    }


}

