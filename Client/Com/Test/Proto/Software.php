<?php
/**
 * Auto generated from software.proto at 2016-11-02 12:33:38
 *
 * com.test.proto package
 */

namespace Com\Test\Proto {
/**
 * Software message
 */
class Software extends \ProtobufMessage
{
    /* Field index constants */
    const NAME = 1;
    const ID = 2;
    const DEVELOPERS = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::NAME => array(
            'name' => 'name',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_STRING,
        ),
        self::ID => array(
            'name' => 'id',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
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
        $this->values[self::NAME] = null;
        $this->values[self::ID] = null;
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
     * Sets value of 'name' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setName($value)
    {
        return $this->set(self::NAME, $value);
    }

    /**
     * Returns value of 'name' property
     *
     * @return string
     */
    public function getName()
    {
        $value = $this->get(self::NAME);
        return $value === null ? (string)$value : $value;
    }

    /**
     * Sets value of 'id' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setId($value)
    {
        return $this->set(self::ID, $value);
    }

    /**
     * Returns value of 'id' property
     *
     * @return integer
     */
    public function getId()
    {
        $value = $this->get(self::ID);
        return $value === null ? (integer)$value : $value;
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