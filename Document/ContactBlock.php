<?php

/*
 * This file is part of the Integrated package.
 *
 * (c) e-Active B.V. <integrated@e-active.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Integrated\Bundle\WebsiteBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Integrated\Common\Form\Mapping\Annotations as Type;
use Symfony\Component\Validator\Constraints as Assert;

use Integrated\Bundle\BlockBundle\Document\Block\Block;

/**
 * @author Roy Frans <roy@e-active.nl>
 *
 * @ODM\Document
 * @Type\Document("Contact block")
 */
class ContactBlock extends Block
{
    /**
     * @var array
     * @ODM\Hash
     * @Type\Field(type="text", options={"required"=true})
     * @Assert\NotBlank(message="U bent verplicht tenminste een e-mailadres in te vullen")
     * @Assert\Email(message="Deze waarde is geen geldig e-mailadres", strict="true")
     */
    protected $recipients = [];

    /**
     * @return array
     */
    public function getRecipients(){
        return $this->recipients;
    }

    /**
     * @param array $recipients
     * @return $this
     */
    public function setRecipients($recipients){
        $this->recipients = $recipients;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'contact';
    }
}