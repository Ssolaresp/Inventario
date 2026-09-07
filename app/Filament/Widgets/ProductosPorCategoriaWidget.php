<?php

namespace App\Filament\Widgets;

use App\Models\Categoria;
use Filament\Widgets\ChartWidget;

class ProductosPorCategoriaWidget extends ChartWidget
{
    protected ?string $heading = 'Productos por Categoría';

    protected function getData(): array
    {
        $categorias = Categoria::withCount('productos')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Productos',
                    'data' => $categorias->pluck('productos_count'),
                    'backgroundColor' => [
                        '#F59E0B', '#10B981', '#3B82F6', '#EF4444', '#8B5CF6',
                    ],
                ],
            ],
            'labels' => $categorias->pluck('nombre'),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
