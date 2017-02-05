<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Customer;
use App\Cleaner;
use App\City;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(CustomersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CleanersTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
        $this->call(CleanersCitiesTableSeeder::class);

    }
}

class CustomersTableSeeder extends Seeder
{

    protected $table = 'customers';

    public function run()
    {

        DB::table($this->table)->truncate();

        $faker = Faker::create();
        $faker->seed(1234);
        $faker->dateTime($max = '2017-02-02T10:10:29+0000');

        foreach (range(0, 55) as $index) 
        {

            DB::table($this->table)->insert([
              
                'first_name' => $faker->firstName,
                'last_name' => $faker->firstName,
                'phone_number' => $faker->phoneNumber,
                'created_at' => $faker->dateTimeBetween('-5 years', '-3 year'),
                'updated_at' => $faker->dateTimeBetween('-2 years', '-1 year'),
               
            ]);
        }
    }

}

class UsersTableSeeder extends Seeder
{

    protected $table = 'users';

    public function run()
    {

        DB::table($this->table)->truncate();

        $faker = Faker::create();
        $faker->seed(1234);
        $faker->dateTime($max = '2017-02-02T10:10:29+0000');
        
        DB::table($this->table)->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminadmin'),
            'created_at' => '2011-06-01 17:33:42+0000',
            'updated_at' => '2015-12-01 09:01:59+0000',
        ]);
        
        DB::table($this->table)->insert([
            'customer_id' => 1,
            'name' => 'Customer',
            'email' => 'test@test.com',
            'password' => bcrypt('12345678'),
            'created_at' => '2011-06-01 17:33:42+0000',
            'updated_at' => '2015-12-01 09:01:59+0000',
        ]);
        
        //$customersIds = Customer::all()->pluck('id')->toArray();
        
        foreach (range(2, 55) as $index) 
        {
            
            DB::table($this->table)->insert([ 
            'customer_id' => $index,    
            'name' => $faker->firstName,
            'email' => $faker->email,
            'password' => bcrypt('12345678'),
            'created_at' => $faker->dateTimeBetween('-5 years', '-3 year'),
            'updated_at' => $faker->dateTimeBetween('-2 years', '-1 year'),
            ]);
        }
    }
    
}

class CitiesTableSeeder extends Seeder
{

    protected $table = 'cities';

    public function run()
    {

        DB::table($this->table)->truncate();

        $faker = Faker::create();
        $faker->seed(1234);
        $faker->dateTime($max = '2017-02-02T10:10:29+0000');
        
        foreach (range(0, 9) as $index) 
        {
            
            DB::table($this->table)->insert([    
            'name' => $faker->city,
            'created_at' => $faker->dateTimeBetween('-5 years', '-3 year'),
            'updated_at' => $faker->dateTimeBetween('-2 years', '-1 year'),
            ]);
        }
    }
}

class CleanersTableSeeder extends Seeder
{

    protected $table = 'cleaners';

    public function run()
    {

        DB::table($this->table)->truncate();

        $faker = Faker::create();
        $faker->seed(1234);
        $faker->dateTime($max = '2017-02-02T10:10:29+0000');
        
        foreach (range(0, 55) as $index) 
        {

            DB::table($this->table)->insert([
              
                'first_name' => $faker->firstName,
                'last_name' => $faker->firstName,
                'quality_score' => $faker->randomDigitNotNull,
                'created_at' => $faker->dateTimeBetween('-5 years', '-3 year'),
                'updated_at' => $faker->dateTimeBetween('-2 years', '-1 year'),
               
            ]);
        }
    }
} 

class BookingsTableSeeder extends Seeder
{

    protected $table = 'bookings';

    public function run()
    {

        DB::table($this->table)->truncate();

        $faker = Faker::create();
        $faker->seed(1234);
        $faker->dateTime($max = '2017-02-02T10:10:29+0000');
        
        $customersIds = Customer::all()->pluck('id')->toArray();
        $cleanersIds = Cleaner::all()->pluck('id')->toArray();
        
        foreach (range(0, 55) as $index) 
        {

            DB::table($this->table)->insert([
              
                'date' => $faker->dateTimeBetween('-5 years', '-3 year'),
                'customer_id' => $faker->randomElement($customersIds),
                'cleaner_id' => $faker->randomElement($cleanersIds),
                'created_at' => $faker->dateTimeBetween('-5 years', '-3 year'),
                'updated_at' => $faker->dateTimeBetween('-2 years', '-1 year'),
               
            ]);
        }
    }
}

class CleanersCitiesTableSeeder extends Seeder
{

    protected $table = 'cleaners_cities';

    public function run()
    {

        DB::table($this->table)->truncate();
        $faker = Faker::create();
        $faker->seed(1234);
        $faker->dateTime($max = '2016-10-05T10:10:29+0000');

        $cleaners = Cleaner::all();
        $citiesIds = City::all()->pluck('id')->toArray();


        foreach ($cleaners as $cleaner) 
        {

           DB::table($this->table)->insert([
                'cleaner_id' => $cleaner->id,
                'city_id' => $faker->randomElement($citiesIds),
               'created_at' => $faker->dateTimeBetween('-5 years', '-3 year'),
               'updated_at' => $faker->dateTimeBetween('-2 years', '-1 year'),
            ]); 
               
        }

    }

}
