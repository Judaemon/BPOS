import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from '@/shadcn/ui/card';

export const ProductItemCard = ({ product }) => {
  const { name, price, stock, description, image } = product;

  return (
    <Card className="w-full">
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
  );
};
