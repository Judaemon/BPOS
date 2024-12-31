import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/shadcn/ui/card';
import { Table, TableBody, TableCell, TableHeader, TableRow } from '@/shadcn/ui/table';

import { fetchOutOfStockProduct } from '@/Api/ProductAPI';
import { useQuery } from '@tanstack/react-query';

const OutOfStockTable = () => {
  const { data, isLoading, isError } = useQuery({
    queryKey: ['products', 'out-of-stock'],
    queryFn: () => fetchOutOfStockProduct({}),
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
    <Card className="w-full overflow-y-auto">
      <CardHeader>
        <CardTitle>Out of Stock Products</CardTitle>
        <CardDescription>Products that are almost out of stock</CardDescription>
      </CardHeader>
      <CardContent>
        <Table>
          <TableHeader>
            <TableRow>
              <TableCell>Name</TableCell>
              <TableCell>Quantity</TableCell>
            </TableRow>
          </TableHeader>
          <TableBody>
            {data.products.map((product) => (
              <TableRow key={product.id}>
                <TableCell>{product.name}</TableCell>
                <TableCell>{product.stock}</TableCell>
              </TableRow>
            ))}
          </TableBody>
        </Table>
      </CardContent>
    </Card>
  );
};

export default OutOfStockTable;
