<?php

namespace App\Http\LogicWrapper;

abstract class AbstractWrapper implements LogicWrapperInterface
{
    /**
     * @var array
     */
    protected $input;

    /**
     * @var array
     */
    protected $result;

    /**
     * AbstractWrapper constructor.
     * @param array $input
     */
    public function __construct(array $input = [])
    {
        $this->input = $input;
    }
}
