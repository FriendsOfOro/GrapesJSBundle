<?php
namespace HackOro\GrapesJSBundle\Form\Type;

use Oro\Bundle\FormBundle\Form\Type\OroEntitySelectOrCreateInlineType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GrapesJSPageSelectType extends AbstractType
{
    const NAME = 'hackoro_grapesjs_page_select';

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'autocomplete_alias' => GrapesJSPageType::class,
                'create_form_route' => 'hackoro_grapesjs_page_create',
                'configs' => [
                    'placeholder' => 'hackoro.grapes_js.page.choose',
                ],
                'attr' => [
                    'class' => 'hackoro-grapesjs-page-select',
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return self::NAME;
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return OroEntitySelectOrCreateInlineType::class;
    }
}
