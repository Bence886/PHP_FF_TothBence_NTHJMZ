<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Tree
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="trees")
 */
class Tree
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $tree_id;

    /**
     * @var Environment
     * @ORM\ManyToOne(targetEntity="Environment", inversedBy="environment_trees")
     * @ORM\JoinColumn(name="tree_environment", referencedColumnName="environment_id")
     */
    private $tree_environment;

    /**
     * @var TreeType
     * @ORM\ManyToOne(targetEntity="TreeType", inversedBy="tree_type_trees")
     * @ORM\JoinColumn(name="tree_tree_type", referencedColumnName="tree_type_id")
     */
    private $tree_tree_type;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $tree_name;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tree_age;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tree_resolution;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $tree_file_name;

    /**
     * @var string ?
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $tree_sketchfab_link;

    public function __toString()
    {
        return $this->tree_name;
    }

    /**
     * @return int
     */
    public function getTreeId(): int
    {
        return $this->tree_id;
    }

    /**
     * @return Environment
     */
    public function getTreeEnvironment(): Environment
    {
        return $this->tree_environment;
    }

    /**
     * @param Environment $tree_environment
     */
    public function setTreeEnvironment(Environment $tree_environment): void
    {
        $this->tree_environment = $tree_environment;
    }

    /**
     * @return TreeType
     */
    public function getTreeTreeType(): TreeType
    {
        return $this->tree_tree_type;
    }

    /**
     * @param TreeType $tree_tree_type
     */
    public function setTreeTreeType(TreeType $tree_tree_type): void
    {
        $this->tree_tree_type = $tree_tree_type;
    }

    /**
     * @return string
     */
    public function getTreeName(): string
    {
        return $this->tree_name;
    }

    /**
     * @param string $tree_name
     */
    public function setTreeName(string $tree_name): void
    {
        $this->tree_name = $tree_name;
    }

    /**
     * @return int
     */
    public function getTreeAge(): int
    {
        return $this->tree_age;
    }

    /**
     * @param int $tree_age
     */
    public function setTreeAge(int $tree_age): void
    {
        $this->tree_age = $tree_age;
    }

    /**
     * @return int
     */
    public function getTreeResolution(): int
    {
        return $this->tree_resolution;
    }

    /**
     * @param int $tree_resolution
     */
    public function setTreeResolution(int $tree_resolution): void
    {
        $this->tree_resolution = $tree_resolution;
    }

    /**
     * @return string
     */
    public function getTreeFileName(): string
    {
        return $this->tree_file_name;
    }

    /**
     * @param string $tree_file_name
     */
    public function setTreeFileName(string $tree_file_name): void
    {
        $this->tree_file_name = $tree_file_name;
    }

    /**
     * @return string ?
     */
    public function getTreeSketchfabLink(): ?string
    {
        return $this->tree_sketchfab_link;
    }

    /**
     * @param string $tree_sketchfab_link
     */
    public function setTreeSketchfabLink(string $tree_sketchfab_link): void
    {
        $this->tree_sketchfab_link = $tree_sketchfab_link;
    }


}