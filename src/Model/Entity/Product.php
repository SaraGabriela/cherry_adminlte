<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property string $price
 * @property string|null $image
 * @property string $presentation
 * @property string $brand
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\DecorationProduct[] $decoration_products
 * @property \App\Model\Entity\FillingProduct[] $filling_products
 * @property \App\Model\Entity\PreparationProduct[] $preparation_products
 * @property \App\Model\Entity\PurchaseProduct[] $purchase_products
 * @property \App\Model\Entity\RawProduct[] $raw_products
 * @property \App\Model\Entity\WarehouseProduct[] $warehouse_products
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'category_id' => true,
        'price' => true,
        'image' => true,
        'presentation' => true,
        'brand' => true,
        'category' => true,
        'decoration_products' => true,
        'filling_products' => true,
        'preparation_products' => true,
        'purchase_products' => true,
        'raw_products' => true,
        'warehouse_products' => true,
    ];
}
