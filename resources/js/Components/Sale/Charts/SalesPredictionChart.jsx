import { Bar, BarChart, CartesianGrid, XAxis } from 'recharts';
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/shadcn/ui/card';
import { ChartContainer, ChartTooltip, ChartTooltipContent } from '@/shadcn/ui/chart';
import { formatDateToReadable, getMonthName } from '@/Helpers/StringHelper';

import { TrendingUp } from 'lucide-react';

const chartData = [
  { month: 'January', desktop: 186, mobile: 80 },
  { month: 'February', desktop: 305, mobile: 200 },
  { month: 'March', desktop: 237, mobile: 120 },
  { month: 'April', desktop: 73, mobile: 190 },
  { month: 'May', desktop: 209, mobile: 130 },
  { month: 'June', desktop: 214, mobile: 140 },
];

const chartConfig = {
  desktop: {
    label: 'Desktop',
    color: '#2563eb',
  },
  mobile: {
    label: 'Mobile',
    color: '#60a5fa',
  },
};

export function SalesPredictionChart({ data = [] }) {
  console.log('test', data);

  return (
    <Card>
      <CardHeader>
        <CardTitle>Predicted Sales Summary</CardTitle>
        <CardDescription>{formatDateToReadable(data[0].month)} to {formatDateToReadable(data[data.length - 1].month)}</CardDescription>
      </CardHeader>
      <CardContent>
        <ChartContainer config={chartConfig} className="h-[200px] w-full">
          <BarChart accessibilityLayer data={data}>
            <CartesianGrid vertical={false} />
            <XAxis
              dataKey="month"
              tickLine={false}
              tickMargin={10}
              axisLine={false}
            />
            <ChartTooltip content={<ChartTooltipContent />} />
            <Bar dataKey="predicted_sales" fill="var(--color-desktop)" radius={4} />
            <Bar dataKey="predicted_quantity" fill="var(--color-mobile)" radius={4} />
            <Bar dataKey="predicted_revenue" fill="var(--color-mobile)" radius={4} />
          </BarChart>
        </ChartContainer>
      </CardContent>
      <CardFooter className="flex-col items-start gap-2 text-sm">
        <div className="leading-none text-muted-foreground">
          Showing predicted total sales from {getMonthName(data[0].month)} to {getMonthName(data[data.length - 1].month)}.
        </div>
      </CardFooter>
    </Card>
  );
}
