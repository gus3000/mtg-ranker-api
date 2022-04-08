<?php

namespace App\Entity\Scryfall;

class ScryfallList
{
    protected array $data;
    protected bool $hasMore;
    protected ?string $nextPage;
    protected ?int $totalCards;
    protected ?array $warnings;

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @return bool
     */
    public function isHasMore(): bool
    {
        return $this->hasMore;
    }

    /**
     * @param bool $hasMore
     */
    public function setHasMore(bool $hasMore): void
    {
        $this->hasMore = $hasMore;
    }

    /**
     * @return string|null
     */
    public function getNextPage(): ?string
    {
        return $this->nextPage;
    }

    /**
     * @param string|null $nextPage
     */
    public function setNextPage(?string $nextPage): void
    {
        $this->nextPage = $nextPage;
    }

    /**
     * @return int|null
     */
    public function getTotalCards(): ?int
    {
        return $this->totalCards;
    }

    /**
     * @param int|null $totalCards
     */
    public function setTotalCards(?int $totalCards): void
    {
        $this->totalCards = $totalCards;
    }

    /**
     * @return array|null
     */
    public function getWarnings(): ?array
    {
        return $this->warnings;
    }

    /**
     * @param array|null $warnings
     */
    public function setWarnings(?array $warnings): void
    {
        $this->warnings = $warnings;
    }


}