import { createHook, createStore } from 'react-sweet-state';

import { setLoading } from './helper';
import { toast } from '@/shadcn/ui/use-toast';

const Store = createStore({
  initialState: {
    items: [],
    total: 0,
    loading: false,
  },
  actions: {
    addNewItem:
      (item, quantity) =>
      ({ setState, getState }) => {
        const currentItems = [...getState().items];

        if (currentItems.find((i) => i.id === item.id)) {
          toast({
            description: 'Item already exists in cart',
            variant: 'destructive',
          });
          return;
        }
        const currentTotal = getState().total;

        const itemTotal = item.price * quantity;

        currentItems.push({ ...item, quantity, item_total: itemTotal });

        setState({ items: currentItems, total: currentTotal + itemTotal });
      },
    updateQuantity:
      (item, newQuantity) =>
      ({ setState, getState, dispatch }) => {
        if (getState().loading === true) return;

        dispatch(setLoading());

        const currentItems = [...getState().items];
        const itemIndex = currentItems.findIndex((i) => i.id === item.id);
        const currentTotal = getState().total;
        const previousItemTotal = currentItems[itemIndex].item_total;

        const itemNewTotal = item.price * newQuantity;
        const newTotal = currentTotal - previousItemTotal + itemNewTotal;

        currentItems[itemIndex] = {
          ...currentItems[itemIndex],
          quantity: newQuantity,
          item_total: itemNewTotal,
        };

        setState({ items: currentItems, total: newTotal, loading: false });
      },
    removeItem:
      (item) =>
      ({ setState, getState }) => {
        const currentItems = [...getState().items];
        const itemIndex = currentItems.findIndex((i) => i.id === item.id);

        const currentTotal = getState().total;
        const itemTotal = currentItems[itemIndex].item_total;
        currentItems.splice(itemIndex, 1);

        const newTotal = currentTotal - itemTotal;
        setState({ items: currentItems, total: newTotal });
      },
    checkout:
      (payment) =>
      ({ setState, getState }) => {
        setState({ items: [], total: 0 });
      },
  },
});

export const useCart = createHook(Store);
