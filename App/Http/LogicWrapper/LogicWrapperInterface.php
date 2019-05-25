<?php

namespace App\Http\LogicWrapper;

interface LogicWrapperInterface
{
    /**
     * @return mixed
     */
    public function getResult();

    /**
     * Executes a workflow that's needed to be wrapped
     * @return $this
     */
    public function execute();
}
