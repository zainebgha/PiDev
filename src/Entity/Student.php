<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\NotEqualTo(
     *     value = 8888
     * )
     */
    
    private $NSC;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     * )
     */
    private $Email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNSC(): ?string
    {
        return $this->NSC;
    }

    public function setNSC(?string $NSC): self
    {
        $this->NSC = $NSC;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }
}
