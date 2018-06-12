<?php

use App\User;
use App\Service;
use App\Bill;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $users = factory(User::class)->create();
    $users->each(function($user) {

      $services = factory(Service::class, 3)->create();
      $user->services()->saveMany($services);

      $services->each(function($service) {

        $bills = factory(Bill::class, 3)->create();
        $service->bills()->saveMany($bills);

      });
    });
  }
}
