<?php

namespace Fruty\SmartHome\Common\Specifications;

class PaginatedSpecification
{
    /**
     * @var int
     */
    private $page;
    /**
     * @var int
     */
    private $perPage;
    /**
     * @var string
     */
    private $pageName;
    /**
     * @var array
     */
    private $columns;

    /**
     * PaginatedSpecification constructor.
     * @param int $perPage
     * @param int $page
     * @param string $pageName
     * @param array $columns
     */
    public function __construct($perPage = null, $page = null, $pageName = 'page', $columns = ['*'])
    {
        $this->page = $page;
        $this->perPage = $perPage;
        $this->pageName = $pageName;
        $this->columns = $columns;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @return string
     */
    public function getPageName(): string
    {
        return $this->pageName;
    }

    /**
     * @return array
     */
    public function getColumns(): array
    {
        return $this->columns;
    }
}
