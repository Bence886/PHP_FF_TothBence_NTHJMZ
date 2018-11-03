<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class TreeType
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="tree_types")
 */
class TreeType
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $tree_type_id;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tree_type_age;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $tree_type_level;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $tree_type_name;

    /**
     * @var string
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $tree_type_branching_type;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tree_type_nim_branching_num;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tree_type_max_branching_num;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tree_type_growth_len;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tree_type_growth_width;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private  $tree_type_branching_roll;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tree_type_branching_angle;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $tree_type_file_name;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Tree", mappedBy="$tree_tree_type")
     */
    private $tree_type_trees;

    public function __construct()
    {
        $this->tree_type_trees = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->tree_type_name;
    }

    /**
     * @return int
     */
    public function getTreeTypeId(): int
    {
        return $this->tree_type_id;
    }

    /**
     * @return int
     */
    public function getTreeTypeAge(): int
    {
        return $this->tree_type_age;
    }

    /**
     * @param int $tree_type_age
     */
    public function setTreeTypeAge(int $tree_type_age): void
    {
        $this->tree_type_age = $tree_type_age;
    }

    /**
     * @return int
     */
    public function getTreeTypeLevel(): int
    {
        return $this->tree_type_level;
    }

    /**
     * @param int $tree_type_level
     */
    public function setTreeTypeLevel(int $tree_type_level): void
    {
        $this->tree_type_level = $tree_type_level;
    }

    /**
     * @return string
     */
    public function getTreeTypeName(): string
    {
        return $this->tree_type_name;
    }

    /**
     * @param string $tree_type_name
     */
    public function setTreeTypeName(string $tree_type_name): void
    {
        $this->tree_type_name = $tree_type_name;
    }

    /**
     * @return string
     */
    public function getTreeTypeBranchingType(): string
    {
        return $this->tree_type_branching_type;
    }

    /**
     * @param string $tree_type_branching_type
     */
    public function setTreeTypeBranchingType(string $tree_type_branching_type): void
    {
        $this->tree_type_branching_type = $tree_type_branching_type;
    }

    /**
     * @return int
     */
    public function getTreeTypeNimBranchingNum(): int
    {
        return $this->tree_type_nim_branching_num;
    }

    /**
     * @param int $tree_type_nim_branching_num
     */
    public function setTreeTypeNimBranchingNum(int $tree_type_nim_branching_num): void
    {
        $this->tree_type_nim_branching_num = $tree_type_nim_branching_num;
    }

    /**
     * @return int
     */
    public function getTreeTypeMaxBranchingNum(): int
    {
        return $this->tree_type_max_branching_num;
    }

    /**
     * @param int $tree_type_max_branching_num
     */
    public function setTreeTypeMaxBranchingNum(int $tree_type_max_branching_num): void
    {
        $this->tree_type_max_branching_num = $tree_type_max_branching_num;
    }

    /**
     * @return int
     */
    public function getTreeTypeGrowthLen(): int
    {
        return $this->tree_type_growth_len;
    }

    /**
     * @param int $tree_type_growth_len
     */
    public function setTreeTypeGrowthLen(int $tree_type_growth_len): void
    {
        $this->tree_type_growth_len = $tree_type_growth_len;
    }

    /**
     * @return int
     */
    public function getTreeTypeGrowthWidth(): int
    {
        return $this->tree_type_growth_width;
    }

    /**
     * @param int $tree_type_growth_width
     */
    public function setTreeTypeGrowthWidth(int $tree_type_growth_width): void
    {
        $this->tree_type_growth_width = $tree_type_growth_width;
    }

    /**
     * @return int
     */
    public function getTreeTypeBranchingRoll(): int
    {
        return $this->tree_type_branching_roll;
    }

    /**
     * @param int $tree_type_branching_roll
     */
    public function setTreeTypeBranchingRoll(int $tree_type_branching_roll): void
    {
        $this->tree_type_branching_roll = $tree_type_branching_roll;
    }

    /**
     * @return int
     */
    public function getTreeTypeBranchingAngle(): int
    {
        return $this->tree_type_branching_angle;
    }

    /**
     * @param int $tree_type_branching_angle
     */
    public function setTreeTypeBranchingAngle(int $tree_type_branching_angle): void
    {
        $this->tree_type_branching_angle = $tree_type_branching_angle;
    }

    /**
     * @return string
     */
    public function getTreeTypeFileName(): string
    {
        return $this->tree_type_file_name;
    }

    /**
     * @param string $tree_type_file_name
     */
    public function setTreeTypeFileName(string $tree_type_file_name): void
    {
        $this->tree_type_file_name = $tree_type_file_name;
    }

    /**
     * @return Collection
     */
    public function getTreeTypeTrees(): Collection
    {
        return $this->tree_type_trees;
    }

    /**
     * @param Collection $tree_type_trees
     */
    public function setTreeTypeTrees(Collection $tree_type_trees): void
    {
        $this->tree_type_trees = $tree_type_trees;
    }
}