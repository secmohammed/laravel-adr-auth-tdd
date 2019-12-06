<?php

use App\Users\Domain\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'slug' => 'master',
            'name' => 'master',
            'permissions' => [
                'view-post',
                'update-post',
                'delete-post',
                'create-post',
                'approve-post',
                'create-tag',
                'update-tag',
                'delete-tag',
                'view-tag',
                'view-comment',
                'update-comment',
                'delete-comment',
                'create-comment',
                'approve-comment',
                'view-reply',

            ],
        ]);
        Role::create([
            'slug' => 'admin',
            'name' => 'Administrator',
            'permissions' => [
                'view-post',
                'update-post',
                'delete-post',
                'create-post',
                'approve-post',
                'create-tag',
                'update-tag',
                'delete-tag',

            ],
        ]);
        Role::create([
            'slug' => 'moderator',
            'name' => 'Moderator',
            'permissions' => [
                'create-post' => true,
                'view-post' => true,
                'delete-post' => true,
                'update-post' => true,
                'approve-post' => false,
                'create-tag' => true,
                'update-tag' => true,
                'view-tag' => true,
                'delete-tag' => true,
                'create-comment' => true,
                'update-comment' => true,
                'delete-comment' => true,
                'view-comment' => true,
                'approve-comment' => true,
                'create-reply' => true,
                'update-reply' => true,
                'delete-reply' => true,
                'view-reply' => true,
                'approve-reply' => true,
                'upgrade-user' => false,
                'downgrade-user' => false,
            ],
        ]);
        Role::create([
            'name' => 'Normal User',
            'slug' => 'user',
            'permissions' => [
                'create-post' => false,
                'view-post' => true,
                'update-post' => false,
                'delete-post' => false,
                'approve-post' => false,
                'create-tag' => false,
                'view-tag' => false,
                'update-tag' => false,
                'delete-tag' => false,
                'create-comment' => true,
                'update-comment' => true,
                'view-comment' => true,
                'delete-comment' => true,
                'approve-comment' => false,
                'create-reply' => true,
                'update-reply' => true,
                'view-reply' => true,
                'delete-reply' => true,
                'approve-reply' => false,
                'upgrade-user' => false,
                'downgrade-user' => false,
            ],
        ]);
    }
}
