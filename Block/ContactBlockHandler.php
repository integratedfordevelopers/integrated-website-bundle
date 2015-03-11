<?php

/*
 * This file is part of the Integrated package.
 *
 * (c) e-Active B.V. <integrated@e-active.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Integrated\Bundle\WebsiteBundle\Block;

use Integrated\Bundle\BlockBundle\Block\BlockHandler;
use Integrated\Bundle\WebsiteBundle\Form\Type\ContactType;
use Integrated\Common\Block\BlockInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @author Roy Frans <roy@e-active.nl>
 */
class ContactBlockHandler extends BlockHandler
{
    /**
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * @param FormFactoryInterface $formFactory
     */
    function __construct(FormFactoryInterface $formFactory, RequestStack $requestStack){
        $this->formFactory = $formFactory;
        $this->requestStack = $requestStack;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(BlockInterface $block)
    {
        $currentRequest = $this->requestStack->getCurrentRequest();

        var_dump($currentRequest->request->get('integrated_contact_type')['name']);

        $form = $this->formFactory->create(new ContactType());

        return $this->render([
            'block'      => $block,
            'form'      => $form->createView(),
        ]);
    }
}