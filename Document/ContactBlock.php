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
use Symfony\Component\Validator\Constraints\Collection;

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
     * @Type\Field(
     *      type="bootstrap_collection",
     *      options={
     *          "type"="email",
     *          "required"=true,
     *          "allow_add"=true,
     *          "allow_delete"=true,
     *          "add_button_text"="Add Recipient",
     *          "delete_button_text"="Delete Recipient",
     *          "error_bubbling"=false
     *      }
     * )
     * @Assert\Count(min=1)
     * @Assert\All({
     *      @Assert\Email
     * })
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