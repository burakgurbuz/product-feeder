<?php

namespace PtteM\ProductFeeder\Formatters;

use DOMDocument;
use DOMElement;
use DOMException;
use PtteM\ProductFeeder\Exceptions\XmlGenerationException;
use PtteM\ProductFeeder\Models\Product;

class XmlFormatter implements IFormatter
{
    /**
     * Formats the given products array to XML.
     *
     * @param array<Product> $products
     * @return string
     * @throws DOMException
     */
    public function format(array $products): string
    {
        $xml = new DOMDocument('1.0', 'utf-8');
        $xml->preserveWhiteSpace = true;
        $xml->formatOutput = true;

        $container = $xml->createElement('products');
        $xml->appendChild($container);

        foreach ($products as $product) {
            $productElement = $this->createProductElement($xml, (array) $product);

            $container->appendChild($productElement);
        }

        $result = $xml->saveXML();

        if ($result === false) {
            throw new XmlGenerationException('Failed to generate XML.');
        }

        return $result;
    }

    /**
     * @param DOMDocument $xml
     * @param array $product
     * @return DOMElement
     * @throws DOMException
     */
    private function createProductElement(DOMDocument $xml, array $product): DOMElement
    {
        $productElement = $xml->createElement('product');

        foreach ($product as $key => $value) {
            $child = $xml->createElement($key);
            $productElement->appendChild($child);

            $text = $xml->createTextNode(htmlspecialchars($value, ENT_XML1));
            $child->appendChild($text);
        }

        return $productElement;
    }

    public function getFileExtension(): string
    {
        return 'xml';
    }
}