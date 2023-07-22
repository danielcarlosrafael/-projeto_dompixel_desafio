<?php

namespace App\Repositories;

class ProductRepository
{
    /**
     * @param array $data
     * @return array
     */
    public function sanitizeDataValues(array $data): array
    {
        $data['price'] = str_replace(',', '', $data['price']);
        return $data;
    }
}
