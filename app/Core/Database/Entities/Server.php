<?php

namespace Flute\Core\Database\Entities;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\HasMany;

/**
 * @Entity()
 */
class Server
{
    /**
     * @Column(type="primary")
     */
    public $id;

    /**
     * @Column(type="string")
     */
    public $name;

    /**
     * @Column(type="string")
     */
    public $ip;

    /**
     * @Column(type="int")
     */
    public $port;

    /**
     * @Column(type="string")
     */
    public $mod;

    /**
     * @Column(type="string", nullable=true)
     */
    public $rcon;

    /**
     * @HasMany(target="DatabaseConnection", cascade=true, nullable=true)
     * @var DatabaseConnection[]|null
     */
    public $dbconnections;

    /**
     * @Column(type="timestamp", default="CURRENT_TIMESTAMP")
     */
    public $created_at;

    public function __construct()
    {
        $this->created_at = new \DateTime();
    }
}
