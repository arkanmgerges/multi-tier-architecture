<?php
namespace MultiTierArchitecture\Exception\Definition;

/**
 * This type of exception is used when the system is unstable
 *
 * Example: Entire website down, database unavailable, etc. This should
 * trigger the SMS alerts and wake you up.
 *
 * @category Exception
 * @package  MultiTierArchitecture\Definition\Exception
 * @author   Arkan M. Gerges <arkan.m.gerges@gmail.com>
 * @version  GIT: $Id:$
 */
abstract class EmergencyAbstract extends \Exception
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
