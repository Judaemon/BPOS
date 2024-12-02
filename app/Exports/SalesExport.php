<?php

namespace App\Exports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\DefaultValueBinder;

class SalesExport extends DefaultValueBinder implements FromCollection, ShouldAutoSize, WithCustomValueBinder, WithHeadings
{
    public function bindValue(Cell $cell, $value)
    {
        // Formats the value of the cell
        // if (in_array($cell->getColumn(), ['B', 'C'])) {
        //     // Force the value to be treated as text
        //     $cell->setValueExplicit($value, DataType::TYPE_STRING);

        //     return true;
        // }

        // Default behavior for other cells
        return parent::bindValue($cell, $value);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $sales = Sale::query()
            ->select([
                'id',
                'total_amount',
                'payment_received',
                'receipt_number',
                'customer_name',
                'payment_method',
                'status'
            ])
            ->get();

        return $sales;
    }

    public function headings(): array
    {
        return [
            'Sale ID',
            'Total Amount',
            'Payment',
            'Receipt Number',
            'Customer Name',
            'Payment Method',
            'Status'
        ];
    }
}
