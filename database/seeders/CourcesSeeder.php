<?php

namespace Database\Seeders;

use App\Models\Cource;
use App\Models\Image;
use App\Models\ImageList;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $images = [
            new Image([
                'path' => 'img/ico_ОХРАНА ТРУДА.png',
                'mime' => 'image/png',
            ]),
            new Image([
                'path' => 'img/ico_ПТМ.png',
                'mime' => 'image/png',
            ]),
            new Image([
                'path' => 'img/ico_ПТЭЭП.svg',
                'mime' => 'image/svg',
            ]),
            new Image([
                'path' => 'img/ico_ДОПОГ.svg',
                'mime' => 'image/svg',
            ]),
            new Image([
                'path' => 'img/ico_Обучение первой помощи.svg',
                'mime' => 'image/svg',
            ]),
            new Image([
                'path' => 'img/ico_Повышения квалификации рабочих.svg',
                'mime' => 'image/svg',
            ]),
            new Image([
                'path' => 'img/ico_Профессиональная подготовка рабочих.svg',
                'mime' => 'image/svg',
            ]),
            new Image([
                'path' => 'img/ico_День охраны труда.svg',
                'mime' => 'image/svg',
            ]),
            new Image([
                'path' => 'img/ico_Профессиональная переподготовка.svg',
                'mime' => 'image/svg',
            ]),
            new Image([
                'path' => 'img/ico_Санитарно гигиеническая безопасность.svg',
                'mime' => 'image/svg',
            ]),
            new Image([
                'path' => 'img/ico_Инструктор по оказанию первой помощи.svg',
                'mime' => 'image/svg',
            ]),
            new Image([
                'path' => 'img/ico_Повышение квалификации руководителей и специалистов.svg',
                'mime' => 'image/svg',
            ]),
        ];
        $image_lists = [
            new ImageList([ // 0
                'title' => 'Охрана Труда',
                'slug' => 'ОТ',
            ]),
            new ImageList([ // 1
                'title' => 'Пожарно-технический минимум',
                'slug' => 'ПТМ',
            ]),
            new ImageList([ // 2
                'title' => 'Обучение по электробезопасносности, ПТЭЭП',
                'slug' => 'ПТЭЭП',
            ]),
            new ImageList([ // 3
                'title' => 'Перевозка различных видов опасных грузов',
                'slug' => 'ДОПОГ',
            ]),
            
            new ImageList([ // 4
                'title' => 'Обучение первой помощи',
                'slug' => 'ОПП',
            ]),
            new ImageList([ // 5
                'title' => 'Повышения квалификации рабочих',
                'slug' => 'ПКР',
            ]),
            new ImageList([ // 6
                'title' => 'Профессиональная подготовка рабочих',
                'slug' => 'ППР',
            ]),
            new ImageList([ // 7
                'title' => 'День охраны труд',
                'slug' => 'ДОТ',
            ]),
            
            new ImageList([ // 8
                'title' => 'Профессиональная переподготовка',
                'slug' => 'ПП',
            ]),
            new ImageList([ // 9
                'title' => 'Санитарно гигиеническая безопасность',
                'slug' => 'СГБ',
            ]),
            new ImageList([ //10
                'title' => 'Инструктор по оказанию первой помощ',
                'slug' => 'ИОПП',
            ]),
            new ImageList([ // 11
                'title' => 'Повышение квалификации руководителей и специалистов',
                'slug' => 'ПКРС',
            ]),
        ];
        foreach ($images as $image) {
            $image->save();
        }

        foreach ($image_lists as $key => $il) {
            $il->save();
            $il->images()->attach($images[$key], ['tag' => 'icon']);
        }
        $root = [
            [
                'id' => 1,
                'title' => 'root',
                'isLeaf' => false,
                'children' => [
                    [
                        'id' => 2,
                        'title' => 'Повышение квалификации руководителей и специалистов',
                        'isLeaf' => false,
                        'children' => [
                            [
                                'id' => 3,
                                'title' => 'Охрана Труда',
                                'slug' => 'ОТ',
                                'header' => 'ОТ',
                                'description' => 'Обучениепо охране труда для руководителей и специалистов',
                            ],
                            [
                                'id' => 4,
                                'title' => 'Обучение по пожарно-техническому минимуму',
                                'slug' => 'ПТМ',
                                'description' => 'Обучение по пожарно-техническому минимуму'],
                        ],
                    ],
                    [
                        'id' => 5,
                        'title' => 'Профессиональная подготовка рабочих',
                        'isLeaf' => false,
                        'children' => [
                            [
                                'id' => 6,
                                'title' => 'Обучение по электробезопасносности, ПТЭЭП',
                                'slug' => 'ПТЭЭП',
                                'description' => 'Обучение по электробезопасносности, ПТЭЭП',
                            ],
                        ],
                    ],
                    [
                        'id' => 7,
                        'title' => 'Обучение БДД ДОПОГ',
                        'isLeaf' => false,
                        'children' => [
                            [
                                'id' => 8,
                                'title' => 'Обучение водителей перевозке различных видов опасных грузов',
                                'slug' => 'ДОПОГ',
                                'description' => 'Обучение водителей перевозке различных видов опасных грузов',
                            ],
                        ],
                    ],
                    [
                        'id' => 9,
                        'title' => 'Санитарно гигиеническая безопасность',
                        'isLeaf' => false,
                    ],
                    [
                        'id' => 10,
                        'title' => 'Инструктор по оказанию первой помощи',
                        'isLeaf' => false,
                    ],
                    [
                        'id' => 11,
                        'title' => 'Профессиональная переподготовка',
                        'isLeaf' => false,
                    ],
                    [
                        'id' => 12,
                        'title' => 'Повышения квалификации рабочих',
                        'isLeaf' => false,
                    ],
                    [
                        'id' => 13,
                        'title' => 'День охраны труда',
                        'isLeaf' => false,
                    ],
                    [
                        'id' => 14,
                        'title' => 'Обучение первой помощи',
                        'isLeaf' => false,
                    ],
                ],
            ],
        ];
        $cources_images_lists = [
            2 => 11,
            3 => 0,
            4 => 1,
            5 => 6,
            6 => 2,
            7 => 3,
            8 => 3,
            9 => 9,
            10 => 10,
            11 => 8,
            12 => 5,
            13 => 7,
            14 => 4
        ];

        $this->createFromArray($root, null, $image_lists, $cources_images_lists);

    }
    private function createFromArray(array $structure, int $parent_id = null, array &$image_lists = null, array &$cources_images_lists = null)
    {

        foreach ($structure as $item) {

            if ($parent_id === null) {
                $cource = new Cource(Arr::except($item, ['children']));

            } else {
                $cource = new Cource(array_merge(Arr::except($item, ['children']), ['parent_id' => $parent_id]));
            }
            $cource->save();
            if (array_key_exists($cource->id, $cources_images_lists)) {                
                $cource->image_list()->save($image_lists[$cources_images_lists[$cource->id]]);
            }
            if (array_key_exists('children', $item)) {
                $this->createFromArray($item['children'], $cource->id, $image_lists, $cources_images_lists);
            }
        }
    }
}
