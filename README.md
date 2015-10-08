#Victoire DCMS SocialButtons Bundle
============

This bundle installs the Social Buttons Widget on your Victoire project.
With this widget, you can put some social buttons anywhere linking to your social pages such as

* Your Blog
* Facebook
* Google+
* Linkedin
* Flickr
* Github
* Pinterest
* Tumblr
* Instagram
* Twitter
* Viadeo
* Vimeo
* YouTube
* Any email adress
* RSS Feed

##Set Up Victoire

If you haven't already, you can follow the steps to set up Victoire *[here](https://github.com/Victoire/victoire/blob/master/setup.md)*

##Install the SocialButtons Bundle :

Run the following composer command :

    php composer.phar require friendsofvictoire/socialbuttons-widget

##Reminder

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
