<?php
namespace MultiTierArchitecture\Library\Pagination\Definition;

/**
 * Interface Pagination
 *
 * @category Library\Pagination
 * @package  Animator\Library\Pagination\Definition
 * @author   Arkan M. Gerges <arkan.m.gerges@gmail.com>
 * @version  GIT: $Id:$
 */
interface PaginationInterface
{
    /**
     * Get all the items that are set for this pagination
     *
     * @return array|null
     */
    public function getItems();

    /**
     * Has items ?
     *
     * @return boolean
     */
    public function hasItems();

    /**
     * Get first page number
     *
     * @return int
     */
    public function getFirstPage();

    /**
     * Has first page number ?
     *
     * @return boolean
     */
    public function hasFirstPage();

    /**
     * Get last page number
     *
     * @return int
     */
    public function getLastPage();

    /**
     * Has last page number ?
     *
     * @return boolean
     */
    public function hasLastPage();

    /**
     * Get previous page number
     *
     * @return int
     */
    public function getPreviousPage();

    /**
     * Has previous page number ?
     *
     * @return boolean
     */
    public function hasPreviousPage();

    /**
     * Get next page number
     *
     * @return int
     */
    public function getNextPage();

    /**
     * Has next page number ?
     *
     * @return boolean
     */
    public function hasNextPage();

    /**
     * Get current page number
     *
     * @return int
     */
    public function getCurrentPage();

    /**
     * Get total number of items
     *
     * @return int
     */
    public function getTotalItems();

    /**
     * Get total number of pages
     *
     * @return int
     */
    public function getTotalPages();
}
