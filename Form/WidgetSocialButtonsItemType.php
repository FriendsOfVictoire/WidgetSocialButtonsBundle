<?php

namespace Victoire\Widget\SocialButtonsBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Bundle\CoreBundle\Form\EntityProxyFormType;
use Victoire\Bundle\CoreBundle\Form\WidgetType;

class WidgetSocialButtonsItemType extends WidgetType
{
    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     *
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //choose form mode
        if (!empty($options['businessEntityId']) || $options['businessEntityId'] === null) {
            //if no entity is given, we generate the static form
            $builder
                ->add('title', null, [
                    'label' => 'form.listing.socialButtons.title.label', ])
                ->add('url', null, [
                    'label' => 'form.listing.socialButtons.url.label', ])
                ->add('kind', ChoiceType::class, [
                    'label'   => 'form.listing.socialButtons.kind.label',
                    'choices' => [
                        'Blog'                                      => 'blog',
                        'Email'                                     => 'email',
                        'Facebook'                                  => 'facebook',
                        'form.listing.socialButtons.rss.label'      => 'rss',
                        'Google+'                                   => 'gplus',
                        'Linkedin'                                  => 'linkedin',
                        'Flickr'                                    => 'flickr',
                        'Github'                                    => 'github',
                        'Instagram'                                 => 'instagram',
                        'Periscope'                                 => 'periscope',
                        'Pinterest'                                 => 'pinterest',
                        'Slideshare'                                => 'slideshare',
                        'Tumblr'                                    => 'tumblr',
                        'Twitter'                                   => 'twitter',
                        'Viadeo'                                    => 'viadeo',
                        'Vimeo'                                     => 'vimeo',
                        'YouTube'                                   => 'youtube',
                        'form.listing.socialButtons.website.label'  => 'website',
                        'form.listing.socialButtons.phone.label'    => 'tel',
                        'form.listing.socialButtons.location.label' => 'location',
                        ],
                ])
                ->add('analyticsTrackCode', null, [
                    'label'          => 'form.link_type.analyticsTrackCode.label',
                    'required'       => false,
                    'attr'           => [
                        'placeholder'    => 'form.link_type.analyticsTrackCode.placeholder',
                        'vic_help_block' => 'form.link_type.analyticsTrackCode.help_block',
                    ],
                ]);
        } else {
            //else, Type class will embed a EntityProxyType for given entity
            $builder
                ->add('position')
                ->add('entity', EntityProxyFormType::class, [
                    'business_entity_id' => $options['businessEntityId'],
                    'namespace'          => $options['namespace'],
                    'widget'             => $options['widget'],
                ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\SocialButtonsBundle\Entity\WidgetSocialButtonsItem',
            'widget'             => null,
            'translation_domain' => 'victoire',
        ]);
    }
}
