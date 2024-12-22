import { Bar, BarChart, CartesianGrid, LabelList, XAxis, YAxis } from 'recharts';
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from '@/shadcn/ui/card';
import { ChartContainer, ChartTooltip, ChartTooltipContent } from '@/shadcn/ui/chart';

import { fetchTrendingProduct } from '@/Api/SalesAPI';
import { useQuery } from '@tanstack/react-query';

export function TrendingProductList() {
  const { data, isLoading, isError } = useQuery({
    queryKey: ['trending-product', 'product-reports'],
    queryFn: () => fetchTrendingProduct(),
    refetchOnWindowFocus: false,
    placeholderData: [],
  });

  if (isLoading) {
    return <div>Loading...</div>;
  }

  if (isError) {
    return <div>Error fetching data</div>;
  }

  // Transform API response into chartConfig and chartData
  const chartConfig = {
    label: {
      color: 'hsl(var(--background))',
    },
  };

  const chartData = data.map((product, index) => {
    const color = `hsl(var(--chart-${index + 1}))`;
    chartConfig[product.name] = {
      label: product.name,
      color,
    };
    return {
      name: product.name,
      quantity: parseInt(product.total_quantity, 10),
      fill: color,
    };
  });

  return (
    <Card className="w-full">
      <CardHeader>
        <CardTitle>Trending Chart</CardTitle>
        <CardDescription>Top-selling products ranked by quantity sold</CardDescription>
      </CardHeader>
      <CardContent>
        <ChartContainer config={chartConfig}>
          <BarChart
            accessibilityLayer
            data={chartData}
            layout="vertical"
            margin={{
              right: 12,
            }}
          >
            <CartesianGrid horizontal={false} height={'100px'} />
            <YAxis
              dataKey="name"
              type="category"
              tickLine={false}
              tickMargin={10}
              axisLine={false}
              tickFormatter={(value) => chartConfig[value]?.label || value}
              hide
            />
            <XAxis dataKey="quantity" type="number" hide />
            <ChartTooltip cursor={false} content={<ChartTooltipContent indicator="line" />} />
            <Bar dataKey="quantity" layout="vertical" radius={4} barSize={40}>
              <LabelList
                dataKey="name"
                position="insideLeft"
                offset={8}
                className="fill-[--color-label]"
                fontSize={12}
              />
              <LabelList
                dataKey="quantity"
                position="right"
                offset={8}
                className="fill-foreground"
                fontSize={12}
              />
            </Bar>
          </BarChart>
        </ChartContainer>
      </CardContent>
    </Card>
  );
}
