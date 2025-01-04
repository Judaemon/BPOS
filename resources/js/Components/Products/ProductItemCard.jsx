import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from '@/shadcn/ui/card';

import ProductDialog from './ProductDialog';

export const ProductItemCard = ({ product }) => {
  const { name, price, stock, description, image } = product;

  return (
    <ProductDialog
      product={product}
      setProduct={() => {
        console.log('set product');
      }}
      action="updating"
      dialogTrigger={
        <Card className="w-full transition-transform transform hover:scale-105 hover:shadow-lg hover:cursor-pointer">
          <CardHeader>
            <CardTitle>{name}</CardTitle>
            <CardDescription>
              {price} | {stock}
            </CardDescription>
          </CardHeader>
          <CardContent>
            <img src={`${image}`} alt="product" className="rounded-full" />
            <CardFooter>{description}</CardFooter>
          </CardContent>
        </Card>
      }
    />
  );
};
