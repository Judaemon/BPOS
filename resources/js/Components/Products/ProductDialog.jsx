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
import { Input } from '@/shadcn/ui/input';
import { Button } from '@/shadcn/ui/button';
import { useToast } from '@/shadcn/ui/use-toast';
import { router, useForm } from '@inertiajs/react';
import { Label } from '@/shadcn/ui/label';
import InputError from '../InputError';

export default function ProductDialog({ product, setProduct, action, dialogTrigger }) {
  const { toast } = useToast();

  const { data, setData, post, processing, errors, setError, clearErrors } = useForm({
    id: product.id,
    name: product.name,
    description: product.description,
    cost: product.cost,
    price: product.price,
    stock: product.stock,
    status: product.status,
  });

  const updateProduct = async () => {
    router.patch(`/product/${product.id}`, data, {
      preserveScroll: true,
      onSuccess: () => {
        toast({
          title: 'Product updated',
          description: 'Product has been updated successfully',
        });
        clearErrors();
      },
      onError: (error) => {
        setError(error);
        toast({
          title: 'Error updating product',
          description: error.message,
          status: 'error',
        });
      },
    });
  };

  function submitProduct(e) {
    e.preventDefault();

    updateProduct();
  }

  console.log(product, action);
  return (
    <Dialog>
      <DialogTrigger>{dialogTrigger}</DialogTrigger>
      <DialogContent className="overflow-y-scroll max-h-[calc(100vh-2rem)] [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">
        <DialogHeader>
          <DialogTitle>
            {capitalizeFirstLetter(action)} {product.name}
          </DialogTitle>
        </DialogHeader>
        <form onSubmit={submitProduct} className="mt-2 space-y-6">
          <div>
            <Label className="pl-1">Name</Label>
            <Input
              className="m-1"
              value={data.name}
              onChange={(e) => setData('name', e.target.value)}
              placeholder="Product name"
            />
            <InputError className="mt-2" message={errors.name} />
          </div>

          <div>
            <Label className="pl-1">Description</Label>
            <Input
              className="m-1"
              value={data.description}
              onChange={(e) => setData('description', e.target.value)}
              placeholder="Product name"
            />
            <InputError className="mt-2" message={errors.description} />
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
            <InputError className="mt-2" message={errors.cost} />
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
            <InputError className="mt-2" message={errors.price} />
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
            <InputError className="mt-2" message={errors.stock} />
          </div>

          <div>
            <Label className="pl-1">Status</Label>
            <Input
              className="m-1"
              value={data.status}
              onChange={(e) => setData('status', e.target.value)}
              placeholder="Product price"
            />
            <InputError className="mt-2" message={errors.status} />
          </div>

          {action === 'create' && (
            <div className="flex justify-end">
              <Button className="" disabled={processing} type="submit">
                Submit
              </Button>
            </div>
          )}
        </form>
      </DialogContent>
    </Dialog>
  );
}
