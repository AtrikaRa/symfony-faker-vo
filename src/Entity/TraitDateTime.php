<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


trait TraitDateTime
{
    #[ORM\Column(nullable: true)]
    private ?\DateTime $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $updatedAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $deletedAt = null;

    
    #[ORM\PrePersist]
    public function createTimestamps()
    {
        if ($this->getCreatedAt() == null) {
            $this->setCreatedAt(new \DateTime(date('Y-m-d H:i:s')));
        }
    }

    #[ORM\PreUpdate]
    public function updatedTimestamps()
    {
        $this->setUpdatedAt(new \DateTime(date('Y-m-d H:i:s')));
    }

    
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    
    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

   
    public function setUpdatedAt(\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    
    public function getDeletedAt(): ?\DateTime
    {
        return $this->deletedAt;
    }

    
    public function setDeletedAt(\DateTime $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }
}
