<?php

namespace App\Entity;

use App\Repository\AlimentsRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AlimentsRepository::class)
 * @Vich\Uploadable
 */
class Aliments
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

   

     /** 
     * @Vich\UploadableField(mapping="Aliments_image", fileNameProperty="image") 
     * 
     * @var File|null
     */ 
    private  $imageFile ;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *                  min=3,
     *                  max=15, 
     *                  minMessage="Le nom doit faire 3 caractéres minimum", 
     *                  maxMessage="Le nom ne doit pas dépasser 15 caractère")
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     * @Assert\Range(
     *                  min=0.1, 
     *                  max=100, 
     *                  minMessage="Le prix doit être supérieur à 0.1", 
     *                  maxMessage="Le prix ne doit pas dépasser 100")
     */
    private $prix;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="integer")
     */
    private $calorie;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $proteine;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $glucide;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $lipide;

    /**
     * @var \DateTimeInterface|null
     * @ORM\Column(type="datetime_immutable")
     */
    private $updatedAt;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCalorie(): ?int
    {
        return $this->calorie;
    }

    public function setCalorie(int $calorie): self
    {
        $this->calorie = $calorie;

        return $this;
    }

    public function getProteine(): ?float
    {
        return $this->proteine;
    }

    public function setProteine(?float $proteine): self
    {
        $this->proteine = $proteine;

        return $this;
    }

    public function getGlucide(): ?float
    {
        return $this->glucide;
    }

    public function setGlucide(?float $glucide): self
    {
        $this->glucide = $glucide;

        return $this;
    }

    public function getLipide(): ?float
    {
        return $this->lipide;
    }

    public function setLipide(?float $lipide): self
    {
        $this->lipide = $lipide;

        return $this;
    }



    public function setImageFile(?File $imageFile ): Aliments
    {
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof UploadedFile) 
        {
            $this->updatedAt = new \DatetimeImmutable('now');
        }
        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
