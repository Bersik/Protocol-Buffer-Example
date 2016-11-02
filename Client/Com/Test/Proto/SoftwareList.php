<?php
/**
 * Auto generated from software.proto at 2016-11-02 12:33:38
 *
 * com.test.proto package
 */

namespace Com\Test\Proto {
/**
 * SoftwareList message
 */
class SoftwareList extends \ProtobufMessage
{
    /* Field index constants */
    const SOFTWARES = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::SOFTWARES => array(
            'name' => 'softwares',
            'repeated' => true,
            'type' => '\Com\Test\Proto\Software'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::SOFTWARES] = array();
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Appends value to 'softwares' list
     *
     * @param \Com\Test\Proto\Software $value Value to append
     *
     * @return null
     */
    public function appendSoftwares(\Com\Test\Proto\Software $value)
    {
        return $this->append(self::SOFTWARES, $value);
    }

    /**
     * Clears 'softwares' list
     *
     * @return null
     */
    public function clearSoftwares()
    {
        return $this->clear(self::SOFTWARES);
    }

    /**
     * Returns 'softwares' list
     *
     * @return \Com\Test\Proto\Software[]
     */
    public function getSoftwares()
    {
        return $this->get(self::SOFTWARES);
    }

    /**
     * Returns 'softwares' iterator
     *
     * @return \ArrayIterator
     */
    public function getSoftwaresIterator()
    {
        return new \ArrayIterator($this->get(self::SOFTWARES));
    }

    /**
     * Returns element from 'softwares' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Com\Test\Proto\Software
     */
    public function getSoftwaresAt($offset)
    {
        return $this->get(self::SOFTWARES, $offset);
    }

    /**
     * Returns count of 'softwares' list
     *
     * @return int
     */
    public function getSoftwaresCount()
    {
        return $this->count(self::SOFTWARES);
    }
}
}