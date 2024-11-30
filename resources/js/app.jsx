import './bootstrap';
import '../css/app.css';

import { QueryClient, QueryClientProvider } from '@tanstack/react-query';

import { ReactQueryDevtools } from '@tanstack/react-query-devtools';
import { createInertiaApp } from '@inertiajs/react';
import { createRoot } from 'react-dom/client';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

const queryClient = new QueryClient();

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) =>
    resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob('./Pages/**/*.jsx')),
  setup({ el, App, props }) {
    const root = createRoot(el);

    root.render(
      <QueryClientProvider client={queryClient}>
        <App {...props} />
        {/* <ReactQueryDevtools /> */}
      </QueryClientProvider>,
    );
  },
  progress: {
    color: '#4B5563',
  },
});
