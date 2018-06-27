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
 * This interface represents a pattern, in some contexts also a variable. Its purpose is to act as some kind of
 * a placeholder, if you dont want to specify a RDF term.
 *
 * It is useful in SPARQL queries, to be used as a variable: SELECT ?s WHERE { ?s ?p ?o }
 */
class AnyPatternImpl implements AnyPattern
{
    /**
     * Checks if this instance is a blank node.
     *
     * @return bool true, if this instance is a blank node, false otherwise
     */
    public function isBlank(): bool
    {
        return false;
    }

    /**
     * Checks if this instance is concrete, which means it does not contain pattern.
     *
     * @return bool true, if this instance is concrete, false otherwise
     */
    public function isConcrete(): bool
    {
        return false;
    }

    /**
     * Checks if this instance is a literal.
     *
     * @return bool true, if it is a literal, false otherwise
     */
    public function isLiteral(): bool
    {
        return false;
    }

    /**
     * Checks if this instance is a named node.
     *
     * @return bool true, if it is a named node, false otherwise
     */
    public function isNamed(): bool
    {
        return false;
    }

    /**
     * Checks if this instance is a pattern. It can either be a pattern or concrete.
     *
     * @return bool true, if this instance is a pattern, false otherwise
     */
    public function isPattern(): bool
    {
        return true;
    }

    /**
     * Check if a given instance of Node is equal to this instance.
     *
     * @param Node $toCompare node instance to check against
     *
     * @return bool true, if both instances are semantically equal, false otherwise
     */
    public function equals(Node $toCompare): bool
    {
        // Only compare, if given instance is an AnyPattern too
        return $toCompare instanceof AnyPatternImpl;
    }

    /**
     * Returns always true, because a pattern is like a placeholder and can be anything.
     *
     * @param Node $toMatch Node instance to apply the pattern on
     *
     * @return bool always true
     */
    public function matches(Node $toMatch): bool
    {
        return true;
    }

    /**
     * This method is ment for getting some kind of human readable string
     * representation of the current node.
     *
     * @return string a human readable string representation of the node
     */
    public function __toString(): string
    {
        return 'ANY';
    }

    /**
     * Transform this Node instance to a n-quads string, if possible.
     *
     * @return string N-quads string representation of this instance
     *
     * @throws \Exception if no n-quads representation is available
     */
    public function toNQuads(): string
    {
        throw new \Exception('The AnyPattern is not valid in NQuads');
    }
}
