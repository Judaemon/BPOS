import * as React from 'react';
import { Input } from '@/shadcn/ui/input';
import { Button } from '@/shadcn/ui/button';
import { PRODUCT_STATUS } from '@/data/status';
import { Cross2Icon } from '@radix-ui/react-icons';
import { DataTableViewOptions } from '../DataTable/data-table-view-options';
import { DataTableFacetedFilter } from '../DataTable/data-table-faceted-filter';

export function DataTableToolbar({ table }) {
  const isFiltered = table.getState().columnFilters.length > 0;

  return (
    <div className="flex items-center justify-between">
      <div className="flex flex-1 items-center space-x-2">
        <Input
          placeholder="Filter product..."
          value={table.getColumn('name')?.getFilterValue() ?? ''}
          onChange={(event) => table.getColumn('name')?.setFilterValue(event.target.value)}
          className="h-8 w-[150px] lg:w-[250px]"
        />

        {table.getColumn('status') && (
          <DataTableFacetedFilter
            column={table.getColumn('status')}
            title="status"
            options={PRODUCT_STATUS}
          />
        )}

        {isFiltered && (
          <Button
            variant="ghost"
            onClick={() => table.resetColumnFilters()}
            className="h-8 px-2 lg:px-3"
          >
            Reset
            <Cross2Icon className="ml-2 h-4 w-4" />
          </Button>
        )}
      </div>
      <DataTableViewOptions table={table} />
    </div>
  );
}
