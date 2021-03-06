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

namespace Saft\Rdf;

/**
 * This interface is common for named nodes according to RDF 1.1
 * {@url http://www.w3.org/TR/rdf11-concepts/#section-IRIs}.
 *
 * @api
 * @api
 *
 * @since 0.1
 */
interface NamedNode extends Node
{
    /**
     * Returns the URI of the node.
     *
     * @return string URI of the node
     *
     * @api
     *
     * @since 0.1
     */
    public function getUri();
}
