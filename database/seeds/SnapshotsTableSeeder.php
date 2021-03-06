<?php

use Illuminate\Database\Seeder;

class SnapshotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 以容器的方式调用测试数据生成器
        $faker = app(Faker\Generator::class);
        // 获取所有栏目的 id 数据
        $columns = App\Models\Column::lists('id')->toArray();
        // 获取所有文章的 id 数据
        $articles = App\Models\Article::lists('id')->toArray();
        $amount = count($columns) + count($articles);
        // 组装测试用的数据
        $data = [
            App\Models\Column::class     =>  $columns,
            App\Models\Article::class    =>  $articles,
        ];
        // 生成测试数据
        $snapshots = factory(App\Models\Snapshot::class)->times($amount)->make()->each(function($ele) use ($faker, $data) {
            $model = array_rand($data);
            $ele->snapshotable_id = $faker->randomElement($data[$model]);
            $ele->snapshotable_type = $model;
        })->toArray();
        // 保存测试数据
        App\Models\Snapshot::insert($snapshots);
    }
}
