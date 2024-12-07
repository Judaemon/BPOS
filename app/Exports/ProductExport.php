<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\DefaultValueBinder;

class ProductExport extends DefaultValueBinder implements FromCollection, ShouldAutoSize, WithCustomValueBinder, WithHeadings
{
    protected $status; // can be a DTO

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function bindValue(Cell $cell, $value)
    {
        // Formats the value of the cell
        if (in_array($cell->getColumn(), ['B', 'C'])) {
            // Force the value to be treated as text
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        // Default behavior for other cells
        return parent::bindValue($cell, $value);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $productsQuery = Product::query()
            ->select([
                'id',
                'name',
                // 'image',
                'description',
                'cost',
                'price',
                'stock',
                'status'
            ]);

        if ($this->status) {
            $productsQuery->whereIn('status', $this->status);
        }

        $products = $productsQuery->get();

        return $products;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Description',
            'Cost',
            'Price',
            'Stock',
            'Status'
        ];
    }
}
