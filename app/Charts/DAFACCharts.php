<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class DAFACCharts
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        return $this->chart->donutChart()
            ->setTitle('Total Number of Assistance Provided')
            ->setSubtitle('Year 2023.')
            ->addData([20, 24, 30])
            ->setLabels(['Player 7', 'Player 10', 'Player 9']);
    }
}
