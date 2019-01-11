<?php
/**
 * Created by PhpStorm.
 * User: tbenc
 * Date: 2018. 11. 03.
 * Time: 10:55
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Environment
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="environments")
 */
class Environment
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $environment_id;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $environment_name;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $environment_soil_quality;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $environment_altitude;

    /**
     * @var string
     * @ORM\Column(type="string", length=50, nullable=true)
     * x,y,z
     */
    private $environment_wind_direction;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $environment_wind_strength;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $environment_rainfall;

    /**
     * @var string
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $environment_file_name;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Tree", mappedBy="tree_environment")
     */
    private $environment_trees;

    public function __construct()
    {
        $this->environment_trees = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->environment_name;
    }

    /**
     * @return int
     */
    public function getEnvironmentId(): ?int
    {
        return $this->environment_id;
    }

    /**
     * @return string
     */
    public function getEnvironmentName(): ?string
    {
        return $this->environment_name;
    }

    /**
     * @param string $environment_name
     */
    public function setEnvironmentName(string $environment_name): void
    {
        $this->environment_name = $environment_name;
    }

    /**
     * @return int
     */
    public function getEnvironmentSoilQuality(): ?int
    {
        return $this->environment_soil_quality;
    }

    /**
     * @param int $environment_soil_quality
     */
    public function setEnvironmentSoilQuality(int $environment_soil_quality): void
    {
        $this->environment_soil_quality = $environment_soil_quality;
    }

    /**
     * @return int
     */
    public function getEnvironmentAltitude(): ?int
    {
        return $this->environment_altitude;
    }

    /**
     * @param int $environment_altitude
     */
    public function setEnvironmentAltitude(int $environment_altitude): void
    {
        $this->environment_altitude = $environment_altitude;
    }

    /**
     * @return string
     */
    public function getEnvironmentWindDirection(): ?string
    {
        return $this->environment_wind_direction;
    }

    /**
     * @param string $environment_wind_direction
     */
    public function setEnvironmentWindDirection(string $environment_wind_direction): void
    {
        $this->environment_wind_direction = $environment_wind_direction;
    }

    /**
     * @return int
     */
    public function getEnvironmentWindStrength(): ?int
    {
        return $this->environment_wind_strength;
    }

    /**
     * @param int $environment_wind_strength
     */
    public function setEnvironmentWindStrength(int $environment_wind_strength): void
    {
        $this->environment_wind_strength = $environment_wind_strength;
    }

    /**
     * @return int
     */
    public function getEnvironmentRainfall(): ?int
    {
        return $this->environment_rainfall;
    }

    /**
     * @param int $environment_rainfall
     */
    public function setEnvironmentRainfall(int $environment_rainfall): void
    {
        $this->environment_rainfall = $environment_rainfall;
    }

    /**
     * @return string
     */
    public function getEnvironmentFileName(): ?string
    {
        return $this->environment_file_name;
    }

    /**
     * @param string $environment_file_name
     */
    public function setEnvironmentFileName(string $environment_file_name): void
    {
        $this->environment_file_name = $environment_file_name;
    }

    /**
     * @return Collection
     */
    public function getEnvironmentTrees(): Collection
    {
        return $this->environment_trees;
    }

    /**
     * @param Collection $environment_trees
     */
    public function setEnvironmentTrees(Collection $environment_trees): void
    {
        $this->environment_trees = $environment_trees;
    }
}