import * as React from 'react';

import { Button } from '@/shadcn/ui/button';
import { Cross2Icon } from '@radix-ui/react-icons';
import { DataTableViewOptions } from '../DataTable/data-table-view-options';
import { Input } from '@/shadcn/ui/input';

export function SaleDataTableToolbar({ table }) {
  const isFiltered = table.getState().columnFilters.length > 0;

  return (
    <div className="flex items-center justify-between">
      <div className="flex flex-1 items-center space-x-2">
        <Input
          placeholder="Search sale..."
          value={table.getColumn('id')?.getFilterValue() ?? ''}
          onChange={(event) => table.getColumn('id')?.setFilterValue(event.target.value)}
          className="h-8 w-[150px] lg:w-[250px]"
        />

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
