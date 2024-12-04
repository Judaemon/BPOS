import { Area, AreaChart, Bar, BarChart, CartesianGrid, XAxis } from 'recharts';
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
import { getMonthName, getYear } from '@/Helpers/StringHelper';

import { fetchMonthlySalesReport } from '@/Api/SalesAPI';
import { useQuery } from '@tanstack/react-query';
import { useState } from 'react';

const chartConfig = {
  total_sales: {
    label: 'Total Sales',
    color: 'hsl(var(--chart-1))',
  },
  total_quantity: {
    label: 'Total Quantity',
    color: 'hsl(var(--chart-2))',
  },
  total_revenue: {
    label: 'Total Quantity',
    color: 'hsl(var(--chart-3))',
  },
};

export function MonthlySalesChart() {
  const [year, setYear] = useState(new Date().getFullYear().toString());
  const [month, setMonth] = useState((new Date().getMonth() + 1).toString());

  const formatDate = (year, month) => {
    const formattedDate = new Intl.DateTimeFormat('en-US', {
      year: 'numeric',
      month: 'long',
    }).format(new Date(year, month - 1));

    return formattedDate;
  };

  const { data, isLoading, isError } = useQuery({
    queryKey: ['monthlySales', { year, month }],
    queryFn: () => fetchMonthlySalesReport({ year, month }),
    enabled: !!month && !!year,
    refetchOnWindowFocus: false,
  });

  if (isLoading) {
    return <div>Loading...</div>;
  }

  if (isError) {
    return <div>Error fetching data</div>;
  }

  return (
    <Card>
      <div className="flex gap-2 p-4 pb-0">
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

        <Select value={month} onValueChange={(value) => setMonth(value)}>
          <SelectTrigger className="w-[180px]">
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
      </div>

      <CardHeader>
        <CardTitle>Monthly Sale Chart</CardTitle>
        <CardDescription>
          {getMonthName(data[0].day)} {getYear(data[0].day)}
        </CardDescription>
      </CardHeader>
      <CardContent>
        <ChartContainer config={chartConfig} className="h-[200px] w-full">
          <AreaChart accessibilityLayer data={data} margin={{ left: 12, right: 12 }}>
            <CartesianGrid vertical={false} />
            <XAxis
              dataKey="day"
              tickLine={false}
              axisLine={false}
              tickMargin={8}
              tickFormatter={(value) => value.slice(8, 10)}
            />
            <ChartTooltip cursor={false} content={<ChartTooltipContent />} />
            <defs>
              <linearGradient id="fill_total_sales" x1="0" y1="0" x2="0" y2="1">
                <stop offset="5%" stopColor="var(--color-total_sales)" stopOpacity={0.8} />
                <stop offset="95%" stopColor="var(--color-total_sales)" stopOpacity={0.1} />
              </linearGradient>
              <linearGradient id="fill_total_revenue" x1="0" y1="0" x2="0" y2="1">
                <stop offset="5%" stopColor="var(--color-total_revenue)" stopOpacity={0.8} />
                <stop offset="95%" stopColor="var(--color-total_revenue)" stopOpacity={0.1} />
              </linearGradient>
            </defs>
            <Area
              dataKey="total_sales"
              type="natural"
              fill="url(#fill_total_sales)"
              fillOpacity={0.4}
              stroke="var(--color-total_sales)"
              stackId="a"
            />
            <Area
              dataKey="total_revenue"
              type="natural"
              fill="url(#fill_total_revenue)"
              fillOpacity={0.4}
              stroke="var(--color-total_revenue)"
              stackId="a"
            />
          </AreaChart>
        </ChartContainer>
      </CardContent>
      <CardFooter className="flex-col items-start gap-2 text-sm">
        <div className="leading-none text-muted-foreground">
          Showing total sales, quantity, and revenue for the month of {getMonthName(data[0].day)}
        </div>
      </CardFooter>
    </Card>
  );
}
