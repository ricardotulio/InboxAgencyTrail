<?php

namespace InboxAgency\Cart\Service;

use InboxAgency\Catalog\Entity\ProductInterface;

interface CartServiceInterface
{
    public function getCart();

    public function addProduct(ProductInterface $product, $qty);

    public function removeProduct($productId);

    public function hasItems();

    public function cleanCart();
}
