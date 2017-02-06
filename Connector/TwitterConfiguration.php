<?php

/*
 * This file is part of the Integrated package.
 *
 * (c) e-Active B.V. <integrated@e-active.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Integrated\Bundle\WebsiteBundle\Connector;

use Integrated\Common\Channel\Connector\ConfigurationInterface;

/**
 * @author Ger Jan van den Bosch <gerjan@e-active.nl>
 */
class TwitterConfiguration implements ConfigurationInterface
{
    const FORM = 'integrated_twitter_configuration';

    /**
     * {@inheritdoc}
     */
    public function getForm()
    {
        return self::FORM;
    }
}
