import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/shadcn/ui/table';
import {
  flexRender,
  getCoreRowModel,
  getFacetedRowModel,
  getFacetedUniqueValues,
  getFilteredRowModel,
  getPaginationRowModel,
  getSortedRowModel,
  useReactTable,
} from '@tanstack/react-table';

import { Button } from '@/shadcn/ui/button';
import { DataTablePagination } from '../DataTable/data-table-pagination';
import { SaleDataTableToolbar } from './SaleDataTableToolbar';
import { fetchExportSales } from '@/Api/SalesAPI';
import { useState } from 'react';

export function SaleDataTable({ columns, data }) {
  const [sorting, setSorting] = useState([{ id: 'id', desc: true }]);
  const [rowSelection, setRowSelection] = useState({});
  const [columnFilters, setColumnFilters] = useState([]);
  const [columnVisibility, setColumnVisibility] = useState({
    products: false,
    payment_received: false,
  });

  const table = useReactTable({
    data,
    columns,
    state: {
      sorting,
      columnFilters,
      columnVisibility,
      rowSelection,
    },
    enableRowSelection: true,
    onSortingChange: setSorting,
    onRowSelectionChange: setRowSelection,
    onColumnFiltersChange: setColumnFilters,
    onColumnVisibilityChange: setColumnVisibility,
    getCoreRowModel: getCoreRowModel(),
    getFilteredRowModel: getFilteredRowModel(),
    getPaginationRowModel: getPaginationRowModel(),
    getSortedRowModel: getSortedRowModel(),
    getFacetedRowModel: getFacetedRowModel(),
    getFacetedUniqueValues: getFacetedUniqueValues(),
  });

  return (
    <div className="space-y-4">
      <div className="flex justify-between gap-2">
        <div className="w-full">
          <SaleDataTableToolbar table={table} />
        </div>

        <ExportSalesButton table={table} />
      </div>

      <div className="rounded-md border">
        <Table>
          <TableHeader>
            {table.getHeaderGroups().map((headerGroup) => (
              <TableRow key={headerGroup.id}>
                {headerGroup.headers.map((header) => {
                  return (
                    <TableHead key={header.id}>
                      {header.isPlaceholder
                        ? null
                        : flexRender(header.column.columnDef.header, header.getContext())}
                    </TableHead>
                  );
                })}
              </TableRow>
            ))}
          </TableHeader>
          <TableBody>
            {table.getRowModel().rows?.length ? (
              table.getRowModel().rows.map((row) => (
                <TableRow key={row.id} data-state={row.getIsSelected() && 'selected'}>
                  {row.getVisibleCells().map((cell) => (
                    <TableCell key={cell.id}>
                      {flexRender(cell.column.columnDef.cell, cell.getContext())}
                    </TableCell>
                  ))}
                </TableRow>
              ))
            ) : (
              <TableRow>
                <TableCell colSpan={columns.length} className="h-24 text-center">
                  No results.
                </TableCell>
              </TableRow>
            )}
          </TableBody>
        </Table>
      </div>

      <DataTablePagination table={table} />
    </div>
  );
}

const ExportSalesButton = ({ table }) => {
  const handleExport = async () => {
    const response = await fetchExportSales({
      test: 'test',
    });

    // Extract the filename from the Content-Disposition header
    const contentDisposition = response.headers['content-disposition'];
    const fileNameMatch = /filename="?([^"]+)"?/.exec(contentDisposition);
    const fileName = fileNameMatch ? fileNameMatch[1] : 'file.xlsx'; // Default filename if extraction fails

    // Create a link element
    const url = window.URL.createObjectURL(new Blob([response.data]));
    const link = document.createElement('a');
    link.href = url;
    link.setAttribute('download', fileName); // Use the dynamic filename
    document.body.appendChild(link);
    link.click();
    link.remove();
  };

  return (
    <Button onClick={handleExport} size="sm" variant="default" className="outline-none">
      Export
    </Button>
  );
};