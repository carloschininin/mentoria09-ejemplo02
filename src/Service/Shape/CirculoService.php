<?php

declare(strict_types=1);

namespace App\Service\Shape;

final class CirculoService
{
    private const PI = 3.14159265358979323846;
    public function area(float $radio): float
    {
        $result = $radio * $radio * self::PI;

        return $this->redondeo($result);
    }

    public function perimetro(float $radio): float
    {
        $result = 2 *$radio * self::PI;

        return $this->redondeo($result);
    }

    public function redondeo(float $valor): float
    {
        return round($valor, 3);
    }
}