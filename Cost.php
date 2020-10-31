<?php

class Cost
{
    public $cost = 0.5;
    public $distance = 0;

    public function setCost(float $cost): self
    {
        $this->cost = $cost;
        return $this;
    }

    public function setDistance(float $distance): self
    {
        $this->distance = $distance;
        return $this;
    }

    private function getDiscount(float $percentage): float
    {
        return $this->cost * $percentage / 100;
    }

    public function get(): float
    {
        $totalCost = 0;

        if ($this->distance <= 999) {
            $totalCost += $this->cost * $this->distance;
        } elseif ($this->distance > 999) {
            $totalCost += $this->cost * 999;
        }

        if ($this->distance >= 1000 && $this->distance <= 1999) {
            $totalCost += $this->getDiscount(10) * ($this->distance - 999);
        } elseif ($this->distance > 1999) {
            $totalCost += $this->getDiscount(10) * 1000;
        }

        if ($this->distance >= 2000) {
            $totalCost += $this->getDiscount(20) * ($this->distance - 1999);
        }

        return round($totalCost, 2);
    }
}
