<?php

namespace Victoire\Widget\SocialButtonsBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Victoire\Bundle\CoreBundle\Form\WidgetType;
use Victoire\Bundle\WidgetBundle\Entity\Widget;

/**
 * WidgetSocialButtonsType form type
 */
class WidgetSocialButtonsType extends WidgetType
{
    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $namespace = $options['namespace'];
        $entityName = $options['entityName'];
        $mode = $options['mode'];

        //choose form mode
        if ($mode === Widget::MODE_STATIC) {
            //if no entity is given, we generate the static form
            $builder->add(
                'socialbuttonsItems',
                'collection',
                array(
                    'type' => new WidgetSocialButtonsItemType(
                        $entityName,
                        $namespace,
                        $options['widget']
                    ),
                    'allow_add'    => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    "attr"         => array('id' => 'static')
                )
            );
        }

        parent::buildForm($builder, $options);
    }

    /**
     * bind form to WidgetRedactor entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class'         => 'Victoire\Widget\SocialButtonsBundle\Entity\WidgetSocialButtons',
            'widget'             => 'themelistingsocialbuttonsitem',
            'translation_domain' => 'victoire'
        ));
    }

    /**
     * get form name
     *
     * @return string The name of the form
     */
    public function getName()
    {
        return 'victoire_widget_form_socialbuttons';
    }
}
