<?php

/*
 * This file is part of the Integrated package.
 *
 * (c) e-Active B.V. <integrated@e-active.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Integrated\Bundle\WebsiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Roy Frans <roy@e-active.nl>
 */
class ContactType extends AbstractType
{
    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', ['label' => 'Name']);

        $builder->add('emailAddress', 'email', ['label' => 'Email address']);

        $builder->add('content', 'textarea', ['label' => 'Content', 'required' => false]);

        $builder->add('submit', 'submit');
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'integrated_contact_type';
    }
}