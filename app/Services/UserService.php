<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected UserRepository $userRepository
    )
    {
        //
    }

    public function create(array $data, $request)
    {
        // Declare $user outside transaction to return it later
        $user = null;

        DB::transaction(function () use ($data, $request, &$user) {
            // 1 Create user
            $data['password'] = Hash::make($data['password']);
            $user = $this->userRepository->create([
                'first_name' => $data['first_name'],
                'last_name'  => $data['last_name'],
                'email'      => $data['email'],
                'username'   => $data['username'],
                'password'   => $data['password'],
                'participation_id' => $data['participation_id'] ?? null,
            ]);

            // 2 Prepare company data
            $companyData = [
                'company_name' => $data['company_name'] ?? null,
                'company_address_line' => $data['company_address_line'] ?? null,
                'company_site' => $data['company_site'] ?? null,
                'company_year_strablished' => $data['company_year_strablished'] ?? null,
                'city_id' => $data['city_id'] ?? null,
                'region_id' => $data['region_id'] ?? null,
                'country_id' => $data['country_id'] ?? null,
            ];

            // 3 Handle company brochure upload
            if ($request->hasFile('company_brochure')) {
                $path = $request->file('company_brochure')->store('brochures', 'public');
                $companyData['brochure_path'] = $path;

                // 4 Save file path in user_files table
                $user->files()->create([
                    'path' => $path,
                ]);
            }

            // 5 Create company linked to user
            $user->company()->create($companyData);
        });

        return $user;
    }

}
