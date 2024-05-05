import React from 'react';

import { capitalizeFirstLetter } from '@/Helpers/StringHelper';
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/shadcn/ui/dialog';
// import { useForm } from 'react-hook-form';
import { zodResolver } from '@hookform/resolvers/zod';
import { z } from 'zod';
import {
  Form,
  FormControl,
  FormDescription,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from '@/shadcn/ui/form';
import { Input } from '@/shadcn/ui/input';
import { Button } from '@/shadcn/ui/button';
import { useToast } from '@/shadcn/ui/use-toast';
import { useForm } from '@inertiajs/react';
import { Label } from '@/shadcn/ui/label';

// const ProductSchema = z.object({
//   id: z.number().int().min(1),
//   name: z.string().min(3).max(255),
//   description: z.string().min(5).max(200),
//   cost: z.number().min(0),
//   price: z.number().min(0).max(9999999999999),
//   stock: z.number().int().min(0).max(9999999999999),
//   status: z.enum(['available', 'out_of_stock', 'enabled', 'disabled']),
// });

export default function ProductDialog({ product, setProduct, action, dialogTrigger }) {
  const { toast } = useToast();

  const { data, setData, post, processing, errors } = useForm({
    id: product.id,
    name: product.name,
    description: product.description,
    cost: product.cost,
    price: product.price,
    stock: product.stock,
    status: product.status,
  });

  function submitProduct(e) {
    e.preventDefault();
    toast({
      title: 'You submitted the following values:',
      description: (
        <pre className="mt-2 w-[340px] rounded-md bg-slate-950 p-4">
          <code className="text-white">{JSON.stringify(data, null, 2)}</code>
        </pre>
      ),
    });
  }

  console.log(product, action);
  return (
    <Dialog>
      <DialogTrigger>{dialogTrigger}</DialogTrigger>
      <DialogContent>
        <DialogHeader>
          <DialogTitle>
            {capitalizeFirstLetter(action)} {product.name}
          </DialogTitle>
          <DialogDescription>
            <form onSubmit={submitProduct} className="w-2/3 mt-2 space-y-6">
              <div>
                <Label className="pl-1">Name</Label>
                <Input
                  className="m-1"
                  value={data.name}
                  onChange={(e) => setData('name', e.target.value)}
                  placeholder="Product name"
                />
              </div>

              <div>
                <Label className="pl-1">Description</Label>
                <Input
                  className="m-1"
                  value={data.description}
                  onChange={(e) => setData('description', e.target.value)}
                  placeholder="Product name"
                />
              </div>

              <div>
                <Label className="pl-1">Cost</Label>
                <Input
                  className="m-1"
                  value={data.cost}
                  onChange={(e) => setData('cost', e.target.value)}
                  placeholder="Product cost"
                  type="number"
                />
              </div>

              <div>
                <Label className="pl-1">Price</Label>
                <Input
                  className="m-1"
                  value={data.price}
                  onChange={(e) => setData('price', e.target.value)}
                  placeholder="Product price"
                  type="number"
                />
              </div>

              <div>
                <Label className="pl-1">Stock</Label>
                <Input
                  className="m-1"
                  value={data.stock}
                  onChange={(e) => setData('stock', e.target.value)}
                  placeholder="Product price"
                  type="number"
                />
              </div>

              <div>
                <Label className="pl-1">Status</Label>
                <Input
                  className="m-1"
                  value={data.status}
                  onChange={(e) => setData('status', e.target.value)}
                  placeholder="Product price"
                />
              </div>

              <Button type="submit">Submit</Button>
            </form>
          </DialogDescription>
        </DialogHeader>
      </DialogContent>
    </Dialog>
  );
}
