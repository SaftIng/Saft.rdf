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
 * The NodeFactory interface abstracts the creating of new instances of RDF nodes by hiding different implementation
 * details.
 *
 * @api
 *
 * @since 0.1
 */
interface NodeFactory
{
    /**
     * Create a new RDF literal node instance. Details how to create such an instance may differ between different
     * implementations of the NodeFactory.
     *
     * @param string      $value    The value of the literal
     * @param string|Node $datatype The datatype of the literal (NamedNode, optional)
     * @param string      $lang     The language tag of the literal (optional)
     *
     * @return Literal instance of Literal
     *
     * @api
     *
     * @since 0.1
     */
    public function createLiteral($value, $datatype = null, $lang = null);

    /**
     * Create a new RDF named node. Details how to create such an instance may differ between different
     * implementations of the NodeFactory.
     *
     * @param string $uri The URI of the named node
     *
     * @return NamedNode instance of NamedNode
     *
     * @api
     *
     * @since 0.1
     */
    public function createNamedNode($uri);

    /**
     * Create a new RDF blank node. Details how to create such an instance may differ between different
     * implementations of the NodeFactory.
     *
     * @param string $blankId The identifier for the blank node
     *
     * @return BlankNode instance of BlankNode
     *
     * @api
     *
     * @since 0.1
     */
    public function createBlankNode($blankId);

    /**
     * Create a new pattern node, which matches any RDF Node instance.
     *
     * @return Node instance of Node, which acts like an AnyPattern
     *
     * @api
     *
     * @since 0.1
     */
    public function createAnyPattern();

    /**
     * Creates an RDF Node based on a n-triples/n-quads node string.
     *
     * @param string $string N-triples/n-quads node string to use
     *
     * @return Node Node instance, which type must be one of the following: NamedNode, BlankNode, Literal
     *
     * @throws \Exception if no node could be created e.g. because of a syntax error in the node string
     *
     * @api
     *
     * @since 0.1
     */
    public function createNodeFromNQuads($string);

    /**
     * Helper function, which is useful, if you have all the meta information about a Node and want to create
     * the according Node instance.
     *
     * @param string $value    value of the node
     * @param string $type     Can be uri, bnode, var or literal
     * @param string $datatype URI of the datatype (optional)
     * @param string $language Language tag (optional)
     *
     * @return Node Node instance, which type is one of: NamedNode, BlankNode, Literal, AnyPattern
     *
     * @throws \Exception if an unknown type was given
     *
     * @api
     *
     * @since 0.8
     */
    public function createNodeInstanceFromNodeParameter($value, $type, $datatype = null, $language = null);
}
