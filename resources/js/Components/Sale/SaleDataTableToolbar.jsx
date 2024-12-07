import React, { useEffect, useState } from 'react';
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectLabel,
  SelectTrigger,
  SelectValue,
} from '@/shadcn/ui/select';

import { Button } from '@/shadcn/ui/button';
import { Cross2Icon } from '@radix-ui/react-icons';
import { DataTableViewOptions } from '../DataTable/data-table-view-options';
import { Input } from '@/shadcn/ui/input';

export function SaleDataTableToolbar({ table }) {
  const isFiltered = table.getState().columnFilters.length > 0;

  const currentFilterValue = table.getColumn('created_at')?.getFilterValue();

  const [year, setYear] = useState('');
  const [month, setMonth] = useState('');

  // Extract year and month from the filter value on initial render or filter value change
  useEffect(() => {
    if (currentFilterValue) {
      const startDate = new Date(currentFilterValue.startDate);
      const endDate = new Date(currentFilterValue.endDate);

      setYear(startDate.getFullYear().toString());

      const isFullYearRange =
        startDate.getMonth() === 0 &&
        startDate.getDate() === 1 &&
        endDate.getMonth() === 11 &&
        endDate.getDate() === 31;

      if (isFullYearRange) setMonth('');
    } else {
      setYear('');
      setMonth('');
    }
  }, [currentFilterValue]);

  const handleSaleDateChange = (selectedYear, selectedMonth) => {
    // Only year is selected: Full year range
    if (selectedYear && !selectedMonth) {
      console.log('selectedYear wla year', selectedYear);
      const startDate = new Date(selectedYear, 0, 1); // January 1st
      const endDate = new Date(selectedYear, 11, 31); // December 31st
      table.getColumn('created_at')?.setFilterValue({
        startDate: startDate.toISOString(),
        endDate: endDate.toISOString(),
      });
      return;
    }

    // Both year and month are selected: Month range
    if (selectedYear && selectedMonth) {
      const startDate = new Date(selectedYear, selectedMonth - 1, 1); // First day of the month
      const endDate = new Date(selectedYear, selectedMonth, 0); // Last day of the month
      table.getColumn('created_at')?.setFilterValue({
        startDate: startDate.toISOString(),
        endDate: endDate.toISOString(),
      });
      return;
    }

    table.getColumn('created_at')?.setFilterValue(undefined);
  };

  return (
    <div className="flex items-center justify-between">
      <div className="flex flex-1 items-center space-x-2">
        <Input
          placeholder="Search sale..."
          value={table.getColumn('id')?.getFilterValue() ?? ''}
          onChange={(event) => table.getColumn('id')?.setFilterValue(event.target.value)}
          className="h-8 w-[150px] lg:w-[250px]"
        />

        <Select
          value={year}
          onValueChange={(value) => {
            setYear(value);
            setMonth(undefined); // Reset month to undefined
            handleSaleDateChange(value, undefined);
          }}
        >
          <SelectTrigger className="w-[180px] h-8">
            <SelectValue placeholder="Select year" />
          </SelectTrigger>
          <SelectContent>
            <SelectGroup>
              <SelectLabel>Years</SelectLabel>
              <SelectItem value="2024">2024</SelectItem>
              <SelectItem value="2023">2023</SelectItem>
              <SelectItem value="2022">2022</SelectItem>
            </SelectGroup>
          </SelectContent>
        </Select>

        {year && (
          <Select
            value={month}
            onValueChange={(value) => {
              setMonth(value);
              handleSaleDateChange(year, value);
            }}
          >
            <SelectTrigger className="w-[180px] h-8">
              <SelectValue placeholder="Select Month" />
            </SelectTrigger>
            <SelectContent>
              <SelectGroup>
                <SelectLabel>Month</SelectLabel>
                <SelectItem value="1">January</SelectItem>
                <SelectItem value="2">February</SelectItem>
                <SelectItem value="3">March</SelectItem>
                <SelectItem value="4">April</SelectItem>
                <SelectItem value="5">May</SelectItem>
                <SelectItem value="6">June</SelectItem>
                <SelectItem value="7">July</SelectItem>
                <SelectItem value="8">August</SelectItem>
                <SelectItem value="9">September</SelectItem>
                <SelectItem value="10">October</SelectItem>
                <SelectItem value="11">November</SelectItem>
                <SelectItem value="12">December</SelectItem>
              </SelectGroup>
            </SelectContent>
          </Select>
        )}

        {isFiltered && (
          <Button
            variant="ghost"
            onClick={() => {
              table.resetColumnFilters();
              setYear('');
              setMonth('');
            }}
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
