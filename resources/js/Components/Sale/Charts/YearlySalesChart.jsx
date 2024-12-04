import { Bar, BarChart, CartesianGrid, XAxis } from 'recharts';
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from '@/shadcn/ui/card';
import { ChartContainer, ChartTooltip, ChartTooltipContent } from '@/shadcn/ui/chart';
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectLabel,
  SelectTrigger,
  SelectValue,
} from '@/shadcn/ui/select';
import { formatDateToReadable, getMonthName } from '@/Helpers/StringHelper';

import { TrendingUp } from 'lucide-react';
import { fetchYearlySalesReport } from '@/Api/SalesAPI';
import { useQuery } from '@tanstack/react-query';
import { useState } from 'react';

const chartConfig = {
  total_sales: {
    label: 'Total Sales',
    color: "hsl(var(--chart-1))",
  },
  total_quantity: {
    label: 'Total Quantity',
    color: "hsl(var(--chart-2))",
  },
  total_revenue: {
    label: 'Total Quantity',
    color: "hsl(var(--chart-3))",
  },
};

export function YearlySalesChart() {
  const [year, setYear] = useState(new Date().getFullYear().toString());

  const { data, isLoading, isError } = useQuery({
    queryKey: ['yearlySales', { year }],
    queryFn: () => fetchYearlySalesReport({ year }),
    enabled: !!year,
    refetchOnWindowFocus: false,
    placeholderData: (previousData, previousQuery) => previousData,
  });

  if (isLoading) {
    return <div>Loading...</div>;
  }

  if (isError) {
    return <div>Error fetching data</div>;
  }

  return (
    <Card>
      <div className="p-4 pb-0">
        <Select value={year} onValueChange={(value) => setYear(value)}>
          <SelectTrigger className="w-[180px]">
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
      </div>

      <CardHeader>
        <CardTitle>Yearly Sale Chart</CardTitle>
        <CardDescription>
          {formatDateToReadable(data[0].month)} to{' '}
          {formatDateToReadable(data[data.length - 1].month)}
        </CardDescription>
      </CardHeader>
      <CardContent>
        <ChartContainer config={chartConfig} className="h-[200px] w-full">
          <BarChart accessibilityLayer data={data}>
            <CartesianGrid vertical={false} />
            <XAxis dataKey="month" tickLine={false} tickMargin={10} axisLine={false} />
            <ChartTooltip content={<ChartTooltipContent />} />
            <Bar dataKey="total_sales" fill="var(--color-total_sales)" radius={4} />
            <Bar dataKey="total_quantity" fill="var(--color-total_quantity)" radius={4} />
            <Bar dataKey="total_revenue" fill="var(--color-total_revenue)" radius={4} />
          </BarChart>
        </ChartContainer>
      </CardContent>
      <CardFooter className="flex-col items-start gap-2 text-sm">
        <div className="leading-none text-muted-foreground">
          Showing total sales, quantity, and revenue from {getMonthName(data[0].month)} to {' '}
          {getMonthName(data[data.length - 1].month)}.
        </div>
      </CardFooter>
    </Card>
  );
}
