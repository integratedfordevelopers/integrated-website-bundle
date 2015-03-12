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
use Integrated\Bundle\WebsiteBundle\Document\ContactBlock;
use Swift_Mailer;

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
     * @var Swift_Mailer
     */
    protected $mailer;

    /**
     * @param FormFactoryInterface $formFactory
     */
    function __construct(FormFactoryInterface $formFactory, RequestStack $requestStack, Swift_Mailer $mailer){
        $this->formFactory = $formFactory;
        $this->requestStack = $requestStack;
        $this->mailer = $mailer;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(BlockInterface $block)
    {
        $mailed = false;

        $currentRequest = $this->requestStack->getCurrentRequest();

        if($integratedContactType = $currentRequest->request->get('integrated_contact_type')){
            $name = $integratedContactType['name'];
            $emailAddress = $integratedContactType['emailAddress'];
            $content = $integratedContactType['content'];
            $recipients = $block->getRecipients();

            if(isset($name) && isset($emailAddress) && isset($content) && isset($recipients) && is_array($recipients) && count($recipients) > 0){
                $numSuccess = $this->sendMail($recipients, $name, $emailAddress, $content);
                $mailed = true;
            }
        }

        $form = $this->formFactory->create(new ContactType());

        return $this->render([
            'block'  => $block,
            'form'   => $form->createView(),
            'mailed' => $mailed,
        ]);
    }

    /**
     * @param $recipients
     * @param $name
     * @param $emailAddress
     * @param $content
     * @return integer
     */
    protected function sendMail($recipients, $name, $emailAddress, $content){
        $message = \Swift_Message::newInstance()
            ->setSubject('Contactformulier GIM')
            ->setFrom(array($emailAddress => $name))
            ->setTo(array_values($recipients))
            ->setBody($content);

        return $this->mailer->send($message);
    }
}