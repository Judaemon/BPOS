import { capitalizeFirstLetter } from '@/Helpers/StringHelper';
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/shadcn/ui/dialog';

export default function ProductDialog({ product, setProduct, action, dialogTrigger }) {
  console.log(product, action);
  return (
    <Dialog>
      <DialogTrigger>
        {dialogTrigger}
      </DialogTrigger>
      <DialogContent>
        <DialogHeader>
          <DialogTitle>{capitalizeFirstLetter(action)} {product.name}</DialogTitle>
          <DialogDescription>
            [form]
          </DialogDescription>
        </DialogHeader>
      </DialogContent>
    </Dialog>
  );
}
