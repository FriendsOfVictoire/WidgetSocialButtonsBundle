<?php

namespace Victoire\Widget\SocialButtonsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Widget\ListingBundle\Entity\WidgetListingItem;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * WidgetSocialButtonsItem
 *
 * @ORM\Table("vic_widget_socialbuttons_items")
 * @ORM\Entity
 */
class WidgetSocialButtonsItem extends WidgetListingItem
{

    /**
     * @var string
     *
     * @Assert\Url()
     * @ORM\Column(name="url", type="string", length=255)
     */
    protected $url;

    /**
     * @var string
     *
     * @ORM\Column(name="analytics_track_code", type="string", length=255, nullable=true)
     */
    protected $analyticsTrackCode;

    /**
     * @var string
     *
     * @ORM\Column(name="kind", type="string", length=20)
     */
    protected $kind;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="WidgetSocialButtons", inversedBy="socialbuttonsItems")
     * @ORM\JoinColumn(name="listing_id", referencedColumnName="id", onDelete="CASCADE")
     *
     */
    protected $socialbuttons;

    /**
     * Set url
     *
     * @param string $url
     *
     * @return WidgetSocialButtonsItem
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get analyticsTrackCode
     *
     * @return string
     */
    public function getAnalyticsTrackCode()
    {
        return $this->analyticsTrackCode;
    }

    /**
     * Set analyticsTrackCode
     * @param string $analyticsTrackCode
     *
     * @return $this
     */
    public function setAnalyticsTrackCode($analyticsTrackCode)
    {
        $this->analyticsTrackCode = $analyticsTrackCode;

        return $this;
    }

    /**
     * Set kind
     *
     * @param string $kind
     *
     * @return WidgetSocialButtonsItem
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Get kind
     *
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Get fields
     *
     * @return string
     */
    public function getFields()
    {
        return $this->getSocialButtons()->getFields();
    }

    /**
     * Set socialbuttons
     *
     * @param  WidgetSocialButtons     $socialbuttons
     * @return WidgetSocialButtonsItem
     */
    public function setSocialButtons($socialbuttons)
    {
        $this->socialbuttons = $socialbuttons;

        return $this;
    }

    /**
     * Get socialbuttons
     *
     * @return string
     */
    public function getSocialButtons()
    {
        return $this->socialbuttons;
    }

}
