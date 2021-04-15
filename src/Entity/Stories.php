<?php

namespace App\Entity;

use App\Repository\StoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StoriesRepository::class)
 */
class Stories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Video::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $story_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\ManyToMany(targetEntity=Type::class)
     */
    private $id_type;

    /**
     * @ORM\ManyToMany(targetEntity=Video::class)
     */
    private $id_video;

    /**
     * @ORM\ManyToMany(targetEntity=Audio::class)
     */
    private $id_audio;

    /**
     * @ORM\ManyToMany(targetEntity=Author::class)
     */
    private $id_author;

    public function __construct()
    {
        $this->id_type = new ArrayCollection();
        $this->id_video = new ArrayCollection();
        $this->id_audio = new ArrayCollection();
        $this->id_author = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }


    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getStoryName(): ?string
    {
        return $this->story_name;
    }

    public function setStoryName(string $story_name): self
    {
        $this->story_name = $story_name;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Collection|Type[]
     */
    public function getIdType(): Collection
    {
        return $this->id_type;
    }

    public function addIdType(Type $idType): self
    {
        if (!$this->id_type->contains($idType)) {
            $this->id_type[] = $idType;
        }

        return $this;
    }

    public function removeIdType(Type $idType): self
    {
        $this->id_type->removeElement($idType);

        return $this;
    }

    /**
     * @return Collection|Video[]
     */
    public function getIdVideo(): Collection
    {
        return $this->id_video;
    }

    public function addIdVideo(Video $idVideo): self
    {
        if (!$this->id_video->contains($idVideo)) {
            $this->id_video[] = $idVideo;
        }

        return $this;
    }

    public function removeIdVideo(Video $idVideo): self
    {
        $this->id_video->removeElement($idVideo);

        return $this;
    }

    /**
     * @return Collection|Audio[]
     */
    public function getIdAudio(): Collection
    {
        return $this->id_audio;
    }

    public function addIdAudio(Audio $idAudio): self
    {
        if (!$this->id_audio->contains($idAudio)) {
            $this->id_audio[] = $idAudio;
        }

        return $this;
    }

    public function removeIdAudio(Audio $idAudio): self
    {
        $this->id_audio->removeElement($idAudio);

        return $this;
    }

    /**
     * @return Collection|Author[]
     */
    public function getIdAuthor(): Collection
    {
        return $this->id_author;
    }

    public function addIdAuthor(Author $idAuthor): self
    {
        if (!$this->id_author->contains($idAuthor)) {
            $this->id_author[] = $idAuthor;
        }

        return $this;
    }

    public function removeIdAuthor(Author $idAuthor): self
    {
        $this->id_author->removeElement($idAuthor);

        return $this;
    }


}
