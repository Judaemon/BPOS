import { createStore, createHook } from 'react-sweet-state';

const Store = createStore({
  initialState: { 
    items: [],
  },
  actions: {
    addItemToCart:
      (item) =>
      ({ setState, getState }) => {
        // const currentItems = getState().items;

        // currentItems.push(item);

        // setState({ newItems: currentItems });
        console.log('Add to cart', item);
      },
  },
});

export const useCart = createHook(Store);
