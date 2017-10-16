<?php

namespace Rem\UploadBundle\Listener;

use Doctrine\Common\EventArgs;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Exception;
use Rem\UploadBundle\Annotation\UploadAnnotationReader;
use Rem\UploadBundle\Handler\UploadHandler;


Class UploadSubscriber implements EventSubscriber
{

    /**
     * @var UploadHandler
     */
    private $handler;

    /**
     * @var UploadAnnotationReader
     */
    private $reader;

    public function __construct(UploadAnnotationReader $reader, UploadHandler $handler) {
        
        $this->reader = $reader;
        $this->handler = $handler;
    }

    public function getSubscribedEvents(): array {
        return [
            'prePersist',
            'preUpdate',
            'postLoad',
            'postRemove'
        ];
    }
        
    /**
     * @param LifecycleEventArgs $event
     * @throws Exception
     */
    public function prePersist(LifecycleEventArgs $event){
        $this->preEvent($event);
    }
    
     /**
     * @param LifecycleEventArgs $event
     * @throws Exception
     */
    public function preUpdate(EventArgs $event){
        $this->preEvent($event);
    }
    
     /**
     * @param LifecycleEventArgs $event
     * @throws Exception
     */
    private function preEvent(EventArgs $event){
        $entity = $event->getEntity();
        foreach($this->reader->getUploadableFields($entity) as $property => $annotation)
        {
            $this->handler->uploadFile($entity, $property, $annotation);
        }
        //throw new Exception('Au secour');
    }
    
    public function postLoad(EventArgs $event){
        $entity = $event->getEntity();
        foreach($this->reader->getUploadableFields($entity) as $property => $annotation)
        {
            $this->handler->setFileFromFilename($entity, $property, $annotation);
        }
    }
    
      /**
     * @param LifecycleEventArgs $event
     * @throws Exception
     */
    public function postRemove(EventArgs $event){
        $entity = $event->getEntity();
        foreach($this->reader->getUploadableFields($entity) as $property => $annotation)
        {
            $this->handler->removeFile($entity, $property);
            
        }
        //throw new Exception('Au secour');
    }
    
    
}

