<?php

namespace App\Entity;

use App\Repository\NoticiaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoticiaRepository::class)]
class Noticia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titulo = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dataPublicacao = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $conteudo = null;

    #[ORM\Column(length: 50)]
    private ?string $imagem = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): static
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDataPublicacao(): ?\DateTimeInterface
    {
        return $this->dataPublicacao;
    }

    public function setDataPublicacao(\DateTimeInterface $dataPublicacao): static
    {
        $this->dataPublicacao = $dataPublicacao;

        return $this;
    }

    public function getConteudo(): ?string
    {
        return $this->conteudo;
    }

    public function setConteudo(string $conteudo): static
    {
        $this->conteudo = $conteudo;

        return $this;
    }

    public function getImagem(): ?string
    {
        return $this->imagem;
    }

    public function setImagem(string $imagem): static
    {
        $this->imagem = $imagem;

        return $this;
    }
}
