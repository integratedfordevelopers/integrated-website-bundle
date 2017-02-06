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

use Integrated\Common\Channel\Connector\Adapter\ManifestInterface;

class TwitterManifest implements ManifestInterface
{
    const NAME = 'twitter';

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * {@inheritdoc}
     */
    public function getLabel()
    {
        return 'twitter';
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'Configure twitter';
    }

    /**
     * {@inheritdoc}
     */
    public function getVersion()
    {
        return '1.0';
    }
}
