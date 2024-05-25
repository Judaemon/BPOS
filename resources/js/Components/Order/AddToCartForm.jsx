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
import { React, useState } from 'react';

import { Button } from '@/shadcn/ui/button';
import { Input } from '@/shadcn/ui/input';
import { Label } from '@/shadcn/ui/label';
import { cn } from '@/lib/utils';
import { useCart } from '@/hooks/Cart';
import { useMediaQuery } from '@/hooks/use-media-query';

export function AddToCartDrawerDialog({ item }) {
  const [open, setOpen] = useState(false);
  const isDesktop = useMediaQuery('(min-width: 768px)');

  const titleText = item.name ?? 'Item name not found';

  if (isDesktop) {
    return (
      <Dialog open={open} onOpenChange={setOpen}>
        <DialogTrigger asChild>
          <Button>Add to Cart</Button>
        </DialogTrigger>
        <DialogContent className="sm:max-w-[425px]">
          <DialogHeader>
            <DialogTitle>{titleText}</DialogTitle>
            <DialogDescription>
              Add this item to your cart. You can adjust the quantity later.
            </DialogDescription>
          </DialogHeader>
          <AddToCartForm item={item} onSubmit={setOpen} />
        </DialogContent>
      </Dialog>
    );
  }

  return (
    <Drawer open={open} onOpenChange={setOpen}>
      <DrawerTrigger asChild>
        <Button>Add to Cart</Button>
      </DrawerTrigger>
      <DrawerContent>
        <DrawerHeader className="text-left">
          <DrawerTitle>{titleText}</DrawerTitle>
          <DrawerDescription>
            Add this item to your cart. You can adjust the quantity later. Make changes to your
          </DrawerDescription>
        </DrawerHeader>
        <AddToCartForm item={item} className="px-4" onSubmit={setOpen} />
        <DrawerFooter className="pt-2">
          <DrawerClose asChild>
            <Button variant="outline">Cancel</Button>
          </DrawerClose>
        </DrawerFooter>
      </DrawerContent>
    </Drawer>
  );
}

const AddToCartForm = ({ item, className, onSubmit }) => {
  const [quantity, setQuantity] = useState(1);
  const [state, actions] = useCart();
  const handleSubmit = (e) => {
    actions.addNewItem(item, quantity);
    onSubmit(false);
  };

  return (
    <div className={cn('grid items-start gap-4', className)}>
      <div className="grid gap-2">
        <Label htmlFor="quantity">Quantity</Label>
        <Input
          value={quantity}
          onChange={(e) => setQuantity(e.target.value)}
          type="number"
          id="quantity"
          min={1}
          max={item.stock}
        />
      </div>
      <Button onClick={() => handleSubmit()}>Add to Cart</Button>
    </div>
  );
};
