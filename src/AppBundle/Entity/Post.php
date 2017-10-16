<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\file;
use Rem\UploadBundle\Annotation\Uploadable;
use Rem\UploadBundle\Annotation\UploadableField;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 * @Uploadable()
 */
class Post
{    
     /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=255)
     */
    private $filename;
    
    /**
     *
     * @UploadableField(filename="filename", path="uploads")
     * @Assert\Image(maxWidth="100", maxHeight="100")
     */
    private $file;
    
    /**
     *
     * @UploadableField(filename="avatar", path="avatars") 
     */
    private $avatarFile;
    
    /**
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=true)
     */
    private $avatar;
    
    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;
    
    /**
     * 
     * @return File|null
     */
    function getFile() {
        return $this->file;
    }

    /**
     * 
     * @param File $file|null
     */
    function setFile($file) {
        $this->file = $file;
    }

    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Post
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set filename
     *
     * @param string $filename
     *
     * @return Post
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }
    
    /**
     * 
     * @return type
     */
    function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * 
     * @param type $updatedAt
     */
    function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return Post
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
    
    /**
     * 
     * @return type
     */
    function getAvatarFile() {
        return $this->avatarFile;
    }

    /**
     * 
     * @param type $avatar_file
     */
    function setAvatarFile($avatarFile) {
        $this->avatarFile = $avatarFile;
    }


}
