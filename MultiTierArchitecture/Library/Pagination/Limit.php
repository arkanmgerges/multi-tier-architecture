<?php
namespace MultiTierArchitecture\Library\Pagination;

use MultiTierArchitecture\Library\Pagination\Definition\PaginationInterface;

/**
 * This is a simple pagination that you can provide a part of the items not all of them
 * and provide also the total items to let the system display only the part of items without loaded all the items
 * and then just display part of them, which is not an effective way
 *
 * @category Library
 * @package  Animator\Library\Pagination
 * @author   Arkan M. Gerges <aa@nextdating.com>
 * @version  GIT: $Id:$
 */
class Limit implements PaginationInterface
{
    /**
     * @var array|null  $items  Elements of this pagination
     */
    protected $items = null;

    /** @var int  $total  Total number of the items */
    protected $totalItems = 0;

    /** @var int  $current  Current page number */
    protected $current = 0;

    /** @var int  $itemsPerPage  The number of items in one page */
    protected $itemsPerPage = 0;

    /**
     * Initialize items array
     *
     * @param array  $config  Config array that need to be set initially for this pagination
     */
    public function __construct($config = [])
    {
        $this->totalItems   = isset($config['totalItems'])                             ? $config['totalItems']   : 0;
        $this->current      = isset($config['currentPage'])                            ? $config['currentPage']  : 0;
        $this->items        = isset($config['items']) && is_array($config['items'])    ? $config['items']        : [];
        $this->itemsPerPage = isset($config['itemsPerPage'])                           ? $config['itemsPerPage'] : 0;
    }

    /**
     * Get all the items that are set for this pagination
     *
     * @return array|null
     */
    public function getItems()
    {
        if (count($this->items) > $this->itemsPerPage) {
            $items = [];
            $counter = 0;
            foreach ($this->items as $key => $value) {
                $items[$key] = $value;
                $counter++;
                if ($counter == $this->itemsPerPage) {
                    return $items;
                }
            }
        }

        return $this->items;
    }

    /**
     * Has items ?
     *
     * @return boolean
     */
    public function hasItems()
    {
        return $this->getItems() > 0;
    }

    /**
     * Get first page number
     *
     * @return int
     */
    public function getFirstPage()
    {
        return ($this->totalItems > 0) ? 1 : 0;
    }

    /**
     * Has first page number ?
     *
     * @return boolean
     */
    public function hasFirstPage()
    {
        return $this->getFirstPage() != 0;
    }

    /**
     * Get last page number
     *
     * @return int
     */
    public function getLastPage()
    {
        return $this->getTotalPages();
    }

    /**
     * Has last page number ?
     *
     * @return boolean
     */
    public function hasLastPage()
    {
        return $this->getLastPage() != 0;
    }

    /**
     * Get next page number
     *
     * @return int
     */
    public function getNextPage()
    {
        if ($this->totalItems > 0) {
            return (($this->current + 1) > $this->getLastPage()) ?
                       0 :
                       $this->current + 1;
        }
        else {
            return 0;
        }
    }

    /**
     * Has next page number ?
     *
     * @return boolean
     */
    public function hasNextPage()
    {
        return $this->getNextPage() != 0;
    }

    /**
     * Get previous page number
     *
     * @return int
     */
    public function getPreviousPage()
    {
        if ($this->totalItems > 0) {
            return (($this->current - 1) < 1) ?
                       0 :
                       $this->current - 1;
        }
        else {
            return 0;
        }
    }

    /**
     * Has previous page number ?
     *
     * @return boolean
     */
    public function hasPreviousPage()
    {
        return $this->getPreviousPage() != 0;
    }

    /**
     * Get current page number
     *
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->current;
    }

    /**
     * Get total number of items
     *
     * @return int
     */
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * Get total number of pages
     *
     * @return int
     */
    public function getTotalPages()
    {
        if ($this->totalItems > 0 && $this->itemsPerPage > 0) {
            if (($this->totalItems%$this->itemsPerPage) != 0) {
                return (int)($this->totalItems/$this->itemsPerPage) + 1;
            }
            else {
                return (int)($this->totalItems/$this->itemsPerPage);
            }
        }

        return 0;
    }
}
