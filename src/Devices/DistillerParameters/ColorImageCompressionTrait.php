<?php
/**
 * This file is part of the Ghostscript package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace GravityMedia\Ghostscript\Devices\DistillerParameters;

use GravityMedia\Ghostscript\Devices\DistillerParametersInterface;

/**
 * The color image compression distiller parameters trait
 *
 * @package GravityMedia\Ghostscript\Devices\DistillerParameters
 */
trait ColorImageCompressionTrait
{
    /**
     * Available color image downsample type values
     *
     * @var string[]
     */
    protected static $colorImageDownsampleTypeValues = [
        DistillerParametersInterface::IMAGE_DOWNSAMPLE_TYPE_AVERAGE,
        DistillerParametersInterface::IMAGE_DOWNSAMPLE_TYPE_BICUBIC,
        DistillerParametersInterface::IMAGE_DOWNSAMPLE_TYPE_SUBSAMPLE,
        DistillerParametersInterface::IMAGE_DOWNSAMPLE_TYPE_NONE,
    ];

    /**
     * Available color image filter values
     *
     * @var string[]
     */
    protected static $colorImageFilterValues = [
        DistillerParametersInterface::IMAGE_FILTER_DCT_ENCODE,
        DistillerParametersInterface::IMAGE_FILTER_FLATE_ENCODE
    ];

    /**
     * Get argument value
     *
     * @param string $name
     *
     * @return string
     */
    abstract protected function getArgumentValue($name);

    /**
     * Set argument
     *
     * @param string $argument
     *
     * @return $this
     */
    abstract protected function setArgument($argument);

    /**
     * Whether to anti alias color images
     *
     * @return bool
     */
    public function isAntiAliasColorImages()
    {
        $value = $this->getArgumentValue('-dAntiAliasColorImages');
        if (null === $value) {
            return false;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set anti alias color images flag
     *
     * @param bool $antiAliasColorImages
     *
     * @return $this
     */
    public function setAntiAliasColorImages($antiAliasColorImages)
    {
        $this->setArgument(sprintf('-dAntiAliasColorImages=%s', $antiAliasColorImages ? 'true' : 'false'));

        return $this;
    }

    /**
     * Whether to auto filter color images
     *
     * @return bool
     */
    public function isAutoFilterColorImages()
    {
        $value = $this->getArgumentValue('-dAutoFilterColorImages');
        if (null === $value) {
            return true;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set auto filter color images flag
     *
     * @param bool $autoFilterColorImages
     *
     * @return $this
     */
    public function setAutoFilterColorImages($autoFilterColorImages)
    {
        $this->setArgument(sprintf('-dAutoFilterColorImages=%s', $autoFilterColorImages ? 'true' : 'false'));

        return $this;
    }

    /**
     * Get color image depth
     *
     * @return int
     */
    public function getColorImageDepth()
    {
        $value = $this->getArgumentValue('-dColorImageDepth');
        if (null === $value) {
            return -1;
        }

        return intval($value);
    }

    /**
     * Set color image depth
     *
     * @param int $colorImageDepth
     *
     * @return $this
     */
    public function setColorImageDepth($colorImageDepth)
    {
        $this->setArgument(sprintf('-dColorImageDepth=%s', $colorImageDepth));

        return $this;
    }

    /**
     * Get color image downsample threshold
     *
     * @return float
     */
    public function getColorImageDownsampleThreshold()
    {
        $value = $this->getArgumentValue('-dColorImageDownsampleThreshold');
        if (null === $value) {
            return 1.5;
        }

        return floatval($value);
    }

    /**
     * Set color image downsample threshold
     *
     * @param float $colorImageDownsampleThreshold
     *
     * @return $this
     */
    public function setColorImageDownsampleThreshold($colorImageDownsampleThreshold)
    {
        $this->setArgument(sprintf('-dColorImageDownsampleThreshold=%s', $colorImageDownsampleThreshold));

        return $this;
    }

    /**
     * Get color image downsample type
     *
     * @return string
     */
    public function getColorImageDownsampleType()
    {
        $value = $this->getArgumentValue('-dColorImageDownsampleType');
        if (null === $value) {
            return DistillerParametersInterface::IMAGE_DOWNSAMPLE_TYPE_SUBSAMPLE;
        }

        return substr($value, 1);
    }

    /**
     * Set color image downsample type
     *
     * @param string $colorImageDownsampleType
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function setColorImageDownsampleType($colorImageDownsampleType)
    {
        if (!in_array($colorImageDownsampleType, static::$colorImageDownsampleTypeValues)) {
            throw new \InvalidArgumentException('Invalid color image downsample type argument');
        }

        $this->setArgument(sprintf('-dColorImageDownsampleType=/%s', $colorImageDownsampleType));

        return $this;
    }

    /**
     * Get color image filter
     *
     * @return string
     */
    public function getColorImageFilter()
    {
        $value = $this->getArgumentValue('-dColorImageFilter');
        if (null === $value) {
            return DistillerParametersInterface::IMAGE_FILTER_DCT_ENCODE;
        }

        return substr($value, 1);
    }

    /**
     * Set color image filter
     *
     * @param string $colorImageFilter
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function setColorImageFilter($colorImageFilter)
    {
        if (!in_array($colorImageFilter, static::$colorImageFilterValues)) {
            throw new \InvalidArgumentException('Invalid color image filter argument');
        }

        $this->setArgument(sprintf('-dColorImageFilter=/%s', $colorImageFilter));

        return $this;
    }

    /**
     * Get color image resolution
     *
     * @return int
     */
    public function getColorImageResolution()
    {
        $value = $this->getArgumentValue('-dColorImageResolution');
        if (null === $value) {
            return 72;
        }

        return intval($value);
    }

    /**
     * Set color image resolution
     *
     * @param int $colorImageResolution
     *
     * @return $this
     */
    public function setColorImageResolution($colorImageResolution)
    {
        $this->setArgument(sprintf('-dColorImageResolution=%s', $colorImageResolution));

        return $this;
    }

    /**
     * Whether to downsample color images
     *
     * @return bool
     */
    public function isDownsampleColorImages()
    {
        $value = $this->getArgumentValue('-dDownsampleColorImages');
        if (null === $value) {
            return false;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set downsample color images flag
     *
     * @param bool $downsampleColorImages
     *
     * @return $this
     */
    public function setDownsampleColorImages($downsampleColorImages)
    {
        $this->setArgument(sprintf('-dDownsampleColorImages=%s', $downsampleColorImages ? 'true' : 'false'));;

        return $this;
    }

    /**
     * Whether to encode color images
     *
     * @return bool
     */
    public function isEncodeColorImages()
    {
        $value = $this->getArgumentValue('-dEncodeColorImages');
        if (null === $value) {
            return true;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set encode color images flag
     *
     * @param bool $encodeColorImages
     *
     * @return $this
     */
    public function setEncodeColorImages($encodeColorImages)
    {
        $this->setArgument(sprintf('-dEncodeColorImages=%s', $encodeColorImages ? 'true' : 'false'));

        return $this;
    }
}
