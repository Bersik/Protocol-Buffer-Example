<?php
/**
 * Auto generated from developer.proto at 2016-11-02 12:33:38
 *
 * com.test.proto package
 */

namespace Com\Test\Proto {
/**
 * DeveloperList message
 */
class DeveloperList extends \ProtobufMessage
{
    /* Field index constants */
    const DEVELOPERS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::DEVELOPERS => array(
            'name' => 'developers',
            'repeated' => true,
            'type' => '\Com\Test\Proto\Developer'
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
        $this->values[self::DEVELOPERS] = array();
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
     * Appends value to 'developers' list
     *
     * @param \Com\Test\Proto\Developer $value Value to append
     *
     * @return null
     */
    public function appendDevelopers(\Com\Test\Proto\Developer $value)
    {
        return $this->append(self::DEVELOPERS, $value);
    }

    /**
     * Clears 'developers' list
     *
     * @return null
     */
    public function clearDevelopers()
    {
        return $this->clear(self::DEVELOPERS);
    }

    /**
     * Returns 'developers' list
     *
     * @return \Com\Test\Proto\Developer[]
     */
    public function getDevelopers()
    {
        return $this->get(self::DEVELOPERS);
    }

    /**
     * Returns 'developers' iterator
     *
     * @return \ArrayIterator
     */
    public function getDevelopersIterator()
    {
        return new \ArrayIterator($this->get(self::DEVELOPERS));
    }

    /**
     * Returns element from 'developers' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \Com\Test\Proto\Developer
     */
    public function getDevelopersAt($offset)
    {
        return $this->get(self::DEVELOPERS, $offset);
    }

    /**
     * Returns count of 'developers' list
     *
     * @return int
     */
    public function getDevelopersCount()
    {
        return $this->count(self::DEVELOPERS);
    }
}
}