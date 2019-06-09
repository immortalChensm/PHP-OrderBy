<?

use PHPUnit\Framework\TestCase;

require 'OrderBy.php';

class OrderByTest extends TestCase
{
    public function testOrderByItem1()
    {
        $products = [
            ['key1' => 3, 'key2' => 1],
            ['key1' => 2, 'key2' => 1],
            ['key1' => 1, 'key2' => 1],
        ];

        $sort = ['key1'];

        $sortedProducts = orderBy($products, $sort);

        $this->assertEquals([
            ['key1' => 1, 'key2' => 1],
            ['key1' => 2, 'key2' => 1],
            ['key1' => 3, 'key2' => 1],
        ], $sortedProducts);
    }

    public function testOrderByItem2()
    {
        $products = [
            ['key1' => 3, 'key2' => 2],
            ['key1' => 1, 'key2' => 3],
            ['key1' => 2, 'key2' => 3],
            ['key1' => 3, 'key2' => 1],
        ];

        $sort = ['key1', 'key2'];

        $sortedProducts = orderBy($products, $sort);

        $this->assertEquals([
            ['key1' => 1, 'key2' => 3],
            ['key1' => 2, 'key2' => 3],
            ['key1' => 3, 'key2' => 1],
            ['key1' => 3, 'key2' => 2],

        ], $sortedProducts);
    }

    public function testOrderByItem5()
    {
        $products = [
            ['month' => '2020/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 1, 'id' => 1],
            ['month' => '2017/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 2, 'id' => 2],
            ['month' => '2017/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 2, 'key5' => 3, 'id' => 3],
            ['month' => '2017/01/01', 'key1' => 3, 'key2' => 3, 'key3' => 3, 'key4' => 3, 'key5' => 1, 'id' => 4],
            ['month' => '2017/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 1, 'id' => 5],
            ['month' => '2017/01/01', 'key1' => 2, 'key2' => 2, 'key3' => 1, 'key4' => 1, 'key5' => 2, 'id' => 6],
            ['month' => '2017/01/01', 'key1' => 1, 'key2' => 4, 'key3' => 1, 'key4' => 2, 'key5' => 3, 'id' => 7],
            ['month' => '2017/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 2, 'key4' => 1, 'key5' => 2, 'id' => 8],
            ['month' => '2018/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 1, 'id' => 9],
        ];

        $sort = ['month', 'key1', 'key2', 'key3', 'key4', 'key5'];

        $sortedProducts = orderBy($products, $sort);

        $this->assertEquals([
            ['month' => '2017/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 1, 'id' => 5],
            ['month' => '2017/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 2, 'id' => 2],
            ['month' => '2017/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 2, 'key5' => 3, 'id' => 3],
            ['month' => '2017/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 2, 'key4' => 1, 'key5' => 2, 'id' => 8],
            ['month' => '2017/01/01', 'key1' => 1, 'key2' => 4, 'key3' => 1, 'key4' => 2, 'key5' => 3, 'id' => 7],
            ['month' => '2017/01/01', 'key1' => 2, 'key2' => 2, 'key3' => 1, 'key4' => 1, 'key5' => 2, 'id' => 6],
            ['month' => '2017/01/01', 'key1' => 3, 'key2' => 3, 'key3' => 3, 'key4' => 3, 'key5' => 1, 'id' => 4],
            ['month' => '2018/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 1, 'id' => 9],
            ['month' => '2020/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 1, 'id' => 1],
        ], $sortedProducts);
    }
}