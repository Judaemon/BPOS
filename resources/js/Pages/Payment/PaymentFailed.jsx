import { Button } from '@/shadcn/ui/button';
import { Head } from '@inertiajs/react';

export default function PaymentSuccess({ message }) {
  return (
    <>
      <Head title="Payment failed" />

      <div className="flex justify-center items-center min-h-screen py-12">
        <div className="w-96 mx-5 p-6 space-y-6 bg-white-500 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-center">
          <h1 className="text-3xl font-bold leading-tight tracking-tighter md:text-4xl lg:leading-[1.1]">
            {message}
          </h1>

          <div>
            <p>You can now close this page</p>
          </div>
        </div>
      </div>
    </>
  );
}
