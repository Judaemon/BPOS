import { Dialog, DialogContent, DialogTrigger } from '@/shadcn/ui/dialog';
import {
  Form,
  FormControl,
  FormDescription,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from '@/shadcn/ui/form';

import { Button } from '@/shadcn/ui/button';
import { Input } from '@/shadcn/ui/input';
import React from 'react';
import { toast } from '@/shadcn/ui/use-toast';
import { updateUserPassword } from '@/Api/UserAPI';
import { useForm } from 'react-hook-form';
import { useState } from 'react';
import { z } from 'zod';
import { zodResolver } from '@hookform/resolvers/zod';

const UpdatePasswordSchema = z
  .object({
    password: z.string().min(6, { message: 'Password must be at least 6 characters long' }),
    password_confirmation: z
      .string()
      .min(6, { message: 'Password confirmation must be at least 6 characters long' }),
  })
  .refine((data) => data.password === data.password_confirmation, {
    message: 'Passwords must match',
    path: ['password_confirmation'], // Focus error on the confirmation field
  });

const UpdatePasswordForm = ({ user, handleSuccessful }) => {
  const form = useForm({
    resolver: zodResolver(UpdatePasswordSchema),
    defaultValues: {
      password: '',
      password_confirmation: '',
    },
  });

  const onSubmit = async (data) => {
    try {
      const response = await updateUserPassword(data, user.id);

      form.reset();
      handleSuccessful();

      toast({
        title: 'Password updated',
        description: response.message,
      });
    } catch (errors) {
      console.log(errors.response);

      if (errors.response?.data?.errors) {
        Object.entries(errors.response.data.errors).forEach(([field, messages]) => {
          form.setError(field, { type: 'server', message: messages[0] });
        });
      }

      toast({
        description: errors.response.data.message,
        variant: 'destructive',
      });
    }
  };

  return (
    <Form {...form}>
      <form onSubmit={form.handleSubmit(onSubmit)} className="space-y-6">
        <FormField
          control={form.control}
          name="password"
          render={({ field }) => (
            <FormItem>
              <FormLabel>Password</FormLabel>
              <FormControl>
                <Input placeholder="Password" type="password" {...field} />
              </FormControl>
              <FormMessage />
            </FormItem>
          )}
        />
        <FormField
          control={form.control}
          name="password_confirmation"
          render={({ field }) => (
            <FormItem>
              <FormLabel>Confirm Password</FormLabel>
              <FormControl>
                <Input placeholder="Confirm Password" type="password" {...field} />
              </FormControl>
              <FormMessage />
            </FormItem>
          )}
        />
        <Button type="submit">Update Password</Button>
      </form>
    </Form>
  );
};

export default UpdatePasswordForm;

export const UpdatePasswordDialog = ({ user }) => {
  const [open, setOpen] = useState(false);

  return (
    <Dialog open={open} onOpenChange={setOpen}>
      <DialogTrigger asChild>
        <Button onClick={() => setOpen(true)}>Reset Password</Button>
      </DialogTrigger>
      <DialogContent>
        <UpdatePasswordForm
          user={user}
          handleSuccessful={() => {
            setOpen(false);
          }}
        />
      </DialogContent>
    </Dialog>
  );
};
