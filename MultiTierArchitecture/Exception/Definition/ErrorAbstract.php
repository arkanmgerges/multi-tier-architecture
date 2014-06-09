<?php
namespace MultiTierArchitecture\Exception\Definition;

/**
 * This type of exception is used when runtime errors that do not require immediate action but should typically
 * be logged and monitored.
 *
 * @category Exception
 * @package  MultiTierArchitecture\Definition\Exception
 * @author   Arkan M. Gerges <arkan.m.gerges@gmail.com>
 * @version  GIT: $Id:$
 */
abstract class ErrorAbstract extends \Exception
{
    /**
     * Construct that will pass the message parameter to parent class
     *
     * @param string  $message  Message of this exception
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
