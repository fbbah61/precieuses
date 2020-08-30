<?php
namespace App\Entity;

use App\Entity\Goodies;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use UploadService;

class PostImageSubscriber implements EventSubscriberInterface
{
    private $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public static function getSubscribedEvents()
    {
        return array(
            'easy_admin.pre_persist' => array('postImage'),
        );
    }

    function postImage(GenericEvent $event) {
        $result = $event->getSubject();
        $method = $event->getArgument('request')->getMethod();

        if (! $result instanceof Goodies || $method !== Request::METHOD_POST) {
            return;
        }

        if ($result->getImage() instanceof UploadedFile) {
            $url = $this->uploadService->saveToDisk($result->getImage());
            $result->setImage($url);
        }
    }
}