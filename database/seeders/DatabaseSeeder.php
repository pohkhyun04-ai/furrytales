<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Create the three configurable root login accounts without duplicating
     * existing users. Each account also receives the related role record
     * required by the current login controller.
     */
    public function run(): void
    {
        $this->seedUserAccount(
            id: env('ROOT_USER_ID', 'FTUSER001'),
            name: env('ROOT_USER_NAME', 'FurryTales User'),
            email: env('ROOT_USER_EMAIL', 'user@furrytales.local'),
            phone: env('ROOT_USER_PHONE', '01111111111'),
            password: env('ROOT_USER_PASSWORD', 'User@123'),
            type: 'customer',
            relation: 'customer',
        );

        $staff = $this->seedUserAccount(
            id: env('ROOT_STAFF_ID', 'FTSTAFF001'),
            name: env('ROOT_STAFF_NAME', 'FurryTales Staff'),
            email: env('ROOT_STAFF_EMAIL', 'staff@furrytales.local'),
            phone: env('ROOT_STAFF_PHONE', '01111111112'),
            password: env('ROOT_STAFF_PASSWORD', 'Staff@123'),
            type: 'staff',
            relation: 'staff',
        );

        $rider = $this->seedUserAccount(
            id: env('ROOT_RIDER_ID', 'FTRIDER001'),
            name: env('ROOT_RIDER_NAME', 'FurryTales Rider'),
            email: env('ROOT_RIDER_EMAIL', 'rider@furrytales.local'),
            phone: env('ROOT_RIDER_PHONE', '01111111113'),
            password: env('ROOT_RIDER_PASSWORD', 'Rider@123'),
            type: 'staff',
            relation: 'rider',
        );

        $outletId = null;
        foreach (['outlet', 'outlets'] as $outletTable) {
            if (Schema::hasTable($outletTable)) {
                $outletColumns = Schema::getColumnListing($outletTable);
                $outletKey = in_array('OutletID', $outletColumns, true) ? 'OutletID' : (in_array('outletID', $outletColumns, true) ? 'outletID' : null);
                if ($outletKey) {
                    $outletId = DB::table($outletTable)->value($outletKey);
                    if ($outletId !== null) {
                        break;
                    }
                }
            }
        }

        $this->ensureRoleRecord('staff', 'StaffID', $staff->userID, [
            'StaffID' => env('ROOT_STAFF_ID', 'FTSTAFF001'),
            'staffID' => env('ROOT_STAFF_ID', 'FTSTAFF001'),
            'UserID' => $staff->userID,
            'userID' => $staff->userID,
            'OutletID' => $outletId,
            'outletID' => $outletId,
            'Role' => env('ROOT_STAFF_ROLE', 'Manager'),
            'roleID' => env('ROOT_STAFF_ROLE', 'Manager'),
        ]);

        $this->ensureRoleRecord('rider', 'riderID', $rider->userID, [
            'riderID' => env('ROOT_RIDER_ID', 'FTRIDER001'),
            'userID' => $rider->userID,
            'postCode' => env('ROOT_RIDER_POSTCODE', '47100'),
        ]);
    }

    private function seedUserAccount(
        string $id,
        string $name,
        string $email,
        string $phone,
        string $password,
        string $type,
        string $relation
    ): User {
        $userColumns = Schema::getColumnListing('users');
        $attributes = [
            'name' => $name,
            'phoneNo' => $phone,
            'password' => Hash::make($password),
            'user_type' => $type,
            'status' => 'active',
        ];
        $attributes = array_filter(
            $attributes,
            fn ($value, $column) => in_array($column, $userColumns, true),
            ARRAY_FILTER_USE_BOTH
        );

        $user = User::firstOrCreate(['email' => $email], $attributes);

        if ($relation === 'customer') {
            $this->ensureRoleRecord('customers', 'customerID', $user->userID, [
                'customerID' => $id,
                'userID' => $user->userID,
                'address' => 'FurryTales root test account',
            ]);
        }

        return $user;
    }

    /**
     * Insert only columns that exist in this database. This accommodates
     * the project's historical differences in table/column naming.
     */
    private function ensureRoleRecord(string $table, string $keyColumn, int $userId, array $candidateValues): void
    {
        if (!Schema::hasTable($table)) {
            throw new \RuntimeException("Required table [{$table}] is missing. Run the project's migrations first.");
        }

        $columns = Schema::getColumnListing($table);
        $values = [];

        foreach ($candidateValues as $column => $value) {
            if (in_array($column, $columns, true)) {
                $values[$column] = $value;
            }
        }

        $userColumn = in_array('UserID', $columns, true) ? 'UserID' : (in_array('userID', $columns, true) ? 'userID' : null);
        if (!$userColumn) {
            throw new \RuntimeException("Could not find a user ID column in [{$table}].");
        }

        $existing = DB::table($table)->where($userColumn, $userId)->first();
        if ($existing) {
            return;
        }

        if (!in_array($keyColumn, $columns, true)) {
            $alternateKey = $keyColumn === 'StaffID' && in_array('staffID', $columns, true) ? 'staffID' : $keyColumn;
            if (!in_array($alternateKey, $columns, true)) {
                throw new \RuntimeException("Could not find the expected account ID column in [{$table}].");
            }
            $keyColumn = $alternateKey;
        }

        $values['created_at'] = now();
        $values['updated_at'] = now();

        DB::table($table)->insert($values);
    }
}
