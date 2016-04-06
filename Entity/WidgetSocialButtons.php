<?php

namespace Victoire\Widget\SocialButtonsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Widget\ListingBundle\Entity\WidgetListing;

/**
 * ThemeList SocialButtons.
 *
 * @ORM\Table("vic_widget_socialbuttons")
 * @ORM\Entity
 */
class WidgetSocialButtons extends WidgetListing
{
    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="WidgetSocialButtonsItem", mappedBy="socialbuttons", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $socialbuttonsItems;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->socialbuttonsItems = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set socialbuttonsItems.
     *
     * @param array $socialbuttonsItems
     *
     * @return WidgetListing
     */
    public function setSocialButtonsItems($socialbuttonsItems)
    {
        foreach ($socialbuttonsItems as $socialbuttonsItem) {
            $socialbuttonsItem->setSocialButtons($this);
        }
        $this->socialbuttonsItems = $socialbuttonsItems;

        return $this;
    }

    /**
     * Add socialbuttonsItems.
     *
     * @param \Victoire\Widget\ListingBundle\Entity\WidgetListingItem $socialbuttonsItems
     *
     * @return WidgetListing
     */
    public function addSocialButtonsItem(WidgetSocialButtonsItem $socialbuttonsItem)
    {
        $socialbuttonsItem->setSocialButtons($this);
        $this->socialbuttonsItems[] = $socialbuttonsItem;

        return $this;
    }

    /**
     * Remove socialbuttonsItems.
     *
     * @param \Victoire\Widget\ListingBundle\Entity\WidgetListingItem $socialbuttonsItems
     */
    public function removeSocialButtonsItem(WidgetSocialButtonsItem $socialbuttonsItems)
    {
        //set item as orphan
        $socialbuttonsItems->setSocialButtons(null);

        $this->socialbuttonsItems->removeElement($socialbuttonsItems);
    }

    /**
     * Get socialbuttonsItems.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSocialButtonsItems()
    {
        return $this->socialbuttonsItems;
    }
}
