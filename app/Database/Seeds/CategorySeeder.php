<?php


namespace App\Database\Seeds;


use App\Models\CategoryModel;

class CategorySeeder extends \CodeIgniter\Database\Seeder
{
    /**
     * @var \CodeIgniter\Database\BaseBuilder
     */
    private $table;

    public function run()
    {
        $this->table = $this->db->table('categories');
        $this->table->truncate();

        $categories = [
            [
                'name' => 'Category A',
                'subcategories' => [
                    [
                        'name' => 'Category A-1'
                    ],
                    [
                        'name' => 'Category A-2',
                        'subcategories' => [
                            ['name' => 'Category A-1-1'],
                            ['name' => 'Category A-1-2'],
                            ['name' => 'Category A-1-3'],
                        ]
                    ],
                    [
                        'name' => 'Category A-3',
                        'subcategories' => [
                            ['name' => 'Category A-3-1'],
                            ['name' => 'Category A-3-2'],
                            ['name' => 'Category A-3-3'],
                        ]
                    ],
                ]
            ],

            [
                'name' => 'Category B',
                'subcategories' => [
                    [
                        'name' => 'Category B-1'
                    ],
                    [
                        'name' => 'Category B-2',
                        'subcategories' => [
                            ['name' => 'Category B-1-1'],
                            ['name' => 'Category B-1-2'],
                            ['name' => 'Category B-1-3'],
                        ]
                    ],
                    [
                        'name' => 'Category B-3',
                        'subcategories' => [
                            ['name' => 'Category B-3-1'],
                            ['name' => 'Category B-3-2'],
                            ['name' => 'Category B-3-3'],
                        ]
                    ],
                ]
            ]
        ];

        foreach ($categories as $category) {
            $this->insertCategory($category);
        }
    }

    private function insertCategory($category, $parent_id = 0)
    {
        $insertData = ['name' => $category['name'], 'parent_id' => $parent_id];

        $this->table->insert($insertData);
        $id = $this->db->insertID();

        if (!empty($category['subcategories'])) {
            foreach ($category['subcategories'] as $subcategory) {
                $this->insertCategory($subcategory, $id);
            }
        }
    }
}