<?php

namespace App\DTO;

use App\Features\Core\DTO;

class CategorySearchParams extends DTO
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var int
     */
    private $limit = 30;

    /**
     * @var int
     */
    private $offset = 0;

    /**
     * CategorySearchParams constructor.
     * @param int $limit
     */
    public function __construct(int $limit = null)
    {
        if ($limit) {
            $this->limit = $limit;
        }
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CategorySearchParams
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return CategorySearchParams
     */
    public function setLimit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     * @return CategorySearchParams
     */
    public function setOffset(int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }
}