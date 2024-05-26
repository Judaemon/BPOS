import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/shadcn/ui/dialog';
import {
  Drawer,
  DrawerClose,
  DrawerContent,
  DrawerDescription,
  DrawerFooter,
  DrawerHeader,
  DrawerTitle,
  DrawerTrigger,
} from '@/shadcn/ui/drawer';
import { React, useEffect, useState } from 'react';
import { router, useForm } from '@inertiajs/react';

import { Button } from '@/shadcn/ui/button';
import { Input } from '@/shadcn/ui/input';
import { Label } from '@/shadcn/ui/label';
import { cn } from '@/lib/utils';
import { useCart } from '@/hooks/Cart';
import { useMediaQuery } from '@/hooks/use-media-query';

export function CheckOutFormDrawerDialog() {
  const [open, setOpen] = useState(false);
  const isDesktop = useMediaQuery('(min-width: 768px)');

  const titleText = 'Check out';

  if (isDesktop) {
    return (
      <Dialog open={open} onOpenChange={setOpen}>
        <DialogTrigger asChild>
          <Button>Check out</Button>
        </DialogTrigger>
        <DialogContent className="sm:max-w-[425px]">
          <DialogHeader>
            <DialogTitle>{titleText}</DialogTitle>
            <DialogDescription>Fill out the form below to check out.</DialogDescription>
          </DialogHeader>
          <CheckOutForm onSubmit={setOpen} />
        </DialogContent>
      </Dialog>
    );
  }

  return (
    <Drawer open={open} onOpenChange={setOpen}>
      <DrawerTrigger asChild>
        <Button>Check out</Button>
      </DrawerTrigger>
      <DrawerContent>
        <DrawerHeader className="text-left">
          <DrawerTitle>{titleText}</DrawerTitle>
          <DrawerDescription>Fill out the form below to check out.</DrawerDescription>
        </DrawerHeader>
        <CheckOutForm className="px-4" onSubmit={setOpen} />
        <DrawerFooter className="pt-2">
          <DrawerClose asChild>
            <Button variant="outline">Cancel</Button>
          </DrawerClose>
        </DrawerFooter>
      </DrawerContent>
    </Drawer>
  );
}

const CheckOutForm = ({ className, onSubmit }) => {
  const [state, actions] = useCart();

  const { data, setData, post, processing, errors, transform } = useForm({
    payment: 0,
    change: 0,
    products: state.items.map((item) => {
      return {
        ...item,
        product_id: item.id,
      };
    }),
    total_amount: state.total,
  });

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log('submit');

    router.post('/sales', data);
  };

  useEffect(() => {
    console.log('effect');
    const change = data.payment - state.total;

    if (data.payment > state.total) {
      setData('change', change);
    }

    if (data.payment <= state.total) {
      setData('change', 0);
    }
  }, [data.payment, state.total]);

  return (
    <form onSubmit={handleSubmit} className={cn('grid items-start gap-4', className)}>
      <div className="grid gap-2">
        <Label htmlFor="quantity">Total</Label>
        <Input value={state.total} type="number" id="quantity" disabled />
      </div>

      <div className="grid gap-2">
        <Label htmlFor="quantity">Payment</Label>
        <Input
          value={data.payment}
          onChange={(e) => setData('payment', e.target.value)}
          type="number"
          id="quantity"
        />
      </div>

      <div>Change: {data.change}</div>
      <Button type="submit">Finalize order</Button>
    </form>
  );
};
