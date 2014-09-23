<?php

namespace Opifer\CrudBundle\Datagrid\Row;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Row
 *
 * Holding all data necessary to create a single row inside the datagrid
 */
class Row
{
    /** @var integer */
    protected $id;

    /** @var ArrayCollection */
    protected $cells;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cells = new ArrayCollection();
    }

    /**
     * Set ID
     *
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get ID
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add a cell
     *
     * @param Cell $cell
     */
    public function addCell(Cell $cell)
    {
        $this->cells->add($cell);

        return $this;
    }

    /**
     * Get all cells
     *
     * @return ArrayCollection
     */
    public function getCells()
    {
        return $this->cells;
    }
}
