Victoire SocialButtons Bundle
============

Need to add some social buttons/links in a victoire website ?

First you need to have a valid Symfony2 Victoire edition.
Then you just have to run the following composer command :

    php composer.phar require friendsofvictoire/socialbuttons-widget

Do not forget to add the bundle in your AppKernel !

    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                ...
                new Victoire\Widget\SocialButtonsBundle\VictoireWidgetSocialButtonsBundle(),
            );

            return $bundles;
        }
    }
