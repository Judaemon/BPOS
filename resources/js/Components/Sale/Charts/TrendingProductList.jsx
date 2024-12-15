import { Bar, BarChart, XAxis, YAxis } from 'recharts';
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
  const chartConfig = data.reduce((config, product, index) => {
    const color = `hsl(var(--chart-${index + 1}))`;

    config[product.name] = {
      label: product.name,
      color,
    };
    return config;
  }, {});

  const chartData = data.map((product) => ({
    name: product.name,
    quantity: parseInt(product.total_quantity, 10),
    fill: chartConfig[product.name]?.color,
  }));

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
              left: 0,
            }}
          >
            <YAxis
              dataKey="name"
              type="category"
              tickLine={false}
              tickMargin={10}
              axisLine={false}
              tickFormatter={(value) => chartConfig[value]?.label}
            />
            <XAxis dataKey="quantity" type="number" hide />
            <ChartTooltip cursor={false} content={<ChartTooltipContent hideLabel />} />
            <Bar dataKey="quantity" layout="vertical" radius={5} />
          </BarChart>
        </ChartContainer>
      </CardContent>
    </Card>
  );
}
