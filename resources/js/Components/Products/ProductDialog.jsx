import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/shadcn/ui/dialog';
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectLabel,
  SelectTrigger,
  SelectValue,
} from '@/shadcn/ui/select';
import { router, useForm } from '@inertiajs/react';

import { Button } from '@/shadcn/ui/button';
import { Input } from '@/shadcn/ui/input';
import InputError from '../InputError';
import { Label } from '@/shadcn/ui/label';
import { PRODUCT_STATUS } from '@/data/status';
import { capitalizeFirstLetter } from '@/Helpers/StringHelper';
import { useState } from 'react';
import { useToast } from '@/shadcn/ui/use-toast';

export default function ProductDialog({ product, setProduct, action, dialogTrigger }) {
  const { toast } = useToast();
  const [open, setOpen] = useState(false);

  const { data, setData, post, processing, errors, setError, clearErrors, reset } = useForm({
    id: product.id || null,
    name: product.name || '',
    image: product.image || null,
    description: product.description || '',
    cost: product.cost || 0,
    price: product.price || 0,
    stock: product.stock || 0,
    status: product.status || 'active',
  });

  const updateProduct = async () => {
    router.post(`/product/${data.id}`, data, {
      preserveScroll: true,
      onSuccess: () => {
        toast({
          title: 'Product updated',
          description: 'Product has been updated successfully',
        });
        clearErrors();
        setOpen(false);
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

  const createProduct = async () => {
    router.post(`/product`, data, {
      preserveScroll: true,
      onSuccess: () => {
        toast({
          title: 'Product created',
          description: 'Product has been created successfully',
        });
        clearErrors();
        setOpen(false);
      },
      onError: (error) => {
        setError(error);
        toast({
          title: 'Error creating product',
          description: error.message,
          status: 'error',
        });
      },
    });
  };

  function submitProduct(e) {
    e.preventDefault();

    if (action === 'creating') {
      createProduct();
    } else if (action === 'updating') {
      updateProduct();
    }
  }

  return (
    <Dialog open={open} onOpenChange={setOpen}>
      <DialogTrigger>{dialogTrigger}</DialogTrigger>
      <DialogContent className="overflow-y-scroll max-h-[calc(100vh-2rem)] [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">
        <DialogHeader>
          <DialogTitle>
            {capitalizeFirstLetter(action)} {product.name || 'product'}
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
            <Label className="pl-1">Image</Label>
            <img className="m-full object-cover" id="preview" src="" alt="Image Preview" />
            <Input
              className="m-1"
              type="file"
              onChange={(e) => {
                const file = e.target.files[0];

                if (file) {
                  const reader = new FileReader();
                  reader.onload = function (event) {
                    const preview = document.getElementById('preview');
                    preview.src = event.target.result;
                    preview.style.display = 'block';
                  };
                  reader.readAsDataURL(file);
                }
                setData('image', e.target.files[0]);
              }}
              placeholder="Product image"
            />
            <InputError className="mt-2" message={errors.image} />
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
            <Select
              value={data.status}
              onValueChange={(value) => setData('status', value)} // Update status on selection
            >
              <SelectTrigger className="w-full">
                <SelectValue placeholder="Select a status" />
              </SelectTrigger>
              <SelectContent>
                <SelectGroup>
                  <SelectLabel>Status</SelectLabel>
                  {PRODUCT_STATUS.map((status) => (
                    <SelectItem key={status.value} value={status.value}>
                      {status.label}
                    </SelectItem>
                  ))}
                </SelectGroup>
              </SelectContent>
            </Select>
            {errors.status && <InputError className="mt-2" message={errors.status} />}
          </div>

          {(action === 'creating' || action === 'updating') && (
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
