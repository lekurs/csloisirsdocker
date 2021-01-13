<?php


namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;

class Gallery
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \ArrayAccess
     */
    private $images;

    /**
     * @var \ArrayAccess
     */
    private $formations;

    /**
     * Gallery constructor.
     *
     * @param string $title
     * @throws \Exception
     */
    public function __construct(string $title)
    {
        $this->id = Uuid::uuid4();
        $this->title = $title;
    }

    /**
     * @return Uuid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return \ArrayAccess
     */
    public function getImages(): \ArrayAccess
    {
        return $this->images;
    }

    /**
     * @return \ArrayAccess
     */
    public function getFormations(): \ArrayAccess
    {
        return $this->formations;
    }
}
