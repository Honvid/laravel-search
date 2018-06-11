<?php

namespace Honvid;

/*
|--------------------------------------------------------------------------
| CLASS NAME: Search
|--------------------------------------------------------------------------
| @author    honvid
| @datetime  2018-06-08 17:11
| @package   Honvid
| @description:
|
*/

use Honvid\Drivers\DriverBase;

class Search
{
    /**
     * The name of the driver to used.
     *
     * @var string
     */
    protected $driver = null;

    /**
     * The array of index instances used by this instance.
     *
     * @var array
     */
    protected $indexes = [];

    /**
     * Search constructor.
     *
     * @param null $driver
     */
    public function __construct($driver = null)
    {
        if (null === $driver) {
            $driver = config('search.default', 'elasticsearch');
        }

        $this->driver = $driver;
    }

    /**
     * Return the instance associated with the requested index name.
     * Will create one if needed.
     *
     * @param null $index
     * @return mixed
     */
    public function index($index = null)
    {
        if (null === $index) {
            $index = config('search.default_index', 'default');
        }

        if ( ! isset($this->indexes[$index])) {
            $this->indexes[$index] = DriverBase::factory($index, $this->driver);
        }

        return $this->indexes[$index];
    }

    /**
     * Provide convenient access to methods on the "default_index".
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public function __call($method, array $parameters)
    {
        return call_user_func_array([$this->index(), $method], $parameters);
    }
}