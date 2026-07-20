<?php

namespace App\Models\Concerns;

trait HasLegacyUppercaseAttributes
{
    /**
     * Support legacy Firebird-style uppercase attribute access in old Blade views.
     * Example: $barang->KD_BRG maps to MySQL column kd_brg.
     */
    public function getAttribute($key)
    {
        if (is_string($key) && strtoupper($key) === $key) {
            $lowerKey = strtolower($key);

            if (array_key_exists($lowerKey, $this->attributes)) {
                return parent::getAttribute($lowerKey);
            }
        }

        return parent::getAttribute($key);
    }
}
