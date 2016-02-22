<?php

namespace Victoire\Widget\SocialButtonsBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Bundle\CoreBundle\Form\WidgetType;
use Victoire\Bundle\WidgetBundle\Entity\Widget;

/**
 * WidgetSocialButtonsType form type.
 */
class WidgetSocialButtonsType extends WidgetType
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
        if ($options['mode'] === Widget::MODE_STATIC) {
            //if no entity is given, we generate the static form
            $builder->add('socialbuttonsItems', CollectionType::class, [
                    'entry_type' => WidgetSocialButtonsItemType::class,
                    'entry_options' => [
                        'businessEntityId' => $options['businessEntityId'],
                        'namespace'        => $options['namespace'],
                        'widget'           => $options['widget']
                    ],
                    'allow_add'    => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'attr'         => ['id' => 'static'],
                ]
            );
        }

        parent::buildForm($builder, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\SocialButtonsBundle\Entity\WidgetSocialButtons',
            'widget'             => 'themelistingsocialbuttonsitem',
            'translation_domain' => 'victoire',
        ]);
    }
}
