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

use Saft\Rdf\StatementIteratorFactory;

abstract class AbstractStatementIteratorFactoryTest extends TestCase
{
    /**
     * @return StatementIteratorFactory
     */
    abstract public function newInstance();

    /*
     * Tests createStatementIteratorFromArray
     */

    public function testCreateStatementIteratorFromArrayArrayGiven()
    {
        $this->fixture = $this->newInstance();
        $parameter = [];

        $this->assertClassOfInstanceImplements(
            $this->fixture->createStatementIteratorFromArray($parameter),
            'Saft\Rdf\StatementIterator'
        );
    }

    public function testCreateStatementIteratorFromArrayInvalidParameterGiven()
    {
        $this->setExpectedException('\Exception');

        $parameter = ['invalid parameter'];
        $this->newInstance()->createStatementIteratorFromArray($parameter);
    }
}
