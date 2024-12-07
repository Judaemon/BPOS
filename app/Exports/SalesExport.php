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
    protected $dateRangeFilter; // can be a DTO

    public function __construct($dateRangeFilter)
    {
        $this->dateRangeFilter = $dateRangeFilter;
    }

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
        $salesQuery = Sale::query()
            ->with(['seller']);


        if ($this->dateRangeFilter) {
            $salesQuery->whereBetween('created_at', [$this->dateRangeFilter['startDate'], $this->dateRangeFilter['endDate']]);
        }

        $sales = $salesQuery->get()
            ->map(function ($sale) {
                return [
                    'Sale ID' => $sale->id,
                    'Receipt Number' => $sale->receipt_number,
                    'Seller Name' => $sale->seller->name,
                    'Customer Name' => $sale->customer_name,
                    'Total Amount' => $sale->total_amount,
                    'Payment' => $sale->payment_received,
                    'Sale Date' => $sale->created_at,
                    'Payment Method' => $sale->payment_method,
                    'Status' => $sale->status
                ];
            });

        return $sales;
    }

    public function headings(): array
    {
        return [
            'Sale ID',
            'Receipt Number',
            'Seller Name',
            'Customer Name',
            'Total Amount',
            'Payment',
            'Sale Date',
            'Payment Method',
            'Status'
        ];
    }
}
