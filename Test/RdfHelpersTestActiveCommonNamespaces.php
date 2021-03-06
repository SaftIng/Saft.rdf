<?php

/*
 * This file is part of Saft.
 *
 * (c) Konrad Abicht <hi@inspirito.de>
 * (c) Natanael Arndt <arndt@informatik.uni-leipzig.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Saft\Rdf\Test;

use Saft\Rdf\CommonNamespaces;
use Saft\Rdf\RdfHelpers;

class RdfHelpersTestActiveCommonNamespaces extends RdfHelpersTest
{
    public function setUp()
    {
        parent::setUp();

        $this->fixture = new RdfHelpers(new CommonNamespaces());
    }
}
