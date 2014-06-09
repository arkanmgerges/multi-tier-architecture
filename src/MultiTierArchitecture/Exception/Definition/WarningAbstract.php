<?php
namespace MultiTierArchitecture\Exception\Definition;

/**
 * This type of exception is used when exceptional occurrences that are not errors.
 *
 * Example: Use of deprecated APIs, poor use of an API, undesirable things
 * that are not necessarily wrong.
 *
 * @category Exception
 * @package  MultiTierArchitecture\Definition\Exception
 * @author   Arkan M. Gerges <arkan.m.gerges@gmail.com>
 * @version  GIT: $Id:$
 */
abstract class WarningAbstract extends \Exception
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
