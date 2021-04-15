<?php

namespace App\Entity;

use App\Repository\AudioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AudioRepository::class)
 */
class Audio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $link_audio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLinkAudio(): ?string
    {
        return $this->link_audio;
    }

    public function setLinkAudio(string $link_audio): self
    {
        $this->link_audio = $link_audio;

        return $this;
    }
}
