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
import { useForm } from '@inertiajs/react';

import { Button } from '@/shadcn/ui/button';
import { Input } from '@/shadcn/ui/input';
import { Label } from '@/shadcn/ui/label';
import { cn } from '@/lib/utils';
import { useCart } from '@/hooks/Cart';
import { useMediaQuery } from '@/hooks/use-media-query';
import { useToast } from '@/shadcn/ui/use-toast';

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
          <CheckOutForm onSubmit={() => setOpen(false)} />
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
        <CheckOutForm className="px-4" onSubmit={() => setOpen(false)} />
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
  const { toast } = useToast();

  const { data, setData, post, processing, errors, setError } = useForm({
    payment: 0,
    change: 0,
    products: state.items.map((item) => ({
      ...item,
      product_id: item.id,
    })),
    total_amount: state.total,
  });

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log('submit');

    post('/sales', {
      onSuccess: (response) => {
        toast({
          title: 'Order created',
          description: 'Order has been created successfully',
        });

        actions.checkout(data.payment);
        // onSubmit();
      },
      onError: (error) => {
        setError(error);
      },
    });
  };

  useEffect(() => {
    const change = data.payment - state.total;
    setData('change', data.payment > state.total ? change : 0);
  }, [data.payment, state.total]);

  return (
    <form onSubmit={handleSubmit} className={cn('grid items-start gap-4', className)}>
      <div className="grid gap-2">
        <Label htmlFor="total">Total</Label>
        <Input value={state.total} type="number" id="total" disabled />
      </div>

      <div className="grid gap-2">
        <Label htmlFor="payment">Payment</Label>
        <Input
          value={data.payment}
          onChange={(e) => setData('payment', e.target.value)}
          type="number"
          id="payment"
        />
        {errors.payment && <div>{errors.payment}</div>}
      </div>

      <div>Change: {data.change}</div>
      <Button type="submit">Finalize order</Button>
    </form>
  );
};
