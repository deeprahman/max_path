<?php
declare(strict_types=1);
namespace App;

/**
 * Suppose we have a n x n grid
 * Find a path from upper left corner to the lower right corner in such a way that we can move only down and right.
 * Each squeare contains a positive square and the path should be constructed so that the sum of the value along the path is as large as possible.
 */
final class MaxSum
{


    private $sum;
    private $A;
    public static function main()
    {
        $m = new Self();
        $max=$m->findMaxSum(3);
        echo PHP_EOL. " Max sum is ". $max;
    }

    public function findMaxSum($n)
    {
        
        $this->initArray($n);
        print_r($this->A);
        $this->initSumArray($n);

        for($i=0; $i < $n; $i++){
            for ($j = 0; $j < $n; $j++){
                $max = max($this->getSum($i,$j-1), $this->getSum($i-1,$j)) + $this->getArrayValue($i,$j);
                $this->setSum($i,$j,$max);

            }
        }
        return $this->getSum($n-1,$n-1);
        
    }


    private function initArray($n)
    {
        $array=[[]];
        for($i=0; $i < $n; $i++){
            for ($j = 0; $j < $n; $j++){
                $array[$i][$j] = rand(1,16);
            }
        }
        $this->A = $array;
    }

    private function initSumArray(int $n)
    {
        $sum= [[]];
        for($i=0; $i < $n; $i++){
            for ($j = 0; $j < $n; $j++){
                $sum[$i][$j] = NULL;
            }
        }
        $this->sum = $sum;
    }

    private function getSum(int $x, int $y):int
    {
        if(!isset($this->sum[$x][$y])){
            return 0;
        }
        return $this->sum[$x][$y];
    }

    private function setSum(int $x, int $y, $v)
    {
        $this->sum[$x][$y] = $v;
        return $this;
    }

    private function getArrayValue(int $x, int $y):int{
        return $this->A[$x][$y];
    }
}