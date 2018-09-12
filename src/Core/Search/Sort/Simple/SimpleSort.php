<?php
declare(strict_types=1);

namespace BabenkoIvan\ScoutElasticsearchDriver\Core\Search\Sort\Simple;

use BabenkoIvan\ScoutElasticsearchDriver\Core\Contracts\Search\Sort\Sort;
use Illuminate\Support\Collection as BaseCollection;

final class SimpleSort implements Sort
{
    /**
     * @var BaseCollection
     */
    private $fieldSort;

    public function __construct()
    {
        $this->fieldSort = new BaseCollection();
    }

    /**
     * @param FieldSort $fieldSort
     * @return SimpleSort
     */
    public function addFieldSort(FieldSort $fieldSort): self
    {
        $this->fieldSort->push($fieldSort);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function toArray(): array
    {
        return $this->fieldSort->map(function (FieldSort $fieldSort) {
            return $fieldSort->toArray();
        })->all();
    }
}