import { createStore, createHook } from 'react-sweet-state';

const Store = createStore({
  initialState: { count: 0 },
  actions: {
    increment:
      () =>
      ({ setState, getState }) => {
        const currentCount = getState().count;
        setState({ count: currentCount + 1 });
      },
  },
});

export const useCounter = createHook(Store);
