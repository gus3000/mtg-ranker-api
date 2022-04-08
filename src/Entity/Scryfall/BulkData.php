<?php

namespace App\Entity\Scryfall;

use App\Serialization\Scryfall\Formats;
use DateTime;
use Symfony\Component\Uid\Uuid;
use function is_string;

class BulkData
{
    protected Uuid $id;
    protected BulkDataType $type;
    protected DateTime $updatedAt;
    protected string $uri;
    protected string $name;
    protected string $description;
    protected int $compressed_size;
    protected string $download_uri;
    protected string $content_type;
    protected string $content_encoding;

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @param Uuid|string $id
     */
    public function setId(Uuid|string $id): void
    {
        if(is_string($id)) {
            $id = new Uuid($id);
        }

        $this->id = $id;
    }

    /**
     * @return BulkDataType
     */
    public function getType(): BulkDataType
    {
        return $this->type;
    }

    /**
     * @param BulkDataType|string $type
     */
    public function setType(BulkDataType|string $type): void
    {
        if(is_string($type))
            $type = BulkDataType::from($type);

        $this->type = $type;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime|string $updatedAt
     */
    public function setUpdatedAt(DateTime|string $updatedAt): void
    {
        dump($updatedAt);
        if(is_string($updatedAt))
            $updatedAt = DateTime::createFromFormat(Formats::DATE_FORMAT,$updatedAt);
        dump(Formats::DATE_FORMAT);
        dump($updatedAt);
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri(string $uri): void
    {
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getCompressedSize(): int
    {
        return $this->compressed_size;
    }

    /**
     * @param int $compressed_size
     */
    public function setCompressedSize(int $compressed_size): void
    {
        $this->compressed_size = $compressed_size;
    }

    /**
     * @return string
     */
    public function getDownloadUri(): string
    {
        return $this->download_uri;
    }

    /**
     * @param string $download_uri
     */
    public function setDownloadUri(string $download_uri): void
    {
        $this->download_uri = $download_uri;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->content_type;
    }

    /**
     * @param string $content_type
     */
    public function setContentType(string $content_type): void
    {
        $this->content_type = $content_type;
    }

    /**
     * @return string
     */
    public function getContentEncoding(): string
    {
        return $this->content_encoding;
    }

    /**
     * @param string $content_encoding
     */
    public function setContentEncoding(string $content_encoding): void
    {
        $this->content_encoding = $content_encoding;
    }


}