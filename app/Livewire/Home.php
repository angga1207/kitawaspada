<?php

namespace App\Livewire;

use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Home extends Component
{
    use LivewireAlert;

    public function render()
    {
        $counts = [];
        $counts['jenis_usaha'] = DB::table('data_nib')->groupBy('jenis_usaha')->pluck('jenis_usaha')->count() ?? 0;
        $counts['data_kbli'] = DB::table('data_kbli')->count() ?? 0;
        $counts['data_nib'] = DB::table('data_nib')->count() ?? 0;

        $dataChart = LivewireCharts::columnChartModel()
            ->setTitle('Data Izin Usaha')
            ->setAnimated(true)
            ->setLegendVisibility(false)
            ->setYAxisVisible(false)
            ->setXAxisVisible(false);

        $datas = DB::table('data_nib')->groupBy('jenis_usaha')->select('jenis_usaha', DB::raw('count(*) as total'))->get();
        foreach ($datas as $item) {
            $dataChart->addColumn($item->jenis_usaha, $item->total, '#57b9ff');
        }
        $dataChart->setJsonConfig([
            'tooltip.y.formatter' => "(value) => {
                return new Intl.NumberFormat('id-ID').format(value) + ' Data';
            }",
            'plotOptions.column.dataLabels.formatter' => "(value) => {
                return new Intl.NumberFormat('id-ID').format(value);
            }",
            'xAxis.labels.formatter' => "(value) => {
                return new Intl.NumberFormat('id-ID').format(value);
            }",
            'yAxis.labels.formatter' => "(value) => {
                return new Intl.NumberFormat('id-ID').format(value);
            }",

        ]);

        return view('livewire.home', [
            'counts' => $counts,
            'dataChart' => $dataChart,
        ])
            ->layout('components.layouts.app', ['title' => 'Dashboard']);
    }
}
