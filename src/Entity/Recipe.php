<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecipeRepository")
 */
class Recipe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $time;

    /**
     * @ORM\Column(type="integer")
     */
    private $difficulty;

    /**
     * @ORM\Column(type="smallint")
     */
    private $display;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $little_describe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $recettecol;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTime(): ?int
    {
        return $this->time;
    }

    public function setTime(int $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getDifficulty(): ?int
    {
        return $this->difficulty;
    }

    public function setDifficulty(int $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getDisplay(): ?int
    {
        return $this->display;
    }

    public function setDisplay(int $display): self
    {
        $this->display = $display;

        return $this;
    }

    public function getLittleDescribe(): ?string
    {
        return $this->little_describe;
    }

    public function setLittleDescribe(string $little_describe): self
    {
        $this->little_describe = $little_describe;

        return $this;
    }

    public function getRecettecol(): ?string
    {
        return $this->recettecol;
    }

    public function setRecettecol(string $recettecol): self
    {
        $this->recettecol = $recettecol;

        return $this;
    }
}
